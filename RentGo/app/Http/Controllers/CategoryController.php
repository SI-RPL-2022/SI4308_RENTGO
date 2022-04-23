<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . action('CategoryController@update_view', $data->id) . '" type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a href="' . action('CategoryController@delete', $data->id) . '" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"'."onclick='return confirm()'".'>Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('cms.category.category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_view()
    {
        return view('cms.category.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_process(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'foto' => 'required','mimes:jpg,jpeg,png',
        ]);

        $category = new Category();
        $category->name = $request->name;

        if (isset($request->foto)) {
            $category->photo = Storage::disk('public')->put('category', $request->file('foto'));
        }

        $category->save();

        return redirect()->route('category')->withSuccess('Category created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_view($id)
    {
        $data = Category::find($id);
        return view('cms.category.update', compact('data'));
    }

    public function update_process(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'foto' => 'mimes:jpg,jpeg,png',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;

        if (isset($request->foto)) {
            $image_path = 'storage/' . $category->photo;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $category->photo = Storage::disk('public')->put('category', $request->file('foto'));
        }

        $category->save();

        return redirect()->route('category')->withSuccess('Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('category')->withSuccess('Category deleted successfully.');
    }
}
