<section id="ts-team" class="ts-team">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h3 class="section-sub-title">{{__('team')}}</h3>
            </div>
        </div><!--/ Title row end -->

        <div class="row">
            <div class="col-lg-12">
                <div id="team-slide" class="team-slide">
                    @if(count($teams) > 0)
                        @foreach($teams as $key => $team)
                            <div class="item">
                                <div class="ts-team-wrapper">
                                    <div class="team-img-wrapper">
                                        @php
                                            $media = $team->getFirstMedia('teams'); // Ստանում ենք մեդիա օբյեկտը

                                            $path = $media->getPath(); // Ստանում ենք ֆայլի ամբողջ ճանապարհը

                                            $extension = pathinfo($path, PATHINFO_EXTENSION); // Ստանում ենք ընդարձակումը

                                            if ($extension === 'gif') {
                                               $imgUrl = $team->getFirstMediaUrl('teams');
                                            } else {
                                                $imgUrl = $team->getFirstMediaUrl('teams','web');
                                            }
                                        @endphp
                                        <img loading="lazy" class="w-100" src="{{ $imgUrl }}" alt="team-img">
                                    </div>
                                    <div class="ts-team-content">
                                        @foreach($team->localizations as $data)
                                            @if($data->lang == app()->getLocale())
                                                <h3 class="ts-name">{{$data->name}}</h3>
                                                <p class="ts-designation">{{$data->position}}</p>
                                                <p class="ts-description">{{$data->text}}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div><!--/ Team wrapper end -->
                            </div>
                    @endforeach
                @endif

                    <!-- Team 1 end -->



                </div><!-- Team slide end -->
            </div>
        </div><!--/ Content row end -->
    </div><!--/ Container end -->
</section><!--/ Team end -->
