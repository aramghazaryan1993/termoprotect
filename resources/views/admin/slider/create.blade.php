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
            <h3 class="card-title">Create</h3>
        </div><br>
        <form role="form" action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">

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
                    </ul><br>

                    <!-- Tab panes -->
                    <div class="tab-content">
                                <!-- Վիդեոյի դաշտ -->
                                <div id="video_field" style="display: none;">
                                    <label for="video_url">Վիդեոյի հղում</label>
                                    <input type="text" id="video_url" name="video_url" class="form-control">
                                </div>

                                <!-- Նկարի վերբեռնման դաշտ -->
                                <div id="image_field">
                                    <label for="image">Նկար վերբեռնել</label>
                                    <input type="file" id="image" name="img" class="form-control">
                                </div>


                        @foreach(\App\Models\Slider::lang as $val)
                            <div  id="{{$val['value']}}"
                                 class="tab-pane @if($val['value'] == 'hy') active @endif form-group"><br>
                                <div class="row">
                                    <div class="col-lg-3">

                                        <div class="d-flex" style="align-items: center; width: 500px;">
                                            <label class="mr-2" for="exampleInputPassword1">1</label>
                                            <input type="text" name="langs[{{$val['value']}}][text_one]"
                                                   class="form-control" placeholder="Enter Text 1"
                                                   value="{{ old('langs.' . $val['value'] . '.text_one') }}">
                                        </div><br>

                                        <div class="d-flex" style="align-items: center; width: 500px;">
                                            <label class="mr-2" for="exampleInputPassword1">2</label>
                                            <input type="text" name="langs[{{$val['value']}}][text_two]"
                                                   class="form-control" placeholder="Enter Text 2"
                                                   value="{{ old('langs.' . $val['value'] . '.text_two') }}">
                                        </div>

                                    </div>
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
