@extends('layouts.app')

@section('content')
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white flex flex-col p-4">
        <h2 class="text-2xl font-bold mb-6">Admin Panel</h2>
        <nav class="flex flex-col space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="hover:bg-gray-700 p-2 rounded">Dashboard</a>
            <a href="#" class="hover:bg-gray-700 p-2 rounded">Users</a>
            <a href="#" class="hover:bg-gray-700 p-2 rounded">Settings</a>
            <a href="#" class="hover:bg-gray-700 p-2 rounded">Reports</a>
            <a href="{{ route('logout') }}" class="mt-auto hover:bg-red-600 p-2 rounded"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 bg-white p-6">
        <h1 class="text-3xl font-semibold mb-4">Welcome, Admin!</h1>
        <p>This is your admin dashboard.</p>
    </main>
</div>
@endsection
