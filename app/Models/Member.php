<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Member extends Model
{
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'joining_date',
        'plan_id',
        'expiry_date',
        'fee_amount',
        'fee_status',
    ];
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}