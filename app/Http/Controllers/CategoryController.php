<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Image;

class CategoryController extends Controller
{
    protected $path;

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $filename = time() . $file->getClientOriginalName();
            $location = public_path('images/categories/' . $filename);
            Image::make($file)->fit(1280, 720)->save($location);

            $this->path = $filename;
        }

        $data = [
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'path' => $this->path,
            'description' => $request->description,
        ];

        Category::create($data);

        return redirect()->route('categories.index')->with('status', 'Category record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('backend.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $category->name = $request->name;
        $category->label = Str::slug($request->name);
        $category->description = $request->description;

        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $filename = time() . $file->getClientOriginalName();
            $location = public_path('images/categories/' . $filename);
            Image::make($file)->fit(1280, 720)->save($location);

            $category->path = $filename;
        }

        $category->save();

        return redirect()->route('categories.index')->with('status', 'Category record has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('status', 'Category record has been deleted successfully.');
    }
}
