<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rating=Rating::all();
        return view('ratings.index',['ratings'=>$rating]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ratings.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->all();
        Rating::create($input);
        return redirect('ratings')->with('flash_message','Rating Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rating=Rating::find($id);
        return view('rating.show')->with('ratings',$rating);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rating=Rating::find($id);
        return view('rating.edit')->with('ratings',$rating);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rating=Rating::find($id);
        $input=$request->all();
        $rating->update($input);
        return redirect()->route('ratings.index')->with('success','Update School Information successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rating=Rating::findOrFail($id);
        $rating->delete();
        return redirect()->route('ratings')->with('success','School deleted successfully');
    }
}
