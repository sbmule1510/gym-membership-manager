<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Status - FitZone Gym</title>
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
            background: linear-gradient(135deg, #6d28d9, #2563eb);
            padding: 18px 7%;
            color: white;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 23px;
            font-weight: bold;
        }
        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 25px;
        }
        h1 {
            color: #312e81;
            margin-bottom: 5px;
        }
        .subtitle {
            color: #64748b;
            margin-bottom: 30px;
        }
        .section {
            background: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
            overflow-x: auto;
        }
        .section h2 {
            margin-top: 0;
            font-size: 20px;
        }
        .active-title {
            color: #15803d;
        }
        .expiring-title {
            color: #ca8a04;
        }
        .expired-title {
            color: #dc2626;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th {
            background: #f1f5f9;
            padding: 12px;
            text-align: left;
            color: #475569;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
        }
        .empty {
            color: #64748b;
            padding: 15px 0;
        }
        .back-btn {
            display: inline-block;
            text-decoration: none;
            background: #4f46e5;
            color: white;
            padding: 10px 16px;
            border-radius: 7px;
            margin-bottom: 25px;
        }
        .back-btn:hover {
            background: #3730a3;
        }
    </style>
</head>
<body>
<div class="navbar">
    <div class="logo">
        💪 FitZone Gym
    </div>
    <div>
        Membership Status
    </div>
</div>
<div class="container">
    <a href="{{ route('dashboard') }}" class="back-btn">
        ← Back to Dashboard
    </a>
    <h1>Membership Status</h1>
    <p class="subtitle">
        Check active, expiring and expired memberships.
    </p>
    <div class="section">
        <h2 class="active-title">
            🟢 Active Members
        </h2>
        @if ($activeMembers->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Plan</th>
                        <th>Joining Date</th>
                        <th>Expiry Date</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($activeMembers as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->plan->plan_name }}</td>
                        <td>{{ $member->joining_date }}</td>
                        <td>{{ $member->expiry_date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="empty">
                No active members found.
            </p>
        @endif
    </div>
    <div class="section">
        <h2 class="expiring-title">
            🟡 Expiring Soon
        </h2>
        @if ($expiringMembers->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Plan</th>
                        <th>Expiry Date</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($expiringMembers as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->plan->plan_name }}</td>
                        <td>{{ $member->expiry_date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="empty">
                No memberships are expiring in the next 7 days.
            </p>
        @endif
    </div>
    <div class="section">
        <h2 class="expired-title">
            🔴 Expired Members
        </h2>
        @if ($expiredMembers->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Plan</th>
                        <th>Expiry Date</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($expiredMembers as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->plan->plan_name }}</td>
                        <td>{{ $member->expiry_date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="empty">
                No expired memberships found.
            </p>
        @endif
    </div>
</div>
</body>
</html>