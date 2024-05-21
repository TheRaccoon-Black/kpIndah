<?php

namespace App\Http\Controllers;

use App\Models\user;
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
        return view('datauser.index', [
            'users' => User::where('role', 'anggota')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datauser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:users',
            'email' => 'required|email',
            'no_hp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:P,L',
            'tanggal_masuk' => 'required|date',
            'role' => 'required',
            'password' => 'required',
            // 'avatar' => 'sometimes|file|image|max:2048' // Optional file validation
        ]);

        // if ($request->hasFile('avatar')) {
        //     $avatarPath = $request->file('avatar')->store('avatars', 'public');
        //     $validatedData['avatar'] = $avatarPath;
        // }

        // Hash the password before saving
        $validatedData['password'] = bcrypt($request->password);

        User::create($validatedData);

        return redirect('/user')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('datauser.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $validatedData = $request->validate([
            'nama' => 'required',
          
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:P,L',
            'tanggal_masuk' => 'required',
            'password' => 'required',
            // 'password_confirmation' => 'required',
        ]);
        User::where('id', $user->id)->update($validatedData);
        return redirect('/user')->with('pesan', 'Data Berhasil Diupdate');
    }

    public function history(User $user)
    {
        // Mengambil data anggota berdasarkan ID yang diberikan
        $userData = User::findOrFail($user->id);

        return view('datauser.history', [
            'user' => $userData
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        User::destroy($user->id);
        return redirect('/user')->with('pesan', 'Data Berhasil Dihapus');
    }
}
