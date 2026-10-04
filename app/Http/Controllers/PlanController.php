<?php
namespace App\Http\Controllers;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::latest()->get();
        return view('plans.index', compact('plans'));
    }
    //add plan form
    public function create()
    {
        return view('plans.create');
    }

    //Save new plan
    public function store(Request $request)
    {
        $request->validate([
            'plan_name' => 'required|string|max:100',
            'duration_months' => 'required|integer|min:1',
            'fee' => 'required|numeric|min:0',
        ]);
        Plan::create([
            'plan_name' => $request->plan_name,
            'duration_months' => $request->duration_months,
            'fee' => $request->fee,
        ]);
        return redirect()
            ->route('plans.index')
            ->with('success', 'Plan added successfully!');
    }
    public function edit($id)
    {
        $plan = Plan::findOrFail($id);

        return view('plans.edit', compact('plan'));
    }
    public function update(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);
        $request->validate([
            'plan_name' => 'required|string|max:100',
            'duration_months' => 'required|integer|min:1',
            'fee' => 'required|numeric|min:0',
        ]);
        $plan->update([
            'plan_name' => $request->plan_name,
            'duration_months' => $request->duration_months,
            'fee' => $request->fee,
        ]);
        return redirect()
            ->route('plans.index')
            ->with('success', 'Plan updated successfully!');
    }
    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();
        return redirect()
            ->route('plans.index')
            ->with('success', 'Plan deleted successfully!');
    }
}