<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Plan - FitZone Gym</title>
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
            max-width: 550px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }
        h1 {
            color: #312e81;
            margin-top: 0;
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
        input {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
        }
        .save-btn {
            margin-top: 25px;
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
        .error {
            color: red;
            font-size: 13px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>💪 FitZone Gym</h2>
    </div>
    <div class="container">
        <h1>Add Membership Plan</h1>
        <p>Enter the plan details below.</p>
        <form action="{{ route('plans.store') }}" method="POST">
            @csrf
            <label>Plan Name</label>
            <input
                type="text"
                name="plan_name"
                placeholder="Example: Monthly"
                value="{{ old('plan_name') }}"
            >
            @error('plan_name')
                <div class="error">{{ $message }}</div>
            @enderror
            <label>Duration (Months)</label>
            <input
                type="number"
                name="duration_months"
                placeholder="Example: 1"
                min="1"
                value="{{ old('duration_months') }}"
            >
            @error('duration_months')
                <div class="error">{{ $message }}</div>
            @enderror
            <label>Membership Fee</label>
            <input
                type="number"
                name="fee"
                placeholder="Example: 1000"
                min="0"
                step="0.01"
                value="{{ old('fee') }}"
            >
            @error('fee')
                <div class="error">{{ $message }}</div>
            @enderror
            <button type="submit" class="save-btn">
                Save Plan
            </button>
            <a href="{{ route('plans.index') }}" class="back-btn">
                Cancel
            </a>
        </form>
    </div>
</body>
</html>