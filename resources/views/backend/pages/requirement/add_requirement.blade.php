@extends('backend.admin-master')

@section('site-title')
    {{__('Add New Requirement')}}
@endsection
@section('style')
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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <div class="left-content">
                                <h4 class="header-title">{{__('Add New Requirement')}}   </h4>
                            </div>
                            <div class="right-content">
                                <a class="btn btn-info btn-sm"
                                   href="{{route('admin.requirement')}}">{{__('All Requirements')}}</a>
                            </div>
                        </div>
                        <form action="{{route('admin.requirement.new')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content margin-top-40">

                                <div class="form-group">
                                    <label for="requirement_name">{{__('Requirement Name')}}</label>
                                    <input type="text" class="form-control" name="requirement_name" id="requirement_name"
                                           placeholder="{{__('Requirement Name')}}">
                                </div>

                                <div class="form-group permalink_label">
                                    <label class="text-dark">{{__('Permalink * : ')}}
                                        <span id="slug_show" class="display-inline"></span>
                                        <span id="slug_edit" class="display-inline">
                                             <button class="btn btn-warning btn-sm slug_edit_button"> <i
                                                         class="fas fa-edit"></i> </button>
    
                                            <input type="text" name="slug" class="form-control requirement_slug mt-2"
                                                   style="display: none">
                                              <button class="btn btn-info btn-sm slug_update_button mt-2"
                                                      style="display: none">{{__('Update')}}</button>
                                        </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="client_id">{{__('Client')}}</label>
                                    <select class="form-control" name="client_id" id="client_id" >
                                        <option value="">Select</option>
                                        <optgroup label="Clients">
                                            @foreach($clients as $client)
                                                <option value="{{$client->id}}">{{$client->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="project_manager_id">{{__('Project Manager')}}</label>
                                    <select class="form-control" name="project_manager_id" id="project_manager_id" >
                                        <option value="">Select</option>
                                        <optgroup label="Project Manager">
                                            @foreach($project_managers as $project_manager)
                                                <option value="{{$project_manager->id}}">{{$project_manager->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="contact_email">{{__('Contact Email')}}</label>
                                    <input type="email" class="form-control" name="contact_email" id="contact_email"
                                           placeholder="{{__('Email')}}">
                                </div>

                                <div class="form-group">
                                    <label for="contact_mobile">{{__('Contact Phone')}}</label>
                                    <input type="tel" class="form-control" name="contact_mobile" id="contact_mobile"
                                           placeholder="{{__('Phone Number')}}">
                                </div>

                                <div class="form-group">
                                    <label for="details">{{__('Requirement Details')}}</label>
                                    <textarea class="form-control" name="details" id="details"
                                              cols="15" rows="5"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="notes">{{__('Notes')}}</label>
                                    <textarea class="form-control" name="notes" id="notes"
                                              cols="15" rows="5"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="budget">{{__('Budget')}}</label>
                                    <input type="text" class="form-control" name="budget" id="budget"
                                           placeholder="{{__('Budget')}}">
                                </div>

                                <div class="form-group">
                                    <label for="priority">{{__('Priority')}}</label>
                                    <select class="form-control" name="priority" id="priority" >
                                        <option value="">Select</option>
                                        <option value="High">High</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="attachments">{{__('Attachments')}}</label>
                                    <input type="file" class="form-control" name="attachments[]" id="attachments" multiple>
                                </div>

                                <div class="form-group">
                                    <label for="deliveries">{{__('Deliveries')}}</label>
                                    <input type="file" class="form-control" name="deliveries[]" id="deliveries" multiple>
                                </div>

                                <div class="form-group">
                                    <label for="contract">{{__('Contract')}}</label>
                                    <input type="file" class="form-control" name="contract[]" id="contract" multiple>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3 submit_btn">{{__('Submit ')}}</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-media.markup/>
@endsection

@section('script')
    <script>
        <x-icon-picker/>
    </script>
    <x-media.js/>

    <script>
        (function ($) {
            "use strict";

            $(document).ready(function () {
                //Permalink Code
                $('.permalink_label').hide();
                $(document).on('keyup', '#requirement_name', function (e) {
                    var slug = converToSlug($(this).val());
                    var url = "{{url('/service-list/requirement/')}}/" + slug;
                    $('.permalink_label').show();
                    var data = $('#slug_show').text(url).css('color', 'blue');
                    $('.requirement_slug').val(slug);

                });

                function converToSlug(slug) {
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
                    $('.requirement_slug').show();
                    $(this).hide();
                    $('.slug_update_button').show();
                });

                //Slug Update Code
                $(document).on('click', '.slug_update_button', function (e) {
                    e.preventDefault();
                    $(this).hide();
                    $('.slug_edit_button').show();
                    var update_input = $('.requirement_slug').val();
                    var slug = converToSlug(update_input);
                    var url = `{{url('/service-list/requirement/')}}/` + slug;
                    $('#slug_show').text(url);
                    $('.requirement_slug').val(slug)
                    $('.requirement_slug').hide();
                });

            });
        })(jQuery)
    </script>
@endsection  

