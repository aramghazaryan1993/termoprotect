@php
    $data = $defaultData->localizations->firstWhere('lang', app()->getLocale());
  $dataAbout = $about->localizations->firstWhere('lang', app()->getLocale());
@endphp
<footer id="footer" class="footer bg-overlay">
    <div class="footer-main">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-6 footer-widget footer-about">
                    <h3 class="widget-title">{{__('about')}}</h3>
                    <img loading="lazy" width="200px" class="footer-logo" src="images/footer-logo.png" alt="Constra">

                    <p>{{ Str::limit($dataAbout->text, 170, '') }}</p>

                </div><!-- Col end -->

                <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
                    <h3 class="widget-title">{{__('working_hours')}}</h3>
                    <div class="working-hours">

                        <br><br> {{$data->working}}
                        <br> {{__('saturday_sunday')}}

                    </div>
                </div><!-- Col end -->

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
                    <h3 class="widget-title">
                        {{__('projects')}} </h3>
                    <ul class="list-arrow">
                        @foreach($subMenusLimit as  $subMenuLimit)
                            @php
                                $localizedListSubMneu = $subMenuLimit->localizations->firstWhere('lang', app()->getLocale());
                            @endphp
                        <li><a href="{{ route('products', ['locale' => app()->getLocale(), 'id' => $subMenuLimit->id, 'slug' =>  str_replace(["\r\n", "\r", "\n"," "], '_', mb_strtolower($localizedListSubMneu->slug, 'UTF-8')) ]) }}">{{$localizedListSubMneu->title}}</a></li>

                        @endforeach
                    </ul>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Footer main end -->

    <div class="copyright">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <div class="copyright-info">
                     {{__('copyright')}} &copy;  <script>
                            document.write(new Date().getFullYear())
                        </script>․ {{__('created')}}   @if(app()->getLocale() != 'hy'){{__('by')}}  @endif<a  target="_blank" href="https://www.facebook.com/profile.php?id=61555985371610"> Web Teams</a> @if(app()->getLocale() == 'hy')-ի կողմից  @endif

                    </div>
                </div>
            </div><!-- Row end -->

            <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
                <button class="btn btn-primary" title="Back to Top">
                    <i class="fa fa-angle-double-up"></i>
                </button>
            </div>

        </div><!-- Container end -->
    </div><!-- Copyright end -->
</footer>

<!-- Footer end -->
