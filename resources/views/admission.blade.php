@extends('layouts.public')

@section('title', 'Admission | Kopal School')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4">Admission to Kopal School</h2>

        <div class="row">
            <div class="col-lg-6">
                <h4 class="mb-3">Admission Form</h4>
                <form action="{{ route('admission.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="student_name" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="student_name" name="student_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                    </div>
                    <div class="mb-3">
                        <label for="parent_name" class="form-label">Parent's Name</label>
                        <input type="text" class="form-control" id="parent_name" name="parent_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <div class="col-lg-6">
                <h4 class="mb-3">Admission Requirements</h4>
                <ul>
                    <li>Complete the admission form with accurate details.</li>
                    <li>Attach a copy of your birth certificate and previous school report card.</li>
                    <li>Submit the form along with the application fee.</li>
                    <li>Admission is based on availability of seats and eligibility criteria.</li>
                </ul>

                <h4 class="mt-4">Contact Information</h4>
                <p>If you have any questions, feel free to contact us:</p>
                <p>Email: <a href="mailto:admissions@kopalschool.com">admissions@kopalschool.com</a></p>
                <p>Phone: <a href="tel:+1234567890">+123 456 7890</a></p>
            </div>
        </div>
    </div>
    @if (session('success'))
    <div id="popup-message" class="position-fixed top-50 start-50 translate-middle p-4 bg-success text-white rounded shadow" style="z-index: 1050;">
        {{ session('success') }}
    </div>
@endif


@endsection
