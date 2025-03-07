@extends('layouts.app-admin')

<!-- summernote -->
<link rel="stylesheet" href="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.css') }}">
<!-- tags Input -->
<link href="{{ asset('dashboard/plugins/tagsinput/tagsinput.min.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard/dist/css/custom/news_partner.css') }}" rel="stylesheet">
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/tagsinput/jquery.tagsinput.min.js') }}"></script>
@section('content')

    <h3>Partner</h3>
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Edit</h3>
        </div>
        <br>
        <form role="form" action="{{ route('admin.partners.update',$partner->id) }}" method="POST" enctype="multipart/form-data"
              id="news_form">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$partner->id}}">



            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                @foreach(\App\Models\Partner::lang as $key => $lang)
                    <li class="nav-item">
                        <a @if($lang['value'] == 'hy') class="nav-link active" @else  class="nav-link"
                           @endif data-toggle="tab" href="#{{$lang['value']}}">{{$lang['name']}}</a>
                    </li>
                @endforeach
            </ul>

            <div class="card-body">

                <div class="d-flex" style="align-items: center">
                    <label class="mr-2" for="fileInputBaner">Image Banner</label>
                    <input type="file" name="img_baner" class="form-control" id="fileInputBaner" accept="image/*">
                </div><br>

                <!-- Image Preview, Loading Overlay, and Remove Icon -->
                <div class="image-container">
                    <img id="imagePreview" src="#" alt="Image Preview">
                    <div class="loading-overlay" id="loadingOverlay">Loading...</div>
                    @php
                        $media = $partner->getFirstMedia('partners_banner'); // Ստանում ենք մեդիա օբյեկտը

                        $path = $media->getPath(); // Ստանում ենք ֆայլի ամբողջ ճանապարհը

                        $extension = pathinfo($path, PATHINFO_EXTENSION); // Ստանում ենք ընդարձակումը

                        if ($extension === 'gif') {
                           $imgUrl = $partner->getFirstMediaUrl('partners_banner');
                        } else {
                            $imgUrl = $partner->getFirstMediaUrl('partners_banner','mobile');
                        }
                    @endphp
                    <img id="imageB" src="{{ $imgUrl }}" alt="" style="width: 100px">
                </div>

                <div class="form-group">
                    <div class="error"></div>

                    <div class="todo-list">
                        <label>Images</label>
                        <input id="images2" type="file" name="img" class="form-control" accept=".jpeg,.jpg,.png,.webp"><br>
                    </div>
                    <div class="previews"></div>
                </div>

                <div class="img__wrap" style="padding: 10px 10px 10px 10px">
                    <img id="data_img" style="max-height: 100px;" class="img__img"
                         src="{{ $partner->getFirstMediaUrl('partners', 'mobile') }}"/>

                </div>

            </div>

            <!-- Tab panes -->
            <div class="tab-content">
                @foreach(\App\Models\Partner::lang as $key => $val)

                    <div id="{{$val['value']}}" @if($val['value'] == 'hy') class="tab-pane active form-group"
                         @else class="tab-pane form-group" @endif ><br>

                        @foreach($partner->localizations as $value)
                            @if($value->lang == $val['value'])
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="exampleInputPassword1">Title</label>
                                        <input value="{{ $value->title }}" type="text"
                                               name="langs[{{$val['value']}}][title]" class="form-control" id="title"
                                               placeholder="Enter title">
                                    </div>
                                </div>

                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>

        </form>
    </div>
@endsection

@section('js')

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

    <script src="{{ asset('dashboard/dist/js/custom/product.js') }}"></script>
@endsection
