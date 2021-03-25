<?php

namespace App\Http\Controllers;

use App\Http\Resources\GudangCollection;
use App\Http\Resources\GudangResource;
use App\Models\Gudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GudangController extends Controller
{

    public function index(Request $request)
    {
        $gudang = Gudang::where('user_id', Auth::user()->id)->paginate(10);
        return new GudangCollection($gudang);
    }

    public function show(Gudang $gudang)
    {
        return new GudangResource($gudang);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $gudang = Auth::user()->gudang()->create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto,
        ]);

        return response()->json([
            'status' => 'OK',
            'code' => 201,
            'data' => new GudangResource($gudang),
            'error' => null
        ]);
    }

    public function update(Request $request, Gudang $gudang)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $gudang->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto,
        ]);

        return response()->json([
            'status' => 'OK',
            'code' => 201,
            'data' => new GudangResource($gudang),
            'error' => null
        ]);
    }

    public function destroy(Gudang $gudang)
    {
        $gudang->delete();

        return response()->json([
            'status' => 'OK',
            'code' => 201,
            'data' => null,
            'error' => null
        ]);
    }
}
