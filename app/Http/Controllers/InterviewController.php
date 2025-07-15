<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InterviewController extends Controller
{
    public function index(){
        $interviews = Interview::latest()->get();
        return view('interviews.index', compact('interviews'));
    }

    public function create(){
        return view("interviews.create");
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:interviews,slug',
            'content' => 'nullable|string',
            'category' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'category']);
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('interviews', 'public');
            $data['image'] = $imagePath;
        }

        Interview::create($data);

        return redirect()->route('dashboard')->with('success', 'Interview created successfully!');
    }
    public function destroy($id)
    {
        $interview = Interview::findOrFail($id);
        // Delete the image file if it exists
        if ($interview->image && Storage::disk('public')->exists($interview->image)) {
            Storage::disk('public')->delete($interview->image);
        }        
        
        $interview->delete();

        return redirect()->route('dashboard')->with('success', 'Interview deleted successfully!');
    }
}
