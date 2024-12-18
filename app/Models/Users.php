<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use HasFactory;

    // Specify the table name
    protected $table = 'users';

    // Specify the fillable fields
    protected $fillable = ['username', 'email', 'password', 'date_created'];

    protected $primaryKey = 'user_ID';

    // Hash the password when setting it
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function comments()
    {
        return $this->hasMany(comments::class, 'user_ID', 'id');
    }

}
