<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class AdminLeaveRequestScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        //if the user is an admin, show all leave requests
        if (auth()->user()->hasRole('Admin')) {
            $builder->with('user')->latest();
        } else {
            //if the user is not an admin, show only their leave requests
            $builder->where('user_id', auth()->id())->with('user')->latest();
        }
    }
}
