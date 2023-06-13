<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil Data User
        $user = User::latest()->get();

        return view('pages.admin.user.index', compact(
            'user'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // mengambil data user berdasarkan id
        $user = User::findOrFail($id);
    
        return view('pages.admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // ini digunakan untuk mengupdate data

        // validasi request
        $request->validate([
            'roles' => 'required|string|in:ADMIN,USER'
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'roles' => $request->roles
        ]);

        if($user) {
            return redirect()->route('dashboard.user.index')->with(
                'success',
                'Update User Data Succesfull'
            );
        } else {
            return redirect()->route('dashboard.user.index')->with(
                'error',
                'Update User Data Failed'
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // fungsi digunakan untuk menghapus

        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('dashboard.user.index')->with(
            'Success',
            'Success Delete User'
        );
    }
}
