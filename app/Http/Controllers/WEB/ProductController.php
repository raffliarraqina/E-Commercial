<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::latest()->get();

        return view('pages.admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('name', 'ASC')->get();

        return view('pages.admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request validasi
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'category_id' => 'required',
            'price' => 'required|integer',
            'description' => 'required|string',
        ]);

        // insert data ke database
        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'slug' => Str::slug($request->name),
            'description' => $request->description
        ]); 

        if ($product){
            // redirect dengan pesan sukses
            return redirect()->route('dashboard.product.index')->with([
                'success' => 'Add Product Success'
            ]);
        } else {
            // redirect dengan pesan error
            return redirect()->route('dashboard.product.index')->with([
                'error' => 'Add Product Failed'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // cari data by id
        $product = Product::findOrFail($id);
        
        return view('pages.admin.product.show', compact([       
            'product'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Fungsi Edit yang digunakan untuk kehalaman Edit Data
        // cari data berdasarkan id

        $product = Product::findOrFail($id);
        $category = Category::orderBy('name', 'ASC')->get();

        return view('pages.admin.product.edit', compact(
            'product',
            'category'
        ));
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
        // fungsi update yang digunakan untuk update data
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'category_id' => 'required',
            'price' => 'required|integer|min:1000',
            'description' => 'required|string',
        ]);

        // get data by id
        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description
        ]);
        
        // redirect dengan pesan sukses
        if ($product){
            // redirect dengan pesan sukses
            return redirect()->route('dashboard.product.index')->with([
                'success' => 'Edit Product Success'
            ]);
        } else {
            // redirect dengan pesan error
            return redirect()->route('dashboard.product.index')->with([
                'error' => 'Edit Product Failed'
            ]);
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
        // cari id datanya
        $product = Product::findOrFail($id);
        $product->delete();

        if($product){
            return redirect()->route('dashboard.product.index')->with([
                'success' => 'Data berhasil Dihapus!'
            ]);
        }else{
            return redirect()->route('dashboard.product.index')->with([
                'error' => 'Data gagal Dihapus!'
            ]);
        } 
    }
}
