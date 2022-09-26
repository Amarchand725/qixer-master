@extends('frontend_new.layouts.master')
@section('styles')
    <style>
        .card {
            border: 10px solid;
            border-image-slice: 1;
            border-width: 5px;
            border-image-source: linear-gradient(to top, #743ad5, #d53a9d);
        }

        .img_style{
            height: 40px;
        }
    </style>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5" style="text-align: center; color: white">
            <h4>Lets us discuss your requirement in detail.</h4>
            <h5>Select your preferred time to talk with a dedicated project manager.</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mt-5">
            <div class="col-md-12 mt-5 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row" style="text-align: center">
                            <div class="col-md-12">
                                {!! render_image_markup_by_attachment_id($sub_category->category->image,'img_style','thumb') !!}
                            </div>
                            <div class="col-md-12 mt-2">
                                <h4>{{$sub_category->category->name}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row" style="text-align: center">
                            <div class="col-md-12">
                                {!! render_image_markup_by_attachment_id($sub_category->image,'img_style','thumb') !!}
                            </div>
                            <div class="col-md-12 mt-2">
                                <h4>{{$sub_category->name}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 mt-3">
            <!-- Calendly inline widget begin -->
            <div class="calendly-inline-widget" data-url="https://calendly.com/dhruv2050/1-on-1-with-dhruv" style="min-width:320px;height:630px;"></div>
            <!-- Calendly inline widget end -->
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
@endsection