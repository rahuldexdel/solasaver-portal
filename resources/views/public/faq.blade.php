<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frequently Asked Questions</title>
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
            <h1 class="fw-bold my-0 text-center text-white pt-lg-5 mt-lg-5">Frequently Asked Questions</h1>
        </div>
    </section>

    <section class="faq-sec bg-white py-5 mt-5">
        <div class="container mt-5">
            <ul class="nav nav-tabs justify-content-center border-bottom mb-4" id="faqTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link p active px-md-5 px-3 py-2"
                        id="order-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#order-faq"
                        type="button">
                        Order FAQs
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p px-md-5 px-3 py-2"
                        id="product-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#product-faq"
                        type="button">
                        Product FAQs
                    </button>
                </li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane fade show active" id="order-faq">
                    <div class="accordion custom-faq d-flex flex-column gap-4" id="orderAccordion">
                        <div class="accordion-item">
                            <h6 class="accordion-header">
                                <i class="fa-solid fa-angle-right primary-color"></i>
                                <button class="accordion-button h6"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq1">
                                    How do I purchase SolaSaver?
                                </button>
                            </h6>
                            <div id="faq1"
                                class="accordion-collapse collapse show"
                                data-bs-parent="#orderAccordion">
                                <div class="accordion-body p">
                                    <strong>Option 1 – Buy Through an Electrician</strong>
                                    <p>
                                        You can also purchase SolaSaver through a licensed independent electrician. Your electrician can confirm compatibility with your electrical setup.
                                    </p>
                                    <strong>Option 2 – Buy Direct</strong>
                                    <p>You can purchase directly through our website. Simply add the unit to your cart and complete checkout.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h6 class="accordion-header">
                                <i class="fa-solid fa-angle-right primary-color"></i>
                                <button class="accordion-button h6 collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq2">
                                    What payment methods do you accept?
                                </button>
                            </h6>
                            <div id="faq2"
                                class="accordion-collapse collapse"
                                data-bs-parent="#orderAccordion">
                                <div class="accordion-body">
                                    <p>We accept Visa, Mastercard, PayPal and Stripe.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="product-faq">
                    <div class="accordion custom-faq d-flex flex-column gap-4" id="productAccordion">
                        <div class="accordion-item">
                            <h6 class="accordion-header">
                                <i class="fa-solid fa-angle-right primary-color"></i>
                                <button class="accordion-button h6"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#productFaq1">
                                    What is SolaSaver?
                                </button>
                            </h6>
                            <div id="productFaq1"
                                class="accordion-collapse collapse show"
                                data-bs-parent="#productAccordion">
                                <div class="accordion-body p">
                                    <p>SolaSaver is an innovative energy-saving solution designed to help optimize electricity consumption and improve efficiency in residential and commercial properties.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h6 class="accordion-header">
                                <i class="fa-solid fa-angle-right primary-color"></i>
                                <button class="accordion-button h6 collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#productFaq2">
                                    Is SolaSaver compatible with my electrical system?
                                </button>
                            </h6>
                            <div id="productFaq2"
                                class="accordion-collapse collapse"
                                data-bs-parent="#productAccordion">
                                <div class="accordion-body p">
                                    <p>SolaSaver is compatible with most standard electrical systems. A licensed electrician can confirm compatibility before installation.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h6 class="accordion-header">
                                <i class="fa-solid fa-angle-right primary-color"></i>
                                <button class="accordion-button h6 collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#productFaq3">
                                    Does SolaSaver require professional installation?
                                </button>
                            </h6>
                            <div id="productFaq3"
                                class="accordion-collapse collapse"
                                data-bs-parent="#productAccordion">
                                <div class="accordion-body p">
                                    <p>Yes, SolaSaver should be installed by a licensed electrician to ensure safe and proper operation.</p>
                                </div>
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