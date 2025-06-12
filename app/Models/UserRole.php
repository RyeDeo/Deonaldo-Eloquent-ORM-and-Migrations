<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $table = 'user_role'; // Explicitly set table name
    public $timestamps = false; // Disable timestamps for pivot table
}
