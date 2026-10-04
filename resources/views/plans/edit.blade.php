<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Plan - FitZone Gym</title>
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
            font-size: 23px;
            font-weight: bold;
        }
        .container {
            max-width: 600px;
            margin: 45px auto;
            padding: 0 20px;
        }
        .form-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }
        h1 {
            margin-top: 0;
            color: #312e81;
        }
        .subtitle {
            color: #64748b;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 11px;
            margin-bottom: 18px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font-size: 14px;
        }
        input:focus {
            outline: none;
            border-color: #4f46e5;
        }
        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: -12px;
            margin-bottom: 12px;
        }
        .update-btn {
            background: #4f46e5;
            color: white;
            border: none;
            padding: 11px 20px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
        }
        .update-btn:hover {
            background: #3730a3;
        }
        .back-btn {
            text-decoration: none;
            color: #475569;
            margin-left: 12px;
        }
    </style>
</head>
<body>
<div class="navbar">
    💪 FitZone Gym
</div>
<div class="container">
    <div class="form-card">
        <h1>Edit Membership Plan</h1>
        <p class="subtitle">
            Update the plan details and save your changes.
        </p>
        <form action="{{ route('plans.update', $plan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label>Plan Name</label>
            <input
                type="text"
                name="plan_name"
                value="{{ old('plan_name', $plan->plan_name) }}"
            >
            @error('plan_name')
                <div class="error">{{ $message }}</div>
            @enderror
            <label>Duration (Months)</label>
            <input
                type="number"
                name="duration_months"
                min="1"
                value="{{ old('duration_months', $plan->duration_months) }}"
            >
            @error('duration_months')
                <div class="error">{{ $message }}</div>
            @enderror
            <label>Membership Fee</label>
            <input
                type="number"
                name="fee"
                min="0"
                step="0.01"
                value="{{ old('fee', $plan->fee) }}"
            >
            @error('fee')
                <div class="error">{{ $message }}</div>
            @enderror
            <div>
                <button type="submit" class="update-btn">
                    Update Plan
                </button>
                <a href="{{ route('plans.index') }}" class="back-btn">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
</body>
</html>