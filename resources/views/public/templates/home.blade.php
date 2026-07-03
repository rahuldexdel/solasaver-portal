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
        $hero = $page->section('hero');
    @endphp

    {{-- Banner / Hero Section --}}
    @if($hero && $hero->is_active)
    <section class="page-hero-banner bg-dark py-5 px-6">
        <div class="container-fluid py-lg-4">
            <div class="banner-content text-center text-lg-start">
                <h1 class="fw-bold text-white mb-3">{!! $hero->formatted_heading !!}</h1>
                <p class="p-xxl text-white mb-4">{{ $hero->body }}</p>
                <div class="btn-group d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start">
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

    {{-- Main Page Content --}}
    <main class="page-content">
        <section class="py-5 px-6">
            <div class="container">
                @unless($hero && $hero->is_active)
                    <h1 class="mb-4">{{ $page->title }}</h1>
                @endunless
                <div class="page-body">
                    {!! $page->content !!}
                </div>
            </div>
        </section>
    </main>

    @include('layouts.public-footer')
</body>
</html>