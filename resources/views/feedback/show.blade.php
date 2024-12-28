@extends('layouts.app')

@section('title', 'Feedback Detail')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="text-center mb-5 text-primary">Feedback Detail</h2>

            <!-- Display feedback details -->
            <div class="card shadow-lg border-0 rounded-lg" data-aos="fade-up" data-aos-delay="200">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{ $feedback->customer_name }}</h5>
                    <p class="text-muted mb-1"><strong>Email:</strong> {{ $feedback->email }}</p>
                    <p class="text-muted mb-1"><strong>Restaurant:</strong> {{ $feedback->restaurant_name }}</p>
                    <p class="mb-4"><strong>Feedback:</strong> {{ $feedback->feedback }}</p>

                    <!-- Back to Feedback List Button -->
                    <a href="{{ route('feedback.index') }}" class="btn btn-outline-primary shadow-sm">
                        <i class="bi bi-arrow-left-circle"></i> Back to Feedback List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Container */
    .container {
        margin-top: 60px;
    }

    /* Card Styling */
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px;
    }

    /* Card Hover Effect */
    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    }

    /* Card Body */
    .card-body {
        padding: 40px;
        background-color: #f8f9fa;
        border-radius: 15px;
    }

    /* Title Styling */
    .card-title {
        font-size: 28px;
        font-weight: 600;
        color: #343a40;
    }

    /* Button Styling */
    .btn-outline-primary {
        font-size: 16px;
        padding: 12px 28px;
        border-radius: 30px;
        border: 2px solid #007bff;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    /* Responsive Styles */
    @media (max-width: 767px) {
        .col-lg-8 {
            max-width: 100%;
        }

        .btn-outline-primary {
            font-size: 14px;
            padding: 10px 22px;
        }

        .card-body {
            padding: 25px;
        }

        .card-title {
            font-size: 24px;
        }
    }

    /* Subtle Shadow Effect for Button */
    .btn-outline-primary.shadow-sm {
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    }

    /* Animation for AOS */
    .card[data-aos="fade-up"] {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 1s ease, transform 1s ease;
    }

    .card[data-aos="fade-up"].aos-animate {
        opacity: 1;
        transform: translateY(0);
    }
</style>
@endsection