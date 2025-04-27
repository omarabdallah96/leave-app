<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    // Define the fillable attributes for the Permission model
    protected $fillable = ['name','guard_name'];
}
