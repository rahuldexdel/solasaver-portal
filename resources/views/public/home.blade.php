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

    <!-- Banner Section -->
    <section class="page-hero-banner bg-light py-md-3 py-5 px-6">
        <div class="container-fluid mt-lg-5 pt-lg-5">
            <div class="banner-content">
                <h1 class="fw-bold my-0 text-white mt-lg-5">Use More of Your Own Solar Power <span class="htext">Simply
                        and Affordably</span></h1>
                <p class="p-xxl text-white py-lg-4 py-md-3 py-2">SolaSaver is a smart solar diverter that automatically
                    uses excess solar energy within your home, helping reduce electricity bills and maximise the value
                    of your solar system.</p>
                <div class="btn-group d-flex flex-column flex-sm-row gap-3">
                    <a href="#" class="cbtn hover-text-white">How It Works <i
                            class="fa-solid fa-arrow-right ms-1"></i></a>
                    <a href="#" class="cbtn hover-text-white">Check Compatibility <i
                            class="fa-solid fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Iconbox Section -->
    <section class="h-iconbox py-md-5 pt-5">
        <div class="container py-5 my-md-5 mt-2">
            <div class="row pt-5">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="iconbox d-flex align-items-center">
                        <div class="iconimgbox">
                            <img src="{{ asset('img/Subscriptions-icon.svg') }}" class="w-100 pe-4" alt="Icon 1">
                        </div>
                        <p class="p-md ps-4 m-0">No apps or subscriptions</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mt-md-0 mt-3">
                    <div class="iconbox d-flex align-items-center">
                        <div class="iconimgbox">
                            <img src="{{ asset('img/Set-forget-icon.svg') }}" class="w-100 pe-4" alt="Icon 1">
                        </div>
                        <p class="p-md ps-4 m-0">Simple "set and forget"</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mt-lg-0 mt-3">
                    <div class="iconbox d-flex align-items-center">
                        <div class="iconimgbox">
                            <img src="{{ asset('img/Solar-energy-icon.svg') }}" class="w-100 pe-4" alt="Icon 1">
                        </div>
                        <p class="p-md ps-4 m-0">Works with existing solar systems</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mt-lg-0 mt-3">
                    <div class="iconbox d-flex align-items-center">
                        <div class="iconimgbox">
                            <img src="{{ asset('img/Australia-map-icon.svg') }}" class="w-100 pe-4" alt="Icon 1">
                        </div>
                        <p class="p-md ps-4 m-0">Designed in Australia</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How SolarSaver Works -->
    <section class="h-work bg-white px-6 ps-lg-0 py-5">
        <div class="container-fluid ps-lg-0">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <img src="{{ asset('img/order-solasaver.jpg') }}" class="w-100 h-100 workimg" alt="How SolarSaver Works">
                </div>
                <div class="col-lg-8 col-12 ps-lg-5 pt-lg-0 pt-4">
                    <h2 class="fw-bold">How SolaSaver Works</h2>
                    <p class="pb-4 pt-lg-4 pt-0">SolaSaver automatically detects excess solar energy and diverts it to
                        your hot water system-simple, smart and effective. Instead of exporting surplus energy to the
                        grid for low feed-in tariffs, SolaSaver helps you use more of your own solar power at home.</p>
                    <div class="stepboxes row mt-5 pt-3">
                        <div class="col-md-4 col-12 mb-md-0 mb-5 pb-4 pb-md-0">
                            <div class="stepbox ps-5 pe-4 pb-3">
                                <div class="stepicon mb-4"><img src="{{ asset('img/solar-system-icon.svg') }}" alt="Step 1"
                                        class="img-fluid"></div>
                                <h6 class="mb-3 fw-semibold">Your solar system produces excess power</h6>
                                <p>Solar energy powers your home during the day.</p>
                                <h6 class="num-box ms-auto fw-bold width-fit-content mb-0">01</h6>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 mb-md-0 mb-5 pb-4 pb-md-0">
                            <div class="stepbox ps-5 pe-4 pb-3">
                                <div class="stepicon mb-4"><img src="{{ asset('img/searchsolar-icon.svg') }}" alt="Step 2"
                                        class="img-fluid"></div>
                                <h6 class="mb-3 fw-semibold">SolaSaver detects unused solar energy</h6>
                                <p>It monitors your solar output in real time.</p>
                                <h6 class="num-box ms-auto fw-bold width-fit-content mb-0">02</h6>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="stepbox ps-5 pe-4 pb-3">
                                <div class="stepicon mb-4"><img src="{{ asset('img/battery-charge-icon.svg') }}" alt="Step 3"
                                        class="img-fluid"></div>
                                <h6 class="mb-3 fw-semibold">Excess energy is redirected to your hot water system</h6>
                                <p>Heating your water with free solar energy.</p>
                                <h6 class="num-box ms-auto fw-bold width-fit-content mb-0">03</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="wcu bg-white px-6 py-1">
        <div class="container-fluid ps-lg-0">
            <div class="row shadow rounded-5 overflow-hidden ps-lg-5">
                <div class="col-lg-5 col-12 order-2 order-lg-1 ps-lg-5 py-lg-5 py-4 z-1">
                    <h2 class="fw-bold mb-lg-5 mb-4">Why Homeowners Choose <span class="htext">SolaSaver</span></h2>
                    <ul class="checklist list-unstyled ps-5">
                        <li class="mb-4">
                            <h6 class="fw-semibold">Reduce reliance on grid electricity</h6>
                            <p>Use more of the solar power you already generate.</p>
                        </li>
                        <li class="mb-4">
                            <h6 class="fw-semibold">No expensive battery systems</h6>
                            <p>A simpler alternative for improving solar self-consumption.</p>
                        </li>
                        <li class="mb-4">
                            <h6 class="fw-semibold">No apps or ongoing fees</h6>
                            <p>No subscriptions. No complicated setup.</p>
                        </li>
                        <li class="mb-0">
                            <h6 class="fw-semibold">Designed for everyday households</h6>
                            <p>Simple operation designed for real Australian homes.</p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-7 col-12 order-1 order-lg-2 px-0 imgboxcol position-relative">
                    <div class="overlay-white d-none d-lg-block"></div>
                    <img src="{{ asset('img/why-choose-us-img.jpg') }}" class="w-100 d-lg-none" alt="whychooseus">
                </div>
            </div>
        </div>
    </section>

    <!-- Suitable for SolaSaver -->
    <section class="suitable-sola bg-white px-6 py-5 my-lg-5">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12 p-0">
                    <div class="resultbox bg-white">
                        <div class="innerbox px-5">
                            <div class="row align-items-center">
                                <div class="col-lg-8 col-12">
                                    <h2 class="fw-bold my-0"> Is Your Home Suitable for <span
                                            class="htext">SolaSaver?</span></h2>
                                    <p class="mt-3 mb-0 fw-semibold">Use our quick compatibility checker to see if
                                        SolaSaver is right for your solar system.</p>
                                    <p class="mt-3 mb-0 fw-medium">This check provides a general indication only. Final
                                        compatibility and installation requirements must be confirmed by a licensed
                                        electrician.</p>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <a href="#" class="cbtn ms-lg-auto mt-4 mt-lg-0">Check Compatibility <i
                                            class="fa-solid fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Australian Homes -->
    <section class="aus-homes bg-white py-5">
        <div class="container ps-lg-0 py-lg-4">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12 pe-lg-5 mb-4 mb-lg-0">
                    <img src="{{ asset('img/Australian%20Homes.jpg') }}" class="w-100 aushomimg" alt="Australian Homes">
                </div>
                <div class="col-lg-6 col-12">
                    <h2 class="fw-bold text-white">Designed for Australian Homes</h2>
                    <p class="text-white p-xl">SolaSaver is an Australian-designed and engineered product, built to help households get more value from the solar power they already generate.</p>
                    <div class="row align-items-center mt-lg-5 mt-4">
                        <div class="col-md-6 col-12 mb-4">
                            <div class="iconbox d-flex align-items-center gap-4 p-3">
                                <img src="{{ asset('img/solar-system-icon.svg') }}" class="imgico" alt="Icon 1">
                                <p class="text-white p-xl fw-semibold m-0">Australian<br> Designed</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mb-4">
                            <div class="iconbox d-flex align-items-center gap-4 p-3">
                                <img src="{{ asset('img/quality-comp-ico.svg') }}" class="imgico" alt="Icon 1">
                                <p class="text-white p-xl fw-semibold m-0">Quality<br> Components</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mb-md-0 mb-4">
                            <div class="iconbox d-flex align-items-center gap-4 p-3">
                                <img src="{{ asset('img/guarantee-ico.svg') }}" class="imgico" alt="Icon 1">
                                <p class="text-white p-xl fw-semibold m-0">1 year warranty<br> (12 months)</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="iconbox d-flex align-items-center gap-4 p-3">
                                <img src="{{ asset('img/location-ico.svg') }}" class="imgico" alt="Icon 1">
                                <p class="text-white p-xl fw-semibold m-0">Local<br> Support Available</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer & Copyright -->
    <section>
        <!-- Footer -->
        <footer class="footer">
            <div class="container py-4">
                <div class="row pt-5 pb-5">
                    <div class="col-lg-4 col-md-4 col-12 order-2 order-md-1 my-5 my-md-0">
                        <h5 class="fw-medium secondary-color">Contact Us</h5>
                        <hr style=" opacity: 1; background-color: var(--secondary-color); width: 40px; ">
                        <ul class="list-unstyled m-0 p-0">
                            <li>
                                <p><a href="tel:+012482482481"> <i class="fa-solid fa-phone me-2 primary-color"></i>+01
                                        248 248 2481</a></p>
                            </li>
                            <li>
                                <p><a href="mailto:sales@solasaver.com"> <i
                                            class="fa-solid fa-envelope me-2 primary-color"></i>sales@solasaver.com</a>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 d-flex justify-content-center align-items-center order-1 order-md-2">
                        <a href="/">
                            <img src="{{ asset('img/SolaSaver%20Logo.svg') }}" alt="footer-logo">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 width-fit-content ms-lg-auto order-3">
                        <h5 class="fw-medium secondary-color">Useful Links</h5>
                        <hr style=" opacity: 1; background-color: var(--secondary-color); width: 40px; ">
                        <ul class="list-unstyled m-0 p-0">
                            <li>
                                <p><a href="#"> <i class="fa-solid fa-angle-right me-2 primary-color"></i>About Us</a>
                                </p>
                            </li>
                            <li>
                                <p><a href="#"> <i class="fa-solid fa-angle-right me-2 primary-color"></i>Terms</a></p>
                            </li>
                            <li>
                                <p><a href="#"> <i class="fa-solid fa-angle-right me-2 primary-color"></i>Privacy</a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="newsletter bg-color-secondary py-4 px-3 px-md-4 px-lg-5 rounded-4">
                    <div class="row align-items-center py-1">
                        <div class="col-lg-6 col-md-5 col-12">
                            <h5 class="fw-medium pe-lg-5 pe-md-3 pe-0 m-0 text-white text-center text-md-start">Join the
                                SolaSaver mailing list for updates and product news</h5>
                        </div>
                        <div class="col-lg-6 col-md-7 col-12 mt-4 mt-md-0">
                            <form class="newsletter-form">
                                <div class="input-group">
                                    <input type="email" class="form-control form-control-lg"
                                        placeholder="Your Email Address" aria-label="Your Email Address" required>
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

        <!-- Copyright -->
        <section class="copyright bg-color-primary text-white text-center py-2">
            <div class="container">
                <p class="m-0 p-md">@ 2026 <a href="/" class="text-white">SolaSaver</a>. All Rights Reserved.</p>
            </div>
        </section>
    </section>

    <!-- Bootstrap Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"> </script>
</body>
</html>