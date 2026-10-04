<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - FitZone Gym</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: Arial, sans-serif;

            background: linear-gradient(
                135deg,
                #eef2ff,
                #dbeafe,
                #f5f3ff
            );
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 420px;
            background: white;
            padding: 40px;
            border-radius: 22px;
            box-shadow:
                0 20px 45px rgba(79, 70, 229, 0.18);
            animation: appear 0.8s ease;
        }
        @keyframes appear {
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
            font-size: 28px;
            font-weight: bold;
            color: #4f46e5;
            margin-bottom: 8px;
        }
        .subtitle {
            text-align: center;
            color: #64748b;
            margin-bottom: 30px;
        }
        h2 {
            text-align: center;
            color: #312e81;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #475569;
        }
        input {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            margin-bottom: 18px;
            transition: 0.3s ease;
        }
        input:focus {
            border-color: #7c3aed;
            box-shadow:
                0 0 0 3px rgba(124, 58, 237, 0.12);
        }
        .login-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 11px;
            background: linear-gradient(
                135deg,
                #7c3aed,
                #2563eb
            );
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
}

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow:
                0 10px 25px rgba(79, 70, 229, 0.35);
        }
        .back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #4f46e5;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s ease;
        }
        .back:hover {
            color: #7c3aed;
            transform: translateX(-3px);
        }
        @media (max-width: 500px) {
            .login-card {
                width: 90%;
                padding: 30px 25px;
            }
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="logo">
            💪 FitZone Gym
        </div>
        <h2>Admin Login</h2>
        <form action="{{ route('admin.login.submit') }}" method="POST">
    @csrf
            <label>Email</label>
            <input
                type="email"
                name="email"
                placeholder="Enter admin email"
                required
            >
            <label>Password</label>
            <input
                type="password"
                name="password"
                placeholder="Enter password"
                required
            >
            <button type="submit" class="login-btn">
                Login
            </button>
@if(session('error'))
    <p style="color: red; text-align: center;">
        {{ session('error') }}
    </p>
@endif
        </form>
        <a href="{{ url('/') }}" class="back">
            ← Back to Home
        </a>
    </div>
</body>
</html>