<?php

namespace App\PageBuilder\Addons\Service;

use App\Category;
use App\Subcategory;
use App\PageBuilder\PageBuilderBase;
use App\PageBuilder\Fields\Number;
use App\PageBuilder\Fields\Select;
use App\PageBuilder\Fields\Slider;
use App\PageBuilder\Fields\Text;
use App\Service;
use Request;
use Str;
use URL;

class ServiceListOne extends PageBuilderBase
{

    public function preview_image()
    {
        return 'service/service_list.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();

        $output .= Select::get([
            'name' => 'order_by',
            'label' => __('Order By'),
            'options' => [
                'id' => __('ID'),
                'created_at' => __('Date'),
            ],
            'value' => $widget_saved_values['order_by'] ?? null,
            'info' => __('set order by')
        ]);
        $output .= Select::get([
            'name' => 'order',
            'label' => __('Order'),
            'options' => [
                'asc' => __('Accessing'),
                'desc' => __('Decreasing'),
            ],
            'value' => $widget_saved_values['order'] ?? null,
            'info' => __('set order')
        ]);
        $output .= Number::get([
            'name' => 'items',
            'label' => __('Items'),
            'value' => $widget_saved_values['items'] ?? null,
            'info' => __('enter how many item you want to show in frontend'),
        ]);


        $output .= Select::get([
            'name' => 'columns',
            'label' => __('Column'),
            'options' => [
                'col-lg-3' => __('04 Column'),
                'col-lg-4' => __('03 Column'),
                'col-lg-6' => __('02 Column'),
                'col-lg-12' => __('01 Column'),
            ],
            'value' => $widget_saved_values['columns'] ?? null,
            'info' => __('set column')
        ]);

        $output .= Slider::get([
            'name' => 'padding_top',
            'label' => __('Padding Top'),
            'value' => $widget_saved_values['padding_top'] ?? 110,
            'max' => 200,
        ]);
        $output .= Slider::get([
            'name' => 'padding_bottom',
            'label' => __('Padding Bottom'),
            'value' => $widget_saved_values['padding_bottom'] ?? 110,
            'max' => 200,
        ]);
        $output .= Text::get([
            'name' => 'category',
            'label' => __('Category Title Text'),
            'value' => $widget_saved_values['category'] ?? null,
        ]);
        $output .= Text::get([
            'name' => 'subcategory',
            'label' => __('Subcategory Title Text'),
            'value' => $widget_saved_values['subcategory'] ?? null,
        ]);
        $output .= Text::get([
            'name' => 'book_now',
            'label' => __('Book Now Text'),
            'value' => $widget_saved_values['book_now'] ?? null,
        ]);
        $output .= Text::get([
            'name' => 'read_more',
            'label' => __('View Details Text'),
            'value' => $widget_saved_values['read_more'] ?? null,
        ]);

        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;

    }

    public function frontend_render()
    {

        $settings = $this->get_settings();
        $order_by =$settings['order_by'] ?? '';
        $IDorDate =$settings['order'] ?? '';
        $items =$settings['items'] ?? '';
        $columns =$settings['columns'] ?? '';
        $padding_top = $settings['padding_top'] ?? '';
        $padding_bottom = $settings['padding_bottom'] ??  '';
        $category_text = $settings['category'] ??  'Select Category';
        $subcategory_text = $settings['subcategory'] ??  'Select Subcategory';
        $book_now_text = $settings['book_now'] ??  'Book Now';
        $read_more_text = $settings['read_more'] ??  'View Details';
        
        $service_quyery = Service::query();
        $service_quyery->with('reviews');
        if(!empty(request()->get('cat'))){
            $service_quyery->where('category_id',request()->get('cat'));
        }
        if(!empty(request()->get('subcat'))){
            $service_quyery->where('subcategory_id',request()->get('subcat'));
        }
        if(!empty(request()->get('rating'))){
            $rating = (int) request()->get('rating');
            $service_quyery->whereHas('reviews', function ($q) use ($rating) {
                $q->groupBy('reviews.id')
                ->havingRaw('AVG(reviews.rating) >= ?', [$rating])
                ->havingRaw('AVG(reviews.rating) < ?', [$rating + 1]);
            });
        }
        
        $rating_stars = [
            '1' => __('One Star'),
            '2' => __('Two Star'),
            '3' => __('Three Star'),
            '4' => __('Four Star'),
            '5' => __('Five Star'),
        ];
        $search_by_rating_markup = '<option value=""> '.__('Select Star').'</option>';   
        foreach($rating_stars as $value => $text){
            $ratings_selection = !empty(request()->get('rating')) && request()->get('rating') == $value ? 'selected' : '';
            $search_by_rating_markup .= '<option value="'.$value.'" '.$ratings_selection.' > '.$text.'</option>';   
        }

        if(!empty(request()->get('sortby'))){

            if (request()->get('sortby') == 'latest_service') {
                $service_quyery->orderBy('id', 'Desc');
            }
            if (request()->get('sortby') == 'lowest_price') {
                $service_quyery->orderBy('price', 'Asc');
            }
            if (request()->get('sortby') == 'highest_price') {
                $service_quyery->orderBy('price', 'Desc');
            }

        }

        $sortby_search = [
            'latest_service' => __('Latest Service'),
            'lowest_price' => __('Lowest Price'),
            'highest_price' => __('Highest Price'),
        ];
        $search_by_sort_markup = '<option value=""> '.__('Sort By').'</option>';   
        foreach($sortby_search as $value => $text){
            $sortby_selection = !empty(request()->get('sortby')) && request()->get('sortby') == $value ? 'selected' : '';
            $search_by_sort_markup .= '<option value="'.$value.'" '.$sortby_selection.' > '.$text.'</option>';   
        }

        $all_services = $service_quyery->where('status', 1)
            ->where('is_service_on', 1)
            ->OrderBy($order_by,$IDorDate)
            ->paginate($items);

        $categories = Category::select('id', 'name')->where('status', 1)->get();
        $sub_categories = Subcategory::select('id', 'name')->where('status', 1)->get();

        $service_markup ='';
        $category_markup ='';
        $sub_category_markup ='';
        $pagination = $all_services->links();
        $total_service = $all_services->total();
        //static text helpers
        $static_text = static_text();
        $no_service_found = __('No Service Found');
     
if($all_services->total() > 0){   
         
foreach ($all_services as $service)
{
    $image =  render_background_image_markup_by_attachment_id($service->image,'','','thumb');
    $title =  $service->title;
    $slug =  $service->slug;  
    $route = route('service.list.details',$slug);   
    $book_now = route('service.list.book',$slug);
    $description =  Str::limit(strip_tags($service->description),100);
    $price =  amount_with_currency_symbol($service->price);
    $seller_image =  render_image_markup_by_attachment_id(optional($service->seller)->image,'','','thumb');
    $seller_name =  optional($service->seller)->name;
    if($service->featured == 1){
        $featured = '<div class="award-icons"><i class="las la-award"></i></div>';
    }else{
        $featured ='';
    }
    if($service->is_service_online==1){
        $service_city =  'Service';
        $service_country =  'Online';
    }else{
        $service_city =  optional($service->serviceCity)->service_city;
        $service_country =  optional(optional($service->serviceCity)->countryy)->country;
    }


    //calculate each service rating and count review
    $total_review = $service->reviews;
    $total_count = $total_review ->count();
    $rating = round($total_review->avg('rating'),1);
    $seller_profile = route('about.seller.profile',optional($service->seller)->username);
    
    $rating_and_review='';
    if($rating >= 1){
        $rating_and_review .='<a href="javascript:void(0)">
            <span class="reviews">'.ratting_star($rating). '('.$total_count.')'. '</span>
        </a>';
    }

        $service_markup.= <<<SERVICES
        <div class="{$columns} col-md-6 margin-top-30">
        <div class="single-service no-margin wow fadeInUp" data-wow-delay=".2s">
    
                <a href="{$route}" class="service-thumb service-bg-thumb-format" {$image}>
                
                {$featured}
                <div class="country_city_location">
                    <span class="single_location"> <i class="las la-map-marker-alt"></i> {$service_country}, {$service_city} </span>
                </div>
            </a>
    
            <div class="services-contents">
                <ul class="author-tag">
                    <li class="tag-list">
                        <a href="{$seller_profile}">
                            <div class="authors">
                                <div class="thumb">
                                    {$seller_image}
                                    <span class="notification-dot"></span>
                                </div>
                                <span class="author-title"> {$seller_name} </span>
                            </div>
                        </a>
                    </li>
                    <li class="tag-list">
                        {$rating_and_review}
                    </li>
                </ul>
    
                <h5 class="common-title"> <a href="{$route}"> {$title} </a> </h5>
    
    
                <p class="common-para">{$description}</p>
    
                <div class="service-price">
                    <span class="starting"> Starting at </span>
                    
                    <span class="prices">{$price}</span>
    
                </div>
                <div class="btn-wrapper d-flex flex-wrap">
                    <a href="{$book_now}" class="cmn-btn btn-small btn-bg-1"> {$book_now_text} </a>
                    <a href="{$route}" class="cmn-btn btn-small btn-outline-1 ml-auto"> {$read_more_text} </a>
                </div>
            </div>
        </div>
    </div>
SERVICES;   
    }
}else{
        $service_markup.= <<<SERVICES
        <div class="col-lg-12 margin-top-30">
           <h5 class="common-title text-center text-danger"> {$no_service_found}</h5>
        </div>
SERVICES;   
}
    

foreach ($categories as $cat)
{

$category = $cat->name;    
$category_id = $cat->id; 
$selected = !empty(request()->get('cat')) && request()->get('cat') ==  $cat->id ? 'selected' : '';
$category_markup.= <<<CATEGORIES
    <option {$selected} value="{$category_id}">{$category}</option>
CATEGORIES;      

}


foreach ($sub_categories as $sub_cat)
{

$sub_category = $sub_cat->name;    
$sub_category_id = $sub_cat->id; 
$selected = !empty(request()->get('subcat')) && request()->get('subcat') ==  $sub_cat->id ? 'selected' : '';
$sub_category_markup.= <<<SUBCATEGORIES
    <option {$selected}  value="{$sub_category_id}">{$sub_category}</option>
SUBCATEGORIES;      

}
$current_page_url = URL::current();
    return <<<HTML
    <!-- Category Service area starts -->
    <section class="category-services-area" data-padding-top="{$padding_top}" data-padding-bottom="{$padding_bottom}">
        <div class="container">
        <form method="get" action="{$current_page_url}" id="search_service_list_form">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-category-service">
                        <div class="single-select">
                            <select id="search_by_category" name="cat">
                              <option value="">{$category_text}</option>
                              $category_markup
                            </select>
                        </div>
                    </div>
                </div>
        
                <div class="col-lg-3 col-sm-6">
                    <div class="single-category-service">
                        <div class="single-select">
                            <select id="search_by_subcategory" name="subcat">
                              <option value=""> {$subcategory_text}</option>
                               $sub_category_markup
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-category-service">
                        <div class="single-select">
                        <select id="search_by_rating" name="rating">
                                {$search_by_rating_markup}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-category-service flex-category-service">
                        <div class="single-select">
                            <select id="search_by_sorting" name="sortby">
                                {$search_by_sort_markup}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            

            </form>

            <div class="row margin-top-20" id="all_search_result">

                {$service_markup}

                <div class="col-lg-12">
                    <div class="blog-pagination margin-top-55">
                        <div class="custom-pagination mt-4 mt-lg-5">
                            {$pagination}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
HTML;

    }

    public function addon_title()
    {
        return __('Service List: 1');
    }
}