@extends('layouts.app')

@section('title', 'Home | Kopal Public School')

@section('content')

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

<!-- Principal's Welcome -->
<section class="py-16 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-6 text-center max-w-4xl">
        <h2 class="text-3xl font-bold mb-4">Principal’s Welcome</h2>
        <p class="text-gray-700 text-lg leading-relaxed">
            Welcome to My School — a place where education meets passion...
        </p>
        <p class="mt-6 font-semibold text-gray-800">— Dr. A. Sharma, Principal</p>
    </div>
</section>

<!-- Welcome Message -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6 text-center max-w-4xl">
        <h2 class="text-3xl font-bold mb-4">Principal’s Welcome</h2>
        <p class="text-gray-700 text-lg leading-relaxed">
            Welcome to My School — a place where education meets passion. We nurture minds, inspire creativity, and prepare future leaders. Join our family and grow with excellence.
        </p>
        <p class="mt-6 font-semibold text-gray-800">— Dr. A. Sharma, Principal</p>
    </div>
</section>
@endsection
