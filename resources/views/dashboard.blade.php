@extends('layouts.admin-layout')

@section('title', 'Dashboard')

@section('content')
    <h2 class="page-title">
        <i class="fas fa-chart-line"></i> Dashboard
    </h2>
    <p style="color: rgba(255, 255, 255, 0.6); font-size: 1.1rem; margin-bottom: 40px;">
        Welcome back! Manage your restaurant efficiently
    </p>

    <div class="row g-4 mb-5">
        <!-- Categories Card -->
        <div class="col-md-6">
            <div class="stat-card">
                <div style="position: relative; z-index: 1;">
                    <h3 style="color: #ff4444; font-size: 1.2rem; font-weight: 700; margin-bottom: 10px;">
                        <i class="fas fa-list"></i> Categories
                    </h3>
                    <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 25px;">
                        Manage food categories
                    </p>
                    <a href="{{ route('categories.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-right"></i> View Categories
                    </a>
                </div>
                <i class="fas fa-layer-group stat-icon"></i>
            </div>
        </div>

        <!-- Meals Card -->
        <div class="col-md-6">
            <div class="stat-card">
                <div style="position: relative; z-index: 1;">
                    <h3 style="color: #ff4444; font-size: 1.2rem; font-weight: 700; margin-bottom: 10px;">
                        <i class="fas fa-hamburger"></i> Meals
                    </h3>
                    <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 25px;">
                        Manage menu items
                    </p>
                    <a href="{{ route('meals.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-right"></i> View Meals
                    </a>
                </div>
                <i class="fas fa-utensils stat-icon"></i>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="card">
        <div class="card-body">
            <h4 style="color: #ffffff; font-weight: 700; margin-bottom: 25px;">
                <i class="fas fa-bolt"></i> Quick Actions
            </h4>
            <div class="d-flex gap-3 flex-wrap">
                <a href="{{ route('categories.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Category
                </a>
                <a href="{{ route('meals.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Meal
                </a>
                <a href="{{ route('home') }}" class="btn btn-secondary" target="_blank">
                    <i class="fas fa-eye"></i> View Website
                </a>
            </div>
        </div>
    </div>
@endsection