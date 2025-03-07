<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.components.head')
    @include('admin.assets.styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
@include('admin.components.header')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('admin.components.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper p-3">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            @include('admin.components.info')
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
    @yield('content')
    <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    @include('admin.components.footer')

</div>
@include('admin.assets.scripts')
</body>
</html>
