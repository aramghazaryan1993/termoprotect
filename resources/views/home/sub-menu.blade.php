@if(count($subMenusLimit) > 0)
<section id="project-area" class="project-area solid-bg">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h3 class="section-sub-title">{{__('our_projects')}}</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
            <div class="col-12">
                <div class="shuffle-btn-group"></div><!-- project filter end -->


                <div class="row shuffle-wrapper">
                    <div class="col-1 shuffle-sizer"></div>

                    @foreach($subMenusLimit as  $subMenuLimit)
                        @php
                            $localizedListSubMneu = $subMenuLimit->localizations->firstWhere('lang', app()->getLocale());
                        @endphp
                    <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;government&quot;,&quot;healthcare&quot;]">
                        <div class="project-img-container">
                            <a class="gallery-popup" href="#" aria-label="project-img">
                                <img class="img-fluid" src="{{ $subMenuLimit->getFirstMediaUrl('menu', 'web') }}" alt="project-img">

                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <h3 class="project-item-title">
                                        <a href="{{ route('products', ['locale' => app()->getLocale(), 'id' => $subMenuLimit->id, 'slug' =>  str_replace(["\r\n", "\r", "\n"," "], '_', mb_strtolower($localizedListSubMneu->slug, 'UTF-8')) ]) }}">{{$localizedListSubMneu->title}}</a>
                                    </h3>

                                </div>
                            </div>
                        </div>
                    </div><!-- shuffle item 1 end -->
                    @endforeach

                </div><!-- shuffle end -->
            </div>

{{--            <div class="col-12">--}}
{{--                <div class="general-btn text-center">--}}
{{--                    <a class="btn btn-primary" href="projects.html">View All Projects</a>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div><!-- Content row end -->
    </div>
    <!--/ Container end -->
</section><!-- Project area end -->
@endif
