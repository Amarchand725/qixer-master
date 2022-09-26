<?php


namespace App\PageBuilder\Addons\Header;

use App\PageBuilder\Fields\Image;
use App\PageBuilder\Fields\Slider;
use App\PageBuilder\Fields\Text;
use App\PageBuilder\Traits\LanguageFallbackForPageBuilder;
use App\Category;
use App\ServiceCity;

class HeaderStyleOne extends \App\PageBuilder\PageBuilderBase
{
    use LanguageFallbackForPageBuilder;

    public function preview_image()
    {
        return 'home-page/header_1.png';
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
            $output .= Image::get([
                'name' => 'background_image',
                'label' => __('Background Image'),
                'value' => $widget_saved_values['background_image'] ?? null,
                'dimensions' => '1920x1080'
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

        $background_image = render_background_image_markup_by_attachment_id($this->setting_item('background_image'));
        $title = $settings['title'];
        $subtitle = $settings['subtitle'];

        $explode = explode(" ",$title);
        $title_end = end($explode);
        $last_space_position = strrpos($title, ' ');
        $title_start = substr($title, 0, $last_space_position);
        $search_placeholder = __('What are you look for');
        $route = route('service.list.category');
        $search_route = route('frontend.home.search.single');
        $popular = __('Popular:');
        $select_location = __('Select Location');
        
        $service_cities = ServiceCity::where('status',1)->get();
        $categories = Category::whereHas('services')->select('id','name','slug')->take(5)->inRandomOrder()->get();

        $category_markup = '';
        $service_city_markup = '';
        foreach ($service_cities as $city){
            $city_name = $city->service_city;
            $city_id = $city->id;
            $service_city_markup.= <<<SERVICECITY
            <option value="{$city_id}">{$city_name}</option>
SERVICECITY;
        }
        foreach ($categories as $cat){
            $category_name = $cat->name;
            $category_slug = $cat->slug;
            $category_markup.= <<<CATEGORY
            <li><a href="{$route}/{$category_slug}"> {$category_name} </a></li>
CATEGORY;
        
}


return <<<HTML
<div class="banner-area home-one-banner bg-image"{$background_image}>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="banner-contents">
                   <span class="title-top"> {$subtitle} </span>
                   <h1 class="banner-title"> {$title_start} <span class="title-span"> {$title_end} </span></h1>
                    <div class="banner-bottom-content">
                        <form action="{$search_route}" class="banner-search-form" method="get">
                            <div class="banner-address-select">
                                <select style="display: none;" name="service_city_id" id="service_city_id">
                                    <option value="">{$select_location}</option>
                                    {$service_city_markup}
                                </select>
                            </div>
                            <div class="single-input">
                                <input class="form--control" type="text" name="home_search" id="home_search" placeholder="{$search_placeholder}" autocomplete="off">
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
    
HTML;
}

    public function addon_title()
    {
        return __('Header: 01');
    }
}