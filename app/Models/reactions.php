<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reactions extends Model
{
    //

    use HasFactory;
    protected $table='reactions';
    protected $fillable=['post_ID','user_ID','reaction'];

}
