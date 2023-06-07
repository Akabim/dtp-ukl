<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Perpustakaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PerpusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpustakaans = Perpustakaan::query();
        

        if ($request->has('search')) {
            $perpustakaans->where('judul', 'like', "%{$request->search}%")
            ->orWhere('penulis', 'like', "%{$request->search}%");
        }

        return view('perpus.index', [
            'perpustakaans' => $perpustakaans->simplePaginate(3
        ),
            
        ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perpus.create', [
            'perpustakaans' => Perpustakaan::get(),
            'genres' => Genre::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'penulis' => 'required',
            'photo' => ['image'],
            'buku' => ['file']
        ]);

        $photo = '';
        $buku = '';

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('photos');
        }
        if ($request->hasFile('buku')) {
            $buku = $request->file('buku')->store('buku');
        }

        $perpustakaans = new Perpustakaan();

        $perpustakaans->judul = $request->judul;
        $perpustakaans->deskripsi = $request->deskripsi;
        $perpustakaans->penulis = $request->penulis;
        $perpustakaans->photo = $photo;
        $perpustakaans->buku = $buku;
        $perpustakaans->genre_id = $request->genre_id;
        // $perpustakaans->genre = $request->genre;


        $perpustakaans->save();

        return redirect()->route('perpustakaan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $perpustakaans = Perpustakaan::find($id);
        return view('perpus.edit', [
            'perpustakaans' => $perpustakaans
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'penulis' => 'required',
            'deskripsi' => 'required',
            'photo' => ['image'],
            'buku'=> ['file']
        ]);

        $photo = '';
        $buku = '';

        $perpustakaans = Perpustakaan::find($id);  

        if($request->hasFile('photo')) {
            if (Storage::exists($perpustakaans->photo)) {
                Storage::delete($perpustakaans->photo);
            }
            $photo = $request->file('photo')->store('photos');
        }
        if($request->hasFile('buku')) {
            if (Storage::exists($perpustakaans->buku)) {
                Storage::delete($perpustakaans->buku);
            }
            $buku = $request->file('buku')->store('buku');
        }

         

        $perpustakaans->judul = $request->judul;
        $perpustakaans->deskripsi = $request->deskripsi;
        $perpustakaans->penulis = $request->penulis;
        $perpustakaans->photo = $photo;
        $perpustakaans->buku = $buku;

        $perpustakaans->save();

        return redirect()->route('perpustakaan.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $perpustakaans = Perpustakaan::find($id)->destroy($id);
        return redirect()->route('perpustakaan.index');
    }
}
