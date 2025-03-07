@extends('layouts.app-admin')

<!-- summernote -->
<link rel="stylesheet" href="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.css') }}">
<!-- tags Input -->
<link href="{{ asset('dashboard/plugins/tagsinput/tagsinput.min.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard/dist/css/custom/news_partner.css') }}" rel="stylesheet">
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/tagsinput/jquery.tagsinput.min.js') }}"></script>
@section('content')

    <h3>Product</h3>
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Edit</h3>
        </div>
        <form  role="form" action="{{ route('admin.products.update',$product->id) }}" method="post" id="uploadForm" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <div class="error"></div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach(\App\Models\Product::lang as $lang)
                            <li class="nav-item">
                                <a class="nav-link @if($lang['value'] == 'hy') active @endif" data-toggle="tab" href="#{{$lang['value']}}">{{$lang['name']}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="d-flex" style="align-items: center">
                            <label class="mr-2" for="exampleInputPassword1">Image</label>
                            <input  type="file" name="img[]" class="form-control"  id="fileInput" multiple>
                            <input type="hidden" name="submenu_id" value="{{$product->menu_id}}">
                        </div><br>

                        <!-- Preview and Progress Container -->
                        <div id="previewContainer"></div>
                        <div id="uploadedImages">
                            @foreach($product->getMedia('product')->unique('id') as $image)
                                <div class="image-container" id="img-{{ $image->id }}">
                                    <img src="{{ $image->getUrl('mobile') }}" alt="About Image">
                                    <div class="action-buttons">
                                        <button class="btn delete-btn" data-id="{{ $image->id }}">❌</button>
{{--                                        <button class="btn set-main-btn" data-id="{{ $image->id }}">⭐</button>--}}
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        @foreach(\App\Models\Product::lang as $val)
                            <div id="{{$val['value']}}" class="tab-pane @if($val['value'] == 'hy') active @endif form-group"><br>
                                <div class="row">
                                    @foreach($product->localizations as $chunk)
                                        @if($chunk->lang == $val['value'] )
                                            <div class="col-lg-3">
                                                <div class="d-flex" style="align-items: center">
                                                    <label class="mr-2" for="exampleInputPassword1">Title</label>
                                                    <input value="{{$chunk->title}}" type="text" name="langs[{{$val['value']}}][title]" class="form-control" placeholder="Enter name" >
                                                </div>
                                                <br>

                                                <div class="col-lg-20 form-group" style="align-items: center; width: 500px;">
                                                    <label for="">Description</label>
                                                    <textarea name="langs[{{$val['value']}}][text]" rows="5" style="width: 120%"
                                                              placeholder="Enter  Description"
                                                              class="form-control">{{$chunk->text}}</textarea>
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
                                    <input type="hidden" name="id" value="{{$product->id}}">
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

                    fetch("{{ route('admin.product.removeImage') }}", {
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

                    fetch("{{ route('admin.product.setMainImage') }}", {
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
@endsection
