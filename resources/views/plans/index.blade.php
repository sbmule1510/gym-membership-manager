<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plans - FitZone Gym</title>
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
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 25px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        .header h1 {
            margin: 0;
            color: #312e81;
        }
        .header p {
            color: #64748b;
        }
        .add-btn {
            text-decoration: none;
            background: #4f46e5;
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            font-weight: bold;
        }
        .add-btn:hover {
            background: #3730a3;
        }
        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .table-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background: #eef2ff;
            color: #4338ca;
            padding: 13px;
            text-align: left;
        }
        td {
            padding: 14px;
            border-bottom: 1px solid #e2e8f0;
        }
        tr:hover {
            background: #f8faff;
        }
        .plan-name {
            font-weight: bold;
            color: #312e81;
        }
        .edit-btn {
            text-decoration: none;
            background: #e0e7ff;
            color: #4338ca;
            padding: 7px 11px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: bold;
        }
        .delete-btn {
            background: #fee2e2;
            color: #dc2626;
            border: none;
            padding: 7px 11px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        }
        .empty {
            text-align: center;
            padding: 30px;
            color: #64748b;
        }
    </style>
</head>
<body>
<div class="navbar">
    <div class="logo">
        💪 FitZone Gym
    </div>
    <div>
        Membership Plans
    </div>
</div>
<div class="container">
    <div class="header">
        <div>
            <h1>Membership Plans</h1>
            <p>
                Manage your gym membership plans and fees.
            </p>
        </div>
        <a href="{{ route('plans.create') }}" class="add-btn">
            + Add Plan
        </a>
    </div>
    @if (session('success'))
        <div class="success">
            ✓ {{ session('success') }}
        </div>
    @endif
    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Plan Name</th>
                    <th>Duration</th>
                    <th>Fee</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($plans as $plan)
                <tr>
                    <td>
                        {{ $plan->id }}
                    </td>
                    <td class="plan-name">
                        {{ $plan->plan_name }}
                    </td>
                    <td>
                        {{ $plan->duration_months }}
                        month(s)
                    </td>
                    <td>
                        ₹{{ $plan->fee }}
                    </td>
                    <td>
                        <a href="{{ route('plans.edit', $plan->id) }}"
                           class="edit-btn">
                            Edit
                        </a>
                        <form action="{{ route('plans.destroy', $plan->id) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this plan?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="empty">
                        No membership plans found.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>