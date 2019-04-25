<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = (['prod_name', 'prod_desc', 'prod_slug', 'cat_id', 'prod_img', 'prod_price', 'prod_stock', 'prod_check']);

    

    public function getRouteKeyName(){

    	return 'prod_slug';
    }

    public function cats(){
    	return $this->belongsTo('App\Models\Categorie', 'cat_id');
    }
}
