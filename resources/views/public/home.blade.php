<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolaSaver | Use More of Your Own Solar Power</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <style>
        :root {
            --ss-green: #1faa4d;
            --ss-green-dark: #178a3f;
        }

        /* HERO ---------------------------------------------------- */
        .home-hero {
            position: relative;
            min-height: 88vh;
            display: flex;
            align-items: center;
            /* Dark on the left for text legibility, fading to show the photo on the right */
            background:
                linear-gradient(90deg, rgba(8, 20, 12, 0.85) 0%, rgba(8, 20, 12, 0.55) 35%, rgba(8, 20, 12, 0.10) 70%, rgba(8, 20, 12, 0) 100%),
                url("{{ asset('img/bg-image.png') }}") no-repeat center center;
            background-size: cover;
            color: #ffffff;
            overflow: hidden;
        }

        .home-hero .hero-content {
            max-width: 640px;
            padding: 60px 0;
        }

        .home-hero h1 {
            font-size: 4rem;
            line-height: 1.05;
            font-weight: 800;
            margin-bottom: 1.5rem;
            letter-spacing: -1px;
        }

        .home-hero h1 .accent {
            color: var(--ss-green);
        }

        .home-hero p.lead-text {
            font-size: 1.15rem;
            line-height: 1.6;
            color: #e9eee9;
            max-width: 560px;
            margin-bottom: 2.25rem;
        }

        /* Buttons ------------------------------------------------- */
        .btn-ss {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 30px;
            border-radius: 999px;
            font-weight: 600;
            font-size: 1.05rem;
            text-decoration: none;
            transition: all .2s ease;
            border: 2px solid transparent;
        }

        .btn-ss-solid {
            background: var(--ss-green);
            color: #fff;
        }
        .btn-ss-solid:hover {
            background: var(--ss-green-dark);
            color: #fff;
        }

        .btn-ss-outline {
            border-color: var(--ss-green);
            color: #fff;
            background: transparent;
        }
        .btn-ss-outline:hover {
            background: var(--ss-green);
            color: #fff;
        }

        .btn-ss i {
            font-size: .9rem;
        }

        /* Responsive ---------------------------------------------- */
        @media (max-width: 991px) {
            .home-hero {
                min-height: auto;
                text-align: center;
                background:
                    linear-gradient(rgba(8, 20, 12, 0.7), rgba(8, 20, 12, 0.7)),
                    url("{{ asset('img/bg-image.png') }}") no-repeat center center;
                background-size: cover;
            }
            .home-hero h1 { font-size: 2.6rem; }
            .home-hero .hero-content { margin: 0 auto; padding: 90px 0; }
            .home-hero p.lead-text { margin-left: auto; margin-right: auto; }
            .hero-buttons { justify-content: center; }
        }

        @media (max-width: 575px) {
            .home-hero h1 { font-size: 2.1rem; }
            .btn-ss { width: 100%; justify-content: center; }
        }
    </style>
</head>
<body>

    @include('layouts.public-header')

    <section class="home-hero">
        <div class="container">
            <div class="hero-content">
                <h1>
                    Use More of Your Own Solar
                    Power <span class="accent">Simply and Affordably</span>
                </h1>

                <p class="lead-text">
                    SolaSaver is a smart solar diverter that automatically uses excess
                    solar energy within your home, helping reduce electricity bills and
                    maximise the value of your solar system.
                </p>

                <div class="hero-buttons d-flex flex-wrap gap-3">
                    <a href="{{ url('/how-it-works') }}" class="btn-ss btn-ss-solid">
                        How It Works <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="{{ url('/system-compatibility') }}" class="btn-ss btn-ss-outline">
                        Check Compatibility <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Add further home page sections (Why Choose Us, How It Works, etc.) below --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
