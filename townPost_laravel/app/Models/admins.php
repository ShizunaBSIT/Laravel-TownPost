<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admins extends Model
{
    //
    use HasFactory;
    protected $table='admins';
    protected $fillable=['user_ID','date_start'];

    protected $primaryKey = 'admin_ID';
}
