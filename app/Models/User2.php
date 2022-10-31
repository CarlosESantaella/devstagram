<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User2 extends Authenticatable
{
    use HasFactory;

    protected $guard_name = 'user2';
    protected $guarded = [];
    protected $table = 'users2';
}
