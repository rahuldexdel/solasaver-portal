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
        $hero     = $page->section('hero');
        $icons    = $page->section('icon_grid');
        $how      = $page->section('how_it_works');
        $why      = $page->section('why_choose');
        $suitable = $page->section('suitable');
        $aus      = $page->section('australian_homes');
    @endphp

    <!-- Banner Section -->
    @if($hero && $hero->is_active)
    <section class="page-hero-banner bg-light py-md-3 py-5 px-6">
        <div class="container-fluid mt-lg-5 pt-lg-5">
            <div class="banner-content">
                <h1 class="fw-bold my-0 text-white mt-lg-5">{!! $hero->formatted_heading !!}</h1>
                <p class="p-xxl text-white py-lg-4 py-md-3 py-2">{{ $hero->body }}</p>
                <div class="btn-group d-flex flex-column flex-sm-row gap-3">
                    @if($hero->button_text)
                        <a href="{{ $hero->button_url }}" class="cbtn hover-text-white">{{ $hero->button_text }} <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    @endif
                    @if($hero->button_text2)
                        <a href="{{ $hero->button_url2 }}" class="cbtn hover-text-white">{{ $hero->button_text2 }} <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Iconbox Section -->
    @if($icons && $icons->is_active)
    <section class="h-iconbox py-md-5 pt-5">
        <div class="container py-5 my-md-5 mt-2">
            <div class="row pt-5">
                @foreach($icons->items as $item)
                <div class="col-lg-3 col-md-6 col-12 mt-md-0 mt-3">
                    <div class="iconbox d-flex align-items-center">
                        <div class="iconimgbox">
                            <img src="{{ $item->icon_url }}" class="w-100 pe-4" alt="">
                        </div>
                        <p class="p-md ps-4 m-0">{{ $item->body }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- How SolaSaver Works -->
    @if($how && $how->is_active)
    <section class="h-work bg-white px-6 ps-lg-0 py-5">
        <div class="container-fluid ps-lg-0">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <img src="{{ $how->image_url }}" class="w-100 h-100 workimg" alt="How SolaSaver Works">
                </div>
                <div class="col-lg-8 col-12 ps-lg-5 pt-lg-0 pt-4">
                    <h2 class="fw-bold">{{ $how->heading }}</h2>
                    <p class="pb-4 pt-lg-4 pt-0">{{ $how->body }}</p>
                    <div class="stepboxes row mt-5 pt-3">
                        @foreach($how->items as $item)
                        <div class="col-md-4 col-12 mb-md-0 mb-5 pb-4 pb-md-0">
                            <div class="stepbox ps-5 pe-4 pb-3">
                                <div class="stepicon mb-4"><img src="{{ $item->icon_url }}" alt="" class="img-fluid"></div>
                                <h6 class="mb-3 fw-semibold">{{ $item->heading }}</h6>
                                <p>{{ $item->body }}</p>
                                <h6 class="num-box ms-auto fw-bold width-fit-content mb-0">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Why Choose Us -->
    @if($why && $why->is_active)
    <section class="wcu bg-white px-6 py-1">
        <div class="container-fluid ps-lg-0">
            <div class="row shadow rounded-5 overflow-hidden ps-lg-5">
                <div class="col-lg-5 col-12 order-2 order-lg-1 ps-lg-5 py-lg-5 py-4 z-1">
                    <h2 class="fw-bold mb-lg-5 mb-4">{!! $why->formatted_heading !!}</h2>
                    <ul class="checklist list-unstyled ps-5">
                        @foreach($why->items as $item)
                        <li class="{{ $loop->last ? 'mb-0' : 'mb-4' }}">
                            <h6 class="fw-semibold">{{ $item->heading }}</h6>
                            <p>{{ $item->body }}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-7 col-12 order-1 order-lg-2 px-0 imgboxcol position-relative">
                    <div class="overlay-white d-none d-lg-block"></div>
                    <img src="{{ $why->image_url }}" class="w-100 d-lg-none" alt="whychooseus">
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Suitable for SolaSaver -->
    @if($suitable && $suitable->is_active)
    <section class="suitable-sola bg-white px-6 py-5 my-lg-5">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12 p-0">
                    <div class="resultbox bg-white">
                        <div class="innerbox px-5">
                            <div class="row align-items-center">
                                <div class="col-lg-8 col-12">
                                    <h2 class="fw-bold my-0">{!! $suitable->formatted_heading !!}</h2>
                                    <p class="mt-3 mb-0 fw-semibold">{{ $suitable->subheading }}</p>
                                    <p class="mt-3 mb-0 fw-medium">{{ $suitable->body }}</p>
                                </div>
                                <div class="col-lg-4 col-12">
                                    @if($suitable->button_text)
                                        <a href="{{ $suitable->button_url }}" class="cbtn ms-lg-auto mt-4 mt-lg-0">{{ $suitable->button_text }} <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Australian Homes -->
    @if($aus && $aus->is_active)
    <section class="aus-homes bg-white py-5">
        <div class="container ps-lg-0 py-lg-4">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12 pe-lg-5 mb-4 mb-lg-0">
                    <img src="{{ $aus->image_url }}" class="w-100 aushomimg" alt="Australian Homes">
                </div>
                <div class="col-lg-6 col-12">
                    <h2 class="fw-bold text-white">{{ $aus->heading }}</h2>
                    <p class="text-white p-xl">{{ $aus->body }}</p>
                    <div class="row align-items-center mt-lg-5 mt-4">
                        @foreach($aus->items as $item)
                        <div class="col-md-6 col-12 mb-4">
                            <div class="iconbox d-flex align-items-center gap-4 p-3">
                                <img src="{{ $item->icon_url }}" class="imgico" alt="">
                                <p class="text-white p-xl fw-semibold m-0">{{ $item->body }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

   @include('layouts.public-footer')
</body>
</html>
