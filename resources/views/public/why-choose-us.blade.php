<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Why Choose SolaSaver?</title>
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
            <h1 class="fw-bold my-0 text-center text-white pt-lg-5 mt-lg-5">Why Choose SolaSaver?</h1>
            <p class="text-white text-center mt-3 p-xl">A smarter, simpler way to use more of your own solar power without complexity, high costs, or ongoing maintenance.</p>
        </div>
    </section>

    <section class="hsw bg-white px-6 py-5">
        <div class="container-fluid pb-lg-5 pt-5 my-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-7 col-12 text-col pe-lg-5 pt-lg-0 pt-3 order-lg-1 order-2">
                    <div class="pe-lg-5">
                        <h2 class="fw-bold my-0">How <span class="htext">SolaSaver</span> Works</h2>
                        <h6 class="fw-semibold mt-md-2 mb-md-3 mt-1 mb-2">Use more of your own solar power - simply and affordably</h6>
                        <p class="mb-1">Many homes export excess solar energy to the grid during the day and receive only a small credit. Later, when solar production drops, they buy electricity back from the grid at a much higher price.</p>
                        <p class="mb-1">SolaSaver detects when your solar system is producing more electricity than your home is using and automatically redirects that excess energy to useful household loads such as hot water or other appliances instead of exporting it to the grid.</p>
                        <p class="mb-1">It's a simple, affordable way to make better use of the solar you already generate.</p>
                        <div class="btn-group d-flex flex-column flex-sm-row gap-3 mt-4">
                            <a href="{{ route('compatibility') }}" class="cbtn">Will SolaSaver Work for My Home? <i class="fa-solid fa-arrow-right ms-1"></i></a>
                            <a href="#" class="cbtn">How Much Could I Save? <i class="fa-solid fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-12 img-bol order-lg-2 order-1">
                    <img src="{{ asset('img/hsw-right-img.jpg') }}" class="w-100" alt="hsw-right-img">
                </div>
            </div>
        </div>
    </section>

    <section class="usemore bg-white px-6 mb-5">
        <div class="container-fluid py-lg-5 my-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12 pe-lg-5 text-col">
                    <div class="pe-lg-5">
                        <h2 class="fw-bold mt-0 mb-lg-4 mb-2">Use More of Your Solar</h2>
                        <p class="mb-1 p-xl">Most solar homes produce more electricity during the day than they use. That excess power is exported to the grid for a small credit - and bought back later at a much higher price.</p>
                        <p class="mb-1 p-xl">SolaSaver automatically redirects excess solar to useful loads in your home so you can use more of your own energy.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 box-col">
                    <div class="iconbox">
                        <div class="iconimgbox">
                            <img src="{{ asset('img/Set & Forget Operation.svg') }}" alt="Set & Forget Operation">
                        </div>
                        <h4 class="fw-medium my-3 text-center secondary-color">Set & Forget Operation</h4>
                        <p class="m-0 text-center">Once installed, SolaSaver automatically monitors your solar generation and household demand. There are no apps to manage and no complicated settings to configure.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 box-col">
                    <div class="iconbox">
                        <div class="iconimgbox">
                            <img src="{{ asset('img/Easy to Use.svg') }}" alt="Easy to Use">
                        </div>
                        <h4 class="fw-medium my-3 text-center secondary-color">Easy to Use – No Apps, No Upgrades</h4>
                        <p class="m-0 text-center">Installed by a licensed electrician, SolaSaver simply runs in the background. No apps, no Wi-Fi and no complicated settings. It's a set-and-forget solution that runs quietly in the background.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 box-col">
                    <div class="iconbox">
                        <div class="iconimgbox">
                            <img src="{{ asset('img/Compact Design.svg') }}" alt="Compact Design">
                        </div>
                        <h4 class="fw-medium my-3 text-center secondary-color">Compact <br>Design</h4>
                        <p class="m-0 text-center">SolaSaver is no bigger than a standard circuit breaker. It clips neatly onto your main wire, taking up minimal space while delivering maximum savings.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 box-col">
                    <div class="iconbox">
                        <div class="iconimgbox">
                            <img src="{{ asset('img/Pays for Itself Sooner.svg') }}" alt="Pays for Itself Sooner">
                        </div>
                        <h4 class="fw-medium my-3 text-center secondary-color">Pays for Itself <br>Sooner</h4>
                        <p class="m-0 text-center">For the average household, SolaSaver is expected to pay for itself quickly. After that, every reduction in your electricity bill is money back in your pocket.</p>
                        <p class="text-center m-0 mt-4">
                            <a href="#" class="boxlink secondary-color fw-medium position-relative">How Much Can I Save <i class="fa-solid fa-arrow-right ms-1"></i></a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 box-col">
                    <div class="iconbox">
                        <div class="iconimgbox">
                            <img src="{{ asset('img/Boost Button.svg') }}" alt="Boost Button">
                        </div>
                        <h4 class="fw-medium my-3 text-center secondary-color">Boost Button for Extra Hot Water</h4>
                        <p class="m-0 text-center">Run out after cloudy days or heavy use? Just press the Boost button to top up from the grid. Boost runs in 36 or 72 minute intervals enough time to heat your hot water when needed.</p>
                        <p class="text-center m-0 mt-4 mt-lg-0">
                            <a href="#" class="boxlink secondary-color fw-medium position-relative">Boost Button Explainer <i class="fa-solid fa-arrow-right ms-1"></i></a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 box-col">
                    <div class="iconbox">
                        <div class="iconimgbox">
                            <img src="{{ asset('img/Australian Designed.svg') }}" alt="Australian Designed">
                        </div>
                        <h4 class="fw-medium my-3 text-center secondary-color">100% Australian Designed & Tested</h4>
                        <p class="m-0 text-center">Designed in Australia, compliant with AS/NZS standards and backed by a 12-month warranty.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="findout bg-dark px-6 text-white">
        <div class="container">
            <div class="py-4">
                <div class="row align-items-center py-5">
                    <div class="col-lg-5 col-12 img-bol">
                        <img src="{{ asset('img/Compatible left image.jpg') }}" class="w-100" alt="Compatible Systems">
                    </div>
                    <div class="col-lg-7 col-12 text-col mt-lg-0 mt-4">
                        <div class="ps-lg-4">
                            <h2 class="fw-bold my-0">Compatible With Most Rooftop Solar Systems</h2>
                            <p class="mt-lg-5 mt-3">If your home has rooftop solar but no battery, SolaSaver will likely work for you. It connects to most existing solar systems and automatically redirects excess solar energy to useful loads such as hot water systems, pool pumps, underfloor heating and heat banks.</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="m-0" style="opacity: 0.15;">
            <div class="py-4">
                <div class="row align-items-center py-5">
                    <div class="col-lg-7 col-12 text-col mt-lg-0 mt-4 order-2 order-lg-1">
                        <div class="pe-lg-4">
                            <h2 class="fw-bold my-0">Find Out if SolaSaver Will Work in Your Home</h2>
                            <p class="mt-lg-5 mt-3 mb-1">Answer a few quick questions about your solar system and electrical loads.</p>
                            <p class="mb-1">Quick home compatibility check</p>
                            <p class="mb-1">Takes about 2 minutes</p>
                            <p class="mb-5">Find a licensed electrician who can install SolaSaver</p>
                            <a href="{{ route('compatibility') }}" class="cbtn hover-text-white">Will SolaSaver Work for My Home? <i class="fa-solid fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12 img-bol order-1 order-lg-2">
                        <img src="{{ asset('img/Fout Right Image.jpg') }}" class="w-100" alt="Check Eligibility">
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