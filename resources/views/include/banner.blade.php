@php
    if(!empty(Request::segment(2))  && Request::segment(2) == 'about')
    {

          $media = $getAbout->getFirstMedia('about_banner'); // Ստանում ենք մեդիա օբյեկտը

          $path = $media->getPath(); // Ստանում ենք ֆայլի ամբողջ ճանապարհը

          $extension = pathinfo($path, PATHINFO_EXTENSION); // Ստանում ենք ընդարձակումը

          if ($extension === 'gif') {
             $imgUrlBaner = $getAbout->getFirstMediaUrl('about_banner');
          } else {
              $imgUrlBaner = $getAbout->getFirstMediaUrl('about_banner','web');
          }
@endphp

<div id="banner-area" class="banner-area" style="background-image:url({{  $imgUrlBaner }})">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">{{__('about')}}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">{{__('home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('about')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Banner text end -->
</div><!-- Banner area end -->
@php    
/*
}



elseif(!empty(Request::segment(2))  && Request::segment(2) == 'partners'){
      $media = $getPartnerBaner->getFirstMedia('partners_banner'); // Ստանում ենք մեդիա օբյեկտը

          $path = $media->getPath(); // Ստանում ենք ֆայլի ամբողջ ճանապարհը

          $extension = pathinfo($path, PATHINFO_EXTENSION); // Ստանում ենք ընդարձակումը

          if ($extension === 'gif') {
             $imgUrlBaner = $getPartnerBaner->getFirstMediaUrl('partners_banner');
          } else {
              $imgUrlBaner = $getPartnerBaner->getFirstMediaUrl('partners_banner','web');
          }
          */
 @endphp

<div id="banner-area" class="banner-area" style="background-image:url({{  $imgUrlBaner }})">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">{{__('partners')}}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">{{__('home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('partners')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Banner text end -->
</div><!-- Banner area end -->

@php }

elseif(!empty(Request::segment(2))  && Request::segment(2) == 'lawyer'){
      $media = $getLawyer->getFirstMedia('lawyer_banner'); // Ստանում ենք մեդիա օբյեկտը

          $path = $media->getPath(); // Ստանում ենք ֆայլի ամբողջ ճանապարհը

          $extension = pathinfo($path, PATHINFO_EXTENSION); // Ստանում ենք ընդարձակումը

          if ($extension === 'gif') {
             $imgUrlBaner = $getLawyer->getFirstMediaUrl('lawyer_banner');
          } else {
              $imgUrlBaner = $getLawyer->getFirstMediaUrl('lawyer_banner','web');
          }
 @endphp

<div id="banner-area" class="banner-area" style="background-image:url({{  $imgUrlBaner }})">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">{{__('lawyer')}}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">{{__('home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('lawyer')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Banner text end -->
</div><!-- Banner area end -->

@php }

elseif(!empty(Request::segment(2))  && Request::segment(2) == 'menus'){


      $media = $menu->getFirstMedia('menu_banner'); // Ստանում ենք մեդիա օբյեկտը

          $path = $media->getPath(); // Ստանում ենք ֆայլի ամբողջ ճանապարհը

          $extension = pathinfo($path, PATHINFO_EXTENSION); // Ստանում ենք ընդարձակումը

          if ($extension === 'gif') {
             $imgUrlBaner = $menu->getFirstMediaUrl('menu_banner');
          } else {
              $imgUrlBaner = $menu->getFirstMediaUrl('menu_banner','web');
          }
@endphp

<div id="banner-area" class="banner-area" style="background-image:url({{  $imgUrlBaner }})">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">
                            @php
                                $menuTranslation = $menu->localizations->where('lang', app()->getLocale())->first();
                            @endphp
                            {{$menuTranslation->title}}
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">{{__('home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{$menuTranslation->title}}</li>
                            </ol>
                        </nav>
                    </div>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Banner text end -->
</div><!-- Banner area end -->

@php }

elseif(!empty(Request::segment(2))  && Request::segment(2) == 'projects'){


        $media = $subMenu->getFirstMedia('menu_banner'); // Ստանում ենք մեդիա օբյեկտը

        $path = $media->getPath(); // Ստանում ենք ֆայլի ամբողջ ճանապարհը

        $extension = pathinfo($path, PATHINFO_EXTENSION); // Ստանում ենք ընդարձակումը

        if ($extension === 'gif') {
        $imgUrlBaner = $subMenu->getFirstMediaUrl('menu_banner');
        } else {
        $imgUrlBaner = $subMenu->getFirstMediaUrl('menu_banner','web');
        }
    @endphp

<div id="banner-area" class="banner-area" style="background-image:url({{  $imgUrlBaner }})">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">
                            @php
                                $menuTranslation = $menu->localizations->where('lang', app()->getLocale())->first();
                                $submenuTranslation = $subMenu->localizations->where('lang', app()->getLocale())->first();
                            @endphp
                            {{$submenuTranslation->title}}
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">{{__('home')}}</a></li>
                                <li class="breadcrumb-item"><a href="#">{{$menuTranslation->title}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{$submenuTranslation->title}}</li>
                            </ol>
                        </nav>
                    </div>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Banner text end -->
</div><!-- Banner area end -->

@php }

elseif(!empty(Request::segment(2))  && Request::segment(2) == 'project'){


        $media = $subMenu->getFirstMedia('menu_banner'); // Ստանում ենք մեդիա օբյեկտը

        $path = $media->getPath(); // Ստանում ենք ֆայլի ամբողջ ճանապարհը

        $extension = pathinfo($path, PATHINFO_EXTENSION); // Ստանում ենք ընդարձակումը

        if ($extension === 'gif') {
        $imgUrlBaner = $subMenu->getFirstMediaUrl('menu_banner');
        } else {
        $imgUrlBaner = $subMenu->getFirstMediaUrl('menu_banner','web');
        }
@endphp

<div id="banner-area" class="banner-area" style="background-image:url({{  $imgUrlBaner }})">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">
                            @php
                                $menuTranslation = $menu->localizations->where('lang', app()->getLocale())->first();
                                $submenuTranslation = $subMenu->localizations->where('lang', app()->getLocale())->first();
                                $productTranslation = $product->localizations->where('lang', app()->getLocale())->first();

                            @endphp
                            {{$productTranslation->title}}
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">{{__('home')}}</a></li>
                                <li class="breadcrumb-item"><a href="#">{{$menuTranslation->title}}</a></li>
                                <li class="breadcrumb-item"><a href="#">{{$submenuTranslation->title}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{$productTranslation->title}}</li>
                            </ol>
                        </nav>
                    </div>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Banner text end -->
</div><!-- Banner area end -->

@php } @endphp


