<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant - Our Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #000000;
            color: #ffffff;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar-custom {
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 25px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            animation: fadeInDown 0.6s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -1px;
        }

        .logo span {
            color: #ff4444;
        }

        .nav-links {
            display: flex;
            gap: 40px;
            align-items: center;
        }

        .nav-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: #ffffff;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #ff4444;
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        /* Hero Section */
        .hero-section {
            padding: 120px 0 80px;
            text-align: center;
            position: relative;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255, 68, 68, 0.15) 0%, transparent 70%);
            filter: blur(80px);
            z-index: -1;
        }

        .hero-section h1 {
            font-size: 5rem;
            font-weight: 900;
            letter-spacing: -3px;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #ffffff 0%, #888888 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.1;
        }

        .hero-section p {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.6);
            max-width: 600px;
            margin: 0 auto;
            font-weight: 300;
        }

        /* Category Filter */
        .category-section {
            padding: 60px 0;
            text-align: center;
        }

        .category-filter {
            display: inline-flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
            background: rgba(255, 255, 255, 0.03);
            padding: 15px 25px;
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .category-btn {
            padding: 12px 30px;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
            border-radius: 30px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .category-btn:hover {
            background: #ff4444;
            border-color: #ff4444;
            color: #ffffff;
            transform: translateY(-2px);
        }

        .category-btn.active {
            background: #ffffff;
            border-color: #ffffff;
            color: #000000;
        }

        /* Meals Grid */
        .meals-section {
            padding: 40px 0 100px;
        }

        .meal-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            position: relative;
            backdrop-filter: blur(10px);
        }

        .meal-card:hover {
            transform: translateY(-10px);
            border-color: rgba(255, 68, 68, 0.5);
            box-shadow: 0 20px 60px rgba(255, 68, 68, 0.2);
        }

        .meal-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 68, 68, 0.1) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.4s ease;
            pointer-events: none;
        }

        .meal-card:hover::before {
            opacity: 1;
        }

        .meal-image-wrapper {
            position: relative;
            height: 280px;
            overflow: hidden;
            background: #111111;
        }

        .meal-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .meal-card:hover .meal-image {
            transform: scale(1.1);
        }

        .price-tag {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #ff4444;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: 0 10px 30px rgba(255, 68, 68, 0.4);
        }

        .meal-body {
            padding: 30px;
        }

        .meal-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .meal-description {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .meal-category {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
        }

        .no-meals {
            text-align: center;
            padding: 100px 20px;
            animation: fadeIn 0.6s ease-out;
        }

        .no-meals i {
            font-size: 4rem;
            color: rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .no-meals h3 {
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 600;
        }

        /* Animations */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .meal-card {
            animation: slideUp 0.6s ease-out both;
        }

        .meal-card:nth-child(1) { animation-delay: 0.1s; }
        .meal-card:nth-child(2) { animation-delay: 0.2s; }
        .meal-card:nth-child(3) { animation-delay: 0.3s; }
        .meal-card:nth-child(4) { animation-delay: 0.4s; }
        .meal-card:nth-child(5) { animation-delay: 0.5s; }
        .meal-card:nth-child(6) { animation-delay: 0.6s; }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 3rem;
            }

            .nav-links {
                gap: 20px;
            }

            .category-filter {
                padding: 10px 15px;
                gap: 10px;
            }

            .category-btn {
                padding: 10px 20px;
                font-size: 0.85rem;
            }
        }

        /* Container */
        .container-custom {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 30px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar-custom">
        <div class="container-custom">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <i class="fas fa-utensils"></i> Restaurant<span>.</span>
                </div>
                <div class="nav-links">
                    <a href="{{ route('home') }}">Menu</a>
                    <a href="{{ route('login') }}">Admin</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container-custom">
            <h1>Our Menu</h1>
            <p>Discover our carefully crafted dishes made with the finest ingredients</p>
        </div>
    </div>

    <!-- Category Filter -->
    <div class="category-section">
        <div class="container-custom">
            <div class="category-filter">
                <a href="{{ route('home') }}" class="category-btn {{ !request()->route('id') ? 'active' : '' }}">
                    All
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('category.filter', $category->id) }}" class="category-btn">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Meals Grid -->
    <div class="meals-section">
        <div class="container-custom">
            <div class="row g-4">
                @forelse($meals as $meal)
                    <div class="col-lg-4 col-md-6">
                        <div class="meal-card">
                            <div class="meal-image-wrapper">
                                @if($meal->image)
                                    <img src="{{ asset('storage/' . $meal->image) }}" class="meal-image" alt="{{ $meal->name }}">
                                @else
                                    <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=800&h=600&fit=crop" class="meal-image" alt="No image">
                                @endif
                                <div class="price-tag">
                                    ${{ number_format($meal->price, 2) }}
                                </div>
                            </div>
                            <div class="meal-body">
                                <h3 class="meal-title">{{ $meal->name }}</h3>
                                <p class="meal-description">{{ Str::limit($meal->description, 100) }}</p>
                                <span class="meal-category">
                                    <i class="fas fa-tag"></i>
                                    {{ $meal->category->name }}
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="no-meals">
                            <i class="fas fa-utensils"></i>
                            <h3>No meals available in this category</h3>
                            <p style="color: rgba(255, 255, 255, 0.4); margin-top: 10px;">Try selecting a different category</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>