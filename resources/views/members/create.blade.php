<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Member - FitZone Gym</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6ff;
            color: #1e293b;
        }
        .navbar {
            background: #4f46e5;
            color: white;
            padding: 18px 7%;
        }
        .navbar h2 {
            margin: 0;
        }
        .container {
            max-width: 650px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }
        h1 {
            margin-top: 0;
            color: #312e81;
        }
        p {
            color: #64748b;
        }
        label {
            display: block;
            margin-top: 18px;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input,
        select {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font-size: 15px;
        }
        .error {
            color: red;
            font-size: 13px;
            margin-top: 5px;
        }
        .buttons {
            margin-top: 25px;
        }
        .save-btn {
            background: #4f46e5;
            color: white;
            border: none;
            padding: 11px 20px;
            border-radius: 7px;
            cursor: pointer;
        }
        .save-btn:hover {
            background: #3730a3;
        }
        .back-btn {
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
        <h1>Add New Member</h1>
        <p>Enter the member details below.</p>
        <form action="{{ route('members.store') }}" method="POST">
            @csrf
            <label>Member Name</label>
            <input
                type="text"
                name="name"
                placeholder="Enter member name"
                value="{{ old('name') }}"
            >
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
            <label>Mobile Number</label>
            <input
                type="text"
                name="mobile"
                placeholder="Enter mobile number"
                value="{{ old('mobile') }}"
            >
            @error('mobile')
                <div class="error">{{ $message }}</div>
            @enderror
            <label>Email</label>
            <input
                type="email"
                name="email"
                placeholder="Enter email"
                value="{{ old('email') }}"
            >
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
            <label>Joining Date</label>
            <input
                type="date"
                name="joining_date"
                value="{{ old('joining_date') }}"
            >
            @error('joining_date')
                <div class="error">{{ $message }}</div>
            @enderror
            <label>Membership Plan</label>
            <select name="plan_id">
                <option value="">Select Plan</option>
                @foreach ($plans as $plan)
                    <option
                        value="{{ $plan->id }}"
                        {{ old('plan_id') == $plan->id ? 'selected' : '' }}
                    >
                        {{ $plan->plan_name }} - ₹{{ $plan->fee }}
                    </option>
                @endforeach
            </select>
            @error('plan_id')
                <div class="error">{{ $message }}</div>
            @enderror
            <label>Fee Status</label>
            <select name="fee_status">
                <option value="">Select Fee Status</option>
                <option value="Paid" {{ old('fee_status') == 'Paid' ? 'selected' : '' }}>
                    Paid
                </option>
                <option value="Pending" {{ old('fee_status') == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>
                <option value="Partial" {{ old('fee_status') == 'Partial' ? 'selected' : '' }}>
                    Partial
                </option>
            </select>
            @error('fee_status')
                <div class="error">{{ $message }}</div>
            @enderror
            <div class="buttons">
                <button type="submit" class="save-btn">
                    Add Member
                </button>
                <a href="{{ route('members.index') }}" class="back-btn">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</body>
</html>