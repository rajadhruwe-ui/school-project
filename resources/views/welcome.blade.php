@extends('layouts.public')

@section('title', 'About Us - Kopal School')

@section('content')
<main class="flex-grow">
    <div class="max-w-7xl mx-auto py-8 px-4">

        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-blue-900 to-blue-600 text-white py-20" data-aos="fade-down">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4" data-aos="zoom-in">Welcome to My School</h1>
                <p class="text-lg md:text-xl mb-6" data-aos="fade-up">Empowering students with knowledge and character</p>
                <a href="/admission" class="bg-white text-blue-900 px-6 py-3 rounded-full font-semibold shadow hover:bg-gray-100 transition"
                    data-aos="fade-up" data-aos-delay="300">
                    Apply Now
                </a>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-16 bg-gray-100">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-12" data-aos="fade-up">Why Choose Us</h2>
                <div class="grid md:grid-cols-3 gap-10 text-center">
                    <div class="bg-white rounded-lg p-6 shadow hover:shadow-lg transition" data-aos="fade-right">
                        <img src="https://img.icons8.com/ios-filled/50/4a90e2/school.png" class="mx-auto mb-4" alt="Academic Excellence">
                        <h3 class="font-semibold text-xl mb-2">Academic Excellence</h3>
                        <p>Our students achieve top results through experienced faculty and quality resources.</p>
                    </div>
                    <div class="bg-white rounded-lg p-6 shadow hover:shadow-lg transition" data-aos="fade-up">
                        <img src="https://img.icons8.com/ios-filled/50/4a90e2/classroom.png" class="mx-auto mb-4" alt="Modern Infrastructure">
                        <h3 class="font-semibold text-xl mb-2">Modern Infrastructure</h3>
                        <p>State-of-the-art classrooms, labs, and libraries to support advanced learning.</p>
                    </div>
                    <div class="bg-white rounded-lg p-6 shadow hover:shadow-lg transition" data-aos="fade-left">
                        <img src="https://img.icons8.com/ios-filled/50/4a90e2/sports-mode.png" class="mx-auto mb-4" alt="Holistic Development">
                        <h3 class="font-semibold text-xl mb-2">Holistic Development</h3>
                        <p>We focus on extracurriculars and leadership along with academics.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Visitor Count Section -->
        <section class="py-4 bg-white">
            <div class="container text-center">
                <h2 class="text-xl font-semibold text-gray-800">Visitor Count</h2>
                <p class="mt-2 text-muted">Today's Unique Visitors: <strong id="visitor-count">{{ $visitorCount ?? 0 }}</strong></p>
            </div>
            <div class="text-center py-5">
                <h1>Welcome to Kopal School</h1>

                <div class="mt-4">
                    <h5>Total Visitors: <span id="total-visitors">...</span></h5>
                    <h5>Today's Visitors: <span id="today-visitors">...</span></h5>
                    <h5>Active Visitors (Last 30 mins): <span id="realtime-visitors">...</span></h5>
                </div>
                <div class="mt-4">
                    <button onclick="fetchVisitorStats()" class="bg-blue-600 text-white px-4 py-2 rounded">Refresh</button>
                </div>
                <div>
                    <p>Total Unique Visitors: {{ $totalVisitors }}</p>
                    <p>Total Visits: {{ $totalVisits }}</p>
                </div>
            </div>

        </section>

    </div>
    @push('scripts')
    <script>
        function fetchVisitorStats() {
            fetch("{{ route('visitor.track') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            fetch('/visitors/total')
                .then(res => res.json())
                .then(data => document.getElementById('total-visitors').textContent = data.total_unique_visitors);

            fetch('/visitors/today')
                .then(res => res.json())
                .then(data => document.getElementById('today-visitors').textContent = data.today_unique_visitors);

            fetch('/visitors/realtime')
                .then(res => res.json())
                .then(data => document.getElementById('realtime-visitors').textContent = data.active_visitors);
        }

        document.addEventListener('DOMContentLoaded', fetchVisitorStats);
    </script>
    <script>
        fetch("{{ route('visitor.track') }}", {
                method: "GET",
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => console.log("Tracked visitor:", data));
    </script>

    @endpush
</main>

@endsection