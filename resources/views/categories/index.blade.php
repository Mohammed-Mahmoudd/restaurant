@extends('layouts.admin-layout')

@section('title', 'Categories')

@section('content')
<style>
    .categories-container {
        background: linear-gradient(135deg, #000000 0%, #0a0a0a 100%);
        min-height: 100vh;
        padding: 2rem;
    }

    .categories-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        animation: slideDown 0.6s ease-out;
    }

    .categories-title {
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

    .categories-grid {
        display: grid;
        gap: 1.5rem;
        animation: fadeIn 0.8s ease-out;
    }

    .category-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 1.5rem;
        backdrop-filter: blur(10px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: grid;
        grid-template-columns: 1fr auto;
        gap: 1rem;
        align-items: center;
        animation: slideUp 0.6s ease-out backwards;
    }

    .category-card:nth-child(1) { animation-delay: 0.1s; }
    .category-card:nth-child(2) { animation-delay: 0.2s; }
    .category-card:nth-child(3) { animation-delay: 0.3s; }
    .category-card:nth-child(4) { animation-delay: 0.4s; }
    .category-card:nth-child(5) { animation-delay: 0.5s; }

    .category-card:hover {
        transform: translateY(-4px);
        background: rgba(255, 255, 255, 0.05);
        border-color: rgba(255, 68, 68, 0.3);
        box-shadow: 0 8px 32px rgba(255, 68, 68, 0.2);
    }

    .category-info {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .category-name {
        font-size: 1.25rem;
        font-weight: 600;
        color: #ffffff;
        margin: 0;
    }

    .category-slug {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.5);
        font-family: 'Courier New', monospace;
        background: rgba(255, 255, 255, 0.05);
        padding: 0.25rem 0.75rem;
        border-radius: 6px;
        display: inline-block;
        width: fit-content;
    }

    .category-actions {
        display: flex;
        gap: 0.75rem;
        align-items: center;
    }

    .btn-action {
        padding: 0.625rem 1.25rem;
        border: none;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-edit {
        background: rgba(59, 130, 246, 0.1);
        color: #3b82f6;
        border: 1px solid rgba(59, 130, 246, 0.3);
    }

    .btn-edit:hover {
        background: rgba(59, 130, 246, 0.2);
        border-color: rgba(59, 130, 246, 0.5);
        transform: translateY(-2px);
        color: #60a5fa;
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
        display: inline;
    }

    .empty-state {
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
        .categories-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        .category-card {
            grid-template-columns: 1fr;
        }

        .category-actions {
            justify-content: flex-start;
            width: 100%;
        }

        .btn-action {
            flex: 1;
        }
    }
</style>

<div class="categories-container">
    <div class="categories-header">
        <h2 class="categories-title">Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn-add">
            <span>+</span>
            Add Category
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">
            ✓ {{ session('success') }}
        </div>
    @endif

    <div class="categories-grid">
        @forelse ($categories as $category)
            <div class="category-card">
                <div class="category-info">
                    <h3 class="category-name">{{ $category->name }}</h3>
                    <span class="category-slug">{{ $category->slug }}</span>
                </div>
                <div class="category-actions">
                    <a href="{{ route('categories.edit', $category) }}" class="btn-action btn-edit">Edit</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button class="btn-action btn-delete" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <div class="empty-state-icon">📁</div>
                <p class="empty-state-text">No categories yet. Create your first category to get started!</p>
            </div>
        @endforelse
    </div>
</div>
@endsection