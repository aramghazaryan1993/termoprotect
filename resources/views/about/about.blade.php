<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                @foreach($getAbout->localizations as $about)
                    @if($about->lang == app()->getLocale())
                        <h3 class="column-title" style="text-align: center;">{{$about->title}}</h3>

                        <p>{!! html_entity_decode($about->text ) !!}</p>
                    @endif
                @endforeach
            </div><!-- Col end -->

            <div class="col-lg-6 mt-5 mt-lg-0">

                <div id="page-slider" class="page-slider small-bg">

                @foreach($getAbout->getMedia('about')->unique('id') as $image)
                    <div class="item" style="background-image:url({{ $image->getUrl('web') }})">
                        <div class="container">
                            <div class="box-slider-content">

                            </div>
                        </div>
                    </div>
                @endforeach
                    <!-- Item 1 end -->


                </div><!-- Page slider end-->


            </div><!-- Col end -->
        </div><!-- Content row end -->

    </div><!-- Container end -->
</section><!-- Main container end -->
