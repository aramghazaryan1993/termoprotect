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

<style>
    .image-preview {
        position: relative;
        display: inline-block;
        margin: 10px;
        text-align: center;
    }
    .image-preview img {
        width: 100px;
        height: auto;
        border-radius: 5px;
    }
    .progress {
        width: 100%;
        height: 5px;
        background-color: #e0e0e0;
        margin-top: 5px;
    }
    .progress-bar {
        height: 5px;
        width: 0%;
        background-color: #28a745;
        transition: width 0.3s;
    }
    .remove-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: red;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 12px;
        padding: 2px 5px;
        border-radius: 5px;
        display: none;
    }
    .image-preview:hover .remove-btn {
        display: block;
    }

    /*Baner*/
    /* Loading progress bar styles */
    #loadingContainer {
        margin-top: 10px;
        width: 100%;
        background-color: #f0f0f0;
        border-radius: 5px;
        overflow: hidden;
        display: none; /* Hidden by default */
    }

    #loadingProgress {
        width: 0%;
        height: 20px;
        background-color: #007bff; /* Blue color */
        text-align: center;
        line-height: 20px;
        color: white;
        border-radius: 5px;
        transition: width 0.1s ease; /* Faster transition */
    }

    /* Image preview styles */
    #imagePreview {
        width: 120px;
        margin-top: 20px;
        max-width: 100%;
        height: auto;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: none; /* Hidden by default */
    }
    #imageEditTeams {
        margin-top: 20px;
        max-width: 100%;
        height: auto;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }


    /* File input hover effect */
    #fileInputTeamEdit:hover {
        cursor: pointer;
        opacity: 0.8;
    }

    /*Baner*/

    /* Loading overlay styles */
    .loading-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
        border-radius: 5px;
        opacity: 0; /* Hidden by default */
        transition: opacity 0.3s ease;
    }

    /* Image container for positioning */
    .image-container {
        position: relative;
        display: inline-block;
        max-width: 300px; /* Limit container width */
    }

    /* Image preview styles */
    #imagePreview {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: none; /* Hidden by default */
    }

    /* Remove icon styles */
    .remove-icon {
        position: absolute;
        top: 20px;
        right: 0;
        background-color: #ff4d4d; /* Red color */
        color: white;
        border: none;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        cursor: pointer;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0; /* Hidden by default */
        transition: opacity 0.3s ease; /* Smooth transition */
    }

    .remove-icon:hover {
        background-color: #cc0000; /* Darker red on hover */
    }

    /* Show remove icon on image hover */
    .image-container:hover .remove-icon {
        opacity: 1; /* Show icon */
    }

    /* Show loading overlay when active */
    .loading-active .loading-overlay {
        opacity: 1; /* Show overlay */
    }

    /* File input hover effect */
    #fileInputTeamEdit:hover {
        cursor: pointer;
        opacity: 0.8;
    }
</style>

@section('content')
    <h3>Slider</h3>
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Edit</h3>
        </div>
        <form role="form" action="{{ route('admin.teams.update', $teamEdit->id) }}" method="POST" id="news_form"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <div class="error"></div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach(\App\Models\Team::lang as $lang)
                            <li class="nav-item">
                                <a class="nav-link @if($lang['value'] == 'hy') active @endif" data-toggle="tab"
                                   href="#{{$lang['value']}}">{{$lang['name']}}</a>
                            </li>
                        @endforeach
                   </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">

                                <!-- Նկարի վերբեռնման դաշտ -->
{{--                                <div id="image_field">--}}
{{--                                    <label for="image">Նկար վերբեռնել</label>--}}
{{--                                    <input type="file" id="image" name="img" class="form-control" accept=".jpeg,.jpg,.png,.webp,gif">--}}
{{--                                </div>--}}


                        <div><br>
{{--                            @php--}}
{{--                                $media = $teamEdit->getFirstMedia('teams'); // Ստանում ենք մեդիա օբյեկտը--}}

{{--                                $path = $media->getPath(); // Ստանում ենք ֆայլի ամբողջ ճանապարհը--}}

{{--                                $extension = pathinfo($path, PATHINFO_EXTENSION); // Ստանում ենք ընդարձակումը--}}

{{--                                if ($extension === 'gif') {--}}
{{--                                   $imgUrl = $teamEdit->getFirstMediaUrl('teams');--}}
{{--                                } else {--}}
{{--                                    $imgUrl = $teamEdit->getFirstMediaUrl('teams','mobile');--}}
{{--                                }--}}
                            @endphp
{{--                                 <img width="10%" style="max-height: 100px;" src="{{ $imgUrl }}" alt="">--}}

                           </div>


                        <div id="image_field">
                            <label for="image">Նկար վերբեռնել</label>
                            <input type="file" id="fileInputTeamEdit" name="img" class="form-control" accept=".jpeg,.jpg,.png,.webp,gif">
                        </div><br>

                        <!-- Image Preview, Loading Overlay, and Remove Icon -->
                        <div class="image-container">
                            <img id="imagePreview" src="#" alt="Image Preview" >
                            <div class="loading-overlay" id="loadingOverlay">Loading...</div>
                            @php
                                $media = $teamEdit->getFirstMedia('teams'); // Ստանում ենք մեդիա օբյեկտը

                                  $path = $media->getPath(); // Ստանում ենք ֆայլի ամբողջ ճանապարհը

                                  $extension = pathinfo($path, PATHINFO_EXTENSION); // Ստանում ենք ընդարձակումը

                                  if ($extension === 'gif') {
                                     $imgUrl = $teamEdit->getFirstMediaUrl('teams');
                                  } else {
                                      $imgUrl = $teamEdit->getFirstMediaUrl('teams','mobile');
                                  }
                            @endphp
                            <img id="imageEditTeams" src="{{ $imgUrl }}" alt="" style="width: 120px">
                        </div>

                        @foreach(\App\Models\Team::lang as $val)
                            <div id="{{$val['value']}}"
                                 class="tab-pane @if($val['value'] == 'hy') active @endif form-group"><br>
                                <div class="row">
                                    @foreach($teamEdit->localizations as $chunk)
                                        @if($chunk->lang == $val['value'])
                                            <div class="col-lg-3">

                                                <div class="d-flex" style="align-items: center; width: 500px;">
                                                    <label class="mr-2" for="exampleInputPassword1">1</label>
                                                    <input value="{{$chunk->name}}" type="name"
                                                           name="langs[{{$val['value']}}][name]"
                                                           class="form-control" placeholder="Enter Name">
                                                </div><br>

                                                <div class="d-flex" style="align-items: center; width: 500px;">
                                                    <label class="mr-2" for="exampleInputPassword1">2</label>
                                                    <input value="{{$chunk->position}}" type="text"
                                                           name="langs[{{$val['value']}}][position]"
                                                           class="form-control" placeholder="Enter Position">
                                                </div>

                                                <div class="col-lg-20" style="align-items: center; width: 500px;">
                                                    <label for=""></label>
                                                    <textarea name="langs[{{$val['value']}}][text]" rows="5" style="width: 120%"
                                                              placeholder="Enter Text "
                                                              class="form-control">{{$chunk->text}}</textarea>
                                                </div>

                                            </div>
                                        @endif
                                    @endforeach
                                    <input type="hidden" name="id" value="{{$teamEdit->id}}">
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
        const fileInput = document.getElementById('fileInputTeamEdit');
        const imagePreview = document.getElementById('imagePreview');
        const loadingOverlay = document.getElementById('loadingOverlay');
        const imageContainer = document.querySelector('.image-container');

        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                // Show loading overlay
                imageContainer.classList.add('loading-active');

                // Simulate file upload progress
                let progress = 0;
                const interval = setInterval(() => {
                    progress += 20; // Increase progress by 20% each step
                    loadingOverlay.textContent = `Loading ${progress}%`;

                    if (progress >= 100) {
                        clearInterval(interval); // Stop the interval
                        imageContainer.classList.remove('loading-active'); // Hide loading overlay

                        // Display the image
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                            imagePreview.style.display = 'block';
                        };
                        reader.readAsDataURL(file); // Read the file as a data URL
                    }
                }, 100); // Update progress every 100ms
            }
        });

        // Submit button functionality (without reloading the page)
        document.getElementById('submitBtn').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form submission or page reload
            alert('Submit button clicked!'); // Replace with your custom logic
        });
    </script>
@endsection
