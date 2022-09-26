@extends('backend.admin-master')

@section('site-title')
    {{__('Edit Project')}}
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
                                <h4 class="header-title">{{__('Edit Project')}}   </h4>
                            </div>
                            <div class="right-content">
                                <a class="btn btn-info btn-sm"
                                   href="{{route('admin.project')}}">{{__('All Projects')}}</a>
                            </div>
                        </div>
                        <form action="{{route('admin.project.edit',$project->id)}}" method="post"
                              enctype="multipart/form-data" id="edit_project_form">
                            @csrf

                            <div class="tab-content margin-top-40">

                                <div class="form-group">
                                    <label for="name">{{__('Project Name')}}</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="{{$project->name}}" placeholder="{{__('Name')}}">
                                </div>

                                <div class="form-group permalink_label">
                                    <label class="text-dark">{{__('Permalink * : ')}}
                                        <span id="slug_show" class="display-inline"></span>
                                        <span id="slug_edit" class="display-inline">
                                             <button class="btn btn-warning btn-sm slug_edit_button"> <i
                                                         class="fas fa-edit"></i> </button>
                                            
                                            <input type="text" name="slug" class="form-control project_slug mt-2"
                                                   value="{{$project->slug}}" style="display: none">
                                            <button class="btn btn-info btn-sm slug_update_button mt-2"
                                                    style="display: none">{{__('Update')}}</button>
                                        </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="client_id">{{__('Client')}}</label>
                                    <select class="form-control" name="client_id" id="client_id">
                                        <option value="{{$project->client_id}}">{{$project->client->name}}</option>
                                        <optgroup label="Clients">
                                            @foreach($clients as $client)
                                                <option value="{{$client->id}}">{{$client->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="project_manager_id">{{__('Project Manager')}}</label>
                                    <select class="form-control" name="project_manager_id" id="project_manager_id">
                                        <option value="{{$project->project_manager_id}}">{{$project->project_manager->name}}</option>
                                        <optgroup label="Project Manager">
                                            @foreach($project_managers as $project_manager)
                                                <option value="{{$project_manager->id}}">{{$project_manager->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="timeline">{{__('Timeline')}}</label>
                                    <input type="text" class="form-control" name="timeline" id="timeline"
                                           value="{{$project->timeline}}" placeholder="{{__('Project Timeline')}}">
                                </div>

                                <div class="form-group">
                                    <label for="payment_details">{{__('Payment Details')}}</label>
                                    <input type="text" class="form-control" name="payment_details" id="payment_details"
                                           value="{{$project->payment_details}}"
                                           placeholder="{{__('Project Payment Details')}}">
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
        <
        x - icon - picker / >
    </script>
    <x-media.js/>

    <script>
        (function ($) {
            "use strict";

            $(document).ready(function () {
                //Permalink Code
                var sl = $('.project_slug').val();
                var url = `{{url('/service-list/project/')}}/` + sl;
                var data = $('#slug_show').text(url).css('color', 'blue');

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
                    $('.project_slug').show();
                    $(this).hide();
                    $('.slug_update_button').show();
                });

                //Slug Update Code
                $(document).on('click', '.slug_update_button', function (e) {
                    e.preventDefault();
                    $(this).hide();
                    $('.slug_edit_button').show();
                    var update_input = $('.project_slug').val();
                    var slug = converToSlug(update_input);
                    var url = `{{url('/service-list/project/')}}/` + slug;
                    $('#slug_show').text(url);
                    $('.project_slug').val(slug)
                    $('.project_slug').hide();
                });

            });
        })(jQuery)
    </script>
@endsection 


