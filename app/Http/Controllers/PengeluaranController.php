<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\Motor;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

class PengeluaranController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $filter = $request->input('filter');
        $month = $request->input('month');
        $year = $request->input('year');

        $query = Pengeluaran::query();

        if ($search) {
            $query->where(function ($innerQuery) use ($search) {
                $innerQuery->where('plat_motor', 'like', '%' . $search . '%')
                    ->orWhereHas('motor', function ($q) use ($search) {
                        $q->where('nama_motor', 'like', '%' . $search . '%');
                    })
                    ->orWhere('jenis_pengeluaran', 'like', '%' . $search . '%')
                    ->orWhere('tgl_pengeluaran', 'like', '%' . $search . '%');
            });
        }

        if ($filter) {
            $query->where(function ($innerQuery) use ($filter) {
                $innerQuery->where('plat_motor', 'like', '%' . $filter . '%')
                    ->orWhereHas('motor', function ($q) use ($filter) {
                        $q->where('nama_motor', 'like', '%' . $filter . '%');
                    });
            });
        }
        if ($month) {
            $query->where(function ($innerQuery) use ($month) {
                // $innerQuery->where('tgl_pengeluaran', 'like', '%' . $month . '%');
                $innerQuery->whereMonth('tgl_pengeluaran', $month);
            });
        }
        if ($year) {
            $query->where(function ($innerQuery) use ($year) {
                $innerQuery->whereYear('tgl_pengeluaran', $year);
            });
        }

        $totalPengeluaran = $query->sum('biaya_pengeluaran');

        $pengeluarans = $query->latest()->paginate(10);

        return view('pengeluaran.index', [
            'title' => 'Pengeluaran',
            'active' => 'Motor'
        ])->with(compact('pengeluarans', 'totalPengeluaran'));
    }

    public function generatePdf()
    {
        $pengeluarans = Pengeluaran::all();
        $totalPengeluaran = Pengeluaran::sum('biaya_pengeluaran');
        $pdf = Pdf::loadView('pengeluaran.generate-pdf', [
            'title' => 'Laporan'
        ], compact('pengeluarans', 'totalPengeluaran'));
        return $pdf->stream('laporan.pdf');
    }

    public function create()
    {
        $motors = Motor::all();
        $pegawais = User::all();
        return view('pengeluaran.create', [
            'title' => 'Data Pengeluaran',
            'active' => 'Motor',
        ], compact('motors', 'pegawais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plat_motor' => 'required|string|max:15',
            'id_pegawai' => 'required|string|max:15',
            'tgl_pengeluaran' => 'required|date',
            'jenis_pengeluaran' => 'required',
            'biaya_pengeluaran' => 'required|string|max:10',
        ]);

        $pengeluaran = new Pengeluaran([
            'id_pengeluaran' => 'PG-' . str_pad(Pengeluaran::count() + 1, 5, '0', STR_PAD_LEFT),
            'plat_motor' => $request->get('plat_motor'),
            'id_pegawai' => $request->get('id_pegawai'),
            'tgl_pengeluaran' => $request->get('tgl_pengeluaran'),
            'jenis_pengeluaran' => $request->get('jenis_pengeluaran'),
            'biaya_pengeluaran' => $request->get('biaya_pengeluaran'),
        ]);

        $pengeluaran->save();

        return redirect('/pengeluaran')->with('success', 'Data pengeluaran berhasil di buat.');
    }

    public function show($id_pengeluaran)
    {
        $pengeluaran = Pengeluaran::findOrFail($id_pengeluaran);
        return view('pengeluarans.show', [
            'title' => 'Data Pengeluaran',
            'active' => 'Motor',
            'pengeluaran' => $pengeluaran
        ]);
    }

    public function edit($id_pengeluaran)
    {
        $motors = Motor::all();
        $pegawai = User::all();
        $pengeluaran = Pengeluaran::findOrFail($id_pengeluaran);
        return view('pengeluaran.edit', [
            'title' => 'Data Pengeluaran',
            'active' => 'Motor',
        ], compact('pengeluaran', 'motors', 'pegawai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plat_motor' => 'required|string|max:15',
            'id_pegawai' => 'required|string|max:15',
            'tgl_pengeluaran' => 'required|date',
            'jenis_pengeluaran' => 'required|string|max:20',
            'biaya_pengeluaran' => 'required|string|max:10',
        ]);

        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->plat_motor = $request->get('plat_motor');
        $pengeluaran->id_pegawai = $request->get('id_pegawai');
        $pengeluaran->tgl_pengeluaran = $request->get('tgl_pengeluaran');
        $pengeluaran->jenis_pengeluaran = $request->get('jenis_pengeluaran');
        $pengeluaran->biaya_pengeluaran = $request->get('biaya_pengeluaran');
        $pengeluaran->save();

        return redirect('/pengeluaran')->with('success', 'Data pengeluaran berhasil di update.');
    }

    public function destroy($id_pengeluaran)
    {
        $pengeluaran = Pengeluaran::find($id_pengeluaran);
        $pengeluaran->delete();
        return redirect('/pengeluaran')->with('success', 'Data pengeluaran berhasil di hapus.');
    }
}
