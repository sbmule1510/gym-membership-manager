<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members - FitZone Gym</title>
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
        .nav-title {
            font-size: 14px;
        }
        .container {
            max-width: 1200px;
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
            margin-top: 7px;
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
        .stats {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            flex: 1;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
        }
        .stat-card h3 {
            margin: 0;
            color: #64748b;
            font-size: 14px;
        }
        .number {
            margin-top: 8px;
            font-size: 28px;
            font-weight: bold;
            color: #4f46e5;
        }
        .table-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
            overflow-x: auto;
        }
        .table-title {
            font-size: 20px;
            font-weight: bold;
            color: #312e81;
            margin-bottom: 18px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background: #eef2ff;
            color: #4338ca;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 13px 12px;
            border-bottom: 1px solid #e2e8f0;
        }
        tr:hover {
            background: #f8faff;
        }
        .member-name {
            font-weight: bold;
            color: #312e81;
        }
        .badge {
            padding: 6px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
        }
        .paid {
            background: #dcfce7;
            color: #15803d;
        }
        .pending {
            background: #fee2e2;
            color: #dc2626;
        }
        .partial {
            background: #ffedd5;
            color: #ea580c;
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
        .edit-btn:hover {
            background: #c7d2fe;
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
        .delete-btn:hover {
            background: #fecaca;
        }
        .empty {
            text-align: center;
            padding: 30px;
            color: #64748b;
        }
        @media (max-width: 800px) {

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            .stats {
                flex-direction: column;
            }
            .navbar {
                padding: 15px 20px;
            }
        }
    </style>
</head>
<body>
<div class="navbar">
    <div class="logo">
        💪 FitZone Gym
    </div>
    <div class="nav-title">
        Membership Management
    </div>
</div>
<div class="container">
    <div class="header">
        <div>
            <h1>Members</h1>
            <p>
                View and manage your gym members easily.
            </p>
        </div>
        <a href="{{ route('members.create') }}" class="add-btn">
            + Add Member
        </a>
    </div>
    @if (session('success'))
        <div class="success">
            ✓ {{ session('success') }}
        </div>
    @endif
    <div class="stats">
        <div class="stat-card">
            <h3>Total Members</h3>
            <div class="number">
                {{ $members->count() }}
            </div>
        </div>
        <div class="stat-card">
            <h3>Paid Members</h3>
            <div class="number">
                {{ $members->where('fee_status', 'Paid')->count() }}
            </div>
        </div>
        <div class="stat-card">
            <h3>Pending Fees</h3>
            <div class="number">
                {{ $members->where('fee_status', 'Pending')->count() }}
            </div>
        </div>
    </div>
    <div class="table-card">
        <div class="table-title">
            👥 Member List
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Plan</th>
                    <th>Joining Date</th>
                    <th>Expiry Date</th>
                    <th>Fee</th>
                    <th>Payment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>
                        {{ $member->id }}
                    </td>
                    <td class="member-name">
                        {{ $member->name }}
                    </td>
                    <td>
                        {{ $member->mobile }}
                    </td>
                    <td>
                        {{ $member->plan->plan_name }}
                    </td>
                    <td>
                        {{ $member->joining_date }}
                    </td>
                    <td>
                        {{ $member->expiry_date }}
                    </td>
                    <td>
                        ₹{{ $member->fee_amount }}
                    </td>
                    <td>
                        <span class="badge {{ strtolower($member->fee_status) }}">
                            {{ $member->fee_status }}
                        </span>

                    <td>
                    <td>
                        <a href="{{ route('members.edit', $member->id) }}"
                           class="edit-btn">
                            Edit
                        </a>
                        <form action="{{ route('members.destroy', $member->id) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this member?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="empty">
                        No members found.
                        <br><br>
                        Add your first member using the button above.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>