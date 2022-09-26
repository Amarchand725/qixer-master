@extends('frontend.frontend-page-master')

@section('page-title')
{{  optional(getPageDetailsFromSlug('blog_page'))->title }}
@endsection 
@section('site-title')
{{  optional(getPageDetailsFromSlug('blog_page'))->title }}
@endsection 

@section('content')
    <!-- Blog area starts -->
    <section class="blog-area padding-top-70 padding-bottom-100">
        <div class="container">
            <div class="row">
                @foreach($all_blogs as $blog)
                <div class="col-lg-4 col-md-6 margin-top-30">
                    <div class="single-blog no-margin wow fadeInUp" data-wow-delay=".2s">
                        <a href="{{ route('frontend.blog.single',$blog->slug) }}" class="blog-thumb service-bg-thumb-format" {!! render_background_image_markup_by_attachment_id($blog->image) !!}>

                        </a>
                        <div class="blog-contents">
                            <ul class="tags">
                                <li>
                                    <a href="javascript:void(0)"> <i class="las la-clock"></i> {{ optional($blog->created_at)->toFormattedDateString() }} </a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.blog.category',optional($blog->category)->slug) }}"> <i class="las la-tag"></i>{{ optional($blog->category)->name }} </a>
                                </li>
                            </ul>
                            <h5 class="common-title"> <a href="{{ route('frontend.blog.single',$blog->slug) }}">{{ $blog->title }} </a> </h5>
                            <p class="common-para">{!! Str::words(strip_tags($blog->blog_content),20)  !!} </p>
                        </div>
                    </div>
                </div>
                @endforeach
                @if($all_blogs->count() >= 6)
                    <div class="col-lg-12">
                        <div class="blog-pagination margin-top-55">
                            <div class="custom-pagination mt-4 mt-lg-5">
                            {!! $all_blogs->links() !!}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Blog area end -->
@endsection
