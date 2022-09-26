<?php


namespace App\PageBuilder\Addons\Header;

use App\PageBuilder\Fields\IconPicker;
use App\PageBuilder\Fields\Image;
use App\PageBuilder\Fields\Slider;
use App\PageBuilder\Fields\Text;
use App\PageBuilder\Traits\LanguageFallbackForPageBuilder;
use App\Category;
use App\ServiceCity;

class HeaderStyleTwo extends \App\PageBuilder\PageBuilderBase
{
    use LanguageFallbackForPageBuilder;

    public function preview_image()
    {
        return 'home_two/header_2.png';
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


        $output .= Image::get([
            'name' => 'image',
            'label' => __('Image'),
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
        $service_type = $this->setting_item('service_type');
        $service_icon = $this->setting_item('service_icon');
        $image = render_image_markup_by_attachment_id($settings['image'],'','large');
        $find_service = __('Find Service');
        $route = route('service.list.category');
        $popular = __('Popular:');
        $select_location = __('Select Location');
        $search_route = route('frontend.home.search.two');

        $service_cities = ServiceCity::where('status',1)->get();
        $categories = Category::whereHas('services')->select('id','name','slug')->take(5)->inRandomOrder()->get();
        $service_city_markup = '';
        $service_markup = '';
        $category_markup = '';

        foreach ($service_cities as $city){
            $city_name = $city->service_city;
            $service_city_markup.= <<<SERVICECITY
            <option value="{$city_name}">{$city_name}</option>
SERVICECITY;
        }

        foreach ($categories as $cat){
            $category_name = $cat->name;
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
    <div class="banner-area home-two-banner section-bg-2">
        <div class="container container-two">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-5">
                    <div class="banner-contents style-02">
                        <h1 class="banner-title">{$title_start} <span class="span-shape"> {$title_end} </span> </h1>
                        <span class="title-top">{$subtitle}</span>
                        <div class="banner-bottom-content">
                            <form action="{$search_route}" class="banner-search-form" method="get">
                                <div class="banner-address-select">
                                    <select name="service_city">
                                        <option value="">{$select_location}</option>
                                        {$service_city_markup}
                                    </select>
                                </div>
                                <div class="banner-address-select">
                                    <select name="service_category">
                                        <option value="">{$find_service}</option>
                                        $service_markup
                                    </select>
                                </div>
                                <div class="banner-button">
                                    <button type="submit" class="banner-submit"> Search </button>
                                </div>
                            </form>
                            <div class="banner-keywords">
                                <span class="keyword-title"> {$popular} </span>
                                <ul class="keyword-tag">
                                    {$category_markup}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="banner-right-contents">
                        <div class="banner-right-thumb wow slideInUp" data-wow-delay=".2s">
                           {$image}
                        </div>
                        <div class="banner-cleaning-service">
                            <div class="icon">
                                <i class="{$service_icon}"></i>
                            </div>
                            <div class="icon-contents">
                                <span class="thumb-cleaning-title"> {$service_type} </span>
                                <ul class="review-cleaning">
                                    <li> <i class="las la-star"></i> </li>
                                    <li> <i class="las la-star"></i> </li>
                                    <li> <i class="las la-star"></i> </li>
                                    <li> <i class="las la-star"></i> </li>
                                    <li> <i class="las la-star"></i> </li>
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
        return __('Header: 02');
    }
}