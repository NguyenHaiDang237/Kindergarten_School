<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Lay du lieu
        $users=User::all();
        //Render ra view
        //Pass the $users data to the view
        return view('users.index',['users'=>$users]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $input['password'] = bcrypt('default_password'); // Hoặc bất kỳ giá trị nào bạn muốn
        User::create($input);
        return redirect('users')->with('flash_message','User Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=User::find($id);
        return view('users.show')->with('users',$user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::find($id);
        return view('users.edit')->with('users',$user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=User::find($id);
        $input=$request->all();
        $user->update($input);
        return redirect()->route('users.index')->with('success', 'User updated successfully');
        //hoặc
        // return redirect('users')->with('success','user updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route('users')->with('success','User deleted successfully');
    }
}
