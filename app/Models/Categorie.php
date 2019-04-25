<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = (['cat_name', 'cat_desc', 'cat_img']);
}
