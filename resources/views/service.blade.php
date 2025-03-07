@extends('layouts.app-view')

@if(!empty($service) > 0)
@foreach($service->localizations as $serviceSeo)
    @if($serviceSeo->lang == app()->getLocale())
        @section('title', $serviceSeo->seo_title)
@section('description', $serviceSeo->seo_description)
@section('keywords', $serviceSeo->seo_keyword)
@endif
@endforeach
@endif

@section('content')

    <!-- Destination Start -->
  {{--    @include('include.slider')--}}
    <!-- Destination Start -->

{{-- @if(!empty($service) > 0)--}}


    <!--</section>-->

         <section>
       <div class="container">

        <div class="dblBlock">
            <div class="dblBlockImg">

                    <img src="{{ $service->getFirstMediaUrl('service', 'web') }}" alt="image">


            </div>
            <div class="dblBlockContent">


                 @foreach($service->localizations as $about)
                  @if($about->lang == app()->getLocale())
                   <h1 >{{ $about->title}}</h1>
                  @endif
                @endforeach

                   @foreach($service->localizations as $about)
                @if($about->lang == app()->getLocale())

             @php


                        $text = $about->text;

                        // Ավելացնում ենք բացատներ իրար կպցրած բառերի միջև (երբ փոքրատառից հետո գալիս է մեծատառ կամ հայերեն-լատիներեն անցում)
                        $text = preg_replace('/([ա-ֆ])([Ա-Ֆ])/u', '$1 $2', $text); // Հայերեն փոքրատառ + մեծատառ
                        $text = preg_replace('/([a-z])([A-Z])/u', '$1 $2', $text); // Անգլերեն փոքրատառ + մեծատառ
                        $text = preg_replace('/([ա-ֆA-Za-z])(\d)/u', '$1 $2', $text); // Տառից հետո թիվ
                        $text = preg_replace('/(\d)([ա-ֆA-Za-z])/u', '$1 $2', $text); // Թվից հետո տառ

                         // 1
                        // Կրճատում ենք տեքստը 900 սիմվոլի
                         $st = strip_tags($text);
                        $trimmedText = mb_substr($st, 0, 300, 'UTF-8');
                        $length = strlen($trimmedText);



                        // Վերացնում ենք հատուկ նշանները
                         $t = str_replace('•', ' ', $trimmedText);

                           // 2
                        // Կրճատում ենք տեքստը 900 սիմվոլի
                        $trimmedText2 = mb_substr($text, 0, 90000000, 'UTF-8');



                        // Վերացնում ենք հատուկ նշանները
                         $t2 = str_replace('•', ' ', $trimmedText2);

                        @endphp

                <p > <span id="dhide" >{{ str_replace('&nbsp;', ' ', $t) }}</span>
                    <span id="dots" >...</span><div id="more">{!!htmlspecialchars_decode($t2) !!}</div>
                </p>
                 <p onclick="myFunction()" id="myBtn">{{__('read_more')}}</p>

                   @endif
               @endforeach

                </div>
        </div>
       </div>

    </section>
 @else
        <h1 style="text-align: center; padding-top: 100px; color: #7ab730;">{{__('does_not')}}</h1>
 @endif
@endsection
