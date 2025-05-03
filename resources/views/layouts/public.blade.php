<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kopal School')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Social Media Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // animation duration
            once: true, // animation only once
        });
    </script>
    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    @stack('styles')
</head>

<body>

    {{-- Header --}}
    @include('partials.header')

    {{-- Main Content --}}
    <main class="container mt-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
 <!-- for messege popup a while -->
 <script>
    setTimeout(() => {
        const alertBox = document.querySelector('.alert');
        if (alertBox) {
            alertBox.classList.remove('show');
            alertBox.classList.add('fade');
            setTimeout(() => alertBox.remove(), 500); // Optional cleanup
        }
    }, 4000); // 4 seconds
</script>

<!-- for message popup a while -->

</body>

</html>