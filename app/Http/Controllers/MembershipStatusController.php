<?php
namespace App\Http\Controllers;
use App\Models\Member;
use Carbon\Carbon;
class MembershipStatusController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $nextSevenDays = Carbon::today()->addDays(7);

        $activeMembers = Member::with('plan')
            ->where('expiry_date', '>', $nextSevenDays)
            ->get();
        $expiringMembers = Member::with('plan')
            ->whereBetween('expiry_date', [$today, $nextSevenDays])
            ->get();
        $expiredMembers = Member::with('plan')
            ->where('expiry_date', '<', $today)
            ->get();
        return view('membership-status', compact(
            'activeMembers',
            'expiringMembers',
            'expiredMembers'
        ));
    }
}