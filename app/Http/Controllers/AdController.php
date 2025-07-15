<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdController extends Controller
{
    public function index(){
        $ads = Ad::latest()->get();
        return view('ads.index', compact('ads'));
    }

    public function create(){
        return view("ads.create");
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:ads,slug',
            'content' => 'nullable|string',
            'category' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'category']);
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('ads', 'public');
            $data['image'] = $imagePath;
        }

        Ad::create($data);

        return redirect()->route('dashboard')->with('success', 'Ad created successfully!');
    }

    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);
        // Delete the image file if it exists
        if ($ad->image && Storage::disk('public')->exists($ad->image)) {
            Storage::disk('public')->delete($ad->image);
        }        
        
        $ad->delete();

        return redirect()->route('dashboard')->with('success', 'Ad deleted successfully!');
    }
}
