<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Restaurant Admin</title>
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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        body::before {
            content: '';
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255, 68, 68, 0.15) 0%, transparent 70%);
            filter: blur(100px);
            z-index: 0;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            overflow: hidden;
            max-width: 450px;
            width: 100%;
            padding: 50px;
            position: relative;
            z-index: 1;
            animation: slideUp 0.6s ease-out;
        }

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

        .logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo i {
            font-size: 3rem;
            color: #ff4444;
            margin-bottom: 15px;
        }

        .logo h2 {
            font-size: 2rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0;
            letter-spacing: -1px;
        }

        .logo p {
            color: rgba(255, 255, 255, 0.6);
            margin-top: 8px;
            font-size: 0.95rem;
        }

        .form-label {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ffffff;
            padding: 14px 18px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #ff4444;
            color: #ffffff;
            box-shadow: 0 0 0 0.2rem rgba(255, 68, 68, 0.15);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .btn-primary {
            background: #ff4444;
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background: #ff5555;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(255, 68, 68, 0.4);
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            color: rgba(255, 255, 255, 0.6);
        }

        .login-link a {
            color: #ff4444;
            font-weight: 600;
            text-decoration: none;
        }

        .login-link a:hover {
            color: #ff5555;
        }

        .alert {
            background: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #ea868f;
            border-radius: 12px;
            padding: 12px;
            margin-bottom: 20px;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="logo">
            <i class="fas fa-utensils"></i>
            <h2>Create Account</h2>
            <p>Join Restaurant Admin</p>
        </div>

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">
                    <i class="fas fa-user"></i> Name
                </label>
                <input 
                    id="name" 
                    type="text" 
                    name="name" 
                    class="form-control" 
                    value="{{ old('name') }}" 
                    required 
                    autofocus
                    placeholder="Enter your full name"
                >
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">
                    <i class="fas fa-envelope"></i> Email
                </label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    class="form-control" 
                    value="{{ old('email') }}" 
                    required
                    placeholder="Enter your email"
                >
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">
                    <i class="fas fa-lock"></i> Password
                </label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    class="form-control" 
                    required
                    placeholder="Enter your password"
                >
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">
                    <i class="fas fa-lock"></i> Confirm Password
                </label>
                <input 
                    id="password_confirmation" 
                    type="password" 
                    name="password_confirmation" 
                    class="form-control" 
                    required
                    placeholder="Confirm your password"
                >
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-user-plus"></i> Register
            </button>

            <div class="login-link">
                Already have an account? <a href="{{ route('login') }}">Login</a>
            </div>
        </form>
    </div>
</body>
</html>