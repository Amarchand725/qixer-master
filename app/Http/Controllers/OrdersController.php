<?php

namespace App\Http\Controllers;

use App\Mail\BasicMail;
use App\Order;
use App\OrderInclude;
use App\OrderAdditional;
use App\Report;
use Illuminate\Http\Request;
use App\Helpers\FlashMsg;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use App\Helpers\DataTableHelpers\General;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:order-list|order-status|order-view|cancel-order-list|order-success-setting',['only' => ['index']]);
        $this->middleware('permission:order-status',['only' => ['orderStatus']]);
        $this->middleware('permission:order-view',['only' => ['orderDetails']]);
        $this->middleware('permission:cancel-order-list',['only' => ['cancelOrders']]);
        $this->middleware('permission:order-success-setting',['only' => ['order_success_settings']]);
    }

    public function index(Request $request){

        if ($request->ajax()){

            $data = Order::select('*')
            ->orderBy('id','desc')
            ->where('payment_status', '!=','')
            ->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('checkbox',function ($row){
                    return General::bulkCheckbox($row->id);
                })

                ->addColumn('id',function ($row){
                    return $row->id;
                })

                ->addColumn('name',function ($row){
                    return $row->name;
                })

                ->addColumn('email',function ($row){
                    return $row->email;
                })

                ->addColumn('phone',function ($row){
                    return $row->phone;
                })

                ->addColumn('address',function ($row){
                    return $row->address;
                })

                ->addColumn('amount',function ($row){
                    return float_amount_with_currency_symbol($row->total);
                })

                ->addColumn('payment_status',function ($row){
                    return $row->payment_status;
                })

                ->addColumn('status',function ($row){

                    $action = '';
                    $admin = auth()->guard('admin')->user();

                    if($row->status == 0){
                        if ($admin->can('pending-order-delete')){
                            $action .= General::deleteCancelOrder(route('admin.cancel.pending.order',$row->id),$row->status);
                            return $action;
                        }
                    }else{
                        return General::orderStatus($row->status);
                    }
                })

                ->addColumn('is_order_online',function ($row){
                    return General::orderType($row->is_order_online);
                })

                ->addColumn('action', function($row){
                    $action = '';
                    $admin = auth()->guard('admin')->user();
                    if ($admin->can('order-view')){
                        $action .= General::viewIcon(route('admin.orders.details',$row->id));
                    }
                    return $action;
                })
                ->rawColumns(['checkbox','status','action','is_order_online'])
                ->make(true);
        }
        return view('backend.pages.orders.index');
    }

    //cancel pending order
    public function cancelPendingOrder(Request $request, $id=null)
    {
        Order::where('id',$id)->update(['status'=>4]);
        return redirect()->back()->with(FlashMsg::item_new('Status Update Change to Cancel'));
    }

    //all cancel orders
    public function cancelOrders(){
        $orders = Order::where('status',4)->latest()->get();
        return view('backend.pages.orders.cancelled',compact('orders'));
    }

   //cancel order return money
    public function cancelOrderMoneyReturn($id=null){
        Order::where('id',$id)->update(['cancel_order_money_return'=>1]);
        return redirect()->back()->with(FlashMsg::item_new('Status Update Success'));
    }
    
     //cancel order delete
    public function cancelOrderDelete($id){
        Order::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_new('Cancel Order Delete Success'));
    }

    //order complete request
    public function orderCompleteRequest(Request $request, $id=null)
    {
        if($request->isMethod('post')){
            Order::where('id',$id)->update(['order_complete_request'=>2,'status'=>2]);
            return redirect()->back()->with(FlashMsg::item_new('Order Status Change to Complete'));
        }
        $orders = Order::select('id','total','updated_at','seller_id','buyer_id')->with('seller','buyer')
            ->where('order_complete_request',1)
            ->latest()
            ->paginate(10);
        return view('backend.pages.orders.order-complete-request',compact('orders'));
    }

    public function orderDetails($id){
        $order_details = Order::where('id',$id)->first();
        $order_includes = OrderInclude::where('order_id',$id)->get();
        $order_additionals = OrderAdditional::where('order_id',$id)->get();
        return view('backend.pages.orders.order-details',compact('order_details','order_includes','order_additionals'));
    }

    public function orderStatus(Request $request)
    {
        Order::where('id',$request->order_id)->update(['status'=>$request->status]);
        return redirect()->back()->with(FlashMsg::item_new('Status Update Success'));
    }
    
    public function order_success_settings()
     {
        return view('backend.pages.orders.order-success-settings');
     }

    public function seller_buyer_report()
    {
        $reports = Report::latest()->get();
        return view('backend.pages.orders.seller-buyer-report',compact('reports'));
    }

    public function delete_report($id){
        Report::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_new(' Report Deleted Success'));
    }

    public function order_success_settings_update(Request $request)
    {
         $this->validate($request, [
             'success_title' => 'nullable|string',
             'success_subtitle' => 'nullable|string',
             'success_details_title' => 'nullable|string',
             'button_title' => 'nullable|string',
             'button_url' => 'nullable|string',
         ]);
     
         $all_fields = [
             'success_title',
             'success_subtitle',
             'success_details_title',
             'button_title',
             'button_url',
         ];
         foreach ($all_fields as $field) {
             update_static_option($field, $request->$field);
         }
         return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function change_payment_status($id){
        $payment_status = Order::select('id','seller_id','payment_status','email','name')->where('id',$id)->first();
        $old_status = $payment_status->payment_status;
        $seller_email = optional($payment_status->seller)->email;
        $seller_name = optional($payment_status->seller)->name;
        if($payment_status->payment_status=='pending'){
            $new_status = 'complete';
        }else{
            $new_status = 'pending';
        }
        Order::where('id',$id)->update(['payment_status'=>$new_status]);

        try {
            $message_body_buyer = __('Hello, ').$payment_status->name.__(' Payment status has been changed '). $old_status.__(' to ').$new_status .'</br>'.'<span class="verify-code">'.__('Order Id: ') .$payment_status->id.'</span>';
            $message_body_seller = __('Hello, ').$seller_name.__(' Payment status has been changed '). $old_status.__(' to ').$new_status .'</br>'.'<span class="verify-code">'.__('Order Id: ') .$payment_status->id.'</span>';
            Mail::to($payment_status->email)->send(new BasicMail([
                'subject' => __('Payment Status Changed.'),
                'message' => $message_body_buyer
            ]));
            Mail::to( $seller_email)->send(new BasicMail([
                'subject' => __('Payment Status Changed.'),
                'message' => $message_body_seller
            ]));
        } catch (\Exception $e) {
            return redirect()->back()->with(FlashMsg::item_new($e->getMessage()));
        }

        return redirect()->back()->with(FlashMsg::item_new(' Status Change Success'));
     }
}
