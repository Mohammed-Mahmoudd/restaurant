{{-- EDIT FORM --}}
@extends('layouts.admin-layout')

@section('title', 'Edit Meal')

@section('content')
<style>
    .form-container {
        background: linear-gradient(135deg, #000000 0%, #0a0a0a 100%);
        min-height: 100vh;
        padding: 2rem;
    }

    .form-wrapper {
        max-width: 800px;
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
        margin-bottom: 2rem;
        backdrop-filter: blur(10px);
    }

    .alert-danger ul {
        margin: 0;
        padding-left: 1.5rem;
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

    .form-input,
    .form-textarea,
    .form-select {
        width: 100%;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        padding: 0.875rem 1rem;
        color: #ffffff;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-input:focus,
    .form-textarea:focus,
    .form-select:focus {
        outline: none;
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 68, 68, 0.5);
        box-shadow: 0 0 0 3px rgba(255, 68, 68, 0.1);
    }

    .form-textarea {
        min-height: 120px;
        resize: vertical;
    }

    .form-select {
        cursor: pointer;
    }

    .form-select option {
        background: #1a1a1a;
        color: #ffffff;
    }

    .file-input-wrapper {
        position: relative;
        overflow: hidden;
    }

    .file-input-label {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.05);
        border: 2px dashed rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        padding: 2rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }

    .file-input-label:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 68, 68, 0.5);
    }

    .file-input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .file-input-text {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.875rem;
    }

    .current-image {
        margin-top: 1rem;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }

    .current-image-label {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
        display: block;
    }

    .current-image img {
        display: block;
        max-width: 200px;
        border-radius: 8px;
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
            <h2 class="form-title">Edit Meal</h2>
            <p class="form-subtitle">Update meal information</p>
        </div>

        @if ($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('meals.update', $meal->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-card">
                <div class="form-group">
                    <label class="form-label">Meal Name</label>
                    <input type="text" name="name" class="form-input" value="{{ old('name', $meal->name) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-textarea" required>{{ old('description', $meal->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Price ($)</label>
                    <input type="number" step="0.01" name="price" class="form-input" value="{{ old('price', $meal->price) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $meal->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Meal Image</label>
                    <div class="file-input-wrapper">
                        <label for="image" class="file-input-label">
                            <span style="font-size: 2rem;">📸</span>
                            <div>
                                <div style="color: #ffffff; font-weight: 600;">Upload New Image</div>
                                <div class="file-input-text">Click to browse or drag and drop</div>
                            </div>
                        </label>
                        <input type="file" id="image" name="image" class="file-input" accept="image/*">
                    </div>
                    
                    @if(isset($meal) && $meal->image)
                        <div class="current-image">
                            <span class="current-image-label">Current Image</span>
                            <img src="{{ asset('storage/' . $meal->image) }}" alt="{{ $meal->name }}">
                        </div>
                    @endif
                </div>

                <div class="form-actions">
                    <a href="{{ route('meals.index') }}" class="btn-cancel">Cancel</a>
                    <button type="submit" class="btn-submit">Update Meal</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection