<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\FlashMsg;
use App\Category;
use Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-status|category-edit|category-delete',['only' => ['index']]);
        $this->middleware('permission:category-create',['only' => ['add_new_category']]);
        $this->middleware('permission:category-edit',['only' => ['edit_category']]);
        $this->middleware('permission:category-status',['only' => ['change_status']]);
        $this->middleware('permission:category-delete',['only' => ['delete_category','bulk_action']]);
    }
    
    public function index(){
        $categories = Category::all();
        return view('backend.pages.category.index',compact('categories'));
    }

    public function add_new_category(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate(
                [
                    'name'=> 'required|unique:categories|max:191',
                    'slug'=> 'unique:categories|max:191',
                ],
                [
                    'name.unique' => __('Category Already Exists.'),
                    'slug.unique' => __('Slug Already Exists.'),
                ]
            );
           $request->slug=='' ? $slug = Str::slug($request->name) : $slug = $request->slug;
           Category::create([
               'name' => $request->name,
               'slug' => $slug,
               'icon' => $request->icon,
               'image' => $request->image,
               'mobile_icon' => $request->mobile_icon,
           ]);
    
           return redirect()->back()->with(FlashMsg::item_new('New Category Added'));
        }
        return view('backend.pages.category.add_category');
    }

    public function edit_category(Request $request, $id=null)
    {
        if($request->isMethod('post')){
            $request->validate(
                [
                'name' => 'required|max:191|unique:categories,name,'.$id,
                'slug'=> 'max:191|unique:categories,slug,'.$id,
            ],
            [
                'name.unique' => __('Category Already Exists.'),
                'slug.unique' => __('Slug Already Exists.'),
            ]
            );
            
            $old_slug = Category::select('slug')->where('id',$id)->first();
            $old_image = Category::select('image')->where('id',$id)->first();
            Category::where('id',$id)->update([
                'name'=>$request->name,
                'slug'=>$request->slug ?? $old_slug->slug,
                'icon'=>$request->icon,
                'mobile_icon'=>$request->mobile_icon,
                'image'=>$request->image,
            ]);
            return redirect()->back()->with(FlashMsg::item_new('Category Update Success'));
        }
        $category = Category::find($id);
        return view('backend.pages.category.edit_category',compact('category'));
    }

    public function change_status($id){
       $category = Category::select('status')->where('id',$id)->first();
       if($category->status==1){
           $status = 0;
       }else{
        $status = 1;
       }
       Category::where('id',$id)->update(['status'=>$status]);
       return redirect()->back()->with(FlashMsg::item_new(' Status Change Success'));
    }

    public function delete_category($id){
        Category::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_new(' Category Deleted Success'));
    }

    public function bulk_action(Request $request){
        Category::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
