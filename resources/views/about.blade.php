@extends('layouts.app-view')

@foreach($getAbout->localizations as $about)
    @if($about->lang == app()->getLocale())

        @section('title', $about->seo_title)
@section('description', $about->seo_description)
@section('keywords', $about->seo_keyword)
@endif
@endforeach

@section('content')

    <!-- Banner -->
    @include('include.banner')
    <!-- Banner End -->

    <!-- About -->
    @include('about.about')
    <!-- About End -->

    <!-- Team -->
    @include('about.team')
    <!-- Team End -->


@endsection
