<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index() {
        $users = User::get();
        return view('pages.user.index', compact('users'));
    }

    public function show($id) {
        $user = User::findOrFail($id);
        return view('pages.user.show', compact('user'));
    }

    public function update(Request $request) {
        $request->validate([
            'id_ktp' => 'required|numeric',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:1,2',
            'no_hp' => 'required|numeric',
            'file' => 'image|max:1024'
        ]);

        if($request->file) {
            $foto = Storage::put('images', $request->file);
            $request['foto'] = $foto;
        }

        $user = User::find(auth()->id());

        if($user->update($request->all())) {
             notify()->success('Profil berhasil diperbarui.');
             return redirect()->route('home');
        }

        notify()->error('Terjadi kesalahan.');
        return back();
    }

    public function ubahFoto(Request $request) {
        $request->validate([
            'file' => 'required|max:1024'
        ]);

        $foto = Storage::put('images', $request->file);

        $user = User::find(auth()->id());
        if($user->update(['foto' => $foto])) {
            notify()->success('Foto berhasil diubah.');
            return back();
        }

        notify()->error('Terjadi kesalahan.');
        return back();
    }

    public function destroy() {
        $user = User::find(auth()->id());
        if($user->delete()) {
            notify()->success('Akun berhasil dihapus.');
            return redirect()->route('logout');
        }

        notify()->error('Terjadi kesalahan');
        return back();
    }
}
