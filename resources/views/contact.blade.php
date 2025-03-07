@extends('layouts.app-view')

@foreach($contacts->localizations as $data)
    @if($data->lang == app()->getLocale())
        @section('title', $data->seo_title)
@section('description', $data->seo_description)
@section('keywords', $data->seo_keyword)
@endif
@endforeach

@section('content')


    <!-- Banner -->
    @include('include.banner')
    <!-- Banner End -->
    @php
        $data = $defaultData->localizations->firstWhere('lang', app()->getLocale());
    @endphp
<section id="main-container" class="main-container">
    <div class="container">

        <div class="row text-center">
            <div class="col-12">
                <h3 class="section-sub-title">{{__('find_our_location')}}</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
            <div class="col-md-4">
                <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fas fa-map-marker-alt mr-0"></i>
          </span>
                    <div class="ts-service-box-content">
                        <h4>{{__('visit_our_office')}}</h4>

                        <p>{{$data->address}}</p>
                    </div>
                </div>
            </div><!-- Col 1 end -->

            <div class="col-md-4">
                <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fa fa-envelope mr-0"></i>
          </span>
                    <div class="ts-service-box-content">
                        <h4>{{__('email')}}</h4>
                        <p>{{$defaultData->email}}</p>
                    </div>
                </div>
            </div><!-- Col 2 end -->

            <div class="col-md-4">
                <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fa fa-phone-square mr-0"></i>
          </span>
                    <div class="ts-service-box-content">
                        <h4>{{__('phone')}}</h4>
                        <p>{{$defaultData->phone_1}}</p>
                    </div>
                </div>
            </div><!-- Col 3 end -->

        </div><!-- 1st row end -->

        <div class="gap-60"></div>

{{--        <div class="google-map">--}}
{{--            <div id="map" class="map" data-latitude="40.712776" data-longitude="-74.005974" data-marker="images/marker.png" data-marker-name="Constra"></div>--}}
            <div class="iframe">
                <iframe src="{{$defaultData->map_contact}}"></iframe>
            </div>
{{--        </div>--}}

        <div class="gap-40"></div>

        <div class="row">
            <div class="col-md-12">
                <h3 class="column-title">{{__('we_love_to_hear')}}</h3>
                <!-- contact form works with formspree.io  -->
                <!-- contact form activation doc: https://docs.themefisher.com/constra/contact-form/ -->
                <form id="contact-form" action="{{ route('send.email',['locale' => app()->getLocale()]) }}" method="post" role="form">
                    <div class="error-container"></div>
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('name')}}</label>
                                <input class="form-control form-control-name" name="name" id="name" placeholder="" type="text" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('email')}}</label>
                                <input class="form-control form-control-email" name="email" id="email" placeholder="" type="email"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('phone')}}</label>
                                <input class="form-control form-control-subject" name="phone" id="subject" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__('message')}}</label>
                        <textarea class="form-control form-control-message" name="message" id="message" placeholder="" rows="10"
                                  required></textarea>
                    </div>
                    <div class="text-right"><br>
                        <button class="btn btn-primary solid blank" type="submit">{{__('send_message')}}</button>
                    </div>
                </form>
            </div>

        </div><!-- Content row -->
    </div><!-- Conatiner end -->
</section><!-- Main container end -->

@endsection
