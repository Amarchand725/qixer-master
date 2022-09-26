@extends('backend.admin-master')
@section('site-title')
    {{__('All Requirements')}}
@endsection

@section('style')
<x-datatable.css/>
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
                                <h4 class="header-title">{{__('All Requirements')}}  </h4>
                                @can('requirement-delete')
                                  <x-bulk-action/>
                                @endcan
                            </div>
                            @can('requirement-create')
                            <div class="right-content">
                                <a href="{{ route('admin.requirement.new')}}" class="btn btn-primary">{{__('Add New Requirement')}}</a>
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
                                <th>{{__('Create Date')}}</th>
                                <th>{{__('Requirement Name')}}</th>
                                <th>{{__('Client')}}</th>
                                <th>{{__('Project Manager')}}</th>
                                <th>{{__('Budget')}}</th>
                                <th>{{__('Priority')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                    @foreach($requirements as $data)
                                        <tr>
                                            <td>
                                                <x-bulk-delete-checkbox :id="$data->id"/>
                                            </td>
                                            <td>{{$data->id}}</td>
                                            <td>{{date('d-m-Y', strtotime($data->created_at))}}</td>
                                            <td>{{$data->requirement_name}}</td>
                                            <td>{{$data->client->name}}</td>
                                            <td>{{$data->project_manager->name}}</td>
                                            <td>{{$data->budget}}</td>
                                            <td>{{$data->priority}}</td>
                                            <td>
                                                @can('requirement-delete')
                                                  <x-delete-popover :url="route('admin.requirement.delete',$data->id)"/>
                                                @endcan
                                                @can('requirement-edit')
                                                  <x-edit-icon :url="route('admin.requirement.edit',$data->id)"/>
                                                @endcan
                                                <br>
                                                @if($data->status==0)
                                                    <button type="button" value="single-project" data-requirement-id="{{ $data->id }}" class="btn btn-success btn-sm convert-to-project-btn"><i class="fa fa-exchange"></i> Convert to single project</button>
                                                    <br /><br />
                                                    <button type="button" value="milestone-project" data-requirement-id="{{ $data->id }}" class="btn btn-primary btn-sm convert-to-project-btn"><i class="fa fa-exchange"></i> Convert to milestone project</button>
                                                @endif
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
  
    <!-- Project Modal -->
    <div class="modal fade" id="project-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="modal-content"></div>
        </div>
    </div>
@endsection

@section('script')
 <x-datatable.js/>
    <script type="text/javascript">
        $(document).on('click', '.convert-to-project-btn', function(){
            $('#modal-content').html('');
            var requirement_id = $(this).attr('data-requirement-id');
            var convert_type = $(this).val();

            $.ajax({
                url : "{{ route('admin.project.ajax-new') }}",
                data : {'requirement_id' : requirement_id, 'convert_type' : convert_type},
                type : 'GET',
                success : function(response){
                    $('#modal-content').html(response);
                    $('#project-modal').modal('show');
                }
            });
        });

        $(document).on('change', '#number_of_milestone', function(){
            $('#milestones').html('');
            var number_of_milestone = $(this).val();
            
            $.ajax({
                url : "{{ route('admin.project.ajax-new') }}",
                data : {'number_of_milestone' : number_of_milestone},
                type : 'GET',
                success : function(response){
                    $('#milestones').html(response);
                }
            });
        });

        var cost = document.querySelector('#total_cost');

        cost.addEventListener('input', restrictNumber);
        function restrictNumber (e) {  
            var newValue = this.value.replace(new RegExp(/[^\d]/,'ig'), "");
            this.value = newValue;
        }

        var service_provider_seller_cost = document.querySelector('#service_provider_seller_cost');

        service_provider_seller_cost.addEventListener('input', restrictNumber);
        function restrictNumber (e) {  
            var newValue = this.value.replace(new RegExp(/[^\d]/,'ig'), "");
            this.value = newValue;
        }

        (function(){
            "use strict";
            $(document).ready(function(){
                <x-bulk-action-js :url="route('admin.requirement.bulk.action')"/>

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
              });
        })(jQuery);
    </script>
@endsection
