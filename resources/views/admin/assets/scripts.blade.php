<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('dashboard/dist/js/adminlte.js') }}"></script>


<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dashboard/dist/js/demo.js') }}"></script>

<!-- Custom Scripts -->
<script src="{{ asset('dashboard/dist/js/custom.js') }}"></script>



<!-- Bootstrap 4 -->
{{--<script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}
{{--<!-- AdminLTE App -->--}}
{{--<script src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"></script>--}}
{{--<!-- Summernote -->--}}
{{--<script src="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>--}}
{{--<!-- CodeMirror -->--}}
{{--<script src="{{ asset('dashboard/plugins/codemirror/codemirror.js') }}"></script>--}}
{{--<script src="{{ asset('dashboard/plugins/codemirror/mode/css/css.js') }}"></script>--}}
{{--<script src="{{ asset('dashboard/plugins/codemirror/mode/xml/xml.js') }}"></script>--}}
{{--<script src="{{ asset('dashboard/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>--}}

{{--<!-- AdminLTE for demo purposes -->--}}
{{--<script src="{{ asset('dashboard/dist/js/demo.js') }}"></script>--}}

{{--<script src="{{ asset('dashboard/dist/js/custom/product.js') }}"></script>--}}

<script>
    const fileInput = document.getElementById('fileInputBaner');
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
@yield('js')
