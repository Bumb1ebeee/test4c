<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index() {
        $stories = Story::where('status', 1)->get();
        return view('index', compact('stories'));
    }


    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'text' => 'required',
        ]);

        $story = new Story();
        $story->title = $request->input('title');
        $story->text = $request->input('text');
        $story->user_id = Auth::user()->id;
        $story->save();

        return redirect()->back();
    }

    public function publish(Request $request) {
        $story = Story::findOrFail($request->input('id'));
        $story->status = 1;
        $story->save();
        return redirect()->back();
    }

    public function draft(Request $request) {
        $story = Story::findOrFail($request->input('id'));
        $story->status = 2;
        $story->save();
        return redirect()->back();
    }

    public function draftPage() {
        $stories = Story::where('status', 2)->get();
        return view('draft', compact('stories'));
    }
}
