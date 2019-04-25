<?php

namespace App\Http\Controllers\FrontEnd;

use Cart;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class cartController extends Controller
{
    public function index(){
    	$cart = Cart::content();
    	return view('FrontEnd.cart.index', [
    		'data' => $cart
    	]);
    }
    
    public function addItem($id){
    	$produit = Produit::find($id);
    	$cart = Cart::add(['id' => $produit->id,'name' => $produit->prod_name, 'qty' => 1,'price'=> $produit->prod_price, 'options' => [
    			'img' => $produit->prod_img
    		]]);
    	return back();
    }

    public function removeItem($id){
    	Cart::remove($id);
    	return back();
    }

    public function update(Request $request){
    	$qty = $request->newQty;
    	$rowId = $request->rowID;
    	Cart::update($rowId,$qty);
    	return back();
    }
}
