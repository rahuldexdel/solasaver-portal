<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Compatibility</title>
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
            <h1 class="fw-bold my-0 text-center text-white pt-lg-5 mt-lg-5">System Compatibility</h1>
            <p class="text-white text-center mt-3 p-xl">A smarter, simpler way to use more of your own solar power without complexity, high costs, or ongoing maintenance.</p>
        </div>
    </section>

    <section class="workhome bg-white py-5">
        <div class="container pt-5 my-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-5 col-12 img-bol pe-lg-5">
                    <img src="{{ asset('img/Work home left image.png') }}" class="w-100" alt="hsw-right-img">
                </div>
                <div class="col-lg-7 col-12 text-col mt-2 mt-md-3 mt-lg-0 ps-lg-3 pt-lg-0 pt-3 order-lg-1 order-2">
                    <div class="pe-lg-5">
                        <h2 class="fw-bold my-0">Will <span class="htext">SolaSaver</span> Work In My Home?</h2>
                        <div class="notebox my-4 p-4 rounded-4">
                            <p class="p-xl mb-2 fw-medium">Answer a few simple questions to see if SolaSaver may suit your home.</p>
                            <p class="p-xl mb-0 fw-medium text-uppercase">No personal details are required.</p>
                        </div>
                        <ul class="p-xl ps-4 mb-4">
                            <li>Whether you already have rooftop solar</li>
                            <li>Whether you export excess solar during the day</li>
                            <li>Whether you have suitable electrical loads (eg hot water or a pool pump)</li>
                            <li>Whether your home is likely to benefit from solar diversion</li>
                            <li>What the next step is if your home looks suitable</li>
                        </ul>
                        <a href="#" class="cbtn">Check My Home <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="suitable-sola bg-white py-5">
        <div class="container pt-5 my-lg-5">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="resultbox bg-white">
                        <div class="innerbox">
                            <h3 class="fw-bold my-0"> 
                                <img src="{{ asset('img/check-icon.svg') }}" alt="Check Icon"> Your Home Appears Suitable for <span class="htext">SolaSaver</span>
                            </h3>
                            <p class="mt-3 mb-0 fw-medium">This check provides a general indication only. Final compatibility and installation requirements must be confirmed by a licensed electrician.</p>
                        </div>
                        <div class="innerbox2">
                            <p class="fw-medium">Based on your answers, SolaSaver should work with a setup like yours. A licensed electrician can confirm compatibility and install the unit.</p>
                            <div class="btn-group d-flex flex-column flex-sm-row gap-3 mt-4">
                                <a href="{{ route('public.find-electrician') }}" class="cbtn">Find a SolaSaver Registered Installer <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                <a href="#" class="cbtn">Send SolaSaver Info to Your Electrician <i class="fa-solid fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
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