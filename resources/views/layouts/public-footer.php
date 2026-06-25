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
                                <p><a href="tel:{{ setting('contact_phone') }}"> <i class="fa-solid fa-phone me-2 primary-color"></i>{{ setting('contact_phone') }}</a></p>
                            </li>
                            <li>
                                <p><a href="mailto:{{ setting('contact_email') }}"> <i class="fa-solid fa-envelope me-2 primary-color"></i>{{ setting('contact_email') }}</a></p>
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
                                <p><a href="#"> <i class="fa-solid fa-angle-right me-2 primary-color"></i>About Us</a></p>
                            </li>
                            <li>
                                <p><a href="#"> <i class="fa-solid fa-angle-right me-2 primary-color"></i>Terms</a></p>
                            </li>
                            <li>
                                <p><a href="#"> <i class="fa-solid fa-angle-right me-2 primary-color"></i>Privacy</a></p>
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
                            <a href="{{ setting('facebook_url') }}" target="_blank" class="sociallink"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="{{ setting('linkedin_url') }}" target="_blank" class="sociallink"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="{{ setting('instagram_url') }}" target="_blank" class="sociallink"><i class="fa-brands fa-instagram"></i></a>
                            <a href="{{ setting('youtube_url') }}" target="_blank" class="sociallink"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Copyright -->
        <section class="copyright bg-color-primary text-white text-center py-2">
            <div class="container">
                <p class="m-0 p-md">@ {{ date('Y') }} <a href="/" class="text-white">SolaSaver</a>. All Rights Reserved.</p>
            </div>
        </section>
    </section>

    <!-- Bootstrap Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"> </script>