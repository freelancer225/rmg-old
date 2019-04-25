<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\OtherUser;
use App\User;
use App\helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackController extends Controller
{
    public function index()
    {
    	return view('BackEnd.auth.login');
    }
    public function settings(Request $request)
    {
    	
    	$users = User::all();

    	return view('BackEnd.settings', compact('users'));

    }

    public function fetch_data(Request $request)
    {

        if ($request->ajax()) 
        {
            $produits = Produit::paginate(6);
            return view('BackEnd.produits_data', compact('produits'))->render();
        }
    }

    public function fetchCat_data(Request $request)
    {

        if ($request->ajax()) 
        {
            $categories = Categorie::paginate(6);
            return view('BackEnd.categories_data', compact('categories'))->render();
        }
    }
}
