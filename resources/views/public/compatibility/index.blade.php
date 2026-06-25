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

    {{-- Compatibility quiz styles. Move these into css/style.css if you prefer. --}}
    <style>
        #compatModal .modal-content { border-radius: 1rem; overflow: hidden; }
        .compat-progress { height: 4px; background: #e6f4ee; }
        .compat-progress-bar {
            height: 100%; width: 33%;
            background: var(--primary-color, #1d9e75);
            transition: width .3s ease;
        }
        .compat-option {
            width: 100%;
            border: 1.5px solid var(--primary-color, #1d9e75);
            background: #fff;
            color: var(--primary-color, #1d9e75);
            font-weight: 500;
            padding: .85rem 1rem;
            border-radius: .75rem;
            transition: background .15s ease, color .15s ease;
        }
        .compat-option:hover,
        .compat-option:focus { background: var(--primary-color, #1d9e75); color: #fff; }
        .compat-result-icon { width: 64px; height: 64px; }
    </style>
</head>
<body>

    <header class="sticky-header px-6 pb-3 pb-lg-0">
        @include('layouts.public-header')
    </header>

    @php
        $hero    = $page->section('hero');
        $checker = $page->section('checker_intro');
    @endphp

    <!-- Page Hero -->
    @if($hero && $hero->is_active)
    <section class="page-hero bg-light py-3">
        <div class="container mt-lg-5 pt-lg-5">
            <h1 class="fw-bold my-0 text-center text-white pt-lg-5 mt-lg-5">{!! $hero->formatted_heading !!}</h1>
            <p class="text-white text-center mt-3 p-xl">{{ $hero->body }}</p>
        </div>
    </section>
    @endif

    <!-- Compatibility Checker Intro -->
    @if($checker && $checker->is_active)
    <section class="workhome bg-white py-5">
        <div class="container pt-5 my-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-5 col-12 img-bol pe-lg-5">
                    <img src="{{ $checker->image_url }}" class="w-100" alt="hsw-right-img">
                </div>
                <div class="col-lg-7 col-12 text-col mt-2 mt-md-3 mt-lg-0 ps-lg-3 pt-lg-0 pt-3 order-lg-1 order-2">
                    <div class="pe-lg-5">
                        <h2 class="fw-bold my-0">{!! $checker->formatted_heading !!}</h2>
                        <div class="notebox my-4 p-4 rounded-4">
                            <p class="p-xl mb-2 fw-medium">{{ $checker->subheading }}</p>
                            <p class="p-xl mb-0 fw-medium text-uppercase">{{ $checker->body }}</p>
                        </div>
                        @if($checker->items->isNotEmpty())
                        <ul class="p-xl ps-4 mb-4">
                            @foreach($checker->items as $item)
                                <li>{{ $item->body }}</li>
                            @endforeach
                        </ul>
                        @endif

                        {{-- TRIGGER: opens the quiz modal --}}
                        <a href="#" class="cbtn" data-bs-toggle="modal" data-bs-target="#compatModal">
                            {{ $checker->button_text ?: 'Check My Home' }} <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- ============================================================
         COMPATIBILITY QUIZ MODAL (multi-step) — this is a FEATURE,
         not CMS content. Questions/logic live in the JS below.
    ============================================================ --}}
    <div class="modal fade" id="compatModal" tabindex="-1" aria-labelledby="compatModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">

                <div class="bg-color-primary text-white d-flex align-items-center justify-content-between px-4 py-3">
                    <span class="fw-medium" id="compatModalLabel">Compatibility Check</span>
                    <div class="d-flex align-items-center gap-3">
                        <small id="compatStepLabel">Question 1 of 3</small>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>

                <div class="compat-progress">
                    <div class="compat-progress-bar" id="compatBar"></div>
                </div>

                <div class="modal-body p-4 p-md-5">

                    <div id="compatQuestionView">
                        <p class="fs-5 fw-bold mb-4" id="compatQuestion">Do you have rooftop solar installed?</p>
                        <div class="row g-3" id="compatOptions"></div>
                        <button type="button" class="btn btn-link text-muted text-decoration-none px-0 mt-3 d-none" id="compatBack">
                            <i class="fa-solid fa-arrow-left me-1"></i> Back
                        </button>
                    </div>

                    <div id="compatResultView" class="text-center d-none">

                        <div id="compatResultSuitable">
                            <h3 class="fw-bold my-0">
                                <img src="{{ asset('img/check-icon.svg') }}" alt="Check Icon" class="compat-result-icon mb-2 d-block mx-auto">
                                Your Home Appears Suitable for <span class="htext">SolaSaver</span>
                            </h3>
                            <p class="mt-3 fw-medium">This check provides a general indication only. Final compatibility and installation requirements must be confirmed by a licensed electrician.</p>
                            <p class="fw-medium">Based on your answers, SolaSaver should work with a setup like yours. A licensed electrician can confirm compatibility and install the unit.</p>
                            <div class="d-flex flex-column gap-3 mt-4">
                                <a href="{{ route('public.find-electrician') }}" class="cbtn">Find a SolaSaver Registered Installer <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                <a href="#" class="cbtn">Send SolaSaver Info to Your Electrician <i class="fa-solid fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>

                        <div id="compatResultNotSuitable" class="d-none">
                            <h3 class="fw-bold my-0">Let's Talk About Your <span class="htext">Options</span></h3>
                            <p class="mt-3 fw-medium">Based on your answers, a few details need a closer look. You may still benefit from SolaSaver, and our team can help you explore the right setup for your home.</p>
                            <div class="d-flex flex-column gap-3 mt-4">
                                <a href="{{ route('public.find-electrician') }}" class="cbtn">Talk to a SolaSaver Installer <i class="fa-solid fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>

                        <button type="button" class="btn btn-link text-muted text-decoration-none mt-3" id="compatRestart">Start over</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Footer & Copyright -->
    <section>
        <footer class="footer">
            <div class="container py-4">
                <div class="row pt-5 pb-5">
                    <div class="col-lg-4 col-md-4 col-12 order-2 order-md-1 my-5 my-md-0">
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

        <section class="copyright bg-color-primary text-white text-center py-2">
            <div class="container">
                <p class="m-0 p-md">&copy; {{ date('Y') }} <a href="{{ route('home') }}" class="text-white">SolaSaver</a>. All Rights Reserved.</p>
            </div>
        </section>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    {{-- ============================================================
         COMPATIBILITY QUIZ LOGIC (vanilla JS, no framework)
         Edit questions here — counter & progress bar auto-adjust.
    ============================================================ --}}
    <script>
    (function () {
        const modalEl = document.getElementById('compatModal');
        if (!modalEl) return;

        const questions = [
            {
                text: "Do you have rooftop solar installed?",
                key: "has_solar",
                options: [
                    { label: "Yes", value: "yes", score: 1 },
                    { label: "No",  value: "no",  score: 0 }
                ]
            },
            {
                text: "Do you export excess solar during the day?",
                key: "exports",
                options: [
                    { label: "Yes", value: "yes", score: 1 },
                    { label: "No",  value: "no",  score: 0 }
                ]
            },
            {
                text: "Do you have suitable loads, like hot water or a pool pump?",
                key: "loads",
                options: [
                    { label: "Yes", value: "yes", score: 1 },
                    { label: "No",  value: "no",  score: 0 }
                ]
            }
        ];

        const SUITABLE_THRESHOLD = 2;

        const stepLabel    = document.getElementById('compatStepLabel');
        const bar          = document.getElementById('compatBar');
        const questionView = document.getElementById('compatQuestionView');
        const resultView   = document.getElementById('compatResultView');
        const questionEl    = document.getElementById('compatQuestion');
        const optionsEl     = document.getElementById('compatOptions');
        const backBtn       = document.getElementById('compatBack');
        const restartBtn    = document.getElementById('compatRestart');
        const resSuitable   = document.getElementById('compatResultSuitable');
        const resNotSuitable= document.getElementById('compatResultNotSuitable');

        let index = 0;
        let answers = {};

        function renderQuestion() {
            const q = questions[index];
            questionEl.textContent = q.text;
            stepLabel.textContent = "Question " + (index + 1) + " of " + questions.length;
            bar.style.width = ((index + 1) / questions.length * 100) + "%";
            backBtn.classList.toggle('d-none', index === 0);

            optionsEl.innerHTML = "";
            q.options.forEach(function (opt) {
                const col = document.createElement('div');
                col.className = "col-6";
                const btn = document.createElement('button');
                btn.type = "button";
                btn.className = "compat-option";
                btn.textContent = opt.label;
                btn.addEventListener('click', function () {
                    answers[q.key] = opt.score || 0;
                    if (index < questions.length - 1) { index++; renderQuestion(); }
                    else { showResult(); }
                });
                col.appendChild(btn);
                optionsEl.appendChild(col);
            });
        }

        function showResult() {
            const total = Object.values(answers).reduce(function (s, v) { return s + v; }, 0);
            const suitable = total >= SUITABLE_THRESHOLD;

            questionView.classList.add('d-none');
            resultView.classList.remove('d-none');
            stepLabel.textContent = "Result";
            bar.style.width = "100%";

            resSuitable.classList.toggle('d-none', !suitable);
            resNotSuitable.classList.toggle('d-none', suitable);
        }

        function reset() {
            index = 0;
            answers = {};
            resultView.classList.add('d-none');
            questionView.classList.remove('d-none');
            renderQuestion();
        }

        backBtn.addEventListener('click', function () {
            if (index > 0) { index--; renderQuestion(); }
        });
        restartBtn.addEventListener('click', reset);
        modalEl.addEventListener('hidden.bs.modal', reset);

        renderQuestion();
    })();
    </script>
</body>
</html>
