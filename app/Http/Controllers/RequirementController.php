<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Http\Request;
use App\Helpers\FlashMsg;
use App\Requirement;
use Str;
use Auth;

class RequirementController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:requirement-list|requirement-create|requirement-status|requirement-edit|requirement-delete', ['only' => ['index']]);
        $this->middleware('permission:requirement-create', ['only' => ['add_new_requirement']]);
        $this->middleware('permission:requirement-edit', ['only' => ['edit_requirement']]);
        $this->middleware('permission:requirement-status', ['only' => ['change_status']]);
        $this->middleware('permission:requirement-delete', ['only' => ['delete_requirement', 'bulk_action']]);
    }

    public function index()
    {
        $requirements = Requirement::all();
        $user = User::where('id', Auth::user()->id)->first();
        $sellers = User::where('user_type' , 0)->where('user_status', 1)->get(['id', 'name']);
        return view('backend.pages.requirement.index', compact('requirements', 'sellers'));
    }

    public function add_new_requirement(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate(
                [
                    'requirement_name' => 'required|unique:requirements|max:191',
                    'slug' => 'unique:requirements|max:191',
                    'attachments.*' => ['mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx'],
                    'deliveries.*' => ['mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx'],
                    'contract.*' => ['mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx'],
                ],
                [
                    'requirement_name.unique' => __('Requirement Name Already Exists.'),
                    'slug.unique' => __('Slug Already Exists.'),
                ]
            );
            $request->slug == '' ? $slug = Str::slug($request->name) : $slug = $request->slug;
            $requirement = Requirement::create([
                'requirement_name' => $request->requirement_name,
                'client_id' => $request->client_id,
                'project_manager_id' => $request->project_manager_id,
                'contact_mobile' => $request->contact_mobile,
                'contact_email' => $request->contact_email,
                'details' => $request->details,
                'notes' => $request->notes,
                'budget' => $request->budget,
                'priority' => $request->priority,
                'slug' => $slug
            ]);

            if ($request->attachments) {
                foreach ($request->file('attachments') as $attachment) {
                    $file_name = $attachment->getClientOriginalName();
                    $attachmentPath[] = $attachment->storeAs('requirements/' . $request->requirement_name . '/attachments', $file_name, 'public');
                }
                $requirement->update([
                    'attachments' => $attachmentPath
                ]);
            }

            if ($request->deliveries) {
                foreach ($request->file('deliveries') as $delivery) {
                    $file_name = $delivery->getClientOriginalName();
                    $deliveryPath[] = $delivery->storeAs('requirements/' . $request->requirement_name . '/deliveries', $file_name, 'public');
                }
                $requirement->update([
                    'deliveries' => $deliveryPath
                ]);
            }

            if ($request->contract) {
                foreach ($request->file('contract') as $contract) {
                    $file_name = $contract->getClientOriginalName();
                    $contractPath[] = $contract->storeAs('requirements/' . $request->requirement_name . '/contract', $file_name, 'public');
                }
                $requirement->update([
                    'contract' => $contractPath
                ]);
            }

            return redirect()->back()->with(FlashMsg::item_new('New Requirement Added'));
        }
        $clients = User::where('user_type' , 1)->latest()->get();
        $project_managers = Admin::where('role' , 4)->latest()->get();
        return view('backend.pages.requirement.add_requirement', compact('clients', 'project_managers'));
    }

    public function edit_requirement(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $request->validate(
                [
                    'requirement_name' => 'required|max:191|unique:requirements,requirement_name,' . $id,
                    'slug' => 'max:191|unique:requirements,slug,' . $id,
                    'attachments.*' => ['mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx'],
                    'deliveries.*' => ['mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx'],
                    'contract.*' => ['mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx'],
                ],
                [
                    'name.unique' => __('Requirement Already Exists.'),
                    'slug.unique' => __('Slug Already Exists.'),
                ]
            );

            $old_slug = Requirement::select('slug')->where('id', $id)->first();
            $requirement = Requirement::where('id', $id)->first();
            $requirement->update([
                'requirement_name' => $request->requirement_name,
                'client_id' => $request->client_id,
                'project_manager_id' => $request->project_manager_id,
                'contact_mobile' => $request->contact_mobile,
                'contact_email' => $request->contact_email,
                'details' => $request->details,
                'notes' => $request->notes,
                'budget' => $request->budget,
                'priority' => $request->priority,
                'slug' => $request->slug ?? $old_slug->slug,
            ]);

            if ($request->attachments) {
                foreach ($request->file('attachments') as $attachment) {
                    $file_name = $attachment->getClientOriginalName();
                    $attachmentPath[] = $attachment->storeAs('requirements/' . $request->requirement_name . '/attachments', $file_name, 'public');
                }
                $requirement->update([
                    'attachments' => $attachmentPath
                ]);
            }

            if ($request->deliveries) {
                foreach ($request->file('deliveries') as $delivery) {
                    $file_name = $delivery->getClientOriginalName();
                    $deliveryPath[] = $delivery->storeAs('requirements/' . $request->requirement_name . '/deliveries', $file_name, 'public');
                }
                $requirement->update([
                    'deliveries' => $deliveryPath
                ]);
            }

            if ($request->contract) {
                foreach ($request->file('contract') as $contract) {
                    $file_name = $contract->getClientOriginalName();
                    $contractPath[] = $contract->storeAs('requirements/' . $request->requirement_name . '/contract', $file_name, 'public');
                }
                $requirement->update([
                    'contract' => $contractPath
                ]);
            }

            return redirect()->back()->with(FlashMsg::item_new('Requirement Update Success'));
        }
        $requirement = Requirement::find($id);
        $clients = User::where('user_type' , 1)->latest()->get();
        $project_managers = Admin::where('role' , 4)->latest()->get();
        return view('backend.pages.requirement.edit_requirement', compact('requirement', 'clients', 'project_managers'));
    }

    public function delete_requirement($id)
    {
        Requirement::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_new(' Requirement Deleted Success'));
    }

    public function bulk_action(Request $request)
    {
        Requirement::whereIn('id', $request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
