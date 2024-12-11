<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reaction_img extends Model
{
    // we'll manually input the data in the database because this table is meant to store the
    // filenames of different image files of reaction icons

    use HasFactory;
    protected $table='reaction_imgs';
}
