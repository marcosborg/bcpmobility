<!-- ======= Header ======= -->
<header id="header" class="header fixed-top sticked" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <img src="/website/assets/img/logo.png" alt="">
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                @foreach ($menus as $item)
                <li><a class="nav-link scrollto" href="{{ $item->link }}">{{ $item->name }}</a></li>
                @endforeach
                <a class="btn-getstarted scrollto" href="index.html#contact">Contacts</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-globe"></i>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach (\App\Models\Lang::all() as $item)
                        <li><a class="dropdown-item text-uppercase" href="#">{{ $item->code }}</a></li>
                        @endforeach
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle d-none"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->