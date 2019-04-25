<?php

namespace App\Http\Controllers\FrontEnd;

use Cart;
use App\helpers;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class FrontController extends Controller
{
    public function index()
    {
    	$produits = Produit::with('cats');
        $cart = Cart::content();
    	return view('FrontEnd.index', compact('produits'),[
            'data'=>$cart
        ]);
    }

    public function allProducts()
    {
        $produits = Produit::all();
        $cart = Cart::content();
        return view('FrontEnd.allproduits', compact('produits'),[
            'data'=>$cart
        ]);
    }

    public function cat(Request $request)
	{
		$cat = $request->cat_id;
        $cart = Cart::content();
		$datas = DB::table('produits')
		->join('categories','categories.id','produits.cat_id')		
	   ->where('categories.cat_name', $cat)
		->get();

    
		return 
         view('FrontEnd.produits', [
        'datas' => $datas, 'data'=> $cart, 'catByUser'=> $cat
        ]);
		


	}

    public function produitDetail(Request $request){
        
        $prod_slug = $request->prod_slug;
        $cart = Cart::content();
        $produits = Produit::with('cats')
        ->where('produits.prod_slug',$prod_slug)
        ->get();

        return view('FrontEnd.produit-detail', [
        'produits' => $produits, 'data'=> $cart
        ]);
       
    }

    public function contact()
    {
        $produits = Produit::all();
        $cart = Cart::content();
        return view('FrontEnd.contact', compact('produits'),[
            'data'=>$cart
        ]);
    }

}
