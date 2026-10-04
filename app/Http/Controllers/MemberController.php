<?php
namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Plan;
use Illuminate\Http\Request;
use Carbon\Carbon;
class MemberController extends Controller
{
    public function create()
    {
        $plans = Plan::all();
        return view('members.create', compact('plans'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'nullable|email',
            'joining_date' => 'required|date',
            'plan_id' => 'required|exists:plans,id',
            'fee_status' => 'required|in:Paid,Pending,Partial',
        ]);
        $plan = Plan::findOrFail($request->plan_id);
        $joiningDate = Carbon::parse($request->joining_date);
        $expiryDate = $joiningDate->copy()->addMonths(
            $plan->duration_months
        );
        Member::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'joining_date' => $joiningDate,
            'plan_id' => $plan->id,
            'expiry_date' => $expiryDate,
            'fee_amount' => $plan->fee,
            'fee_status' => $request->fee_status,
        ]);
        return redirect()
            ->route('members.index')
            ->with('success', 'Member added successfully!');
    }
    public function index()
    {
        $members = Member::with('plan')->latest()->get();
        return view('members.index', compact('members'));
    }
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        $plans = Plan::all();
        return view('members.edit', compact('member', 'plans'));
    }
    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'nullable|email',
            'joining_date' => 'required|date',
            'plan_id' => 'required|exists:plans,id',
            'fee_status' => 'required|in:Paid,Pending,Partial',
        ]);
        $plan = Plan::findOrFail($request->plan_id);
        $joiningDate = Carbon::parse($request->joining_date);
        $expiryDate = $joiningDate->copy()->addMonths(
            $plan->duration_months
        );
        $member->update([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'joining_date' => $joiningDate,
            'plan_id' => $plan->id,
            'expiry_date' => $expiryDate,
            'fee_amount' => $plan->fee,
            'fee_status' => $request->fee_status,
        ]);
        return redirect()
            ->route('members.index')
            ->with('success', 'Member updated successfully!');
    }
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()
            ->route('members.index')
            ->with('success', 'Member deleted successfully!');
    }
}