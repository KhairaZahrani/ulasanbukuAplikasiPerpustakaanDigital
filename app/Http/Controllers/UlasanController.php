<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
   
    public function index()
    {
        $ulasan = Ulasan::with('user', 'buku')->get(); 
        return view('ulasan.index', compact('ulasan'));
    }

    public function create()
    {
        $buku = Buku::all(); 
        $users = User::all();
        return view('ulasan.create', compact('buku','users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_buku' => 'required|exists:buku,id_buku',
            'id_user' => 'required|exists:users,id_user',
            'ulasan' => 'required|string',
            'rating' => 'required|integer|min:1|max:10',
        ]);

        Ulasan::create([
            'id_buku' => $request->input('id_buku'),
            'id_user' => $request->input('id_user'),
            'ulasan' => $request->input('ulasan'),
            'rating' => $request->input('rating'),
        ]);

        return redirect('/kategori')->with('pesan', "Ulasan berhasil ditambahkan!");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
