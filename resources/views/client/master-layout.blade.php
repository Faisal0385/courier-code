<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PackerPanda Courier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #00aeef;
            /* accent */
            --deep: #2a3693;
            /* brand deep */
            --cta: #00b487;
            /* green CTA */
            --soft: #f7f9fb;
            --card-shadow: 0 6px 20px rgba(38, 50, 56, 0.06);
        }

        body {
            font-family: 'Inter', Arial, sans-serif;
            color: #222;
            background: #fff
        }

        .navbar-brand {
            color: var(--deep);
            font-weight: 700
        }

        .nav-link {
            color: #4b5563
        }

        /* HERO */
        .hero {
            background: linear-gradient(120deg, #f3fbfb 0%, #ffffff 40%);
            padding: 80px 0 60px;
        }

        .hero .eyebrow {
            color: #10b981;
            font-weight: 600
        }

        .hero h1 {
            font-size: 44px;
            font-weight: 800;
            line-height: 1.05
        }

        .hero p.lead {
            color: #6b7280
        }

        .hero .promo-card {
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.6));
            border-radius: 14px;
            padding: 18px 20px;
            box-shadow: var(--card-shadow);
            display: flex;
            gap: 40px;
            align-items: center;
            justify-content: space-around;
            width: 80%;
            margin: 0 auto;
        }

        .hero .illustration {
            max-width: 420px
        }

        .hero .stats {
            display: inline-block;
            vertical-align: middle;
            text-align: left
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px
        }

        .stat-item .num {
            font-weight: 700;
            color: var(--deep)
        }

        /* Brands */
        .brands img {
            max-height: 36px;
            opacity: .95
        }

        /* Services */
        .service-card {
            background: transparent
        }

        .service-icon {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(180deg, #fff, #fbfdff);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            box-shadow: 0 6px 18px rgba(10, 20, 40, 0.04)
        }

        /* Why choose */
        .why-box {
            background: #fff;
            border-radius: 12px;
            padding: 22px;
            box-shadow: var(--card-shadow);
            height: 100%
        }

        .why-box .title {
            font-weight: 700;
            margin-bottom: 8px
        }

        .why-box small {
            color: #6b7280
        }

        /* FAQ */
        .faq .accordion-button {
            border-radius: 8px;
            box-shadow: var(--card-shadow);
        }

        /* CTA */
        .cta {
            background: linear-gradient(90deg, #0bb17f, #00b487);
            color: #fff;
            padding: 36px 0;
            border-radius: 10px
        }

        /* footer */
        .site-footer {
            padding: 60px 0 20px;
            background: #fff
        }

        .foot-legal {
            border-top: 1px solid #eef2f7;
            padding-top: 22px;
            margin-top: 22px;
            color: #6b7280
        }

        @media (max-width:991px) {
            .hero {
                padding: 40px 0
            }

            .hero h1 {
                font-size: 32px
            }

            .hero .illustration {
                max-width: 320px
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    @include('client.common.navbar')

    @yield('content')

    <!-- FOOTER -->
    @include('client.common.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>