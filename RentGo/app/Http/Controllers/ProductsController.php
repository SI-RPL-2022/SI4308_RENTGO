<?php

namespace App\Http\Controllers;

use App\Category;
use App\Products;
use App\Store;
use Illuminate\Http\Request;

use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Checking
        if (Auth::user() && Auth::user()->role == 'admin') {
            $data = Products::latest()->paginate(6);
        } else {
            $store = Store::where('id_user', '=', Auth::user()->id)->get()[0]->id;
            $data = Products::where("id_store", "=", $store)->paginate(6);
        }

        return view('cms.product.product', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_view()
    {
        $category = Category::all();
        return view('cms.product.create', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_process(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'foto' => 'required', 'mimes:jpg,jpeg,png',
        ]);

        $product = new Products();
        $product->id_user = Auth::user()->id;
        $product->id_category = $request->category;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->photo = Storage::disk('public')->put('product', $request->file('foto'));
        $product->save();

        return redirect()->route('product')->withSuccess('Product created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_view($id)
    {
        $data = Products::find($id);
        $category = Category::all();
        return view('cms.product.update', compact('data', 'category'));
    }

    public function update_process(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'foto' => 'mimes:jpg,jpeg,png',
        ]);

        $product = Products::find($id);
        $product->id_category = $request->category;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;

        if (isset($request->foto)) {
            $image_path = 'storage/' . $product->photo;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $product->photo = Storage::disk('public')->put('product', $request->file('foto'));
        }

        $product->save();

        return redirect()->route('product')->withSuccess('Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Checking
        if (Auth::user() && Auth::user()->role == 'admin') {
            // 
        } else {
            $store = Store::where('id_user', '=', Auth::user()->id)->get()[0]->id;
            $data = Products::find($id);
            if ($data->id_store != $store) {
                return redirect()->route('home')->with('error', 'This is not yours !');
            }
        }

        $product = Products::find($id);
        $image_path = 'storage/' . $product->photo;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $product->delete();

        return redirect()->route('product')->withSuccess('Product deleted successfully.');
    }
}
