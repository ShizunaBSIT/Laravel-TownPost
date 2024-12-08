<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    //
    use HasFactory;
    protected $table='comments';
    protected $fillable=['post_ID','user_ID','content'];

    protected $primaryKey = 'comment_ID';

    public function post()
    {
        return $this->belongsTo(posts::class, 'post_ID', 'id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_ID', 'id');
    }

}
