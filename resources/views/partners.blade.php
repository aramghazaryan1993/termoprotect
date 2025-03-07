@extends('layouts.app-view')

{{--@foreach($getAbout->localizations as $about)--}}
{{--    @if($about->lang == app()->getLocale())--}}

        @section('title','Partners')
@section('description', 'Partners Amiryanvet')
{{--@section('keywords', $about->seo_keyword)--}}
{{--@endif--}}
{{--@endforeach--}}

@section('content')

{{--    <section>--}}

{{--        <div class="container">--}}
{{--            <div class="partner_block">--}}
{{--                @if(count($partners) > 0)--}}
{{--                    @foreach($partners as $key => $partner)--}}
{{--                <a href="#" class="partner_content">--}}
{{--                    <div  >--}}
{{--                        <div class="partner_img">--}}
{{--                            <img src="{{ $partner->getFirstMediaUrl('partners', 'web') }}" alt="aid">--}}
{{--                        </div>--}}
{{--                        <div class="partner_text">--}}
{{--                            @foreach($partner->localizations as $data)--}}
{{--                                @if($data->lang == app()->getLocale())--}}
{{--                                    <p>{{$data->title}}</p>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </section>--}}

    <!-- Banner -->
    @include('include.banner')
    <!-- Banner End -->

<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-12">



                <div class="row shuffle-wrapper">
                    <div class="col-1 shuffle-sizer"></div>
                    @if(count($partners) > 0)
                        @foreach($partners as $key => $partner)
                                 <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;government&quot;,&quot;healthcare&quot;]">
                        <div class="project-img-container">
                            <a class="gallery-popup" href="#">
                                @php
                                    $media = $partner->getFirstMedia('partners'); // Ստանում ենք մեդիա օբյեկտը

                                    $path = $media->getPath(); // Ստանում ենք ֆայլի ամբողջ ճանապարհը

                                    $extension = pathinfo($path, PATHINFO_EXTENSION); // Ստանում ենք ընդարձակումը

                                    if ($extension === 'gif') {
                                       $imgUrl = $partner->getFirstMediaUrl('partners');
                                    } else {
                                        $imgUrl = $partner->getFirstMediaUrl('partners','mobile');
                                    }
                                @endphp
                                <img class="img-fluid" src="{{ $imgUrl}}" alt="project-image">

                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <h3 class="project-item-title">
                                        @foreach($partner->localizations as $data)
                                            @if($data->lang == app()->getLocale())
                                        <a href="#" style="text-align: center;">{{$data->title}}</a></a>
                                            @endif
                                        @endforeach
                                    </h3>

                                </div>
                            </div>
                        </div>
                    </div><!-- shuffle item 1 end -->
                        @endforeach
                    @endif
                </div><!-- shuffle end -->
            </div>

        </div><!-- Content row end -->

    </div><!-- Conatiner end -->
</section><!-- Main container end -->

@endsection
