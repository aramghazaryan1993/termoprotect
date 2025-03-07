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
    <h3>Contact Seo</h3>
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Edit</h3>
        </div>
        <form role="form" action="{{ route('admin.contact.seo.update') }}" method="post" id="news_form"
              enctype="multipart/form-data">

            @csrf

            <div class="card-body">
                <div class="form-group">
                    <div class="error"></div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach(\App\Models\ContactSeo::lang as $lang)
                            <li class="nav-item">
                                <a class="nav-link @if($lang['value'] == 'hy') active @endif" data-toggle="tab"
                                   href="#{{$lang['value']}}">{{$lang['name']}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">

                        @foreach(\App\Models\ContactSeo::lang as $val)
                            <div id="{{$val['value']}}"
                                 class="tab-pane @if($val['value'] == 'hy') active @endif form-group"><br>
                                <div class="row">
                                    @foreach($contacts->localizations as $contact)
                                        @if($contact->lang == $val['value'])
                                            <div class="col-lg-3">

                                                <div class="col-20">
                                                    <label for="">SEO Slug</label>
                                                    <input value="{{$contact->slug}}" type="text"
                                                           name="langs[{{$val['value']}}][slug]" class="form-control"
                                                           placeholder="Enter Seo Slug">
                                                </div>

                                                <div class="col-20">
                                                    <label for="">SEO Title</label>
                                                    <input value="{{$contact->seo_title}}" type="text"
                                                           name="langs[{{$val['value']}}][seo_title]"
                                                           class="form-control" placeholder="Enter Seo Title">
                                                </div>

                                                <div class="col-lg-20" style="align-items: center; width: 500px;">
                                                    <label for="">SEO Description</label>
                                                    <textarea name="langs[{{$val['value']}}][seo_description]" rows="5"
                                                              style="width: 120%" placeholder="Enter Seo Description"
                                                              class="form-control">{{$contact->seo_description}}</textarea>
                                                </div>

                                                <div class="col-lg-20" style="align-items: center; width: 500px;">
                                                    <label for="">SEO Keyword</label>
                                                    <textarea name="langs[{{$val['value']}}][seo_keyword]" rows="5"
                                                              style="width: 120%" placeholder="Enter Seo Keyword "
                                                              class="form-control">{{$contact->seo_keyword}}</textarea>
                                                </div>

                                            </div>
                                        @endif
                                    @endforeach
                                    <input type="hidden" name="id" value="{{$contacts->id}}">
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
@endsection
