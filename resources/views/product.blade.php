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
                <div class="col-lg-8">
                    <div id="page-slider" class="page-slider small-bg">
                        @foreach($product->getMedia('product')->unique('id') as $image)
                        <div class="item">
                            <img loading="lazy" class="img-fluid" src="{{ $image->getUrl('web') }}" alt="project-image" />
                        </div>
                        @endforeach
                    </div><!-- Page slider end -->
                </div><!-- Slider col end -->

                <div class="col-lg-4 mt-5 mt-lg-0">
                    @php
                        $productTranslation = $product->localizations->where('lang', app()->getLocale())->first();
                    @endphp
                    <h3 class="column-title mrt-0" style="text-align: center;">{{$productTranslation->title}}</h3>
                    <p>
                        {{$productTranslation->text}}
                    </p>



                </div><!-- Content col end -->

            </div><!-- Row end -->

        </div><!-- Conatiner end -->
    </section><!-- Main container end -->
@endsection




