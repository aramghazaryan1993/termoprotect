<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<header id="header" class="header-one">
    <div class="bg-white mobilenone">
        <div class="container">
            <div class="logo-area">
                <div class="row align-items-center">
                    <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                        <a class="d-block" href="index.html">
                            <img loading="lazy" src="images/logo.png" alt="Constra">
                        </a>
                    </div><!-- logo end -->

                    <div class="col-lg-9 header-right">
                        <ul class="top-info-box">
                            <li>
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <p class="info-box-title">{{__('phone')}}</p>
                                        <p class="info-box-subtitle">{{$defaultData->phone_1}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <p class="info-box-title">{{__('email')}}</p>
                                        <p class="info-box-subtitle">{{$defaultData->email}}</p>
                                    </div>
                                </div>
                            </li>
{{--                            <li class="last">--}}
{{--                                <div class="info-box last">--}}
{{--                                    <div class="info-box-content">--}}
{{--                                        <p class="info-box-title">Global Certificate</p>--}}
{{--                                        <p class="info-box-subtitle">ISO 9001:2017</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}

                        </ul><!-- Ul end -->
                    </div><!-- header right end -->
                </div><!-- logo area end -->

            </div><!-- Row end -->
        </div><!-- Container end -->
    </div>

    <div class="site-navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-dark p-0">
                        <div class="mobileshow">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                              <!-- Logo header comment -->
{{--                            <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">--}}
{{--                                <a class="d-block" href="index.html">--}}
{{--                                    <img loading="lazy" src="images/logo.png" alt="Constra">--}}
{{--                                </a>--}}
{{--                            </div> --}}
                                            <!-- logo end -->
                            <!-- lang  -->

                            <div class="dropdown">

                                @if(app()->getLocale() == 'hy')
                                    <a class="dropdown-toggle" id="dLabel"  data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{asset('image/am.jpg')}}" alt="am" class="img"></a>
                                @endif

                                @if(app()->getLocale() == 'en')
                                    <a class="dropdown-toggle" id="dLabel"  data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{asset('image/en.svg')}}" alt="en" class="img"></a>
                                @endif

                                @if(app()->getLocale() == 'ru')
                                    <a class="dropdown-toggle" id="dLabel"  data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{asset('image/rus.jpg')}}" alt="ru" class="img"></a>
                                @endif

                                @if(app()->getLocale() == 'es')
                                    <a class="dropdown-toggle" id="dLabel"  data-bs-toggle="dropdown" aria-expanded="false"><img
                                            src="{{asset('image/spain.webp')}}" alt="es" class="img"></a>
                                @endif

                                <ul class="dropdown-menu" aria-labelledby="dLabel">


                                    @if(app()->getLocale() != 'en')
                                        <a class="dropdown-item" href="javascript:;"
                                           onclick="var url = window.location.toString(); window.location = url.replace('/{{ app()->getLocale() }}',
                                               '/'+'en');"><img class="img" src="{{asset('image/en.svg')}}"
                                                                alt="en"></a>
                                    @endif

                                    @if(app()->getLocale() != 'ru')
                                        <a class="dropdown-item" href="javascript:;"
                                           onclick="var url = window.location.toString(); window.location = url.replace('/{{ app()->getLocale() }}',
                                               '/'+'ru');"><img class="img" src="{{asset('image/rus.jpg')}}"
                                                                alt="ru"></a>
                                    @endif

                                    @if(app()->getLocale() != 'hy')
                                        <a class="dropdown-item" href="javascript:;"
                                           onclick="var url = window.location.toString(); window.location = url.replace('/{{ app()->getLocale() }}',
                                               '/'+'hy');"><img class="img" src="{{asset('image/am.jpg')}}"
                                                                alt="am">
                                        </a>
                                    @endif

                                    @if(app()->getLocale() != 'es')
                                            <a class="dropdown-item" href="javascript:;"
                                               onclick="var url = window.location.toString(); window.location = url.replace('/{{ app()->getLocale() }}',
                                                   '/'+'es');"><img class="img" src="{{asset('image/spain.webp')}}"
                                                                    alt="es">
                                            </a>
                                    @endif
                                </ul>
                            </div>
                            <!-- lang end -->
                            </div>
                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav mr-auto">

                                <li  @if(Route::currentRouteName() == 'home') class="nav-item active" @else class="nav-item" @endif ><a class="nav-link"  href="{{route('home',['locale' => app()->getLocale()])}}">{{__('home')}}</a></li>

                                @foreach($aboutSlug[0]->localizations as $data)
                                    @if($data->lang == app()->getLocale() && !empty($data->slug))
                                        <li  @if(Route::currentRouteName() == 'about') class="nav-item active" @else class="nav-item" @endif><a class="nav-link" href="{{ route('about', ['locale' => app()->getLocale(), 'slug' =>  str_replace(["\r\n", "\r", "\n"," "], '_', mb_strtolower($data->slug, 'UTF-8'))]) }}">{{__('about')}}</a></li>
                                    @endif
                                @endforeach

                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{__('projects')}} <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        @foreach($menuSideBar as $menu)
                                            @php
                                                $menuTranslation = $menu->localizations->where('lang', app()->getLocale())->first();

                                            @endphp

                                            @if($menuTranslation)
                                                 <li><a href="{{ route('menus', ['locale' => app()->getLocale(), 'id' => $menu->id, 'slug' =>  str_replace(["\r\n", "\r", "\n"," "], '_', mb_strtolower($menuTranslation->slug, 'UTF-8')) ]) }}">  {{ $menuTranslation->title }}</a></li>
                                             @endif
                                                @endforeach
                                    </ul>
                                </li>

                                <li @if(Route::currentRouteName() == 'partners') class="nav-item active" @else class="nav-item" @endif><a class="nav-link" href="{{route('partners', ['locale' => app()->getLocale()] ) }}">{{__('partners')}}</a></li>
                                <li @if(Route::currentRouteName() == 'lawyer') class="nav-item active" @else class="nav-item" @endif><a class="nav-link" href="{{route('lawyer', ['locale' => app()->getLocale(), 'slug' =>  str_replace(["\r\n", "\r", "\n"," "], '_', mb_strtolower("lawyer", 'UTF-8'))] ) }}">{{__('lawyer')}}</a></li>

                                @foreach($contactSlug[0]->localizations as $data)
                                    @if($data->lang == app()->getLocale() && !empty($data->slug))
                                        <li  @if(Route::currentRouteName() == 'contact') class="nav-item active" @else class="nav-item" @endif><a class="nav-link"  @if(Route::currentRouteName() == 'contact') class="active" @endif href="{{ route('contact', ['locale' => app()->getLocale(), 'slug' =>  str_replace(["\r\n", "\r", "\n"," "], '_', mb_strtolower( $data->slug, 'UTF-8'))]) }}"
                                            >{{__('contact')}}</a></li>
                                    @endif
                                @endforeach

                            </ul>

                            <div class="dropdown fordesktop">

                                    @if(app()->getLocale() == 'hy')
                                        <a class="dropdown-toggle" id="dLabel"  data-bs-toggle="dropdown" aria-expanded="false"><img
                                                src="{{asset('image/am.jpg')}}" alt="" class="img"></a>
                                    @endif

                                    @if(app()->getLocale() == 'en')
                                        <a class="dropdown-toggle" id="dLabel"  data-bs-toggle="dropdown" aria-expanded="false"><img
                                                src="{{asset('image/en.svg')}}" alt="" class="img"></a>
                                    @endif

                                    @if(app()->getLocale() == 'ru')
                                        <a class="dropdown-toggle" id="dLabel"  data-bs-toggle="dropdown" aria-expanded="false"><img
                                                src="{{asset('image/rus.jpg')}}" alt="" class="img"></a>
                                    @endif

                                     @if(app()->getLocale() == 'es')
                                            <a class="dropdown-toggle" id="dLabel"  data-bs-toggle="dropdown" aria-expanded="false"><img
                                                    src="{{asset('image/spain.webp')}}" alt="" class="img"></a>
                                     @endif

                                    <ul class="dropdown-menu" aria-labelledby="dLabel">

                                        @if(app()->getLocale() != 'en')
                                            <a class="dropdown-item" href="javascript:;"
                                               onclick="var url = window.location.toString(); window.location = url.replace('/{{ app()->getLocale() }}',
                                                   '/'+'en');"><img class="img" src="{{asset('image/en.svg')}}"
                                                                    alt=""></a>
                                        @endif

                                        @if(app()->getLocale() != 'ru')
                                            <a class="dropdown-item" href="javascript:;"
                                               onclick="var url = window.location.toString(); window.location = url.replace('/{{ app()->getLocale() }}',
                                                   '/'+'ru');"><img class="img" src="{{asset('image/rus.jpg')}}"
                                                                    alt=""></a>
                                        @endif

                                        @if(app()->getLocale() != 'hy')
                                            <a class="dropdown-item" href="javascript:;"
                                               onclick="var url = window.location.toString(); window.location = url.replace('/{{ app()->getLocale() }}',
                                                   '/'+'hy');"><img class="img" src="{{asset('image/am.jpg')}}"
                                                                    alt="">
                                            </a>
                                        @endif

                                       @if(app()->getLocale() != 'es')
                                                <a class="dropdown-item" href="javascript:;"
                                                   onclick="var url = window.location.toString(); window.location = url.replace('/{{ app()->getLocale() }}',
                                                       '/'+'es');"><img class="img" src="{{asset('image/spain.webp')}}"
                                                                        alt="es">
                                                </a>
                                       @endif
                                </ul>
                            </div>

                            <!-- lang end -->
                        </div>
                    </nav>
                </div>
                <!--/ Col end -->
            </div>
            <!--/ Row end -->





        </div>
        <!--/ Container end -->

    </div>
    <!--/ Navigation end -->
</header>
<script>
    function changeLang(lang) {
        let url = window.location.href;
        let newUrl = url.replace(/\/(en|ru|hy|es)/, '/' + lang);
        window.location.href = newUrl;
    }
</script>
