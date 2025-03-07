@extends('layouts.app-view')


@foreach($subMenu->localizations as $m)
    @if($m->lang == app()->getLocale())
        @section('title', $m->seo_title)
@section('description', $m->seo_description)
@section('keywords', $m->seo_keyword)
@endif
@endforeach


@section('content')

    <!-- Destination Start -->
    @include('include.banner')
    <!-- Destination Start -->

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row shuffle-wrapper">
                        <div class="col-1 shuffle-sizer"></div>

                        @foreach($products as $product)
                            @php
                                $productTranslation = $product->localizations->where('lang', app()->getLocale())->first();
                            @endphp
                            <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;government&quot;,&quot;healthcare&quot;]">
                                <div class="project-img-container">
                                    <a class="gallery-popup" href="#">
                                        <img class="img-fluid" src="{{$product->getFirstMediaUrl('product','web') }}" alt="project-image">

                                    </a>
                                    <div class="project-item-info">
                                        <div class="project-item-info-content">
                                            <h3 class="project-item-title">
                                                <a href="{{ route('product', ['locale' => app()->getLocale(), 'id' => $product->id, 'slug' =>  str_replace(["\r\n", "\r", "\n"," "], '_', mb_strtolower($productTranslation->slug, 'UTF-8')) ]) }}">{{$productTranslation->title}}</a>
                                            </h3>

                                        </div>
                                    </div>
                                </div>
                            </div><!-- shuffle item 1 end -->



                        @endforeach

                    </div><!-- shuffle end -->
                </div>

            </div><!-- Content row end -->

        </div><!-- Conatiner end -->
    </section><!-- Main container end -->
@endsection




