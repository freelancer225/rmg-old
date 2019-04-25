<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProduitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::paginate(6);
        return view('BackEnd.produits', compact('produits'));
    }
    



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([

            'prod_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $imageName = time().'.'.request()->prod_img->getClientOriginalExtension();

        request()->prod_img->move(public_path('img/produits'), $imageName);

        $prod_name = $request->prod_name;
        $prod_desc = $request->prod_desc;
        $cat_id = $request->cat_id;
        $prod_price = $request->prod_price;
        $prod_slug = str_slug($prod_name);
        $prod_stock = $request->prod_stock;
        $prod_check = $request->prod_check;

        
        $add_cat = Produit::create([
            'prod_name' => $prod_name,
            'prod_desc' => $prod_desc,
            'prod_slug' => $prod_slug,
            'cat_id' => $cat_id,
            'prod_price' => $prod_price,
            'prod_stock' => $prod_stock,
            'prod_check' => $prod_check,
            'prod_img' => $imageName,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
        return redirect('admin/produit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $produits = Produit::findOrFail($id);
        return view('BackEnd/modifier-produit', compact('produits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([

            'prod_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $prod_name = $request->prod_name;
            $prod_desc = $request->prod_desc;
            $cat_id = $request->cat_id;
            $prod_price = $request->prod_price;
            $prod_slug = str_slug($prod_name);
            $prod_stock = $request->prod_stock;
            $prod_check = $request->prod_check;
            

        if ($request->hasfile('prod_img')) {
            $imageName = time().'.'.request()->prod_img->getClientOriginalExtension();

            request()->prod_img->move(public_path('img/produits'), $imageName);

            
            Produit::whereId($id)->update([
                'prod_name' => $prod_name,
                'prod_desc' => $prod_desc,
                'prod_slug' => $prod_slug,
                'cat_id' => $cat_id,
                'prod_price' => $prod_price,
                'prod_stock' => $prod_stock,
                'prod_check' => $prod_check,
                'prod_img' => $imageName,
                // 'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]);
            return redirect('admin/produit');
        }
        else {
            Produit::whereId($id)->update([
                'prod_name' => $prod_name,
                'prod_desc' => $prod_desc,
                'prod_slug' => $prod_slug,
                'cat_id' => $cat_id,
                'prod_price' => $prod_price,
                'prod_stock' => $prod_stock,
                'prod_check' => $prod_check,
                
                // 'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]);
            return redirect('admin/produit');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produit::destroy($id);

        return redirect('admin/produit');
    }
}
