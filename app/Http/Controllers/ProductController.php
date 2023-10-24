<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Quality;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $formData = []; 

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $qualities = Quality::all();
        return view('product.create', compact('categories', 'qualities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'product_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required',
            'quality_id' => 'required',
        ], [
            'name.required' => 'The Name field is required.',
            'description.required' => 'The Description field is required.',
            'product_photo.required' => 'The Product Photo field is required.',
            'product_photo.image' => 'The Product Photo must be an image.',
            'product_photo.mimes' => 'The Product Photo must be a valid image format (JPEG, PNG, JPG).',
            'product_photo.max' => 'The Product Photo must not exceed 2 MB.',
            'category_id.required' => 'The Category field is required.',
            'quality_id.required' => 'The Quality field is required.',
        ]);
    
        $imagePath = $request->file('product_photo')->store('public/images');
        $filename = basename($imagePath);
    
        $this->formData['name'] = $request->input('name');
        $this->formData['description'] = $request->input('description');
        $this->formData['flaws'] = $request->input('flaw');
        $this->formData['category_id'] = $request->input('category_id');
        $this->formData['quality_id'] = $request->input('quality_id');
        $this->formData['stock'] = $request->input('stock');
        $this->formData['product_photo'] = $filename;

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'flaws' => $request->flaws,
            'category_id' => $request->category_id,
            'quality_id' => $request->quality_id,
            'stock' => $request->stock,
            'product_photo' => $filename,
        ]);

        session()->flash('success', 'Product added successfully.');
        return redirect('/product/list')->with('success', 'Product updated successfully');      
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $qualities = Quality::all();
        return view('product.edit', compact('product', 'categories', 'qualities'));        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'product_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required',
            'quality_id' => 'required',
        ], [
            'name.required' => 'The Name field is required.',
            'description.required' => 'The Description field is required.',
            'product_photo.required' => 'The Product Photo field is required.',
            'product_photo.image' => 'The Product Photo must be an image.',
            'product_photo.mimes' => 'The Product Photo must be a valid image format (JPEG, PNG, JPG).',
            'product_photo.max' => 'The Product Photo must not exceed 2 MB.',
            'category_id.required' => 'The Category field is required.',
            'quality_id.required' => 'The Quality field is required.',
        ]);
        $product = Product::find($id);
        $imagePath = $request->file('product_photo')->store('public/images');
        $filename = basename($imagePath);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->flaws = $request->input('flaws');
        $product->category_id = $request->input('category_id');
        $product->quality_id = $request->input('quality_id');
        $product->product_photo = $filename;
        $product->save();
        return redirect('/product/list')->with('success', 'Product updated successfully');      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    
        return redirect('/product/list')->with('success', 'Product deleted successfully');
    
    }
}
