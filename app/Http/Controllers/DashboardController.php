<?php
namespace App\Http\Controllers;
use App\Models\Member;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index()
    {
        $totalMembers = Member::count();
        $paidMembers = Member::where('fee_status', 'Paid')->count();
        $pendingMembers = Member::where('fee_status', 'Pending')->count();
        $expiringSoon = Member::whereBetween('expiry_date', [
            Carbon::today(),
            Carbon::today()->addDays(7)
        ])->count();
        return view('dashboard', compact(
            'totalMembers',
            'paidMembers',
            'pendingMembers',
            'expiringSoon'
        ));
    }
}