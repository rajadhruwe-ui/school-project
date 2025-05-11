<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kopal Public School, Amleshwar')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- AOS Animation -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }

        .school-logo {
            max-height: 60px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: bold;
        }

        .fade-out {
            transition: opacity 0.5s ease-out;
            opacity: 0;
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- Header with Monogram -->
    <header class="bg-light shadow-sm sticky-top">
        @include('partials.header')
    </header>

    <!-- Main Content -->
    <main class="container my-4" data-aos="fade-up">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        // Initialize AOS (Animate On Scroll)
        AOS.init({
            duration: 800,
            once: true
        });

        // Mobile Menu Toggle (if applicable)
        document.addEventListener('DOMContentLoaded', () => {
            const menuBtn = document.getElementById('menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            if (menuBtn && mobileMenu) {
                menuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('d-none');
                });
            }

            // Auto-hide alerts after 4 seconds
            setTimeout(() => {
                const alertBox = document.querySelector('.alert');
                if (alertBox) {
                    alertBox.classList.add('fade-out');
                    setTimeout(() => alertBox.remove(), 500);
                }
            }, 4000);
        });
    </script>

    @stack('scripts')

</body>

</html>
