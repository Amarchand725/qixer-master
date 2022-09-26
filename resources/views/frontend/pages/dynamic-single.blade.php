@extends('frontend.frontend-page-master')
@section('page-meta-data')
    <meta name="description" content="{{$page_post->meta_description}}">
    <meta name="tags" content="{{$page_post->meta_tags}}">
    <meta name="og:title" content="{{$page_post->og_meta_title}}"/>
    <meta name="og:description" content="{{$page_post->og_meta_description}}"/>
    {!! render_og_meta_image_by_attachment_id($page_post->og_meta_image) !!}
    {!! render_site_title($page_post->meta_title ?? $page_post->title) !!}
@endsection
@section('page-title')
    {!! $page_post->title !!}
@endsection
@section('nav-style')
    {{$page_post->navbar_variant}}
@endsection

@section('content')

    @if($page_post->page_builder_status === 'on')

        @if(!auth()->guard('web')->check() && $page_post->visibility === 'all')
            @include('frontend.partials.pages-portion.dynamic-page-builder-part',['page_post' => $page_post])
        @elseif(auth()->guard('web')->check())
            @include('frontend.partials.pages-portion.dynamic-page-builder-part',['page_post' => $page_post])
        @else
           <section class="padding-top-100 padding-bottom-100">
               <div class="container">
                   <div class="row">
                       <div class="col-lg-12">
                           <div class="alert alert-warning">
                               <p><a class="text-primary" href="{{route('user.login')}}">{{__('Login')}}</a> {{__(' to see this page')}} </p>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
        @endif
    @else
        @include('frontend.partials.dynamic-content')
    @endif
@endsection
