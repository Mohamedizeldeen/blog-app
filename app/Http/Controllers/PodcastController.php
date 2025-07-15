<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PodcastController extends Controller
{
    public function index(){
        $podcasts = Podcast::latest()->get();
        return view('podcasts.index', compact('podcasts'));
    }

    public function create(){
        return view("podcasts.create");
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:podcasts,slug',
            'content' => 'nullable|string',
            'category' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'category']);
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('podcasts', 'public');
            $data['image'] = $imagePath;
        }

        Podcast::create($data);

        return redirect()->route('dashboard')->with('success', 'Podcast created successfully!');
    }

    public function destroy($id)
    {
        $podcast = Podcast::findOrFail($id);
        // Delete the image file if it exists
        if ($podcast->image && Storage::disk('public')->exists($podcast->image)) {
            Storage::disk('public')->delete($podcast->image);
        }        
        
        $podcast->delete();

        return redirect()->route('dashboard')->with('success', 'Podcast deleted successfully!');
    }
}
