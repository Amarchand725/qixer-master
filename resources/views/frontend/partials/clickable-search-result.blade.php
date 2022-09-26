@extends('frontend.frontend-page-master')

@section('site-title')
    {{ __('Home') }}
    @endsection

    @section('page-title')
    {{ __('Search') }}
    @endsection 

    @section('inner-title')
    {{ __('Services') }}
@endsection 

@section('content')
    <!-- Category Service area starts -->
    <section class="category-services-area padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="row margin-top-20">

                @if($services->count() >0)
                    @foreach($services as $service)
                        
                        <div class="col-lg-4 col-md-6 margin-top-30 all-services">
                            <div class="single-service no-margin wow fadeInUp" data-wow-delay=".2s">
                                <a href="{{ route('service.list.details',$service->slug) }}" class="service-thumb">
                                    {!! render_image_markup_by_attachment_id($service->image) !!}
                                    <div class="country_city_location">
                                        <span class="single_location"> <i class="las la-map-marker-alt"></i>
                                            {{ optional($service->serviceCity)->service_city }} ,
                                             {{ optional(optional($service->serviceCity)->countryy)->country }}
                                        </span>
                                    </div>
                                    @if($service->is_featured)
                                    <div class="award-icons">
                                        <i class="las la-award"></i>
                                    </div>
                                    @endif
                                </a>
                                <div class="services-contents">
                                    <ul class="author-tag">
                                        <li class="tag-list">
                                            <a href="{{ route('about.seller.profile',optional($service->seller)->username) }}">
                                                <div class="authors">
                                                    <div class="thumb">
                                                        {!! render_image_markup_by_attachment_id(optional($service->seller)->image) !!}
                                                        
                                                    </div>
                                                    <span class="author-title"> {{ optional($service->seller)->name }}</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="tag-list">
                                            <a href="javascript:void(0)">
                                                <span class="icon"> <i class="las la-star"></i> </span>
                                                <span class="reviews"> 
                                                    {{ round(optional($service->reviews)->avg('rating'),1) }}
                                                    ({{ optional($service->reviews)->count() }})
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <h5 class="common-title"> <a href="{{ route('service.list.details',$service->slug) }}"> {{ Str::limit($service->title) }} </a> </h5>
                                    <p class="common-para"> {{ Str::limit(strip_tags($service->description,100)) }} </p>
                                    <div class="service-price">
                                        <span class="starting"> {{ __('Starting at') }} </span>
                                        <span class="prices"> {{ amount_with_currency_symbol($service->price) }} </span>
                                    </div>
                                    <div class="btn-wrapper d-flex flex-wrap">
                                        <a href="{{ route('service.list.book',$service->slug) }}" class="cmn-btn btn-small btn-bg-1"> {{ __('Book Now') }} </a>
                                        <a href="{{ route('service.list.details',$service->slug) }}" class="cmn-btn btn-small btn-outline-1 ml-auto"> {{ __('View Details') }} </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="col-lg-12">
                        <div class="blog-pagination margin-top-55">
                            <div class="custom-pagination mt-4 mt-lg-5">
                                {!! $services->links() !!}
                            </div>
                        </div>
                    </div>

                @else 
                  <h2 class="text-warning">{{ __('Nothing Found...') }}</h2>
                @endif
            </div>
        </div>
    </section>
    <!-- Category Service area end -->

@endsection
