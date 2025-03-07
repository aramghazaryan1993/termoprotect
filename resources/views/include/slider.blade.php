<div class="banner-carousel banner-carousel-1 mb-0">
     @foreach($sliders as $index => $slider)
          @php
              $localized = $slider->localizations->firstWhere('lang', app()->getLocale());

$media = $slider->getFirstMedia('slider'); // Ստանում ենք մեդիա օբյեկտը

$path = $media->getPath(); // Ստանում ենք ֆայլի ամբողջ ճանապարհը

$extension = pathinfo($path, PATHINFO_EXTENSION); // Ստանում ենք ընդարձակումը

if ($extension === 'gif') {
   $imgUrl = $slider->getFirstMediaUrl('slider');
} else {
    $imgUrl = $slider->getFirstMediaUrl('slider','web');
}
          @endphp


           @if($localized)
            <div class="banner-carousel-item" style="background-image:url({{ $imgUrl }})">
                <div class="slider-content">
                    <div class="container h-100">
                        <div class="row align-items-center h-100">
                            <div class="col-md-12 text-center">
                                <h2 class="slide-title" data-animation-in="slideInLeft">{{$localized->text_one}}</h2>
                                <h3 class="slide-sub-title" data-animation-in="slideInRight">{{$localized->text_two}}</h3>
                                <p data-animation-in="slideInLeft" data-duration-in="1.2">
                                    <a href="services.html" class="slider btn btn-primary">Our Services</a>
                                    <a href="contact.html" class="slider btn btn-primary border">Contact Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
           @endforeach
        </div>


