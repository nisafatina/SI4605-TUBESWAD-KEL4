<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- Custom styles for this template -->
    @yield('styles')
    
    <!-- AOS (Animate on Scroll) untuk animasi -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
</head>
<body class="bg-light">

    <!-- Header -->
    <header class="bg-primary text-white py-3 shadow-sm">
        <div class="container">
            <nav class="d-flex justify-content-between align-items-center">
                <a href="/" class="text-white h4 mb-0">My Application</a>
                <div>
                    <a href="/" class="text-white ms-3 fs-5">Home</a>
                    <a href="{{ route('feedback.index') }}" class="text-white ms-3 fs-5">Feedback</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-5">
        <div class="container" data-aos="fade-up">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; WDP Dine-In Program</p>
            <div class="social-icons mt-3">
                <a href="#" class="text-white fs-4 me-3"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white fs-4 me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white fs-4"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    
    <!-- AOS JS (Animate on Scroll) -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init(); // Initialize AOS
    </script>
</body>
</html>