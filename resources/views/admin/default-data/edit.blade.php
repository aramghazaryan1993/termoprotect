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
    <h3>Default Data</h3>
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Edit</h3>
        </div>
        <form role="form" action="{{ route('admin.default.data.update') }}" method="post" id="news_form"
              enctype="multipart/form-data">

            @csrf

            <div class="card-body">
                <div class="form-group">
                    <div class="error"></div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach(\App\Models\DefaultData::lang as $lang)
                            <li class="nav-item">
                                <a class="nav-link @if($lang['value'] == 'hy') active @endif" data-toggle="tab"
                                   href="#{{$lang['value']}}">{{$lang['name']}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">

                        <div class="d-flex" style="align-items: center">
                            <label class="mr-5" for="exampleInputPassword1">Phone 1</label>
                            <input value="{{$defaultData->phone_1 }}" type="text" name="phone_1" class="form-control"
                                   id="phone_1" placeholder="Enter Phone 1">
                        </div><br>

                        <div class="d-flex" style="align-items: center">
                            <label class="mr-5" for="exampleInputPassword1">Phone 2</label>
                            <input value="{{$defaultData->phone_2 }}" type="text" name="phone_2" class="form-control"
                                   id="phone_2" placeholder="Enter Phone 2">
                        </div><br>

                        <div class="d-flex" style="align-items: center">
                            <label class="mr-5" for="exampleInputPassword1">Phone 3</label>
                            <input value="{{$defaultData->phone_3 }}" type="text" name="phone_3" class="form-control"
                                   id="phone_3" placeholder="Enter Phone 3">
                        </div><br>

                        <div class="d-flex" style="align-items: center">
                            <label class="mr-5" for="exampleInputPassword1">Phone 4</label>
                            <input value="{{$defaultData->phone_4 }}" type="text" name="phone_4" class="form-control"
                                   id="phone_4" placeholder="Enter Phone 4">
                        </div><br>

                        <div class="d-flex" style="align-items: center">
                            <label class="mr-5" for="exampleInputPassword1">Phone 5</label>
                            <input value="{{$defaultData->phone_5 }}" type="text" name="phone_5" class="form-control"
                                   id="phone_5" placeholder="Enter Phone 5">
                        </div><br>


                        <div class="d-flex" style="align-items: center">
                            <label class="mr-5" for="exampleInputPassword1">Email</label>
                            <input value="{{$defaultData->email }}" type="email" name="email" class="form-control"
                                   id="email" placeholder="Enter Email">
                        </div><br>

                        <div class="d-flex" style="align-items: center">
                            <label class="mr-5" for="exampleInputPassword1">Web Syat</label>
                            <input value="{{$defaultData->websayt }}" type="text" name="websayt" class="form-control"
                                   id="websayt" placeholder="Enter Web sayt">
                        </div><br>

                        <div class="d-flex" style="align-items: center">
                            <label class="mr-5" for="exampleInputPassword1">Facebook</label>
                            <input value="{{$defaultData->facebook }}" type="text" name="facebook" class="form-control"
                                   id="facebook" placeholder="Enter name">
                        </div><br>

                        <div class="d-flex" style="align-items: center">
                            <label class="mr-5" for="exampleInputPassword1">Instagram</label>
                            <input value="{{$defaultData->instagram }}" type="text" name="instagram"
                                   class="form-control" id="instagram" placeholder="Enter name">
                        </div><br>

                        <div class="d-flex" style="align-items: center">
                            <label class="mr-5" for="exampleInputPassword1">Viber</label>
                            <input value="{{$defaultData->viber }}" type="text" name="viber"
                                   class="form-control" id="viber" placeholder="Enter Viber">
                        </div><br>

                        <div class="d-flex" style="align-items: center">
                            <label class="mr-5" for="exampleInputPassword1">Whatsapp</label>
                            <input value="{{$defaultData->whatsapp }}" type="text" name="whatsapp"
                                   class="form-control" id="whatsapp" placeholder="Enter Whatsapp">
                        </div><br>

                        <div class="d-flex" style="align-items: center">
                            <label class="mr-5" for="exampleInputPassword1">Telegram</label>
                            <input value="{{$defaultData->telegram }}" type="text" name="telegram"
                                   class="form-control" id="telegram" placeholder="Enter Telegram">
                        </div><br>

                        <div class="d-flex" style="align-items: center">
                            <label class="mr-5" for="exampleInputPassword1">Map</label>
                            <input value="{{$defaultData->map }}" type="text" name="map"
                                   class="form-control" id="map" placeholder="Enter Map">
                        </div><br>
                        <div class="d-flex" style="align-items: center">
                            <label class="mr-5" for="exampleInputPassword1">Map Contact</label>
                            <input value="{{$defaultData->map_contact }}" type="text" name="map_contact"
                                   class="form-control" id="map_contact" placeholder="Enter Map Contact">
                        </div><br>



                        @foreach(\App\Models\DefaultData::lang as $val)
                            <div id="{{$val['value']}}"
                                 class="tab-pane @if($val['value'] == 'hy') active @endif form-group"><br>
                                <div class="row">
                                    @foreach($defaultData->localizations as $chunk)
                                        @if($chunk->lang == $val['value'] && !empty($chunk->address))
                                            <div class="col-lg-3">
                                                <div class="d-flex" style="align-items: center">
                                                    <label class="mr-2" for="exampleInputPassword1">Address</label>
                                                    <input value="{{$chunk->address}}" type="text"
                                                           name="langs[{{$val['value']}}][address]" class="form-control"
                                                           placeholder="Enter name">
                                                </div><br>

                                                <div class="d-flex" style="align-items: center">
                                                    <label class="mr-2" for="exampleInputPassword1">Working</label>
                                                    <input value="{{$chunk->working}}" type="text"
                                                           name="langs[{{$val['value']}}][working]"
                                                           class="form-control" placeholder="Enter Working">
                                                </div>

                                            </div>
                                        @endif
                                    @endforeach
                                    <input type="hidden" name="id" value="{{$defaultData->id}}">
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
