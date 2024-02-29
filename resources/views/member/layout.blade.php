{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>{{ $title ?? 'Library System' }}</title>--}}
{{--    <!-- Include CSS stylesheets -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--    <!-- Include any additional CSS files -->--}}
{{--    @stack('styles')--}}
{{--</head>--}}

{{--<body class="bg-gray-100">--}}
{{--<!-- Navigation Bar -->--}}
{{--<nav class="bg-gray-800 text-white py-4">--}}
{{--    <div class="container mx-auto flex justify-between items-center">--}}
{{--        <h1 class="text-xl font-bold">Library System</h1>--}}
{{--        <ul class="flex space-x-4">--}}
{{--            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>--}}
{{--            <li><a href="{{ route('books.show') }}">Books</a></li>--}}
{{--            <li><a href="{{ route('members.show') }}">Members</a></li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</nav>--}}

{{--<!-- Main Content -->--}}
{{--<main class="container mx-auto my-8">--}}
{{--    <!-- Flash messages -->--}}
{{--    @if (session()->has('success'))--}}
{{--        <div class="bg-green-200 text-green-800 px-4 py-2 mb-4 rounded-md">--}}
{{--            {{ session('success') }}--}}
{{--        </div>--}}
{{--    @endif--}}
{{--<!-- Content from child pages -->--}}
{{--    @yield('content')--}}
{{--</main>--}}

{{--<!-- Footer -->--}}
{{--<footer class="bg-gray-800 text-white py-4">--}}
{{--    <div class="container mx-auto text-center">--}}
{{--        &copy; {{ date('Y') }} Library System. All rights reserved.--}}
{{--    </div>--}}
{{--</footer>--}}

{{--<!-- Include JavaScript files -->--}}
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
{{--<!-- Include any additional JavaScript files -->--}}
{{--@stack('scripts')--}}
{{--</body>--}}

{{--</html>--}}
    <!DOCTYPE html>
<html>
<head>
    <title>Library system CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>

<div class="container">
    @yield('content')
</div>
</body>
@include('layouts.app');
</html>
