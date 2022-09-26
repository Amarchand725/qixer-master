@extends('backend.admin-master')
@section('site-title')
    {{__('All Subcategories')}}
@endsection

@section('style')
<x-datatable.css/>
<x-media.css/>
@endsection

@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.success/>
                <x-msg.error/>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <div class="left-content">
                                <h4 class="header-title">{{__('All Subcategories')}}  </h4>
                                @can('subcategory-list')
                                  <x-bulk-action/>
                                @endcan
                            </div>
                            @can('subcategory-create')
                            <div class="right-content">
                                <a href="{{ route('admin.subcategory.new')}}" class="btn btn-primary">{{__('Add New Subcategory')}}</a>
                            </div>
                             @endcan
                        </div>
                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <th class="no-sort">
                                    <div class="mark-all-checkbox">
                                        <input type="checkbox" class="all-checkbox">
                                    </div>
                                </th>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Subcategory')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Main Category')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Create Date')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                  
                                    @foreach($sub_categories as $data)
                                        <tr>
                                            <td>
                                                <x-bulk-delete-checkbox :id="$data->id"/>
                                            </td>
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>
                                                @php
                                                    $sub_cat_img = get_attachment_image_by_id($data->image,null,true);
                                                @endphp
                                                @if (!empty($sub_cat_img))
                                                    <div class="attachment-preview">
                                                        <div class="thumbnail">
                                                            <div class="centered">
                                                                <img class="avatar user-thumb"
                                                                    src="{{$sub_cat_img['img_url']}}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php  $img_url = $sub_cat_img['img_url']; @endphp
                                                @endif
                                                </td>
                                            <td>{{optional($data->category)->name}}</td>
                                            <td>
                                                @can('subcategory-status')
                                                    @if($data->status==1)
                                                    <span class="btn btn-success btn-sm">{{__('Active')}}</span>
                                                    @else 
                                                    <span class="btn btn-danger">{{__('Inactive')}}</span> 
                                                    @endif
                                                    <span><x-status-change :url="route('admin.subcategory.status',$data->id)"/></span>
                                                @endcan
                                            </td>
                                            <td>{{date('d-m-Y', strtotime($data->created_at))}}</td>
                                            <td>
                                                @can('subcategory-delete')
                                                  <x-delete-popover :url="route('admin.subcategory.delete',$data->id)"/>
                                                @endcan
                                                @can('subcategory-edit')
                                                <a href="#"
                                                    data-toggle="modal"
                                                    data-target="#subcategory_edit_modal"
                                                    class="btn btn-primary btn-xs mb-3 mr-1 subcategory_edit_btn"
                                                    data-id="{{$data->id}}"
                                                    data-name="{{$data->name}}"
                                                    data-slug="{{$data->slug}}"
                                                    data-categoryid="{{$data->category_id}}"
                                                    data-imageid="{{$data->image}}"
                                                    data-image="{{$img_url}}">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="subcategory_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Sub Category')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.subcategory.edit')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="up_id" id="up_id">
                        <div class="form-group">
                            <label for="name">{{__('Sub Category')}}</label>
                            <input type="text" class="form-control" name="name" id="up_name"
                                   placeholder="{{__('Sub Category')}}">
                        </div>

                        <div class="form-group permalink_label">
                            <label class="text-dark">{{__('Permalink * : ')}}
                                <span id="slug_show" class="display-inline"></span>
                                <span id="slug_edit" class="display-inline">
                                     <button class="btn btn-warning btn-sm slug_edit_button"> <i class="fas fa-edit"></i> </button>
                                    
                                    <input type="text" name="slug" id="up_slug" class="form-control subcategory_slug mt-2" style="display: none">
                                    <button class="btn btn-info btn-sm slug_update_button mt-2" style="display: none">{{__('Update')}}</button>
                                </span>
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="icon" class="d-block">{{__('Parent Category')}}</label>
                            <select name="category_id" id="up_category_id" class="form-control">
                                @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">{{__('Upload Sub Category Image')}}</label>
                            <div class="media-upload-btn-wrapper">
                                <div class="img-wrap"></div>
                                <input type="hidden" name="image">
                                <button type="button" class="btn btn-info media_upload_form_btn"
                                        data-btntitle="{{__('Select Image')}}"
                                        data-modaltitle="{{__('Upload Image')}}" data-toggle="modal"
                                        data-target="#media_upload_modal">
                                    {{__('Upload Image')}}
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button id="update" type="submit" class="btn btn-primary">{{__('Save Changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-media.markup/>
@endsection

@section('script')
 <x-datatable.js/>
 <x-media.js/>
    <script type="text/javascript">

        (function(){
            "use strict";
            $(document).ready(function(){
                <x-bulk-action-js :url="route('admin.subcategory.bulk.action')"/>

                $(document).on('click','.swal_status_change',function(e){
                e.preventDefault();
                    Swal.fire({
                    title: '{{__("Are you sure to change status?")}}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).next().find('.swal_form_submit_btn').trigger('click');
                    }
                    });
                });

                $(document).on('click', '.subcategory_edit_btn', function () {
                    var el = $(this);
                    var id = el.data('id');
                    var name = el.data('name');
                    var slug_value_show_permalink = el.data('slug');
                    var category_id = el.data('categoryid');
                    var form = $('#subcategory_edit_modal');

                    form.find('#up_id').val(id);
                    form.find('#up_name').val(name);
                    form.find('#up_slug').val(slug_value_show_permalink);
                    form.find('#up_category_id').val(category_id);

                    var url = "{{url('/subcategory/')}}/" + slug_value_show_permalink;
                    var data = $('#slug_show').text(url).css('color', 'blue');

                    var image = el.data('image');
                    var imageid = el.data('imageid');

                    if (imageid != '') {
                        form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="' + image + '" > </div></div></div>');
                        form.find('.media-upload-btn-wrapper input').val(imageid);
                        form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                    }
                });

                //Permalink Code
                 function converToSlug(slug){
                   let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                    //remove multiple space to single
                    finalSlug = slug.replace(/  +/g, ' ');
                    // remove all white spaces single or multiple spaces
                    finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                    return finalSlug;
                }

                //Slug Edit Code
                $(document).on('click', '.slug_edit_button', function (e) {
                    e.preventDefault();
                    $('.subcategory_slug').show();
                    $(this).hide();
                    $('.slug_update_button').show();
                });

                //Slug Update Code
                $(document).on('click', '.slug_update_button', function (e) {
                    e.preventDefault();
                    $(this).hide();
                    $('.slug_edit_button').show();
                    var update_input = $('.subcategory_slug').val();
                    var slug = converToSlug(update_input);
                    var url = `{{url('/subcategory/')}}/` + slug;
                    $('#slug_show').text(url);
                    $('.subcategory_slug').hide();
                });

            });
        })(jQuery);
    </script>
@endsection
