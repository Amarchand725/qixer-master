<?php


namespace App\PageBuilder\Addons\Header;

use App\PageBuilder\Fields\IconPicker;
use App\PageBuilder\Fields\Image;
use App\PageBuilder\Fields\Slider;
use App\PageBuilder\Fields\Text;
use App\PageBuilder\Traits\LanguageFallbackForPageBuilder;
use App\Category;
use App\ServiceCity;
use App\User;

class HeaderStyleThree extends \App\PageBuilder\PageBuilderBase
{
    use LanguageFallbackForPageBuilder;

    public function preview_image()
    {
        return 'home_three/header_3.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();


        $output .= Text::get([
            'name' => 'title',
            'label' => __('Title'),
            'value' => $widget_saved_values['title'] ?? null,
        ]);
        $output .= Text::get([
            'name' => 'subtitle',
            'label' => __('Subtitle'),
            'value' => $widget_saved_values['subtitle'] ?? null,
        ]);
        $output .= Text::get([
            'name' => 'service_type',
            'label' => __('Service Type'),
            'value' => $widget_saved_values['service_type'] ?? null,
        ]);
        $output .= IconPicker::get([
            'name' => 'service_icon',
            'label' => __('Service Icon'),
            'value' => $widget_saved_values['service_icon'] ?? null,
        ]);
        $output .= Text::get([
            'name' => 'service_link',
            'label' => __('Service Link'),
            'value' => $widget_saved_values['service_link'] ?? null,
        ]);
        $output .= Image::get([
            'name' => 'dot_image',
            'label' => __('Banner Dot Image'),
            'value' => $widget_saved_values['dot_image'] ?? null,
            'dimensions' => '163x163'
        ]);
        $output .= Image::get([
            'name' => 'banner_image',
            'label' => __('Banner Image'),
            'value' => $widget_saved_values['banner_image'] ?? null,
            'dimensions' => '46x46'
        ]);

        $output .= Image::get([
            'name' => 'image',
            'label' => __('Background Image'),
            'value' => $widget_saved_values['image'] ?? null,
            'dimensions' => '795x1139'
        ]);
        $output .= Slider::get([
            'name' => 'padding_top',
            'label' => __('Padding Top'),
            'value' => $widget_saved_values['padding_top'] ?? 260,
            'max' => 500,
        ]);
        $output .= Slider::get([
            'name' => 'padding_bottom',
            'label' => __('Padding Bottom'),
            'value' => $widget_saved_values['padding_bottom'] ?? 190,
            'max' => 500,
        ]);
        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render() : string
    {
        $settings = $this->get_settings();

        $title = $settings['title'];
        $subtitle = $settings['subtitle'];

        $explode = explode(" ",$title);
        $title_end = end($explode);
        $last_space_position = strrpos($title, ' ');
        $title_start = substr($title, 0, $last_space_position);

        $service_type = $settings['service_type'];
        $service_icon = $settings['service_icon'];
        $service_link = $settings['service_link'];
        $image = render_image_markup_by_attachment_id($settings['image']);
        $banner_dot_image = render_image_markup_by_attachment_id($settings['dot_image']);
        $banner_image = render_image_markup_by_attachment_id($settings['banner_image']);
        $happy_clients = __('Happy Clients');
        $happy_clients_count = User::where('user_type','1')->where('user_status','1')->count();
        $search_placeholder = __('What are you look for');
        $select_location = __('Select Location');
        $route = route('service.list.category');
        $search_route = route('frontend.home.search.single');
        $popular = __('Popular:');

        $service_cities = ServiceCity::where('status',1)->get();
        $categories = Category::whereHas('services')->select('id','name','slug')->take(5)->inRandomOrder()->get();
        $service_city_markup = '';
        $service_markup = '';
        $category_markup = '';

        foreach ($service_cities as $city){
            $city_id = $city->id;
            $city_name = $city->service_city;
            $service_city_markup.= <<<SERVICECITY
            <option value="{$city_id}">{$city_name}</option>
            SERVICECITY;
        }

        foreach ($categories as $cat){
            $category_name = $cat->name;
            $category_slug = $cat->slug;
            $service_markup.= <<<SERVICECATEGORY
            <option value="{$category_name}">{$category_name}</option>
SERVICECATEGORY;
        }
foreach ($categories as $cat){
    $category_name = $cat->name;
    $category_slug = $cat->slug;
    $category_markup.= <<<CATEGORY
    <li><a href="{$route}/{$category_slug}"> {$category_name} </a></li>
CATEGORY;
        
}


return <<<HTML
<!-- Banner area Starts -->
<div class="banner-area home-three-banner gradient-bg-1">
        <div class="container container-two">
            <div class="row align-items-center">
                <div class="col-xl-5">
                    <div class="banner-right-contents style-02">
                        <div class="banner-right-thumb wow slideInLeft" data-wow-delay=".3s">
                            {$image}       
                            <div class="banner-dot-shape">
                                {$banner_dot_image}
                            </div>
                        </div>
                        <div class="banner-cleaning-service">
                            <div class="icon">
                                <i class="{$service_icon}"></i>
                            </div>
                            <div class="icon-contents">
                                <span class="thumb-cleaning-title"> <a href="{$service_link}"> {$service_type} </a> </span>
                                <ul class="review-cleaning">
                                    <li> <i class="las la-star"></i> </li>
                                    <li> <i class="las la-star"></i> </li>
                                    <li> <i class="las la-star"></i> </li>
                                    <li> <i class="las la-star"></i> </li>
                                    <li> <i class="las la-star"></i> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="banner-client">
                            <div class="smile-contents-all">
                                <div class="thumb-smile">
                                {$banner_image}
                                </div>
                                <div class="smile-content">
                                    <span class="smile-title">{$happy_clients_count}</span>
                                    <span class="smile-para">{$happy_clients} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="banner-contents style-03">
                        <h1 class="banner-title">{$title_start} <span class="color-three"> {$title_end} </span> </h1>
                        <span class="title-top">{$subtitle}</span>
                        <div class="banner-bottom-content">
                            <form action="{$search_route}" class="banner-search-form">
                                <div class="banner-address-select">
                                    <select name="service_city_id" id="service_city_id">
                                        <option value="">{$select_location}</option>
                                        {$service_city_markup}
                                    </select>
                                </div>
                                <div class="single-input">
                                    <input class="form--control" name="home_search" id="home_search" type="text" placeholder="{$search_placeholder}" autocomplete="off">
                                    <div class="icon-search">
                                        <i class="las la-search"></i>
                                    </div>
                                    <button type="submit"> <i class="las la-search"></i> </button>
                                </div>
                            </form>

                            <span id="all_search_result"></span>

                            <div class="banner-keywords">
                                <span class="keyword-title"> {$popular} </span>
                                <ul class="keyword-tag">
                                   {$category_markup}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner area end -->
    
HTML;
}

    public function addon_title()
    {
        return __('Header: 03');
    }
}