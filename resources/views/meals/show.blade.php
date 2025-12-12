{{-- SHOW/DETAILS PAGE --}}
@extends('layouts.admin-layout')

@section('title', 'Meal Details')

@section('content')
    <style>
        .details-container {
            background: linear-gradient(135deg, #000000 0%, #0a0a0a 100%);
            min-height: 100vh;
            padding: 2rem;
        }

        .details-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            animation: fadeIn 0.8s ease-out;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.05);
            color: rgba(255, 255, 255, 0.7);
            padding: 0.75rem 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }

        .back-button:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #ffffff;
            transform: translateX(-4px);
        }

        .meal-detail-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            overflow: hidden;
            backdrop-filter: blur(10px);
            display: grid;
            grid-template-columns: 45% 55%;
            animation: slideUp 0.6s ease-out;
        }

        .meal-image-section {
            position: relative;
            background: linear-gradient(135deg, rgba(255, 68, 68, 0.1) 0%, rgba(0, 0, 0, 0.3) 100%);
        }

        .meal-detail-image {
            width: 100%;
            height: 100%;
            min-height: 500px;
            object-fit: cover;
        }

        .meal-no-image {
            width: 100%;
            height: 100%;
            min-height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8rem;
            color: rgba(255, 255, 255, 0.1);
        }

        .meal-detail-content {
            padding: 3rem;
            display: flex;
            flex-direction: column;
        }

        .category-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #ff4444 0%, #cc0000 100%);
            color: white;
            padding: 0.625rem 1.25rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            width: fit-content;
            box-shadow: 0 4px 15px rgba(255, 68, 68, 0.3);
        }

        .meal-detail-name {
            font-size: 2.5rem;
            font-weight: 700;
            color: #ffffff;
            margin: 0 0 2rem 0;
            line-height: 1.2;
        }

        .detail-section {
            margin-bottom: 2rem;
        }

        .detail-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.75rem;
        }

        .detail-value {
            color: #ffffff;
            font-size: 1.125rem;
            line-height: 1.6;
        }

        .price-value {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #ff4444 0%, #cc0000 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .date-value {
            color: rgba(255, 255, 255, 0.7);
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: auto;
            padding-top: 2rem;
        }

        .btn-action {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 1rem;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-edit {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        .btn-edit:hover {
            background: rgba(245, 158, 11, 0.2);
            border-color: rgba(245, 158, 11, 0.5);
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(245, 158, 11, 0.3);
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .btn-delete:hover {
            background: rgba(239, 68, 68, 0.2);
            border-color: rgba(239, 68, 68, 0.5);
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(239, 68, 68, 0.3);
        }

        .delete-form {
            flex: 1;
            display: flex;
        }

        .delete-form button {
            width: 100%;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 968px) {
            .meal-detail-card {
                grid-template-columns: 1fr;
            }

            .meal-detail-image,
            .meal-no-image {
                min-height: 350px;
            }

            .meal-detail-content {
                padding: 2rem;
            }

            .meal-detail-name {
                font-size: 2rem;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>

    <div class="details-container">
        <div class="details-wrapper">
            <a href="{{ route('meals.index') }}" class="back-button">
                ← Back to Meals
            </a>

            <div class="meal-detail-card">
                <div class="meal-image-section">
                    @if($meal->image)
                        <img src="{{ asset('storage/' . $meal->image) }}" class="meal-detail-image" alt="{{ $meal->name }}">
                    @else
                        <div class="meal-no-image">🍽️</div>
                    @endif
                </div>

                <div class="meal-detail-content">
                    <span class="category-badge">
                        🏷️ {{ $meal->category->name }}
                    </span>

                    <h1 class="meal-detail-name">{{ $meal->name }}</h1>

                    <div class="detail-section">
                        <div class="detail-label">
                            📝 Description
                        </div>
                        <div class="detail-value">
                            {{ $meal->description }}
                        </div>
                    </div>

                    <div class="detail-section">
                        <div class="detail-label">
                            💰 Price
                        </div>
                        <div class="price-value">
                            ${{ number_format($meal->price, 2) }}
                        </div>
                    </div>

                    <div class="detail-section">
                        <div class="detail-label">
                            📅 Created At
                        </div>
                        <div class="detail-value date-value">
                            {{ $meal->created_at->format('F d, Y') }}
                        </div>
                    </div>

                    <div class="action-buttons">
                        <a href="{{ route('meals.edit', $meal) }}" class="btn-action btn-edit">
                            ✏️ Edit Meal
                        </a>
                        <form action="{{ route('meals.destroy', $meal) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button class="btn-action btn-delete"
                                onclick="return confirm('Are you sure you want to delete this meal?')">
                                🗑️ Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection