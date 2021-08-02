<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Content;
use App\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contents = Content::all();
        return view('admin.contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.contents.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required | max:255 | min:5',
            'description' => 'required',
            'image' => 'nullable | image | max:500',
            'tags' => 'nullable | exists:tags,id',
            'category_id' => 'nullable | exists:categories,id'
        ]);
        $file_path = Storage::put('content_images', $validatedData['image']);
        $validatedData['image'] = $file_path;
        $content = Content::create($validatedData);
        $content->tags()->attach($request->tags);
        return redirect()->route('admin.contents.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
        return view('admin.contents.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.contents.edit', compact('content', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        $validatedData = $request->validate([
            'name' => 'required | max:255 | min:5',
            'description' => 'required',
            'image' => 'nullable | image | max:500',
            'category_id' => 'nullable | exists:categories,id'
        ]);
        if(array_key_exists('image', $validatedData)) {
            Storage::delete($content['image']);
            $file_path = Storage::put('content_images', $validatedData['image']);
            $validatedData['image'] = $file_path;
        }
        
        $content->update($validatedData);
        return redirect()->route('admin.contents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return redirect()->route('admin.contents.index');
    }
}
