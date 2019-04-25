<?php

namespace App\Http\Controllers\BackEnd;

use App\helpers;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::paginate(6);
        return view('BackEnd.categorie', compact('categories'));
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

            'cat_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $imageName = time().'.'.request()->cat_img->getClientOriginalExtension();

        request()->cat_img->move(public_path('img/categories'), $imageName);

        $cat_name = $request->cat_name;
        $cat_desc = $request->cat_desc;
        
        $add_cat = Categorie::create([
            'cat_name' => $cat_name,
            'cat_desc' => $cat_desc,
            'cat_img' => $imageName,
            'old_img' => $imageName,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
        return redirect('admin/categorie');
    
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
        $categories = Categorie::findOrFail($id);
        return view('BackEnd/modifier-categorie', compact('categories'));
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

            'cat_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        
        $cat_name = $request->cat_name;
        $cat_desc = $request->cat_desc;
        $old = $request->old_img;

        if ($request->hasFile('cat_img')) {
            $imageName = time().'.'.request()->cat_img->getClientOriginalExtension();
                    
            request()->cat_img->move(public_path('img/categories'), $imageName);

            Categorie::whereId($id)->update([
                    'cat_name' => $cat_name,
                    'cat_desc' => $cat_desc,
                    'cat_img' => $imageName,
                    
                    // 'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ]);
                return redirect()->route('categorie.index');         
        }

        else {
            Categorie::whereId($id)->update([
                    'cat_name' => $cat_name,
                    'cat_desc' => $cat_desc,
                    // 'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ]);
                return redirect()->route('categorie.index');

             
            
        }
        
                
                
                


            
        
        // else
        // { 
        //      $imageName = time().'.'.request()->old_img->getClientOriginalExtension();
        
        //         request()->old_img->move(public_path('img'), $imageName);

            
            
        //     Categorie::whereId($id)->update([
        //         'cat_name' => $cat_name,
        //         'cat_desc' => $cat_desc,
        //         'cat_img' => $imageName,
        //         'old_img' => $imageName,
        //         // 'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        //         'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        //     ]);
        //     return redirect()->route('categorie.index');
        // }
        
            
    


        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categorie::destroy($id);

        return redirect('admin/categorie');
    }
}
