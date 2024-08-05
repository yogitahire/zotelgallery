<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $categories = Category::all();
        $query = Image::query();

        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        $images = $query->get();
        return view('gallery.index', compact('images', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('gallery.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'imagetag' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $categoryId = $request->category_id ?? Category::where('name', 'Uncategorized')->first()->id;

        $categoryName = Category::find($categoryId)->name;

        if ($request->hasFile('image')) {
            try {
                $path = "imagegallery/{$categoryName}";
                $fileName = time() . '_' . $request->file('image')->getClientOriginalName();

                $request->file('image')->move(public_path($path), $fileName);
                $imagePath = $path . '/' . $fileName;

                Image::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'imagetag' => $request->imagetag,
                    'imagepath' => $imagePath,
                    'category_id' => $categoryId,
                ]);

                return redirect()->route('gallery.index')->with('success', 'Image uploaded successfully!');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['image' => 'Failed to store the image: ' . $e->getMessage()]);
            }
        } else {
            return redirect()->back()->withErrors(['image' => 'No image file found.']);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $gallery)
    {
        $categories = Category::all();
        return view('gallery.edit', compact('gallery', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'imagetag' => 'required|string|max:50',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $categoryId = $request->category_id;
        $categoryName = Category::find($categoryId)->name;

        $imagePath = $gallery->imagepath;

        if ($request->hasFile('image')) {
            try {
                if ($imagePath && file_exists(public_path($imagePath))) {
                    unlink(public_path($imagePath));
                }

                $path = "imagegallery/{$categoryName}";
                $fileName = time() . '_' . $request->file('image')->getClientOriginalName();

                $request->file('image')->move(public_path($path), $fileName);
                $imagePath = "{$path}/{$fileName}";
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['image' => 'Failed to update the image: ' . $e->getMessage()]);
            }
        }

        $gallery->update([
            'title' => $request->title,
            'description' => $request->description,
            'imagetag' => $request->imagetag,
            'category_id' => $categoryId,
            'imagepath' => $imagePath,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Image updated successfully!');
    }


    /**
     */
    public function destroy(Image $gallery)
    {
        Storage::delete($gallery->imagepath);
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Image deleted successfully!');
    }
}
