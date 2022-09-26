<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\FlashMsg;
use App\Subcategory;
use App\Category;
use Str;


class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:subcategory-list|subcategory-create|subcategory-status|subcategory-edit|subcategory-delete',['only' => ['index']]);
        $this->middleware('permission:subcategory-create',['only' => ['add_new_subcategory']]);
        $this->middleware('permission:subcategory-edit',['only' => ['edit_subcategory']]);
        $this->middleware('permission:subcategory-status',['only' => ['change_status']]);
        $this->middleware('permission:subcategory-delete',['only' => ['delete_subcategory','bulk_action']]);
    }
    
    public function index(){
       $sub_categories = Subcategory::with('category')->latest()->get();
       $categories = Category::all();
        return view('backend.pages.subcategory.index',compact('sub_categories','categories'));
    }


    public function add_new_subcategory(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate([
                'name'=> 'required|max:191|unique:subcategories',
                'slug'=> 'max:191|unique:subcategories',
                'category_id'=> 'required',
            ]);
    
            $request->slug=='' ? $slug = Str::slug($request->name) : $slug = $request->slug;
            Subcategory::create([
               'name' => $request->name,
               'slug' => $slug,
               'category_id' => $request->category_id,
               'image' => $request->image,
           ]);
    
           return redirect()->back()->with(FlashMsg::item_new('Sub Category Added'));
        }
        $categories = Category::all();
        return view('backend.pages.subcategory.add_subcategory',compact('categories'));
    }


    public function change_status($id){
        $category = Subcategory::select('status')->where('id',$id)->first();
        if($category->status==1){
            $status = 0;
        }else{
         $status = 1;
        }
        Subcategory::where('id',$id)->update(['status'=>$status]);
        return redirect()->back()->with(FlashMsg::item_new(' Status Change Success'));
     }


     public function edit_subcategory(Request $request)
     {
         $request->validate(
             [
                'name' => 'required|max:191|unique:subcategories,name,'.$request->up_id,
                'category_id'=> 'required',
                'slug'=> 'max:191|unique:subcategories,slug,'.$request->up_id,
             ],
             [
                'name.unique' => __('Sub Category Already Exists.'),
                'slug.unique' => __('Slug Already Exists.'),
            ]
        );
 
         $old_slug = Subcategory::select('slug')->where('id',$request->up_id)->first();
         $old_image = Subcategory::select('image')->where('id',$request->up_id)->first();
         Subcategory::where('id',$request->up_id)->update([
             'name'=>$request->name,
             'category_id'=>$request->category_id,
             'slug'=>$request->slug ?? $old_slug->slug,
             'image'=>$request->image ?? $old_image->image,
         ]);
         return redirect()->back()->with(FlashMsg::item_new('Sub Category Update Success'));
     }


    public function delete_subcategory($id){
        Subcategory::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_new('Sub Category Deleted Success'));
    }

    public function bulk_action(Request $request){
        Subcategory::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
