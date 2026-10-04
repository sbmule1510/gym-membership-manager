<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member - FitZone Gym</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6ff;
        }
        .navbar {
            background: linear-gradient(135deg, #7c3aed, #2563eb);
            color: white;
            padding: 18px 7%;
        }
        .container {
            width: 600px;
            max-width: 90%;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }
        h2 {
            color: #312e81;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input,
        select {
            width: 100%;
            padding: 11px;
            margin-bottom: 18px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
        }
        button {
            background: #4f46e5;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 7px;
            cursor: pointer;
        }
        button:hover {
            background: #3730a3;
        }
        .back {
            margin-left: 10px;
            text-decoration: none;
            color: #4f46e5;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>💪 FitZone Gym</h2>
    </div>
    <div class="container">
        <h2>Edit Member</h2>
        <form action="{{ route('members.update', $member->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label>Name</label>
            <input
                type="text"
                name="name"
                value="{{ $member->name }}"
                required
            >
            <label>Mobile</label>
            <input
                type="text"
                name="mobile"
                value="{{ $member->mobile }}"
                required
            >
            <label>Email</label>
            <input
                type="email"
                name="email"
                value="{{ $member->email }}"
            >
            <label>Joining Date</label>
            <input
                type="date"
                name="joining_date"
                value="{{ $member->joining_date }}"
                required
            >
            <label>Membership Plan</label>
            <select name="plan_id" required>
                @foreach($plans as $plan)
                    <option
                        value="{{ $plan->id }}"
                        {{ $member->plan_id == $plan->id ? 'selected' : '' }}
                    >
                        {{ $plan->plan_name }} - ₹{{ $plan->fee }}
                    </option>
                @endforeach
            </select>
            <label>Fee Status</label>
            <select name="fee_status" required>
                <option
                    value="Paid"
                    {{ $member->fee_status == 'Paid' ? 'selected' : '' }}
                >
                    Paid
                </option>
                <option
                    value="Pending"
                    {{ $member->fee_status == 'Pending' ? 'selected' : '' }}
                >
                    Pending
                </option>
                <option
                    value="Partial"
                    {{ $member->fee_status == 'Partial' ? 'selected' : '' }}
                >
                    Partial
                </option>
            </select>
            <button type="submit">
                Update Member
            </button>
            <a href="{{ route('members.index') }}" class="back">
                Cancel
            </a>
        </form>
    </div>
</body>
</html>