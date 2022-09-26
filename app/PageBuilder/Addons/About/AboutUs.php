<?php


namespace App\PageBuilder\Addons\About;

use App\PageBuilder\Fields\Slider;
use App\PageBuilder\Fields\Text;
use App\PageBuilder\Traits\LanguageFallbackForPageBuilder;
use App\PageBuilder\Fields\Repeater;
use App\PageBuilder\Helpers\RepeaterField;
use App\PageBuilder\Fields\Image;

class AboutUs extends \App\PageBuilder\PageBuilderBase
{
    use LanguageFallbackForPageBuilder;

    public function preview_image()
    {
        return 'about/about_us.png';
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
            'name' => 'year',
            'label' => __('Year of Experience'),
            'value' => $widget_saved_values['year'] ?? null,
        ]);

        $output .= Image::get([
            'name' => 'image',
            'label' => __('Upload Image'),
            'value' => $widget_saved_values['image'] ?? null,
            'dimensions' => '501x403'
        ]);

        $output .= Image::get([
            'name' => 'shape_image',
            'label' => __('Upload Shape Image'),
            'value' => $widget_saved_values['shape_image'] ?? null,
            'dimensions' => '208x208'
        ]);

        
        $output .= Repeater::get([
            'settings' => $widget_saved_values,
            'id' => 'contact_page_contact_info_01',
            'fields' => [
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'benifits',
                    'label' => __('Benifits')
                ],

            ]
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
        $title =$settings['title'];
        $subtitle = $settings['subtitle'];
        $year = $settings['year'];

        $padding_top = $settings['padding_top'];
        $padding_bottom = $settings['padding_bottom'];
        $about_shape = render_image_markup_by_attachment_id($settings['shape_image']);
        $about_thumb = render_image_markup_by_attachment_id($settings['image']);
        $experience = __('Experience');

        $repeater_data = $settings['contact_page_contact_info_01'];
        $benifits_markup = '';

        foreach ($repeater_data['benifits_'] as $key => $benifits) {
            
            $benifits = $benifits;

            $benifits_markup.= <<<BENIFITS
            <li class="list"> {$benifits} </li>

BENIFITS;
    }

return <<<HTML

     <!-- About area Starts -->
     <section class="About-area" data-padding-top="{$padding_top}" data-padding-bottom="{$padding_bottom}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 margin-top-30">
                    <div class="about-thumb-content">
                        <div class="about-shape">
                            {$about_shape}
                        </div>
                        <div class="about-thumb">
                            {$about_thumb}
                            <div class="about-experience">
                                <h2 class="years-tiitle">{$year} </h2>
                                <h4 class="experience-tiitle"> {$experience} </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 margin-top-30">
                    <div class="single-about">
                        <h2 class="about-title">{$title}</h2>
                        <div class="about-contents">
                            <p class="about-para">{$subtitle}</p>

                            <div class="overview-single style-03">
                                <ul class="overview-benefits margin-top-30">
                                    {$benifits_markup}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About area ends -->
    
HTML;

}

    public function addon_title()
    {
        return __('About Us');
    }
}