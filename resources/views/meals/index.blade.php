@extends('layouts.admin-layout')

@section('title', 'Meals')

@section('content')
<style>
    .meals-container {
        background: linear-gradient(135deg, #000000 0%, #0a0a0a 100%);
        min-height: 100vh;
        padding: 2rem;
    }

    .meals-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        animation: slideDown 0.6s ease-out;
    }

    .meals-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #ffffff;
        margin: 0;
        letter-spacing: -0.5px;
    }

    .btn-add {
        background: linear-gradient(135deg, #ff4444 0%, #cc0000 100%);
        color: white;
        padding: 0.875rem 2rem;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 68, 68, 0.3);
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 25px rgba(255, 68, 68, 0.5);
        color: white;
    }

    .alert-success {
        background: rgba(34, 197, 94, 0.1);
        border: 1px solid rgba(34, 197, 94, 0.3);
        border-radius: 12px;
        padding: 1rem 1.5rem;
        color: #22c55e;
        margin-bottom: 2rem;
        animation: slideDown 0.5s ease-out;
        backdrop-filter: blur(10px);
    }

    .meals-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 1.5rem;
        animation: fadeIn 0.8s ease-out;
    }

    .meal-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        overflow: hidden;
        backdrop-filter: blur(10px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        animation: slideUp 0.6s ease-out backwards;
    }

    .meal-card:nth-child(1) { animation-delay: 0.1s; }
    .meal-card:nth-child(2) { animation-delay: 0.15s; }
    .meal-card:nth-child(3) { animation-delay: 0.2s; }
    .meal-card:nth-child(4) { animation-delay: 0.25s; }
    .meal-card:nth-child(5) { animation-delay: 0.3s; }
    .meal-card:nth-child(6) { animation-delay: 0.35s; }

    .meal-card:hover {
        transform: translateY(-8px);
        background: rgba(255, 255, 255, 0.05);
        border-color: rgba(255, 68, 68, 0.3);
        box-shadow: 0 12px 40px rgba(255, 68, 68, 0.25);
    }

    .meal-image-container {
        position: relative;
        width: 100%;
        height: 200px;
        background: linear-gradient(135deg, rgba(255, 68, 68, 0.1) 0%, rgba(0, 0, 0, 0.3) 100%);
        overflow: hidden;
    }

    .meal-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .meal-card:hover .meal-image {
        transform: scale(1.1);
    }

    .meal-no-image {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        color: rgba(255, 255, 255, 0.2);
    }

    .meal-price-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: linear-gradient(135deg, #ff4444 0%, #cc0000 100%);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 700;
        font-size: 1.125rem;
        box-shadow: 0 4px 15px rgba(255, 68, 68, 0.4);
    }

    .meal-content {
        padding: 1.5rem;
    }

    .meal-name {
        font-size: 1.375rem;
        font-weight: 600;
        color: #ffffff;
        margin: 0 0 0.75rem 0;
        line-height: 1.3;
    }

    .meal-category {
        display: inline-block;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.7);
        padding: 0.375rem 0.875rem;
        border-radius: 20px;
        font-size: 0.875rem;
        margin-bottom: 1rem;
        font-weight: 500;
    }

    .meal-actions {
        display: flex;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .btn-action {
        flex: 1;
        padding: 0.625rem;
        border: none;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.375rem;
    }

    .btn-view {
        background: rgba(59, 130, 246, 0.1);
        color: #3b82f6;
        border: 1px solid rgba(59, 130, 246, 0.3);
    }

    .btn-view:hover {
        background: rgba(59, 130, 246, 0.2);
        border-color: rgba(59, 130, 246, 0.5);
        transform: translateY(-2px);
        color: #60a5fa;
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
        color: #fbbf24;
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
    }

    .delete-form {
        flex: 1;
        display: flex;
    }

    .delete-form button {
        width: 100%;
    }

    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 4rem 2rem;
        color: rgba(255, 255, 255, 0.5);
    }

    .empty-state-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.3;
    }

    .empty-state-text {
        font-size: 1.125rem;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
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

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @media (max-width: 768px) {
        .meals-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        .meals-grid {
            grid-template-columns: 1fr;
        }

        .meal-actions {
            flex-wrap: wrap;
        }

        .btn-action {
            flex: 1 1 calc(50% - 0.25rem);
        }
    }
</style>

<div class="meals-container">
    <div class="meals-header">
        <h2 class="meals-title">Meals</h2>
        <a href="{{ route('meals.create') }}" class="btn-add">
            <span>+</span>
            Add Meal
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">
            ✓ {{ session('success') }}
        </div>
    @endif

    <div class="meals-grid">
        @forelse ($meals as $meal)
            <div class="meal-card">
                <div class="meal-image-container">
                    @if($meal->image)
                        <img src="{{ asset('storage/' . $meal->image) }}" alt="{{ $meal->name }}" class="meal-image">
                    @else
                        <div class="meal-no-image">🍽️</div>
                    @endif
                    <div class="meal-price-badge">${{ number_format($meal->price, 2) }}</div>
                </div>
                <div class="meal-content">
                    <h3 class="meal-name">{{ $meal->name }}</h3>
                    <span class="meal-category">{{ $meal->category->name }}</span>
                    <div class="meal-actions">
                        <a href="{{ route('meals.show', $meal) }}" class="btn-action btn-view">
                            <span>👁️</span> View
                        </a>
                        <a href="{{ route('meals.edit', $meal) }}" class="btn-action btn-edit">
                            ✏️ Edit
                        </a>
                        <form action="{{ route('meals.destroy', $meal) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button class="btn-action btn-delete" onclick="return confirm('Are you sure you want to delete this meal?')">
                                🗑️ Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <div class="empty-state-icon">🍽️</div>
                <p class="empty-state-text">No meals yet. Add your first meal to get started!</p>
            </div>
        @endforelse
    </div>
</div>
@endsection