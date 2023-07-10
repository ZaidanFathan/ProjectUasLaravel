<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('Backend.User.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.User.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            //'role' => 'required',
        ]);
        User::create($validated);
        return redirect('/admin/user/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('Backend.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('Backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        User::where('id', $id)->update($validated);
        return redirect('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('/admin/user');
    }
}
