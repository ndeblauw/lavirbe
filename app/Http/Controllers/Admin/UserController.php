<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name')->get(); // data laden

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);

        $user->update(['is_admin' => true]);

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Todo for students at home
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Todo for students at home
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Todo for students at home
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Todo for students at home
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Todo for students at home
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Todo for students at home
    }
}
