<div class="top-header py-2">
    <div class="container-fluid">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-4 left-info d-lg-flex d-none align-items-center flex-wrap">
                <ul class="list-unstyled m-0 p-0 d-flex align-items-center gap-lg-4 gap-0 flex-wrap">
                    <li><p class="m-0 p-md"><a href="mailto:info@solasaver.com" class="text-white"> <i class="fa-solid fa-envelope me-2 primary-color"></i>info@solasaver.com</a></p></li>
                    <li><p class="m-0 p-md"><a href="tel:+012482482481" class="text-white"> <i class="fa-solid fa-phone me-2 primary-color"></i>+01 248 248 2481</a></p></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 col-12 center-info text-uppercase text-center text-white">
                <p class="m-0">Free Shipping Australia Wide</p>
            </div>
            <div class="col-lg-4 col-md-6 col-12 right-info">
                <ul class="list-unstyled m-0 p-0 d-flex align-items-center justify-content-md-end justify-content-center gap-4">
                    <li><p class="m-0 p-md"><a href="mailto:info@solasaver.com" class="text-white">Installers / Trade <i class="fa-solid fa-circle-user ms-2 primary-color"></i></a></p></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="main-header bg-white rounded-4 shadow-sm">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-xl px-4">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('img/SolaSaver Logo.svg') }}" class="sitelogo" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav mx-auto gap-lg-4">
                    <li class="nav-item">
                        <a class="nav-link p secondary-color {{ Route::is('home') ? 'active fw-bold text-success' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                   
                    <a class="nav-link p secondary-color {{ Route::is('public.why-choose-us') ? 'active fw-bold text-success' : '' }}" href="{{ route('public.why-choose-us') }}">Why Choose Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p secondary-color {{ Route::is('compatibility') ? 'active fw-bold text-success' : '' }}" href="{{ route('compatibility') }}">System Compatibility</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p secondary-color {{ Route::is('public.faq') ? 'active fw-bold text-success' : '' }}" href="{{ route('public.faq') }}">Order and Product Questions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p secondary-color {{ Route::is('public.where-to-buy') ? 'active fw-bold text-success' : '' }}" href="{{ route('public.where-to-buy') }}">Where to Buy</a>
                    </li>
                </ul>
                
                <div class="d-flex align-items-center gap-3 me-2 mt-2 mt-xl-0">
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="d-inline m-0">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-link text-danger text-decoration-none fw-semibold">Log Out</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-decoration-none small fw-semibold text-secondary hover:text-dark">Log In</a>
                        <a href="{{ route('register') }}" class="btn btn-dark btn-sm fw-semibold px-3 py-1.5 rounded-3 text-white" style="background-color: #1e293b;">Sign Up</a>
                    @endauth
                </div>

                <a href="#" class="cbtn mt-2 mt-xl-0">Contact Us <i class="fa-solid fa-arrow-right ms-1"></i></a>
            </div>
        </nav>
    </div>
</div>