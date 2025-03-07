<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<style>
    .nav-sidebar .nav-item img.nav-icon {
        margin-right: 10px;
        border-radius: 50%;
        object-fit: cover;
    }

</style>

<style>
    body {
        font-family: Arial, sans-serif;
    }
    .sidebar {
        width: 250px;
        background: #343a40;
        padding: 10px;
        color: white;
    }
    .nav-item {
        list-style: none;
        margin: 5px 0;
    }
    .nav-link-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        color: white;
        text-decoration: none;
        background: #495057;
        border-radius: 5px;
        cursor: pointer;
    }
    .nav-link-container:hover {
        background: #6c757d;
    }
    .nav-icon {
        margin-right: 10px;
    }
    .nav-treeview {
        display: none;
        padding-left: 20px;
    }
    .show {
        display: block;
    }
    .arrow {
        cursor: pointer;
        padding-left: 10px;
        color: white;
    }
    .arrow i {
        transition: transform 0.3s;
    }
    .rotate {
        transform: rotate(90deg);
    }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
        <img src="{{ asset('watermark-logo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Termoprotect</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <!-- Մենյու 1 -->
{{--            <li class="nav-item">--}}
{{--                <div class="nav-link-container">--}}
{{--                    <a href="menu1.html" style="display: flex; align-items: center; text-decoration: none; color: white;">--}}
{{--                        <img src="https://img.icons8.com/?size=100&id=17773&format=png&color=000000" class="nav-icon img-circle elevation-2" style="width: 25px; height: 25px;">--}}
{{--                        Հիմնական Մենյու 1--}}
{{--                    </a>--}}
{{--                    <i class="fas fa-angle-right arrow" onclick="toggleMenu(event, 'menu1')"></i>--}}
{{--                </div>--}}
{{--                <ul class="nav nav-treeview" id="menu1">--}}
{{--                    <!-- Ենթամենյու 1 -->--}}
{{--                    <li class="nav-item">--}}
{{--                        <div class="nav-link-container">--}}
{{--                            <a href="submenu1.html" style="display: flex; align-items: center; text-decoration: none; color: white;">--}}
{{--                                <img src="https://img.icons8.com/?size=100&id=21622&format=png&color=000000" class="nav-icon img-circle elevation-2" style="width: 20px; height: 20px;">--}}
{{--                                Ենթամենյու 1--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <!-- Ենթամենյու 2 -->--}}
{{--                    <li class="nav-item">--}}
{{--                        <div class="nav-link-container">--}}
{{--                            <a href="submenu2.html" style="display: flex; align-items: center; text-decoration: none; color: white;">--}}
{{--                                <img src="https://img.icons8.com/?size=100&id=21622&format=png&color=000000" class="nav-icon img-circle elevation-2" style="width: 20px; height: 20px;">--}}
{{--                                Ենթամենյու 2--}}
{{--                            </a>--}}
{{--                            <i class="fas fa-angle-right arrow" onclick="toggleMenu(event, 'submenu2')"></i>--}}
{{--                        </div>--}}
{{--                        <ul class="nav nav-treeview" id="submenu2">--}}
{{--                            <!-- Պրոդուկտ 1 -->--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="product1.html" class="nav-link-container">--}}
{{--                                    <img src="https://img.icons8.com/?size=100&id=AFoK9T6aQlKa&format=png&color=000000" class="nav-icon img-circle elevation-2" style="width: 18px; height: 18px;">--}}
{{--                                    Պրոդուկտ 1--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <!-- Պրոդուկտ 2 -->--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="product2.html" class="nav-link-container">--}}
{{--                                    <img src="https://img.icons8.com/?size=100&id=AFoK9T6aQlKa&format=png&color=000000" class="nav-icon img-circle elevation-2" style="width: 18px; height: 18px;">--}}
{{--                                    Պրոդուկտ 2--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

        <!-- Մենյու 2 -->
            <li class="nav-item">
                <div class="nav-link-container">
                    <a href="{{route('admin.menus.index')}}" style="display: flex; align-items: center; text-decoration: none; color: white;">
                        <img src="https://img.icons8.com/?size=100&id=17773&format=png&color=000000" class="nav-icon img-circle elevation-2" style="width: 25px; height: 25px;">
                        Հիմնական Մենյու
                    </a>
                </div>
            </li>

            @foreach($menuSideBar as $menu)
                @php
                    $menuTranslation = $menu->localizations->where('lang', 'hy')->first();

                @endphp

                @if($menuTranslation)
                    <li class="nav-item">
                        <div class="nav-link-container">
                            <a href="{{ route('admin.menus.show', $menu->id) }}" style="display: flex; align-items: center; text-decoration: none; color: white;">
                                <img src="{{$menu->getFirstMediaUrl('menu','mobile') }}" class="nav-icon img-circle elevation-2" style="width: 25px; height: 25px;">
                                {{ $menuTranslation->title }}
                            </a>
                            @if($menu->children->count() > 0)
                                <i class="fas fa-angle-right arrow" onclick="toggleMenu(event, 'menu-{{ $menu->id }}')"></i>
                            @endif
                        </div>

                        @if($menu->children->count() > 0)

                            <ul class="nav nav-treeview" id="menu-{{ $menu->id }}">

                                @foreach($menu->children as $submenu)
                                    @php
                                        $submenuTranslation = $submenu->localizations->where('lang', 'hy')->first();
                                    @endphp

                                    @if($submenuTranslation)
                                        <li class="nav-item">
                                            <div class="nav-link-container">
                                                <a href="{{ route('admin.products.show', $submenu->id) }}" style="display: flex; align-items: center; text-decoration: none; color: white;">
                                                    <img src="{{$submenu->getFirstMediaUrl('menu','mobile') }}" class="nav-icon img-circle elevation-2" style="width: 20px; height: 20px;">
                                                    {{ $submenuTranslation->title }}
                                                </a>
                                                @if($submenu->children->count() > 0)
                                                    <i class="fas fa-angle-right arrow" onclick="toggleMenu(event, 'submenu-{{ $submenu->id }}')"></i>
                                                @endif
                                            </div>

                                                <ul class="nav nav-treeview" id="submenu-{{ $submenu->id }}">
                                                    @foreach($submenu->children as $product)
                                                        @php
                                                            $productTranslation = $product->localization->where('lang', 'hy')->first();
                                                        @endphp

                                                        @if($productTranslation)
                                                            <li class="nav-item">

                                                                <a href="{{ route('admin.products.show', $product->id) }}" class="nav-link-container">
                                                                    <img src="{{ $product->image ?? 'default.png' }}" class="nav-icon img-circle elevation-2" style="width: 18px; height: 18px;">
                                                                    {{ $productTranslation->title }}
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>

                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </li>
            @endif
        @endforeach





            <li class="nav-item">
                <div class="nav-link-container">
                    <a href="{{ route('admin.slider') }}" style="display: flex; align-items: center; text-decoration: none; color: white;">
                        <i class="nav-icon fa fa-icons"></i>
                            Slider
                    </a>
                </div>
            </li>

            <li class="nav-item">
                <div class="nav-link-container">
                    <a href="{{ route('admin.about') }}" style="display: flex; align-items: center; text-decoration: none; color: white;">
                        <i class="nav-icon fa fa-question-circle"></i>
                        About
                    </a>
                </div>
            </li>

            <li class="nav-item">
                <div class="nav-link-container">
                    <a href="{{ route('admin.teams.index') }}" style="display: flex; align-items: center; text-decoration: none; color: white;">
                        <i class="nav-icon fa fa-question-circle"></i>
                        Teams
                    </a>
                </div>
            </li>

            <li class="nav-item">
                <div class="nav-link-container">
                    <a href="{{ route('admin.lawyer') }}" style="display: flex; align-items: center; text-decoration: none; color: white;">
                        <i class="nav-icon fa fa-question-circle"></i>
                        Lawyer
                    </a>
                </div>
            </li>

            <li class="nav-item">
                <div class="nav-link-container">
                    <a href="{{ route('admin.partners.index') }}" style="display: flex; align-items: center; text-decoration: none; color: white;">
                        <i class="nav-icon fa fa-question-circle"></i>
                        Partners
                    </a>
                </div>
            </li>

            <li class="nav-item">
                <div class="nav-link-container">
                    <a href="{{ route('admin.default.data') }}" style="display: flex; align-items: center; text-decoration: none; color: white;">
                        <i class="nav-icon fa fa-question-circle"></i>
                        Default Data
                    </a>
                </div>
            </li>

            <li class="nav-item">
                <div class="nav-link-container">
                    <a href="{{ route('admin.home.seo.edit') }}" style="display: flex; align-items: center; text-decoration: none; color: white;">
                        <i class="nav-icon fa fa-question-circle"></i>
                        Home Seo
                    </a>
                </div>
            </li>


            <li class="nav-item">
                <div class="nav-link-container">
                    <a href="{{ route('admin.contact.seo.edit') }}" style="display: flex; align-items: center; text-decoration: none; color: white;">
                        <i class="nav-icon fa fa-question-circle"></i>
                        Contact Seo
                    </a>
                </div>
            </li>

        </nav>





        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->


</aside>

<script>
    function toggleMenu(event, menuId) {
        event.stopPropagation(); // Չի թողնում, որ հղումը բացվի սլաք սեղմելուց
        let menu = document.getElementById(menuId);
        let arrow = event.target; // Սլաքի վրա կատարվող փոփոխություն
        menu.classList.toggle("show");
        arrow.classList.toggle("rotate"); // Սլաքը պտտվում է բացվելիս
    }
</script>



