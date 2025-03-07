@extends('layouts.app-view')

@if(!is_null($homes) && !empty($homes) > 0)
@foreach($homes->localizations as $data)
    @if($data->lang == app()->getLocale())
        @section('title', $data->seo_title)
@section('description', $data->seo_description)
@section('keywords', $data->seo_keyword)
@endif
@endforeach
@endif

@section('content')

    <!-- Destination Start -->
    @include('include.slider')
    <!-- Destination Start -->

    <!-- Service -->
{{--    @if(count($services) > 0)--}}
    @include('home.sub-menu')
{{--    @endif--}}
    <!-- Service End -->

    <!-- Facts -->
    @include('home.facts')
    <!-- Facts End -->

    <!-- Service-area -->
    @include('home.service-area')
    <!-- Service-area End -->

    <!-- Map -->
    @include('home.map')
    <!-- Map> End -->

@endsection
