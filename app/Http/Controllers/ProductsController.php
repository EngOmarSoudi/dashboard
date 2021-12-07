<?php

namespace App\Http\Controllers;

use App\Models\Photoable;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return Product::with('photo')->get();
    }


    public function store(Request $request)
    {
        $rules = [
            'sub_section_id' => 'required',
            'title' => 'required|string|min:3',
            'content'=> 'required|string|min:3',
            'title_ar' => 'required|string|min:3',
            'content_ar'=> 'required|string|min:3',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',

        ];

        $this->validate($request, $rules);

        $product = Product::create($request->all());

        $filename = $request->image->getClientOriginalName();
        $fileextension =$request->image->getClientOriginalExtension();
        $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

        if($request->image->move('images/', $file_to_store)) {
            Photoable::create([
                'filename' => $file_to_store,
                'photoable_id' => $product->id,
                'photoable_type' => 'App\Models\Product',
            ]);
        }
    }


    public function show($id)
    {
        return Product::with('photo')->findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $rules = [
            'sub_section_id' => 'required',
            'title' => 'required|string|min:3',
            'title_ar' => 'required|string|min:3',
            'content'=> 'required|string|min:3',
            'content_ar'=> 'required|string|min:3',
        ];

        $this->validate($request, $rules);

        if($request->hasFile('image')){
            $rules = [
                'image' => 'mimes:jpeg,png,jpg,gif,svg',
            ];
            $this->validate($request, $rules);
            $filename = $request->image->getClientOriginalName();
            $fileextension =$request->image->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;
            if($request->image->move('images/', $file_to_store)) {
                $request['image'] = $file_to_store;
                Photoable::create([
                    'filename' => $file_to_store,
                    'photoable_id' => $product->id,
                    'photoable_type' => 'App\Models\Product',
                ]);
            }
            if($product->photo){
                $filename = $product->photo->filename;
                unlink('images/'.$filename);
            }
            $product->photo->delete();
            $product->update($request->all());
        }else{
            $product->update($request->all());
        }


    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if($product->photo){
            $filename = $product->photo->filename;
            unlink('images/'.$filename);
        }
        $product->photo->delete();
        $product->delete();

    }
}
