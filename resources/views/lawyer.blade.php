@extends('layouts.app-view')

@foreach($getLawyer->localizations as $lawyer)
    @if($lawyer->lang == app()->getLocale())

@section('title',$lawyer->seo_title)
@section('description', $lawyer->seo_description)
@section('keywords', $lawyer->seo_keyword)
@endif
@endforeach

@section('content')



    <!-- Banner -->
{{--    @include('include.banner')--}}
    <!-- Banner End -->


    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    @foreach($getLawyer->localizations as $lawyer)
                        @if($lawyer->lang == app()->getLocale())
                            <h3 class="column-title" style="text-align: center;">{{$lawyer->title}}</h3>

                            <p>{!! html_entity_decode($lawyer->text ) !!}</p>
                        @endif
                    @endforeach


                </div><!-- Col end -->

                <div class="col-lg-6 mt-5 mt-lg-0">

                    <div id="page-slider" class="page-slider small-bg">

                        @foreach($getLawyer->getMedia('lawyer')->unique('id') as $image)
                            <div class="item" style="background-image:url({{ $image->getUrl('web') }})">
                                <div class="container">
                                    <div class="box-slider-content">

                                    </div>
                                </div>
                            </div><!-- Item 1 end -->
                        @endforeach

                    </div><!-- Page slider end-->


                </div><!-- Col end -->
            </div><!-- Content row end -->

        </div><!-- Container end -->
    </section><!-- Main container end -->

@endsection
