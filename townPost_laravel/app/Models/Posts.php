<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    // Posts table

    use HasFactory;
    protected $table='posts';
    protected $fillable=['user_ID','category_ID','title','content',"date_posted"];
    
   protected $primaryKey ='post_ID';
}
