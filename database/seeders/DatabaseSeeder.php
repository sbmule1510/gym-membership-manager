<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Plan;
class PlanSeeder extends Seeder
{
    public function run(): void
    {
        Plan::create([
            'plan_name' => 'Monthly',
            'duration_months' => 1,
            'fee' => 1000,
        ]);
        Plan::create([
            'plan_name' => 'Quarterly',
            'duration_months' => 3,
            'fee' => 2500,
        ]);
        Plan::create([
            'plan_name' => 'Half Yearly',
            'duration_months' => 6,
            'fee' => 4500,
        ]);
        Plan::create([
            'plan_name' => 'Yearly',
            'duration_months' => 12,
            'fee' => 8000,
        ]);
    }
}