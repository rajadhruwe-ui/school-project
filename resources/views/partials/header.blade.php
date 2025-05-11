<header class="bg-white text-dark py-2 border-bottom">
    <div class="container d-flex justify-content-between align-items-center">

        <!-- School Name with Icon -->
        <div class="d-flex align-items-center">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="me-3" height="175" width="175">
                <div class="d-flex flex-column">
                    <span class="fw-bold display-5 text-dark school">Kopal Public School</span>
                    <small class="school-location">Amleshwar</small>
                </div>
            </a>
        </div>

    </div>
    
</header>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#kopalNavbar" aria-controls="kopalNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="kopalNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about-public') }}">About Us</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('infrastructure') ? 'active' : '' }}" href="{{ url('/infrastructure') }}">Infrastructure</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('admission') ? 'active' : '' }}" href="{{ url('/admission') }}">Admission</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('team') ? 'active' : '' }}" href="{{ url('/team') }}">Team</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('gallery') ? 'active' : '' }}" href="{{ url('/gallery') }}">Gallery</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('results') ? 'active' : '' }}" href="{{ url('/results') }}">Results</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('student-portal') ? 'active' : '' }}" href="{{ url('/student-portal') }}">Student Portal</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>