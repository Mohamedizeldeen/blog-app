<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index(){
        $events = Event::latest()->get();
        return view('events.index', compact('events'));
    }

    public function create(){
        return view("events.create");
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:events,slug',
            'content' => 'nullable|string',
            'category' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'category']);
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $data['image'] = $imagePath;
        }

        Event::create($data);

        return redirect()->route('dashboard')->with('success', 'Event created successfully!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        // Delete the image file if it exists
        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }        
        
        $event->delete();

        return redirect()->route('dashboard')->with('success', 'Event deleted successfully!');
    }
}
