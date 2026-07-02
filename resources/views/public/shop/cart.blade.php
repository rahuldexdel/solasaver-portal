<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - SolaSaver</title>
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
            <h1 class="fw-bold my-0 text-center text-white pt-lg-5 mt-lg-5">System Hardware Cart</h1>
        </div>
    </section>

    {{-- reduced bottom padding so there is no big empty gap before the footer --}}
    <section class="bg-white px-6 pt-5 pb-4">
        <div class="container pt-lg-3">

            @if(session('success'))
                <div class="alert alert-success rounded-4">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger rounded-4">{{ session('error') }}</div>
            @endif

            @if(count($cart) > 0)
                <div class="row g-4">
                    <div class="col-lg-8 col-12">
                        @foreach($cart as $id => $item)
                        <div class="card border rounded-4 shadow-sm mb-3">
                            <div class="card-body d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 p-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-3 bg-light border d-flex align-items-center justify-content-center overflow-hidden" style="width: 72px; height: 72px;">
                                        @if($item['image'])
                                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-100 h-100 p-2" style="object-fit: contain;">
                                        @else
                                            <i class="fa-regular fa-image text-muted"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0 text-capitalize">{{ $item['name'] }}</h6>
                                        <p class="small text-muted mb-1">{{ $item['sku'] ?? 'SOLASAVE1001' }}</p>
                                        <p class="fw-semibold secondary-color mb-0">${{ number_format($item['price'], 2) }}</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-3">
                                    <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex align-items-center gap-2 m-0">
                                        @csrf @method('PATCH')
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control form-control-sm text-center" style="width: 64px;">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Update</button>
                                    </form>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST" class="m-0">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-link text-danger text-decoration-none p-0">Remove</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-lg-4 col-12">
                        <div class="card border rounded-4 shadow-sm">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4">Order Summary</h5>
                                <div class="d-flex justify-content-between border-bottom pb-3 mb-3">
                                    <span class="text-muted">Items Subtotal</span>
                                    <span class="fw-bold">${{ number_format($total, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <span class="fw-bold">Total</span>
                                    <span class="fw-bold fs-4 secondary-color">${{ number_format($total, 2) }}</span>
                                </div>
                                <a href="{{ route('checkout') }}" class="cbtn hover-text-white w-100 text-center d-block">
                                    Proceed To Checkout <i class="fa-solid fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="card border rounded-4 p-5 text-center text-muted">
                    <div class="mb-2"><i class="fa-solid fa-cart-shopping fa-2x"></i></div>
                    Your cart is empty.
                    <a href="{{ route('shop') }}" class="secondary-color fw-bold ms-1 text-decoration-none">Browse Products</a>
                </div>
            @endif
        </div>
    </section>

    {{-- Inline footer (same as products page) --}}
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