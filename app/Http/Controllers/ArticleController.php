<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->get();
        return view('articles.articles', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.partials.articles_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'title.en' => 'required|string',
            'title.ar' => 'required|string',
            'description' => 'required',
            'description.en' => 'required|string',
            'description.ar' => 'required|string',
            'tags' => 'required',
            'tags.en' => 'required|string',
            'tags.ar' => 'required|string',
            'image' => 'required|mimes:png,jpg,jfif,webp',
        ]);

        $image = $request->file('image');
        $size_in_mb = ($image->getSize() / 1024) / 1024;
        if ($size_in_mb < 5) {
            $quality = 70;
        } elseif ($size_in_mb < 10) {
            $quality = 50;
        } else {
            $quality = 20;
        }

        if ($image) {
            $imageName = time() .  ".webp";
            $path = public_path('storage/images') . "/" . $imageName;
            $manager = new ImageManager(new Driver());
            $manager->read($image)->encodeByMediaType('image/jpeg', progressive: true, quality: $quality)->save($path);



            $article = Article::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'tags' => $request->input('tags'),
                'image' => $imageName
            ]);
        }

        if ($article instanceof Model) {
            return redirect()->route('articles.index')->with('success', 'article created');
        } else {
            return redirect()->route('articles.index')->with('error', 'Something Went Wrong. Try Again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.partials.articles_edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        request()->validate([
            'title' => 'required',
            'title.en' => 'required|string',
            'title.ar' => 'required|string',
            'description' => 'required',
            'description.en' => 'required|string',
            'description.ar' => 'required|string',
            'tags' => 'required',
            'tags.en' => 'required|string',
            'tags.ar' => 'required|string',
        ]);

        $image = $request->image;
        $size_in_mb = ($image->getSize() / 1024) / 1024;
        if ($size_in_mb < 5) {
            $quality = 70;
        } elseif ($size_in_mb < 10) {
            $quality = 50;
        } else {
            $quality = 20;
        }

        if ($image) {
            Storage::disk('public')->delete('images/' . $article->image);
            $imageName = time() .  $image->getClientOriginalName();
            $path = public_path('storage/images') . "/" . $imageName;
            $manager = new ImageManager(new Driver());
            $manager->read($image)->encodeByMediaType('image/jpeg', progressive: true, quality: $quality)->save($path);

        }

        $article->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'tags' => $request->input('tags'),
            'image' => $image ? $imageName : $article->image,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Storage::disk('public')->delete('images/' . $article->image);
        $article->delete();

        return back()->with('success', 'Article Deleted Successfully');
    }
}
