<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid justify-content-between">
        <!-- Left elements -->
        <div class="col d-flex">
            <!-- Brand -->
            <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="#">
                <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="20" alt="MDB Logo"
                    loading="lazy" style="margin-top: 2px;" />
            </a>

            <!-- Search form -->
            <form class="input-group w-auto my-auto d-none d-sm-flex">
                <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search"
                    style="min-width: 125px;" />
                <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search"></i></span>
            </form>
        </div>
        <!-- Left elements -->

        <!-- Center elements -->
        <ul class="col navbar-nav flex-row d-none d-md-flex">
            <li class="nav-item me-3 me-lg-1 active">
                <a class="nav-link" href="#">
                    <span><i class="fas fa-home fa-lg"></i></span>
                    <span class="badge rounded-pill badge-notification bg-danger">1</span>
                </a>
            </li>

            <li class="nav-item me-3 me-lg-1">
                <a class="nav-link" href="#">
                    <span><i class="fas fa-flag fa-lg"></i></span>
                </a>
            </li>

            <li class="nav-item me-3 me-lg-1">
                <a class="nav-link" href="#">
                    <span><i class="fas fa-video fa-lg"></i></span>
                </a>
            </li>

            <li class="nav-item me-3 me-lg-1">
                <a class="nav-link" href="#">
                    <span><i class="fas fa-shopping-bag fa-lg"></i></span>
                </a>
            </li>

            <li class="nav-item me-3 me-lg-1">
                <a class="nav-link" href="#">
                    <span><i class="fas fa-users fa-lg"></i></span>
                    <span class="badge rounded-pill badge-notification bg-danger">2</span>
                </a>
            </li>
        </ul>
        <!-- Center elements -->

        <!-- Right elements -->
        <ul class=" navbar-nav flex-row">

            @auth
            <li class="nav-item me-3 me-lg-1">
                <a class="nav-link d-sm-flex align-items-sm-center" href="#">
                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/1.webp" class="rounded-circle" height="22"
                        alt="Black and White Portrait of a Man" loading="lazy" />
                    <strong class="d-none d-sm-block ms-1">John</strong>
                </a>
            </li>
            <li class="nav-item me-3 me-lg-1">
                <a class="nav-link" href="#">
                    <span><i class="fas fa-plus-circle fa-lg"></i></span>
                </a>
            </li>
            <li class="nav-item dropdown me-3 me-lg-1">
                <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-comments fa-lg"></i>

                    <span class="badge rounded-pill badge-notification bg-danger">6</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown me-3 me-lg-1">
                <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell fa-lg"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">12</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown me-3 me-lg-1">
                <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-chevron-circle-down fa-lg"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>
            </li>



        @else

        <a href="{{ route('login') }}" class="btn btn-primary btn-lg active m" role="button" aria-pressed="true">login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">register</a>

        {{-- <li class="nav-item me-3 me-lg-1">
            <a class="nav-link" href="{{ route('login') }}">
                <span><i class="fa-solid fa-right-to-bracket"></i></span>
            </a>
        </li>
        <li class="nav-item me-3 me-lg-1">
            <a class="nav-link" href="{{ route('register') }}">
                <span><i class="fas fa-plus-circle fa-lg"></i></span>
            </a>
        </li> --}}
        @endauth
        </ul>
        <!-- Right elements -->
    </div>
</nav>
<!-- Navbar -->
