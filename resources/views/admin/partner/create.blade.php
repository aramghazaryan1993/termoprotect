@extends('layouts.app-admin')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.css') }}">
<!-- tags Input -->
<link href="{{ asset('dashboard/plugins/tagsinput/tagsinput.min.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard/dist/css/custom/news_partner.css') }}" rel="stylesheet">
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/tagsinput/jquery.tagsinput.min.js') }}"></script>

@section('content')

    <h3>Ppartner</h3>
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Create </h3>
        </div>
        <br>
        <form role="form" action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data"
              id="news_form">
        @csrf

        <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                @foreach(\App\Models\Partner::lang as $key => $lang)
                    <li class="nav-item">
                        <a @if($lang['value'] == 'hy') class="nav-link active" @else  class="nav-link"
                           @endif data-toggle="tab" href="#{{$lang['value']}}">{{$lang['name']}}</a>
                    </li>
                @endforeach
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="card-body">

                    <div class="form-group">
                        <div class="error"></div>

                        <div class="todo-list">
                            <label>Images</label>
                            <input id="images2" type="file" name="img" class="form-control" accept=".jpeg,.jpg,.png,.webp"><br>
                        </div>
                        <div class="previews"></div>
                    </div>
                </div>

                @foreach(\App\Models\Partner::lang as $key => $val)

                    <div id="{{$val['value']}}" @if($val['value'] == 'hy') class="tab-pane active form-group"
                         @else class="tab-pane form-group" @endif ><br>
                        <div class="row">

                            <div class="col-lg-10">
                                <label for="exampleInputPassword1">Title</label>
                                <input value="{{ old('langs.' . $val['value'] . '.title') }}" type="text"
                                       name="langs[{{$val['value']}}][title]" class="form-control" id="title"
                                       placeholder="Enter title">
                            </div>
                        </div>

                    </div>

                @endforeach
            </div>



            <div class="card-footer">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>


    </div>
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

@endsection


