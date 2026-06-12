<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Where to Buy SolaSaver</title>
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
            <h1 class="fw-bold my-0 text-center text-white pt-lg-5 mt-lg-5">Where to Buy SolaSaver</h1>
        </div>
    </section>

    <section class="buy-solar bg-white py-5">
        <div class="container pt-5 my-lg-5">
            <div class="row align-items-center">
                <div class="col-md-6 col-12 pe-lg-5 pe-md-4">
                    <div class="imgbox text-center">
                        <img src="{{ asset('img/Find an Electrician.jpg') }}" class="w-100" alt="Find an Electrician">
                        <a href="{{ route('public.find-electrician') }}" class="cbtn hover-background-white mx-auto z-1 position-relative d-table" style="margin-top: -28px">Find an Electrician Near You <i class="fa-solid fa-arrow-right ms-1"></i></a>
                        <p class="p-xl fw-medium mb-0 mt-4 mx-5 px-3 secondary-color">Search for independent licensed electricians in your area who can supply and install SolaSaver.</p>
                    </div>
                </div>
                <div class="col-md-6 col-12 ps-lg-5 ps-md-4 mt-5 mt-md-0">
                    <div class="imgbox text-center">
                        <img src="{{ asset('img/order-solasaver.jpg') }}" class="w-100" alt="Order SolaSaver">
                        <a href="#" class="cbtn hover-background-white mx-auto z-1 position-relative d-table" style="margin-top: -28px">Order SolaSaver <i class="fa-solid fa-arrow-right ms-1"></i></a>
                        <p class="p-xl fw-medium mb-0 mt-4 mx-5 px-3 secondary-color">Order SolaSaver directly from us and have your electrician install it.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <footer class="footer">
            <div class="container py-4">
                <div class="row pt-5 pb-5">
                    <div class="col-lg-4 col-md-4 col-12 order-2 order-md-1 my-5 my-md-0">
                        <h5 class="fw-medium secondary-color">Contact Us</h5>
                        <hr style="opacity: 1; background-color: var(--secondary-color); width: 40px;">
                        <ul class="list-unstyled m-0 p-0">
                            <li><p><a href="tel:+012482482481"> <i class="fa-solid fa-phone me-2 primary-color"></i>+01 248 248 2481</a></p></li>
                            <li><p><a href="mailto:sales@solasaver.com"> <i class="fa-solid fa-envelope me-2 primary-color"></i>sales@solasaver.com</a></p></li>
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
                            <a href="#" target="_blank" class="sociallink"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" target="_blank" class="sociallink"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#" target="_blank" class="sociallink"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#" target="_blank" class="sociallink"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <section class="copyright bg-color-primary text-white text-center py-2">
            <div class="container">
                <p class="m-0 p-md">&copy; 2026 <a href="{{ route('home') }}" class="text-white">SolaSaver</a>. All Rights Reserved.</p>
            </div>
        </section>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>