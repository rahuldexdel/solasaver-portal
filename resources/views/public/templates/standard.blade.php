<h1>standard page  </h1>@extends('layouts.public')

@section('content')

    @forelse($page->sections as $section)

        {{-- HERO style for a section keyed "hero", otherwise normal block --}}
        @if($section->section_key === 'hero')
            <section class="page-hero-banner bg-light py-5 px-6">
                <div class="container-fluid">
                    <div class="banner-content">
                        @if($section->heading)
                            <h1 class="fw-bold text-white">{!! $section->formatted_heading !!}</h1>
                        @endif
                        @if($section->body)
                            <p class="p-xxl text-white py-3">{{ $section->body }}</p>
                        @endif
                        <div class="btn-group d-flex flex-column flex-sm-row gap-3">
                            @if($section->button_text)
                                <a href="{{ $section->button_url }}" class="cbtn hover-text-white">{{ $section->button_text }} <i class="fa-solid fa-arrow-right ms-1"></i></a>
                            @endif
                            @if($section->button_text2)
                                <a href="{{ $section->button_url2 }}" class="cbtn hover-text-white">{{ $section->button_text2 }} <i class="fa-solid fa-arrow-right ms-1"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </section>

        @else
            {{-- Standard content section --}}
            <section class="bg-white px-6 py-5">
                <div class="container">
                    <div class="row align-items-center">

                        {{-- Text column --}}
                        <div class="{{ $section->image_url ? 'col-lg-6 col-12' : 'col-12' }}">
                            @if($section->heading)
                                <h2 class="fw-bold mb-3">{!! $section->formatted_heading !!}</h2>
                            @endif
                            @if($section->subheading)
                                <p class="fw-semibold mb-3">{{ $section->subheading }}</p>
                            @endif
                            @if($section->body)
                                <p class="mb-4">{{ $section->body }}</p>
                            @endif

                            <div class="d-flex flex-column flex-sm-row gap-3">
                                @if($section->button_text)
                                    <a href="{{ $section->button_url }}" class="cbtn hover-text-white">{{ $section->button_text }} <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                @endif
                                @if($section->button_text2)
                                    <a href="{{ $section->button_url2 }}" class="cbtn hover-text-white">{{ $section->button_text2 }} <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                @endif
                            </div>
                        </div>

                        {{-- Image column --}}
                        @if($section->image_url)
                            <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                <img src="{{ $section->image_url }}" class="w-100 rounded-4" alt="{{ $section->heading }}">
                            </div>
                        @endif
                    </div>

                    {{-- Repeatable items (icon boxes / cards / list points) --}}
                    @if($section->items->count())
                        <div class="row mt-5">
                            @foreach($section->items as $item)
                                <div class="col-lg-4 col-md-6 col-12 mb-4">
                                    <div class="iconbox p-3 h-100">
                                        @if($item->icon_url)
                                            <img src="{{ $item->icon_url }}" class="mb-3" style="height:48px" alt="">
                                        @endif
                                        @if($item->image_url)
                                            <img src="{{ $item->image_url }}" class="w-100 mb-3 rounded" alt="">
                                        @endif
                                        @if($item->heading)
                                            <h6 class="fw-semibold mb-2">{{ $item->heading }}</h6>
                                        @endif
                                        @if($item->body)
                                            <p class="m-0">{{ $item->body }}</p>
                                        @endif
                                        @if($item->link_text)
                                            <a href="{{ $item->link_url }}" class="d-inline-block mt-2">{{ $item->link_text }} <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>
        @endif

    @empty
        <section class="bg-white px-6 py-5">
            <div class="container text-center py-5">
                <h1 class="fw-bold">{{ $page->title }}</h1>
                <p class="text-muted">This page has no content yet.</p>
            </div>
        </section>
    @endforelse

@endsection