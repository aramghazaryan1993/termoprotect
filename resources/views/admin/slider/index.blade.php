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


    <div class="card">
        <div class="card-header">
            <a href="{{ route("admin.slider.create") }}" class="btn btn-success">Create Slider</a>
        </div>
        {{-- <div class="card-body"> --}}
        <table id="categories" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>TEXT 1</th>
                <th>TEXT 2</th>
                <th>MEDIA</th>
                <th>ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sliders as $slider)

                <tr>
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->localizations[0]->text_one }}</td>
                    <td>{{ $slider->localizations[0]->text_two }}</td>
                    <td>
                        @php
                          $media = $slider->getFirstMedia('slider'); // Ստանում ենք մեդիա օբյեկտը

                          $path = $media->getPath(); // Ստանում ենք ֆայլի ամբողջ ճանապարհը

                          $extension = pathinfo($path, PATHINFO_EXTENSION); // Ստանում ենք ընդարձակումը

                          if ($extension === 'gif') {
                             $imgUrl = $slider->getFirstMediaUrl('slider');
                          } else {
                              $imgUrl = $slider->getFirstMediaUrl('slider','mobile');
                          }
                        @endphp
                        <img width="50%" style="max-height: 100px;" src="{{ $imgUrl }}" alt="">
{{--                  @if($slider->is_type == 0)--}}
{{--                     <img width="50%" style="max-height: 100px;" src="{{ $imgUrl }}" alt="">--}}
{{--                  @else--}}
{{--                      <video width="10%" playsinline="" autoplay="" muted="" loop=""  >--}}
{{--                                                <source  src="{{  $slider->video_url }}" type="video/webm"></video>--}}
{{--                  @endif--}}
                    </td>
                    <td style="height: 100%" class="table-buttons ">
                        <div class="d-flex">

                            <a  href="{{ route("admin.slider.edit" , $slider->id) }}"
                               class="btn btn-primary edit_b"><i class="fas fa-edit"></i></a>

                            <form method="POST" action="{{ route("admin.slider.destroy" , $slider->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="_method" value="DELETE">
                                <button  type="submit" class="ml-2 btn btn-danger delete_b">
                                    <i class="fa fa-trash" ></i>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

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
