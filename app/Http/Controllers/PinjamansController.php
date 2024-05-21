<?php

namespace App\Http\Controllers;

use App\Models\Cicilan;
use App\Models\Pinjamans;
use App\Models\PenganjuanPinjamans;
use App\Models\User;
use App\Models\Gaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PinjamansController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = $user->role;
        $id = $user->id;

        if ($role == 'admin') {
            $pinjamans = Pinjamans::all();
        } else {
            $pinjamans = Pinjamans::where('user_id', $id)->get();
        }

        return view('pinjaman.index', [
            'pinjamans' => $pinjamans
        ]);
    }

    public function create()
    {
        $pengajuan = PenganjuanPinjamans::doesntHave('pinjaman')->where('status', 'konfirmasi')->get();
        return view('pinjaman.create', [
            'pengajuan' => $pengajuan,
        ]);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'gaji' => 'required|numeric|min:0',
        ]);

        Gaji::create([
            'user_id' => $request->user_id,
            'gaji' => $request->gaji,
        ]);

        return redirect()->route('gaji')->with('success', 'Gaji successfully added.');
    }

    public function validateGajiPinjaman()
    {
        $users = User::where('role', 'anggota')->get();
        return view('pinjaman.validate', compact('users'));
    }

    public function checkValidation(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::find($request->user_id);
        if (!$user) {
            return redirect()->route('gaji.validate')->with('error', 'User not found.');
        }

        $gaji = Gaji::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
        $pinjaman = Pinjamans::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();

        if ($gaji && $pinjaman) {
            $gajiPercentage = $gaji->gaji * 0.8;
            $isGajiGreaterThanPinjaman = $gajiPercentage > $pinjaman->nominal;

            return view('pinjaman.result', compact('user', 'gaji', 'pinjaman', 'isGajiGreaterThanPinjaman'));
        } else {
            return redirect()->route('gaji.validate')->with('error', 'Data gaji atau pinjaman tidak ditemukan untuk pengguna ini.');
        }
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'tanggal' => 'required',
        //     'pengajuan_id' => 'required',
        //     'total' => 'required|numeric',
        // ]);
            // dd($request);
        $penganjuanpinjaman = PenganjuanPinjamans::find($request->pengajuan_id);

        if (!$penganjuanpinjaman) {
            return redirect('/pinjaman')->with('error', 'Pengajuan pinjaman tidak ditemukan.');
        }

        Pinjamans::create([
            'user_id' => $penganjuanpinjaman->user_id,
            'pengajuan_id' => $request->pengajuan_id,
            'nominal' => $penganjuanpinjaman->nominal,
            'tanggal' => $request->tanggal,
            // 'bunga' => 0.015,
            // 'total' => $request->total,
            'status' => 'Belum Lunas'
        ]);

        return redirect('/pinjaman')->with('pesan', 'Data Berhasil Ditambahkan');
    }
    public function gaji(){
        $user = User::where('role', 'anggota')->get();
        return view('pinjaman.gaji',['users'=> $user]);
    }
    public function edit(Request $request, $id)
    {
        $pinjaman = Pinjamans::find($id);
        $pengajuan = PenganjuanPinjamans::all();

        if (!$pinjaman) {
            return redirect('/pinjaman')->with('error', 'Pinjaman tidak ditemukan.');
        }

        return view('pinjaman.edit', [
            'pinjaman' => $pinjaman,
            'pengajuanpinjamans' => $pengajuan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nominal' => 'required|numeric',
            'tanggal' => 'required',
        ]);

        $pinjaman = Pinjamans::find($id);

        if (!$pinjaman) {
            return redirect('/pinjaman')->with('error', 'Pinjaman tidak ditemukan.');
        }

        $pinjaman->update([
            'nominal' => $request->nominal,
            'total' => (0.1 * $request->nominal) + $request->nominal,
        ]);

        return redirect('/pinjaman')->with('pesan', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $pinjaman = Pinjamans::find($id);

        if (!$pinjaman) {
            return redirect('/pinjaman')->with('error', 'Pinjaman tidak ditemukan.');
        }

        $pinjaman->delete();

        return redirect('/pinjaman')->with('pesan', 'Data Berhasil Dihapus');
    }

    public function history(Pinjamans $pinjaman)
    {
        $cicilan = Cicilan::where('pinjaman_id', $pinjaman->id)->sum('total');
        $sisa_pinjaman = $pinjaman->total - $cicilan;
        return view('pinjaman.history', compact('pinjaman', 'sisa_pinjaman'));
    }

    public function history_print(Pinjamans $pinjaman)
    {
        $cicilan = Cicilan::where('pinjaman_id', $pinjaman->id)->sum('total');
        $sisa_pinjaman = $pinjaman->total - $cicilan;
        return view('pinjaman.history_print', compact('pinjaman', 'sisa_pinjaman'));
    }
}
