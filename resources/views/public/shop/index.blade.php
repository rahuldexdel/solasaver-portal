<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolaSaver - Hardware Catalog</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>

    <header class="sticky-header px-6 pb-3 pb-lg-0">
        @include('layouts.public-header')
    </header>

    <section class="page-hero bg-light py-3">
        <div class="container mt-lg-5 pt-lg-5">
            <h1 class="fw-bold my-0 text-center text-white pt-lg-5 mt-lg-5">Hardware &amp; Solar Diverters</h1>
            <p class="text-white text-center mt-3 p-xl">Premium commercial-grade smart solar diverters, system splitters, and home integration hardware panels.</p>
        </div>
    </section>

    {{-- reduced bottom padding so there is no big empty gap before the footer --}}
    <section class="bg-white px-6 pt-5 pb-4">
        <div class="container pt-lg-4">
            <div class="row g-4">
                @forelse($products as $product)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 border rounded-4 shadow-sm overflow-hidden">
                        <div class="ratio ratio-4x3 bg-light d-flex align-items-center justify-content-center">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}"
                                     alt="{{ $product->name }}" loading="lazy"
                                     class="w-100 h-100 p-3" style="object-fit: contain;">
                            @else
                                <div class="d-flex flex-column align-items-center justify-content-center text-muted">
                                    <i class="fa-regular fa-image fa-2x mb-1"></i>
                                    <span class="small">No image</span>
                                </div>
                            @endif
                        </div>

                        <div class="card-body d-flex flex-column p-3">
                            <span class="badge bg-light text-secondary border align-self-start text-uppercase mb-2 small" style="letter-spacing: 1px;">
                                {{ $product->sku ?? 'SOLASAVE1001' }}
                            </span>

                            <h5 class="fw-bold mb-1 text-capitalize">
                                <a href="{{ route('shop.show', $product->slug) }}" class="text-decoration-none secondary-color">{{ $product->name }}</a>
                            </h5>

                            <p class="text-muted small mb-3 text-truncate">{{ $product->description }}</p>

                            <div class="mt-auto pt-2 border-top d-flex align-items-center justify-content-between">
                                <span class="fw-bold fs-6">${{ number_format($product->price, 2) }}</span>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="cbtn hover-text-white btn-sm">Add To Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="card border rounded-4 p-5 text-center text-muted">
                        No hardware assets available in stock right now.
                    </div>
                </div>
                @endforelse
            </div>

            @if(isset($products) && method_exists($products, 'links'))
                <div class="mt-5">{{ $products->links() }}</div>
            @endif
        </div>
    </section>

    {{-- Inline footer (renders correctly, unlike the public-footer partial) --}}
    <section>
        <footer class="footer">
            <div class="container pt-4 pb-4">
                <div class="row pt-4 pb-4">
                    <div class="col-lg-4 col-md-4 col-12 order-2 order-md-1 my-4 my-md-0">
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
                <div class="row position-relative mt-4">
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

<style>

    .pt-5 {
    padding-top: 6rem!important;
}
</style>