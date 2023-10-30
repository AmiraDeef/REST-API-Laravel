<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Psy\Util\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'price'=>'required',

        ]);
        return  Product::create(
            $request->all()
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'price'=>'required'

        ]);
        $product= Product::find($id);
        $product-> update(
            $request->all()
        );
        return $product;
    }

    /**
     * search for a name.
     * @param string $name
     * @return Response
     */
    public function search(string $name)
    {
        return Product::where('name','like' ,'%'.$name.'%')->get();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Product::destroy($id);
    }
}