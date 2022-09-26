<?php

namespace App\Http\Controllers;

use App\OnlineServiceFaq;
use Illuminate\Http\Request;
use App\Helpers\FlashMsg;
use App\Serviceinclude;
use App\Serviceadditional;
use App\Servicebenifit;
use App\Service;
use App\User;
use Yajra\DataTables\Facades\DataTables;
use App\Helpers\DataTableHelpers\General;


class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:service-list|service-status|service-delete|service-view', ['only' => ['index']]);
        $this->middleware('permission:service-status', ['only' => ['change_status']]);
        $this->middleware('permission:service-delete', ['only' => ['delete_service', 'bulk_action']]);
        $this->middleware('permission:service-view', ['only' => ['viewServiceDetails']]);
        $this->middleware('permission:service-book-setting', ['only' => ['service_book_settings']]);
        $this->middleware('permission:service-detail-setting', ['only' => ['service_details_settings']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Service::select('*')->orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    return General::bulkCheckbox($row->id);
                })
                ->addColumn('id', function ($row) {
                    return $row->id;
                })
                ->addColumn('title', function ($row) {
                    return $row->title;
                })
                ->addColumn('price', function ($row) {
                    return float_amount_with_currency_symbol($row->price);
                })
                ->addColumn('status', function ($row) {
                    return General::serviceStatusSpan($row->status);
                })
                ->addColumn('create_date', function ($row) {
                    return date_format($row->created_at, 'd-M-Y');
                })
                ->addColumn('featured', function ($row) {
                    $row->featured == 1 ? $featured = __('Yes') : $featured = __('No');
                    return $featured;
                })
                ->addColumn('action', function ($row) {
                    $action = '';
                    $admin = auth()->guard('admin')->user();
                    if ($admin->can('service-status')) {
                        $action .= General::statusChange(route('admin.service.status', $row->id));
                    }
                    if ($admin->can('service-view')) {
                        $action .= General::viewIcon(route('admin.service.view.details', $row->id));
                    }
                    if ($admin->can('service-delete')) {
                        $action .= General::deletePopover(route('admin.service.delete', $row->id));
                    }
                    if ($admin->can('service-featured')) {
                        $action .= General::featuredService(route('admin.service.featured', $row->id), $row->featured);
                    }
                    return $action;
                })
                ->rawColumns(['checkbox', 'status', 'action'])
                ->make(true);
        }
        return view('backend.pages.services.index');
    }

    public function viewServiceDetails($id)
    {
            $service = Service::with('serviceInclude', 'serviceAdditional', 'serviceBenifit')->where('id', $id)->first();
            $service_includes = Serviceinclude::where('service_id', $id)->get();
            $service_additionals = Serviceadditional::where('service_id', $id)->get();
            $service_benifits = Servicebenifit::where('service_id', $id)->get();
            $service_faqs = OnlineServiceFaq::where('service_id', $id)->get();
            $seller_since = User::select('created_at')->where('id', $service->seller_id)->where('user_status', 1)->first();
            return view('backend.pages.services.service-details', compact(
                'service',
                'service_includes',
                'service_additionals',
                'service_benifits',
                'service_faqs',
                'seller_since'
            ));
    }

    public function change_status($id)
    {
        $service = Service::select('status')->where('id', $id)->first();
        $service->status == 1 ? $status = 0 : $status = 1;
        Service::where('id', $id)->update(['status' => $status]);
        return redirect()->back()->with(FlashMsg::item_new(__('Status Change Success')));
    }

    public function tax_update(Request $request)
    {
        Service::where('id', $request->service_id)->update(['tax' => $request->tax]);
        return redirect()->back()->with(FlashMsg::item_new(__('Tax Update Success')));
    }

    public function bulk_action(Request $request)
    {
        Service::whereIn('id', $request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function delete_service($id)
    {
        Serviceinclude::where('service_id', $id)->delete();
        Serviceadditional::where('service_id', $id)->delete();
        Servicebenifit::where('service_id', $id)->delete();
        Service::find($id)->delete();

        return redirect()->back()->with(FlashMsg::item_new(__('Service Deleted Success')));
    }

    public function service_featured($id)
    {
        $service = Service::select('featured')->where('id', $id)->first();
        $service->featured == 1 ? $featured = 0 : $featured = 1;
        Service::where('id', $id)->update(['featured' => $featured]);
        return redirect()->back()->with(FlashMsg::item_new(__('Status Change Success')));
    }

    public function service_book_settings()
    {
        return view('backend.pages.services.service-book-settings');
    }

    public function service_book_settings_update(Request $request)
    {
        $this->validate($request, [
            'service_main_attribute_title' => 'nullable|string',
            'service_additional_attribute_title' => 'nullable|string',
            'service_benifits_title' => 'nullable|string',
            'service_booking_title' => 'nullable|string',
            'service_appoinment_package_title' => 'nullable|string',
            'service_package_fee_title' => 'nullable|string',
            'service_extra_title' => 'nullable|string',
            'service_subtotal_title' => 'nullable|string',
            'service_total_amount_title' => 'nullable|string',
            'service_available_date_title' => 'nullable|string',
            'service_available_schudule_title' => 'nullable|string',
            'service_booking_information_title' => 'nullable|string',
            'terms_and_conditions_link' => 'nullable|string',
            'service_order_confirm_title' => 'nullable|string',
        ]);

        $all_fields = [
            'service_main_attribute_title',
            'service_additional_attribute_title',
            'service_benifits_title',
            'service_booking_title',
            'service_appoinment_package_title',
            'service_package_fee_title',
            'service_extra_title',
            'service_subtotal_title',
            'service_total_amount_title',
            'service_available_date_title',
            'service_available_schudule_title',
            'service_booking_information_title',
            'terms_and_conditions_link',
            'service_order_confirm_title',
        ];
        foreach ($all_fields as $field) {
            update_static_option($field, $request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function service_details_settings()
    {
        return view('backend.pages.services.service-details-settings');
    }

    public function service_details_settings_update(Request $request)
    {
        $this->validate($request, [
            'service_details_overview_title' => 'nullable|string',
            'service_details_about_seller_title' => 'nullable|string',
            'service_details_review_title' => 'nullable|string',
            'service_details_what_you_get' => 'nullable|string',
            'service_details_benifits_title' => 'nullable|string',
            'service_details_another_service_title' => 'nullable|string',
            'service_details_explore_all_title' => 'nullable|string',
            'service_details_package_title' => 'nullable|string',
            'service_details_package_subtitle' => 'nullable|string',
            'service_details_button_title' => 'nullable|string',
            'service_reviews_title' => 'nullable|string',
            'service_post_reviews_title' => 'nullable|string',
        ]);

        $all_fields = [
            'service_details_overview_title',
            'service_details_about_seller_title',
            'service_details_review_title',
            'service_details_what_you_get',
            'service_details_benifits_title',
            'service_details_another_service_title',
            'service_details_explore_all_title',
            'service_details_package_title',
            'service_details_package_subtitle',
            'service_details_button_title',
            'service_reviews_title',
            'service_post_reviews_title',
        ];
        foreach ($all_fields as $field) {
            update_static_option($field, $request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function login_register_settings()
    {
        return view('backend.pages.services.login-register-settings');
    }
    public function login_register_settings_update(Request $request)
    {
        $this->validate($request, [
            'login_form_title' => 'nullable|string',
            'register_page_title' => 'nullable|string',
            'register_seller_title' => 'nullable|string',
            'register_buyer_title' => 'nullable|string',
        ]);

        $all_fields = [
            'login_form_title',
            'register_page_title',
            'register_seller_title',
            'register_buyer_title',
        ];
        foreach ($all_fields as $field) {
            update_static_option($field, $request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function service_create_settings()
    {
        return view('backend.pages.services.service-create-settings');
    }

    public function service_create_settings_update(Request $request)
    {
        update_static_option('service_create_settings',$request->service_create_settings);
        return redirect()->back()->with(FlashMsg::item_new('Update Success'));

    }
    
        public function order_create_settings()
    {
        return view('backend.pages.services.order-create-settings');
    }

    public function order_create_settings_update(Request $request)
    {
        update_static_option('order_create_settings',$request->order_create_settings);
        return redirect()->back()->with(FlashMsg::item_new('Update Success'));

    }
     
}
