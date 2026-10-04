<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - FitZone Gym</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6ff;
            color: #1e293b;
        }
        .navbar {
            background: linear-gradient(135deg, #7c3aed, #2563eb);
            color: white;
            padding: 18px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar h2 {
            margin: 0;
        }
        .logout {
            background: white;
            color: #4f46e5;
            border: none;
            padding: 9px 16px;
            border-radius: 7px;
            cursor: pointer;
        }
        .container {
            padding: 35px 7%;
        }
        .container h1 {
            color: #312e81;
        }
        .cards {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 25px;
        }
        .card {
            background: white;
            padding: 22px;
            width: 190px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        .card h3 {
            margin: 0;
            color: #64748b;
            font-size: 15px;
        }
        .card p {
            font-size: 30px;
            font-weight: bold;
            color: #4f46e5;
            margin: 10px 0 0;
        }
        .actions {
            margin-top: 35px;
        }
        .actions a {
            display: inline-block;
            text-decoration: none;
            background: #4f46e5;
            color: white;
            padding: 12px 18px;
            margin: 8px 8px 0 0;
            border-radius: 8px;
        }
        .actions a:hover {
            background: #3730a3;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>💪 FitZone Gym</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout">Logout</button>
        </form>
    </div>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <p>Welcome back! Manage your gym members and plans from here.</p>
        <div class="cards">
            <div class="card">
                <h3>Total Members</h3>
                <p>{{ $totalMembers }}</p>
            </div>
            <div class="card">
                <h3>Paid Members</h3>
                <p>{{ $paidMembers }}</p>
            </div>
            <div class="card">
                <h3>Pending Fees</h3>
                <p>{{ $pendingMembers }}</p>
            </div>
            <div class="card">
                <h3>Expiring Soon</h3>
                <p>{{ $expiringSoon }}</p>
            </div>
        </div>
        <div class="actions">
            <h2>Quick Actions</h2>
            <a href="{{ route('members.create') }}">
                + Add Member
            </a>
            <a href="{{ route('members.index') }}">
                View Members
            </a>
            <a href="{{ route('plans.index') }}">
                Manage Plans
            </a>
            <a href="{{ route('membership.status') }}">
                Membership Status
            </a>
        </div>
    </div>
</body>
</html>