
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}">
<!-- IonIcons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dashboard/dist/css/adminlte.min.css') }}">

<!-- Custom style -->
@yield('css')
<link rel="stylesheet" href="{{ asset('dashboard/dist/css/custom.css') }}">

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
        margin-top: 20px;
        max-width: 100%;
        height: auto;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: none; /* Hidden by default */
    }
    #imageB {
        margin-top: 20px;
        max-width: 100%;
        height: auto;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }


    /* File input hover effect */
    #fileInputBaner:hover {
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
        /*background-color: rgba(0, 0, 0, 0.5); !* Semi-transparent black *!*/
        display: flex;
        align-items: center;
        justify-content: center;
        /*color: white;*/
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
        /*background-color: #ff4d4d; !* Red color *!*/
        /*color: white;*/
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
    #fileInputBaner:hover {
        cursor: pointer;
        opacity: 0.8;
    }

    .image-container {
        position: relative;
        display: inline-block;
        margin: 10px;
        text-align: center;
        transition: all 0.3s ease-in-out;
    }
    .image-container img {
        width: 100px;
        height: auto;
        border-radius: 5px;
        transition: transform 0.3s ease;
    }
    .image-container:hover img {
        transform: scale(1.1);
        opacity: 0.7;
    }
    .action-buttons {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: none;
    }
    .image-container:hover .action-buttons {
        display: block;
    }
    .btn {
        /*background-color: rgba(0, 0, 0, 0.7);*/
        /*color: white;*/
        border: none;
        cursor: pointer;
        padding: 5px 8px;
        margin: 3px;
        border-radius: 5px;
    }
    .btn:hover {
        /*background-color: rgba(0, 0, 0, 1);*/
    }
</style>
