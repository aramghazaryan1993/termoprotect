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
        max-width: 50%;
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
    #fileInput:hover {
        cursor: pointer;
        opacity: 0.8;
    }
</style>

@section('content')
    <h3>Team</h3>
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Create</h3>
        </div>
        <form role="form" action="{{ route('admin.teams.store') }}" method="post" enctype="multipart/form-data">

            @csrf

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
                    <div class="tab-content"><br>
                                <!-- Նկարի վերբեռնման դաշտ -->
                                <div id="image_field">
                                    <label for="image">Նկար վերբեռնել</label>
                                    <input type="file" id="fileInput" name="img" class="form-control">
                                </div><br>

                        <div class="image-container">
                            <img id="imagePreview" src="#" alt="Image Preview">
                            <div class="loading-overlay" id="loadingOverlay">Loading...</div>
                        </div>


                        @foreach(\App\Models\Team::lang as $val)
                            <div  id="{{$val['value']}}"
                                 class="tab-pane @if($val['value'] == 'hy') active @endif form-group"><br>
                                <div class="row">
                                    <div class="col-lg-3">

                                        <div class="d-flex" style="align-items: center; width: 500px;">
                                            <label class="mr-2" for="exampleInputPassword1">1</label>
                                            <input type="text" name="langs[{{$val['value']}}][name]"
                                                   class="form-control" placeholder="Enter Name"
                                                   value="{{ old('langs.' . $val['value'] . '.name') }}">
                                        </div><br>

                                        <div class="d-flex" style="align-items: center; width: 500px;">
                                            <label class="mr-2" for="exampleInputPassword1">2</label>
                                            <input type="text" name="langs[{{$val['value']}}][position]"
                                                   class="form-control" placeholder="Enter Position"
                                                   value="{{ old('langs.' . $val['value'] . '.position') }}">
                                        </div>

                                        <div class="col-lg-20" style="align-items: center; width: 500px; display:none">
                                            <label for=""></label>
                                            <textarea name="langs[{{$val['value']}}][text]" rows="5" style="width: 120%"
                                                      placeholder="Enter Text "
                                                      class="form-control">{{ old('langs.' . $val['value'] . '.text') }}</textarea>
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
        const fileInput = document.getElementById('fileInput');
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
