<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school=School::all();
        return view("schools.index",['schools'=>$school]);
    }

    public function getSchoolByType(Request $request){
        //Get Request in URL
        $type=$request->input('type');
        //Execute data
        $schools=School::where('type',$type)->get();
        return view('schools.index',compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("schools.index");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->all();
        School::create($input);
        return redirect('schools')->with('flash_message','School Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $school=School::find($id);
        return view('schools.show')->with('schools',$school);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $school=School::find($id);
        return view('schools.edit')->with('schools',$school);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $school=School::find($id);
        $input=$request->all();
        $school->update($input);
        return redirect()->route('schools.index')->with('success','School update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $school=School::findorFail($id);
        $school->delete();
        return redirect()->route('schools')->with('success','School deleted successfully');
    }
}
