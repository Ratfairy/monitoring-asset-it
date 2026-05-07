<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index(Request $request)
    {
        $query = Asset::query();

        // Global Search
        if ($request->search) {

            $search = $request->search;

            $query->where(function($q) use ($search) {

                $q->where('kode_asset', 'like', '%' . $search . '%')
                ->orWhere('nama_perangkat', 'like', '%' . $search . '%')
                ->orWhere('jenis_perangkat', 'like', '%' . $search . '%')
                ->orWhere('versi_perangkat', 'like', '%' . $search . '%')
                ->orWhere('pengguna', 'like', '%' . $search . '%')
                ->orWhere('departemen', 'like', '%' . $search . '%');

            });

        }

        // Filter status
        if ($request->status) {

            $query->where('status', $request->status);

        }

        // Filter jenis perangkat
        if ($request->jenis_perangkat) {

            $query->where('jenis_perangkat', $request->jenis_perangkat);

        }

        $assets = $query->latest()->paginate(10);

        $totalAsset = Asset::count();

        $active = Asset::where('status', 'Active')->count();

        $maintenance = Asset::where('status', 'Maintenance')->count();

        $rusak = Asset::where('status', 'Rusak')->count();

        $dipinjam = Asset::where('status', 'Dipinjam')->count();

        return view('assets.index', compact(
            'assets',
            'totalAsset',
            'active',
            'maintenance',
            'rusak',
            'dipinjam'
        ));
    }

    public function create()
    {
        return view('assets.create');
    }

    public function store(Request $request)
    {
        $lastAsset = Asset::latest()->first();

        if ($lastAsset) {
            $lastNumber = (int) substr($lastAsset->kode_asset, 4);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $kodeAsset = 'AST-' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('assets', 'public');
        }

        Asset::create([
            'kode_asset' => $kodeAsset,
            'nama_perangkat' => $request->nama_perangkat,
            'jenis_perangkat' => $request->jenis_perangkat,
            'versi_perangkat' => $request->versi_perangkat,
            'pengguna' => $request->pengguna,
            'departemen' => $request->departemen,
            'tanggal_beli' => $request->tanggal_beli,
            'harga' => str_replace(['Rp ', '.'], '', $request->harga),
            'foto' => $fotoPath,
            'status' => 'Active',
        ]);

        return redirect()->route('assets.index');
    }

    public function show($id)
    {
        $asset = Asset::findOrFail($id);

        return view('assets.show', compact('asset'));
    }

    public function edit($id)
    {
        $asset = Asset::findOrFail($id);

        return view('assets.edit', compact('asset'));
    }
    public function update(Request $request, $id)
    {
        $asset = Asset::findOrFail($id);

        $harga = str_replace(['Rp', '.', ' '], '', $request->harga);

        $asset->update([

            'nama_perangkat' => $request->nama_perangkat,

            'jenis_perangkat' => $request->jenis_perangkat,

            'versi_perangkat' => $request->versi_perangkat,

            'pengguna' => $request->pengguna,

            'departemen' => $request->departemen,

            'tanggal_beli' => $request->tanggal_beli,

            'harga' => $harga,

            'status' => $request->status,

            'dipinjam_ke' => $request->dipinjam_ke,

            'tanggal_pinjam' => $request->tanggal_pinjam,

            'tanggal_kembali' => $request->tanggal_kembali,

        ]);

        return redirect()
            ->route('assets.show', $asset->id)
            ->with('success', 'Asset berhasil diupdate');
    }

    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);
        $asset->delete();

        return redirect()->route('assets.index');
    }

    public function printQr($id)
    {
        $asset = Asset::findOrFail($id);

        return view('assets.print', compact('asset'));
    }

    public function publicShow($id)
    {
        $asset = Asset::findOrFail($id);

        return view('assets.public-show', compact('asset'));
    }
}