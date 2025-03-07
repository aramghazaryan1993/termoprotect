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
            <a href="{{ route("admin.partners.create") }}" class="btn btn-success">Create Partner</a>
        </div>
        <table id="categories" class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>MEDIA</th>
                <th>ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($partners as $partner)

                <tr>
                    <td>{{ $partner->id }}</td>
                    <td>{{ $partner->localizations[0]->title }}</td>
                    <td> <img width="50" style="max-height: 100px;" src="{{ $partner->getFirstMediaUrl('partners', 'mobile') }}" alt=""></td>
                    <td style="height: 100%" class="table-buttons ">
                        <div class="d-flex">
                            <a  href="{{ route("admin.partners.edit", $partner->id) }}"
                               class="btn btn-primary edit_b"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ route("admin.partners.destroy" , $partner->id) }}">
                                @csrf
                                @method('DELETE')
                                <button  type="submit" class="ml-2 btn btn-danger delete_b">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-center">
        </div>
    </div>
    <!-- /.card-body -->
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

