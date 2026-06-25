<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->meta_title ?: $page->title }}</title>
    @if($page->meta_description)<meta name="description" content="{{ $page->meta_description }}">@endif
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>

    <header class="sticky-header px-6 pb-3 pb-lg-0">
        @include('layouts.public-header')
    </header>

    @php
        $hero    = $page->section('hero');
        $how     = $page->section('how_works');
        $useMore = $page->section('use_more');
        $findOut = $page->section('find_out');
    @endphp

    <!-- Page Hero -->
    @if($hero && $hero->is_active)
    <section class="page-hero bg-light py-3">
        <div class="container mt-lg-5 pt-lg-5">
            <h1 class="fw-bold my-0 text-center text-white pt-lg-5 mt-lg-5">{!! $hero->formatted_heading !!}</h1>
            <p class="text-white text-center mt-3 p-xl">{{ $hero->body }}</p>
        </div>
    </section>
    @endif

    <!-- How SolaSaver Works -->
    @if($how && $how->is_active)
    <section class="hsw bg-white px-6 py-5">
        <div class="container-fluid pb-lg-5 pt-5 my-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-7 col-12 text-col pe-lg-5 pt-lg-0 pt-3 order-lg-1 order-2">
                    <div class="pe-lg-5">
                        <h2 class="fw-bold my-0">{!! $how->formatted_heading !!}</h2>
                        <h6 class="fw-semibold mt-md-2 mb-md-3 mt-1 mb-2">{{ $how->subheading }}</h6>
                        @foreach(explode("\n", $how->body) as $para)
                            @if(trim($para) !== '')<p class="mb-1">{{ trim($para) }}</p>@endif
                        @endforeach
                        <div class="btn-group d-flex flex-column flex-sm-row gap-3 mt-4">
                            @if($how->button_text)
                                <a href="{{ $how->button_url }}" class="cbtn">{{ $how->button_text }} <i class="fa-solid fa-arrow-right ms-1"></i></a>
                            @endif
                            @if($how->button_text2)
                                <a href="{{ $how->button_url2 }}" class="cbtn">{{ $how->button_text2 }} <i class="fa-solid fa-arrow-right ms-1"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-12 img-bol order-lg-2 order-1">
                    <img src="{{ $how->image_url }}" class="w-100" alt="hsw-right-img">
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Use More of Your Solar -->
    @if($useMore && $useMore->is_active)
    <section class="usemore bg-white px-6 mb-5">
        <div class="container-fluid py-lg-5 my-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12 pe-lg-5 text-col">
                    <div class="pe-lg-5">
                        <h2 class="fw-bold mt-0 mb-lg-4 mb-2">{!! $useMore->formatted_heading !!}</h2>
                        @foreach(explode("\n", $useMore->body) as $para)
                            @if(trim($para) !== '')<p class="mb-1 p-xl">{{ trim($para) }}</p>@endif
                        @endforeach
                    </div>
                </div>
                @foreach($useMore->items as $item)
                <div class="col-lg-3 col-md-6 col-12 box-col">
                    <div class="iconbox">
                        <div class="iconimgbox">
                            <img src="{{ $item->icon_url }}" alt="{{ $item->heading }}">
                        </div>
                        <h4 class="fw-medium my-3 text-center secondary-color">{{ $item->heading }}</h4>
                        <p class="m-0 text-center">{{ $item->body }}</p>
                        @if($item->link_text)
                        <p class="text-center m-0 mt-4">
                            <a href="{{ $item->link_url }}" class="boxlink secondary-color fw-medium position-relative">{{ $item->link_text }} <i class="fa-solid fa-arrow-right ms-1"></i></a>
                        </p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Find Out / Compatible -->
    @if($findOut && $findOut->is_active && $findOut->items->isNotEmpty())
    <section class="findout bg-dark px-6 text-white">
        <div class="container">
            @foreach($findOut->items as $item)
            <div class="py-4">
                <div class="row align-items-center py-5">
                    @if($loop->first)
                        {{-- first block: image left, text right --}}
                        <div class="col-lg-5 col-12 img-bol">
                            <img src="{{ $item->image_url }}" class="w-100" alt="">
                        </div>
                        <div class="col-lg-7 col-12 text-col mt-lg-0 mt-4">
                            <div class="ps-lg-4">
                                <h2 class="fw-bold my-0">{{ $item->heading }}</h2>
                                <p class="mt-lg-5 mt-3">{{ $item->body }}</p>
                                @if($item->link_text)
                                    <a href="{{ $item->link_url }}" class="cbtn hover-text-white mt-3">{{ $item->link_text }} <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                @endif
                            </div>
                        </div>
                    @else
                        {{-- subsequent blocks: text left, image right --}}
                        <div class="col-lg-7 col-12 text-col mt-lg-0 mt-4 order-2 order-lg-1">
                            <div class="pe-lg-4">
                                <h2 class="fw-bold my-0">{{ $item->heading }}</h2>
                                <p class="mt-lg-5 mt-3 mb-5">{{ $item->body }}</p>
                                @if($item->link_text)
                                    <a href="{{ $item->link_url }}" class="cbtn hover-text-white">{{ $item->link_text }} <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-5 col-12 img-bol order-1 order-lg-2">
                            <img src="{{ $item->image_url }}" class="w-100" alt="">
                        </div>
                    @endif
                </div>
            </div>
            @if(! $loop->last)<hr class="m-0" style="opacity: 0.15;">@endif
            @endforeach
        </div>
    </section>
    @endif

    <!-- Footer & Copyright -->
    <section>
        <footer class="footer">
            <div class="container py-4">
                <div class="row pt-5 pb-5">
                    <div class="col-lg-4 col-md-4 col-12 order-2 order-md-1 my-5 my-md-0">
                        <h5 class="fw-medium secondary-color">Contact Us</h5>
                        <hr style="opacity: 1; background-color: var(--secondary-color); width: 40px;">
                        <ul class="list-unstyled m-0 p-0">
                            <li><p><a href="tel:{{ setting('contact_phone') }}"> <i class="fa-solid fa-phone me-2 primary-color"></i>{{ setting('contact_phone') }}</a></p></li>
                            <li><p><a href="mailto:{{ setting('contact_email') }}"> <i class="fa-solid fa-envelope me-2 primary-color"></i>{{ setting('contact_email') }}</a></p></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 d-flex justify-content-center align-items-center order-1 order-md-2">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('img/SolaSaver Logo.svg') }}" alt="footer-logo">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 width-fit-content ms-lg-auto order-3">
                        <h5 class="fw-medium secondary-color">Useful Links</h5>
                        <hr style="opacity: 1; background-color: var(--secondary-color); width: 40px;">
                        <ul class="list-unstyled m-0 p-0">
                            <li><p><a href="#"> <i class="fa-solid fa-angle-right me-2 primary-color"></i>About Us</a></p></li>
                            <li><p><a href="#"> <i class="fa-solid fa-angle-right me-2 primary-color"></i>Terms</a></p></li>
                            <li><p><a href="#"> <i class="fa-solid fa-angle-right me-2 primary-color"></i>Privacy</a></p></li>
                        </ul>
                    </div>
                </div>
                <div class="newsletter bg-color-secondary py-4 px-3 px-md-4 px-lg-5 rounded-4">
                    <div class="row align-items-center py-1">
                        <div class="col-lg-6 col-md-5 col-12">
                            <h5 class="fw-medium pe-lg-5 pe-md-3 pe-0 m-0 text-white text-center text-md-start">Join the SolaSaver mailing list for updates and product news</h5>
                        </div>
                        <div class="col-lg-6 col-md-7 col-12 mt-4 mt-md-0">
                            <form class="newsletter-form">
                                <div class="input-group">
                                    <input type="email" class="form-control form-control-lg" placeholder="Your Email Address" aria-label="Your Email Address" required>
                                    <button class="cbtn hover-text-white" type="submit">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row position-relative mt-5">
                    <div class="col-12">
                        <div class="socialbox width-fit-content mx-auto">
                            <a href="{{ setting('facebook_url') }}" target="_blank" class="sociallink"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="{{ setting('linkedin_url') }}" target="_blank" class="sociallink"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="{{ setting('instagram_url') }}" target="_blank" class="sociallink"><i class="fa-brands fa-instagram"></i></a>
                            <a href="{{ setting('youtube_url') }}" target="_blank" class="sociallink"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <section class="copyright bg-color-primary text-white text-center py-2">
            <div class="container">
                <p class="m-0 p-md">&copy; {{ date('Y') }} <a href="{{ route('home') }}" class="text-white">SolaSaver</a>. All Rights Reserved.</p>
            </div>
        </section>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
