<?php

namespace App\Models;

use App\Models\Scopes\AdminLeaveRequestScope;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    //
    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'reason',
        'status',
        'leave_type_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // AdminLeaveRequestScope
    protected static function booted()
    {
        static::addGlobalScope(new AdminLeaveRequestScope);
    }
}
