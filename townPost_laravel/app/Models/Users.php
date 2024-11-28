<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    // users table

    use HasFactory;
    protected $table='users';
    protected $fillable=['username','password','date_created'];
}
