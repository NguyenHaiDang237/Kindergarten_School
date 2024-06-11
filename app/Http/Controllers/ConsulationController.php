<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultation=Consultation::all();
        return view('consultations.index',['cosultations'=>$consultation]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('consultations.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->all();
        Consultation::create($input);
        return redirect('consultations')->with('flash_message','Consultation Add Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $consultation=Consultation::find($id);
        return view('consultations.show')->with('consultations',$consultation);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $consultation=Consultation::find($id);
        return view('consultations.edit')->with('consultations',$consultation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $consultation=Consultation::find($id);
        $input=$request->all();
        $consultation->update($input);
        return redirect()->route('consultations.index')->with('success','Update consultations successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $consultation=Consultation::findOrFail($id);
        $consultation->delete();
        return redirect()->route('consultations')->with('success','Consultation deleted successfully');
    }
}
