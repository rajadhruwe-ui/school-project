@extends('layouts.public')

@section('title', 'Results | Kopal Public School')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Exam Results</h2>

    <div class="card">
        <div class="card-body">
            @if($results->count())
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Student Name</th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Marks</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                        <tr>
                            <td>{{ $result->student_name }}</td>
                            <td>{{ $result->class }}</td>
                            <td>{{ $result->subject }}</td>
                            <td>{{ $result->marks }}</td>
                            <td>{{ $result->grade }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No results available at the moment.</p>
            @endif
        </div>
    </div>
</div>
@endsection
