@extends('layouts.app-admin')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.css') }}">

<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Add these in your HTML head section -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


@section('content')

    <h3>About</h3>
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Edit</h3>
        </div>
        <form  role="form" action="{{ route('admin.about.update') }}" method="post" id="uploadForm" enctype="multipart/form-data">

            @csrf
            <div class="card-body">
                <div class="form-group">
                    <div class="error"></div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach(\App\Models\About::lang as $lang)
                            <li class="nav-item">
                                <a class="nav-link @if($lang['value'] == 'hy') active @endif" data-toggle="tab" href="#{{$lang['value']}}">{{$lang['name']}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="d-flex" style="align-items: center">
                        <label class="mr-2" for="fileInputBaner">Image Banner</label>
                        <input type="file" name="img_baner" class="form-control" id="fileInputBaner" accept="image/*">
                    </div><br>

                        <!-- Image Preview, Loading Overlay, and Remove Icon -->
                        <div class="image-container">
                            <img id="imagePreview" src="#" alt="Image Preview">
                            <div class="loading-overlay" id="loadingOverlay">Loading...</div>
                            @php
                                $media = $about->getFirstMedia('about_banner'); // Ստանում ենք մեդիա օբյեկտը

                                $path = $media->getPath(); // Ստանում ենք ֆայլի ամբողջ ճանապարհը

                                $extension = pathinfo($path, PATHINFO_EXTENSION); // Ստանում ենք ընդարձակումը

                                if ($extension === 'gif') {
                                   $imgUrl = $about->getFirstMediaUrl('about_banner');
                                } else {
                                    $imgUrl = $about->getFirstMediaUrl('about_banner','mobile');
                                }
                            @endphp
                            <img id="imageB" src="{{ $imgUrl }}" alt="" style="width: 100px">
                        </div>


                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="d-flex" style="align-items: center">
                            <label class="mr-2" for="exampleInputPassword1">Image</label>
                            <input  type="file" name="img[]" class="form-control"  id="fileInput" multiple>
                            <input type="hidden" name="delete_img" value="storage/{{$about->img}}">
                        </div><br>

                        <!-- Preview and Progress Container -->
                        <div id="previewContainer"></div>
                        <div id="uploadedImages">
                            @foreach($about->getMedia('about')->unique('id') as $image)
                                <div class="image-container" id="img-{{ $image->id }}">
                                    <img src="{{ $image->getUrl('mobile') }}" alt="About Image">
                                    <div class="action-buttons">
                                        <button class="btn delete-btn" data-id="{{ $image->id }}">❌</button>
{{--                                        <button class="btn set-main-btn" data-id="{{ $image->id }}">⭐</button>--}}
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    @foreach(\App\Models\About::lang as $val)
                            <div id="{{$val['value']}}" class="tab-pane @if($val['value'] == 'hy') active @endif form-group"><br>
                                <div class="row">
                                    @foreach($about->localizations as $chunk)
                                        @if($chunk->lang == $val['value'] && !empty($chunk->title))
                                            <div class="col-lg-3">
                                                <div class="d-flex" style="align-items: center">
                                                    <label class="mr-2" for="exampleInputPassword1">Title</label>
                                                    <input value="{{$chunk->title}}" type="text" name="langs[{{$val['value']}}][title]" class="form-control" placeholder="Enter name" >
                                                </div>
                                                    <br>

{{--                                                <div class="col-lg-20" style="align-items: center; width: 500px;">--}}
{{--                                                    <label for="">Description</label>--}}
{{--                                                    <textarea rows="5"  name="langs[{{$val['value']}}][text]"   rows="5" style="width: 120%"   placeholder="Enter Seo Description" class="form-control">{{$chunk->text}}</textarea>--}}
{{--                                                </div>--}}

                                                <div class="col-5 form-group">
                                                    <div class="card-body" style="align-items: center; width: 1000px;">
                                                        <label>Description</label>
                                                        <textarea class="summernote" name="langs[{{$val['value']}}][text]" >{{$chunk->text}}</textarea>
                                                    </div>
                                                </div>


                                                <div class="col-20">
                                                    <label for="">SEO Slug</label>
                                                    <input value="{{$chunk->slug}}" type="text" name="langs[{{$val['value']}}][slug]" class="form-control" placeholder="Enter Seo Slug">
                                                </div>

                                                <div class="col-20">
                                                    <label for="">SEO Title</label>
                                                    <input value="{{$chunk->seo_title}}" type="text" name="langs[{{$val['value']}}][seo_title]" class="form-control" placeholder="Enter Seo Title">
                                                </div>

                                                <div class="col-lg-20" style="align-items: center; width: 500px;">
                                                    <label for="">SEO Description</label>
                                                    <textarea name="langs[{{$val['value']}}][seo_description]"   rows="5" style="width: 120%"   placeholder="Enter Seo Description" class="form-control">{{$chunk->seo_description}}</textarea>
                                                </div>

                                                <div class="col-lg-20" style="align-items: center; width: 500px;">
                                                    <label for="">SEO Keyword</label>
                                                    <textarea name="langs[{{$val['value']}}][seo_keyword]"   rows="5" style="width: 120%"   placeholder="Enter Seo Keyword " class="form-control">{{$chunk->seo_keyword}}</textarea>
                                                </div>

                                            </div>
                                        @endif
                                    @endforeach
                                    <input type="hidden" name="id" value="{{$about->id}}">
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

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dashboard/dist/js/demo.js') }}"></script>
    <script src="{{ asset('dashboard/dist/js/custom/news.js') }}"></script>

    <script>
        let selectedFiles = []; // Պահպանում ենք ընտրված ֆայլերը

        document.getElementById("fileInput").addEventListener("change", function (event) {
            let previewContainer = document.getElementById("previewContainer");

            Array.from(event.target.files).forEach((file, index) => {
                let fileId = selectedFiles.length; // Ամեն նոր ֆայլ ստանում է իր եզակի ID
                selectedFiles.push(file); // Պահպանում ենք ֆայլը, որ չկորցնենք

                let reader = new FileReader();

                let previewDiv = document.createElement("div");
                previewDiv.classList.add("image-preview");
                previewDiv.setAttribute("id", "file-" + fileId);

                previewDiv.innerHTML = `
            <img id="img-${fileId}" src="" alt="Preview">
            <button class="remove-btn" onclick="removeImage(${fileId})">X</button>
            <div class="progress">
                <div id="progress-${fileId}" class="progress-bar"></div>
            </div>
            <span id="percent-${fileId}">0%</span>
        `;
                previewContainer.appendChild(previewDiv);

                reader.onload = function (e) {
                    document.getElementById("img-" + fileId).src = e.target.result;
                };
                reader.readAsDataURL(file);

                let progressBar = document.getElementById("progress-" + fileId);
                let percentText = document.getElementById("percent-" + fileId);
                let progress = 0;

                let interval = setInterval(() => {
                    if (progress >= 100) {
                        clearInterval(interval);
                    } else {
                        progress += 10;
                        progressBar.style.width = progress + "%";
                        percentText.innerText = progress + "%";
                    }
                }, 200);
            });

            updateFileInput(); // Թարմացնում ենք input-ը նոր ֆայլերով
        });

        // 🔴 **Նկարը հեռացնելու ֆունկցիա (առանց սխալների)**
        function removeImage(fileId) {
            document.getElementById("file-" + fileId).remove(); // Ջնջում ենք preview-ն
            selectedFiles[fileId] = null; // Ֆայլը NULL ենք դնում, որ Input-ում չմնա
            selectedFiles = selectedFiles.filter(file => file !== null); // Ջնջում ենք NULL արժեքները
            updateFileInput(); // Թարմացնում ենք input-ը
        }

        // 🔄 **Input-ը թարմացնելու ֆունկցիա**
        function updateFileInput() {
            let dataTransfer = new DataTransfer(); // Ստեղծում ենք նոր input ֆայլերի համար
            selectedFiles.forEach(file => dataTransfer.items.add(file));
            document.getElementById("fileInput").files = dataTransfer.files;
        }
    </script>

    {{--Image List--}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".delete-btn").forEach(button => {
                button.addEventListener("click", function (event) {
                    event.preventDefault(); // Կանխում ենք էջի reload-ը
                    let imageId = this.getAttribute("data-id");

                    fetch("{{ route('admin.about.removeImage') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({ image_id: imageId })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                let imgElement = document.getElementById("img-" + imageId);
                                imgElement.style.opacity = "0";
                                imgElement.style.transform = "scale(0.8)";
                                setTimeout(() => {
                                    imgElement.remove();
                                }, 300);
                            } else {
                                alert("Failed to delete image.");
                            }
                        });
                });
            });

            document.querySelectorAll(".set-main-btn").forEach(button => {
                button.addEventListener("click", function (event) {
                    event.preventDefault(); // Կանխում ենք էջի reload-ը
                    let imageId = this.getAttribute("data-id");

                    fetch("{{ route('admin.about.setMainImage') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({ image_id: imageId })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert("Main image updated!");
                            } else {
                                alert("Failed to set main image.");
                            }
                        });
                });
            });
        });

    </script>

    <script>
        // const fileInput = document.getElementById('fileInputBaner');
        // const imagePreview = document.getElementById('imagePreview');
        // const loadingOverlay = document.getElementById('loadingOverlay');
        // const imageContainer = document.querySelector('.image-container');
        //
        // fileInput.addEventListener('change', function(event) {
        //     const file = event.target.files[0];
        //     if (file) {
        //         // Show loading overlay
        //         imageContainer.classList.add('loading-active');
        //
        //         // Simulate file upload progress
        //         let progress = 0;
        //         const interval = setInterval(() => {
        //             progress += 20; // Increase progress by 20% each step
        //             loadingOverlay.textContent = `Loading ${progress}%`;
        //
        //             if (progress >= 100) {
        //                 clearInterval(interval); // Stop the interval
        //                 imageContainer.classList.remove('loading-active'); // Hide loading overlay
        //
        //                 // Display the image
        //                 const reader = new FileReader();
        //                 reader.onload = function(e) {
        //                     imagePreview.src = e.target.result;
        //                     imagePreview.style.display = 'block';
        //                 };
        //                 reader.readAsDataURL(file); // Read the file as a data URL
        //             }
        //         }, 100); // Update progress every 100ms
        //     }
        // });
        //
        // // Submit button functionality (without reloading the page)
        // document.getElementById('submitBtn').addEventListener('click', function(event) {
        //     event.preventDefault(); // Prevent form submission or page reload
        //     alert('Submit button clicked!'); // Replace with your custom logic
        // });
    </script>
@endsection
