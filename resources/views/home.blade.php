<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitZone Gym</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6ff;
            color: #1e293b;
        }
        .navbar {
            background: white;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }
        .logo {
            font-size: 23px;
            font-weight: bold;
            color: #4f46e5;
        }
        .login-btn {
            text-decoration: none;
            background: #4f46e5;
            color: white;
            padding: 10px 18px;
            border-radius: 7px;
        }
        .login-btn:hover {
            background: #3730a3;
        }
        .hero {
            min-height: calc(100vh - 70px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
            padding: 50px 8%;
        }
        .hero-content {
            max-width: 600px;
        }
        .hero-content h1 {
            font-size: 48px;
            margin: 0;
            color: #312e81;
        }
        .hero-content p {
            font-size: 17px;
            line-height: 1.6;
            color: #64748b;
            margin: 20px 0;
}
        .buttons {
            margin-top: 20px;
        }
        .primary-btn,
        .secondary-btn {
            display: inline-block;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 7px;
            margin-right: 10px;
        }
        .primary-btn {
            background: #4f46e5;
            color: white;
        }
        .primary-btn:hover {
            background: #3730a3;
        }
        .secondary-btn {
            background: white;
            color: #4f46e5;
            border: 1px solid #c7d2fe;
        }
        .secondary-btn:hover {
            background: #eef2ff;
        }
        .features {
            display: flex;
            gap: 12px;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        .feature {
            background: white;
            padding: 10px 15px;
            border-radius: 7px;
            font-size: 14px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }
        .hero-card {
            width: 300px;
            padding: 45px 20px;
            text-align: center;
            background: #4f46e5;
            color: white;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(79, 70, 229, 0.25);
        }
        .hero-card .icon {
            font-size: 75px;
        }
        .hero-card h2 {
            margin: 12px 0 5px;
        }
        .hero-card p {
            color: #e0e7ff;
        }
        @media (max-width: 800px) {

            .hero {
                flex-direction: column;
                text-align: center;
            }
            .features {
                justify-content: center;
            }
            .hero-card {
                width: 280px;
            }
            .navbar {
                padding: 18px 5%;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            💪 FitZone Gym
        </div>
        <a href="{{ route('admin.login') }}" class="login-btn">
            Admin Login
        </a>
    </div>
    <section class="hero">
        <div class="hero-content">
            <h1>
                Manage Your Gym Smarter
            </h1>
            <p>
                A simple system to manage gym members,
                membership plans, fees and renewals
                easily in one place.
            </p>
            <div class="buttons">
                <a href="{{ route('admin.login') }}" class="primary-btn">
                    Admin Login
                </a>
                <a href="{{ route('members.index') }}" class="secondary-btn">
                    View Members
                </a>
            </div>
            <div class="features">
                <div class="feature">
                    👥 Member Management
                </div>
                <div class="feature">
                    💳 Fee Tracking
                </div>
                <div class="feature">
                    🔄 Membership Renewals
                </div>
            </div>
        </div>
        <div class="hero-card">
            <div class="icon">
                🏋️
            </div>
            <h2>
                FitZone Gym
            </h2>
            <p>
                Membership Manager
            </p>
        </div>
    </section>
</body>
</html>