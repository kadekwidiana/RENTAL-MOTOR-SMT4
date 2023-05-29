@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="d-flex mb-3">
        <a href="{{ route('pengeluaran.create') }}" class="btn btn-primary">Tambah Pengeluaran</a>
      </div>

        {{-- filter/pencarian --}}
        <div class="row mb-2">
          <div class="col">
            <form action="{{ route('pengeluaran.index') }}" method="GET">
              <div class="input-group mb-3">
                <select name="filter" id="filter" class="form-select">
                  <option value="">--Filter bulan--</option>
                  <option value="2023-01" {{ request('filter') == '2023-01' ? 'selected' : '' }}>Januari</option>
                  <option value="2023-02" {{ request('filter') == '2023-02' ? 'selected' : '' }}>Februari</option>
                  <option value="2023-03" {{ request('filter') == '2023-03' ? 'selected' : '' }}>Maret</option>
                  <option value="2023-04" {{ request('filter') == '2023-04' ? 'selected' : '' }}>April</option>
                  <option value="2023-05" {{ request('filter') == '2023-05' ? 'selected' : '' }}>Mei</option>
                  <option value="2023-06" {{ request('filter') == '2023-06' ? 'selected' : '' }}>Juni</option>
                  <option value="2023-07" {{ request('filter') == '2023-07' ? 'selected' : '' }}>Juli</option>
                  <option value="2023-08" {{ request('filter') == '2023-08' ? 'selected' : '' }}>Agustus</option>
                  <option value="2023-09" {{ request('filter') == '2023-09' ? 'selected' : '' }}>September</option>
                  <option value="2023-10" {{ request('filter') == '2023-10' ? 'selected' : '' }}>Oktober</option>
                  <option value="2023-11" {{ request('filter') == '2023-11' ? 'selected' : '' }}>November</option>
                  <option value="2023-12" {{ request('filter') == '2023-12' ? 'selected' : '' }}>Desember</option>
                </select>
                <button class="btn btn-secondary" type="submit" id="button-addon2"><i class="fas fa-filter"></i></button>
              </div>
            </form>
          </div>

          <div class="col">
            <form action="{{ route('pengeluaran.index') }}" method="GET">
              <div class="input-group mb-3">
                <select name="filter" id="filter" class="form-select">
                  <option value="">--Filter motor--</option>
                  @foreach (['Beat', 'Vario', 'Nmax', 'PCX', 'Scoopy', 'Fazzio', 'ADV'] as $item)
                    <option value="{{ $item }}" {{ request('filter') == $item ? 'selected' : ''  }}>{{ $item }}</option>
                  @endforeach
                  
                </select>
                <button class="btn btn-secondary" type="submit" id="button-addon2"><i class="fas fa-filter"></i></button>
              </div>
            </form>
          </div>
          {{-- Pencarian pengeluaran --}}
          <div class="col-7">
            <form action="{{ route('pengeluaran.index') }}" method="GET">
            <div class="input-group mb-3">
              <input name="search" type="text" value="{{ request('search') }}" class="form-control" placeholder="Cari...">
              <button class="btn btn-secondary" type="submit" id="button-addon2">Cari</button>
            </div>
          </form>
          </div>
          
        </div>

        <table class="table table-bordered">
        </div>   
            <thead>
            <th>No.</th> 
            <th>Motor</th>
            <th>Pegawai</th>
            <th>Tanggal Pengeluaran</th>
            <th>Jenis Pengeluaran</th>
            <th>Biaya Pengeluaran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengeluarans as $pengeluaran)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengeluaran->motor->nama_motor }}  {{ $pengeluaran->plat_motor }}</td>
                <td>{{ $pengeluaran->pegawai->nama_pegawai }}</td>
                <td>{{ date('d F Y', strtotime($pengeluaran->tgl_pengeluaran)) }}</td>
                <td>{{ $pengeluaran->jenis_pengeluaran }}</td>
                <td>{{ number_format($pengeluaran->biaya_pengeluaran, 0, ',', '.') }}</td>
                <td>
                  <div class="d-flex justify-content-center align-items-center">
                    <a class="btn btn-sm btn-info me-2" data-bs-toggle="modal" data-bs-target="#{{ $pengeluaran->id_pengeluaran }}">
                        Detail
                    </a>
                  <a href="{{ route('pengeluaran.edit', $pengeluaran->id_pengeluaran) }}" class="btn btn-sm btn-success me-2" title="Edit">
                    Edit
                </a>
                <form action="{{ route('pengeluaran.destroy', $pengeluaran->id_pengeluaran) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus motor ini?')" title="Hapus">
                        Hapus
                    </button>
                </form>
                </td>
            </tr>
            <div class="modal fade" id="{{ $pengeluaran->id_pengeluaran }}" tabindex="-1" aria-labelledby="{{ $pengeluaran->id_pengeluaran }}Label" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pengeluaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p><strong>Id Pengeluaran : </strong>{{ $pengeluaran->id_pengeluaran }}</p>
                    <p><strong>Motor : </strong>{{ $pengeluaran->motor->nama_motor }}  {{ $pengeluaran->plat_motor }}</p>
                    <p><strong>Pegawai : </strong>{{ $pengeluaran->pegawai->nama_pegawai }}</p>
                    <p><strong>Tanggal Pengeluaran : </strong>{{ date('d F Y', strtotime($pengeluaran->tgl_pengeluaran)) }}</p>
                    <p><strong>Jenis Pengeluaran : </strong>{{ $pengeluaran->jenis_pengeluaran }}</p>
                    <p><strong>Biaya Pengeluaran : </strong>Rp. {{ number_format($pengeluaran->biaya_pengeluaran, 0, ',', '.') }}</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-end mt-2">
  {{ $pengeluarans->links() }}
</div>
  @empty($pengeluaran)
    <div class="text-center" style="font-weight: bold">
      <h5 style="font-weight: bold">Data pengeluaran tidak ada</h5>
      <a href="{{ route('pengeluaran.create') }}" class="">Tambah ?</a>
    </div>
  @endempty
<p><strong>Total Pengeluaran : </strong>Rp. {{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
</div>

@endsection