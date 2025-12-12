{{-- CREATE FORM --}}
@extends('layouts.admin-layout')

@section('title', 'Create Meal')

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

    .image-preview {
        margin-top: 1rem;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .image-preview img {
        display: block;
        max-width: 200px;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .btn-submit {
        flex: 1;
        background: linear-gradient(135deg, #ff4444 0%, #cc0000 100%);
        color: white;
        padding: 1rem 2rem;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 68, 68, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 25px rgba(255, 68, 68, 0.5);
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
            <h2 class="form-title">Add New Meal</h2>
            <p class="form-subtitle">Create a delicious new meal for your menu</p>
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

        <form method="POST" action="{{ route('meals.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-card">
                <div class="form-group">
                    <label class="form-label">Meal Name</label>
                    <input type="text" name="name" class="form-input" placeholder="e.g., Grilled Salmon" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-textarea" placeholder="Describe your meal..." required>{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Price ($)</label>
                    <input type="number" step="0.01" name="price" class="form-input" placeholder="0.00" value="{{ old('price') }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                <div style="color: #ffffff; font-weight: 600;">Upload Image</div>
                                <div class="file-input-text">Click to browse or drag and drop</div>
                            </div>
                        </label>
                        <input type="file" id="image" name="image" class="file-input" accept="image/*">
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('meals.index') }}" class="btn-cancel">Cancel</a>
                    <button type="submit" class="btn-submit">Create Meal</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection