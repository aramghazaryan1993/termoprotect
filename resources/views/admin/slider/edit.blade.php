@extends('layouts.app-admin')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.css') }}">

<!-- tags Input -->
<link href="{{ asset('dashboard/dist/css/custom/news_partner.css') }}" rel="stylesheet">
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Add these in your HTML head section -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@section('content')
    <h3>Slider</h3>
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Edit</h3>
        </div>
        <form role="form" action="{{ route('admin.slider.update') }}" method="post" id="news_form"
              enctype="multipart/form-data">

            @csrf

            <div class="card-body">
                <div class="form-group">
                    <div class="error"></div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach(\App\Models\Slider::lang as $lang)
                            <li class="nav-item">
                                <a class="nav-link @if($lang['value'] == 'hy') active @endif" data-toggle="tab"
                                   href="#{{$lang['value']}}">{{$lang['name']}}</a>
                            </li>
                        @endforeach
                   </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">

                                <!-- Նկարի վերբեռնման դաշտ -->
                                <div id="image_field">
                                    <label for="image">Նկար վերբեռնել</label>
                                    <input type="file" id="image" name="img" class="form-control" accept=".jpeg,.jpg,.png,.webp">
                                    <input type="hidden" name="delete_img" value="storage/{{$sliderEdit->img}}">
                                </div>


                        <div><br>


                              @if($sliderEdit->is_type == 0)
                                 <img width="10%" style="max-height: 100px;" src="{{ $sliderEdit->getFirstMediaUrl('slider', 'mobile') }}" alt="">
                              @else
                                  <video width="10%" playsinline="" autoplay="" muted="" loop=""  >
                                                            <source  src="{{  $sliderEdit->video_url }}" type="video/webm"></video>
                              @endif
                                    </div>

                        @foreach(\App\Models\Slider::lang as $val)
                            <div id="{{$val['value']}}"
                                 class="tab-pane @if($val['value'] == 'hy') active @endif form-group"><br>
                                <div class="row">
                                    @foreach($sliderEdit->localizations as $chunk)
                                        @if($chunk->lang == $val['value'])
                                            <div class="col-lg-3">

                                                <div class="d-flex" style="align-items: center; width: 500px;">
                                                    <label class="mr-2" for="exampleInputPassword1">1</label>
                                                    <input value="{{$chunk->text_one}}" type="text"
                                                           name="langs[{{$val['value']}}][text_one]"
                                                           class="form-control" placeholder="Enter Text 1">
                                                </div><br>

                                                <div class="d-flex" style="align-items: center; width: 500px;">
                                                    <label class="mr-2" for="exampleInputPassword1">2</label>
                                                    <input value="{{$chunk->text_two}}" type="text"
                                                           name="langs[{{$val['value']}}][text_two]"
                                                           class="form-control" placeholder="Enter Text 2">
                                                </div>

                                            </div>
                                        @endif
                                    @endforeach
                                    <input type="hidden" name="id" value="{{$sliderEdit->id}}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
        </form>
    </div>
    </div>
    <script src="{{ asset('dashboard/plugins/tagsinput/tag.js') }}"></script>
@endsection
@section('js')

    <!-- jQuery -->
    <script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- CodeMirror -->
    <script src="{{ asset('dashboard/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/codemirror/mode/css/css.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/codemirror/mode/xml/xml.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dashboard/dist/js/demo.js') }}"></script>
    <script src="{{ asset('dashboard/dist/js/custom/news.js') }}"></script>

      <script>
            document.addEventListener('DOMContentLoaded', function() {
                const checkbox = document.getElementById('is_type_checkbox');
                const hiddenInput = document.getElementById('is_type');

                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        hiddenInput.value = "1";
                        document.getElementById('video_field').style.display = 'block';
                        document.getElementById('image_field').style.display = 'none';
                        // Եթե էլեմենտի id-ը "image" է, հաստատեք, որ այն է:
                        const imageInput = document.getElementById('image');
                        if (imageInput) {
                            imageInput.value = '';
                        }
                    } else {
                        hiddenInput.value = "0";
                        document.getElementById('video_field').style.display = 'none';
                        document.getElementById('video_url').value = '';
                        document.getElementById('image_field').style.display = 'block';
                    }
                });
            });
  </script>
@endsection
