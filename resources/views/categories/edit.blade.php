@extends('layouts.admin-layout')

@section('title', 'Edit Category')

@section('content')
<style>
    .form-container {
        background: linear-gradient(135deg, #000000 0%, #0a0a0a 100%);
        min-height: 100vh;
        padding: 2rem;
    }

    .form-wrapper {
        max-width: 600px;
        margin: 0 auto;
        animation: slideUp 0.6s ease-out;
    }

    .form-header {
        margin-bottom: 2rem;
    }

    .form-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #ffffff;
        margin: 0 0 0.5rem 0;
        letter-spacing: -0.5px;
    }

    .form-subtitle {
        color: rgba(255, 255, 255, 0.6);
        font-size: 1rem;
    }

    .alert-danger {
        background: rgba(239, 68, 68, 0.1);
        border: 1px solid rgba(239, 68, 68, 0.3);
        border-radius: 12px;
        padding: 1rem 1.5rem;
        color: #ef4444;
        margin-bottom: 1.5rem;
        backdrop-filter: blur(10px);
        animation: shake 0.4s ease-out;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-10px); }
        75% { transform: translateX(10px); }
    }

    .form-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 2rem;
        backdrop-filter: blur(10px);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        color: #ffffff;
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-input {
        width: 100%;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        padding: 0.875rem 1rem;
        color: #ffffff;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        outline: none;
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 68, 68, 0.5);
        box-shadow: 0 0 0 3px rgba(255, 68, 68, 0.1);
    }

    .form-input.is-invalid {
        border-color: rgba(239, 68, 68, 0.5);
        background: rgba(239, 68, 68, 0.05);
    }

    .form-input::placeholder {
        color: rgba(255, 255, 255, 0.4);
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .btn-submit {
        flex: 1;
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: white;
        padding: 1rem 2rem;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 25px rgba(245, 158, 11, 0.5);
    }

    .btn-cancel {
        background: rgba(255, 255, 255, 0.05);
        color: rgba(255, 255, 255, 0.7);
        padding: 1rem 2rem;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-cancel:hover {
        background: rgba(255, 255, 255, 0.08);
        color: #ffffff;
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

    @media (max-width: 768px) {
        .form-actions {
            flex-direction: column;
        }
    }
</style>

<div class="form-container">
    <div class="form-wrapper">
        <div class="form-header">
            <h2 class="form-title">Edit Category</h2>
            <p class="form-subtitle">Update category information</p>
        </div>

        <form method="POST" action="{{ route('categories.update', $category) }}">
            @csrf
            @method('PUT')
            <div class="form-card">
                @error('name')
                    <div class="alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-group">
                    <label class="form-label">Category Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        class="form-input @error('name') is-invalid @enderror" 
                        value="{{ old('name', $category->name ?? '') }}"
                        required
                    >
                </div>

                <div class="form-actions">
                    <a href="{{ route('categories.index') }}" class="btn-cancel">Cancel</a>
                    <button type="submit" class="btn-submit">Update Category</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection