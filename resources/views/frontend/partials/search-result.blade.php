
 <div class="card text-white bg-secondary mb-3 mt-2" style="border:none">
    <div class="card-body home_servie_serach_wrapper">
        @if($services->count() >0)
            @foreach($services as $service)
              <a href="{{ route('service.list.details',$service->slug) }}" class="search_servie_image_content text-left text-white">
                <div class="search_thumb bg-image" {!! render_background_image_markup_by_attachment_id($service->image,'','thumb') !!}></div>
                  <span class="search-text-item">
                    {{ $service->title }}
                    <br>
                    {{ float_amount_with_currency_symbol($service->price) }}
                  </span>
                </a>
            @endforeach
        @else 
           <p class="text-left text-warning">{{ __("Nothing Found") }}</p>
        @endif
    </div>
  </div>