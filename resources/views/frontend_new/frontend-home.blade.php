@extends('frontend_new.layouts.master')
@section('styles')
    <style>
        .card {
            border: 10px solid;
            border-image-slice: 1;
            border-width: 5px;
            border-image-source: linear-gradient(to top, #743ad5, #d53a9d);
        }

        .img_style {
            height: 40px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 mt-3" style="text-align: center; color: white">
            <h2>Select your desired Service</h2>
        </div>
        @foreach($categories as $category)
            <div class="col-md-3 mt-5">
                <div class="card">
                    <a href="{{ route('get_sub_categories', ['category' => $category->id]) }}">
                        <div class="card-body add">
                            <div class="row" style="text-align: center">
                                <div class="col-md-12">
                                    {!! render_image_markup_by_attachment_id($category->image,'img_style','thumb') !!}
                                </div>
                                <div class="col-md-12 mt-2">
                                    <h4>{{$category->name}}</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection