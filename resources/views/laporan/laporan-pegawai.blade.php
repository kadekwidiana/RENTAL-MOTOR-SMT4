@extends('layouts.main')

@section('content')
<div class="container">
    {{-- filter/pencarian --}}
    <div class="row mb-2">
        {{-- filter/pencarian --}}
        <div class="row mb-2">
            <div class="col">
              <form action="{{ route('laporan.pegawai') }}" method="GET">
                <div class="input-group mb-3">
                  <a href="{{ route('laporan.pegawai') }}" class="btn btn-secondary"><i class="fas fa-retweet"></i></a>
                  <select name="bulan" id="bulan" class="form-select" required>
                    <option value="">--Bulan--</option>
                    <option value="01" {{ request('bulan') == '01' ? 'selected' : '' }}>Januari</option>
                    <option value="02" {{ request('bulan') == '02' ? 'selected' : '' }}>Februari</option>
                    <option value="03" {{ request('bulan') == '03' ? 'selected' : '' }}>Maret</option>
                    <option value="04" {{ request('bulan') == '04' ? 'selected' : '' }}>April</option>
                    <option value="05" {{ request('bulan') == '05' ? 'selected' : '' }}>Mei</option>
                    <option value="06" {{ request('bulan') == '06' ? 'selected' : '' }}>Juni</option>
                    <option value="07" {{ request('bulan') == '07' ? 'selected' : '' }}>Juli</option>
                    <option value="08" {{ request('bulan') == '08' ? 'selected' : '' }}>Agustus</option>
                    <option value="09" {{ request('bulan') == '09' ? 'selected' : '' }}>September</option>
                    <option value="10" {{ request('bulan') == '10' ? 'selected' : '' }}>Oktober</option>
                    <option value="11" {{ request('bulan') == '11' ? 'selected' : '' }}>November</option>
                    <option value="12" {{ request('bulan') == '12' ? 'selected' : '' }}>Desember</option>
                  </select>
                  <select name="tahun" id="tahun" class="form-select" required>
                    <option value="">--Tahun--</option>
                    <option value="2022" {{ request('tahun') == '2022' ? 'selected' : '' }}>2022</option>
                    <option value="2023" {{ request('tahun') == '2023' ? 'selected' : '' }}>2023</option>
                    <option value="2024" {{ request('tahun') == '2024' ? 'selected' : '' }}>2024</option>
                    <option value="2025" {{ request('tahun') == '2025' ? 'selected' : '' }}>2025</option>
                  </select>
                  <button class="btn btn-secondary" type="submit" id="button-addon2"><i class="fas fa-filter"></i></button>
                </div>
              </form>
            </div>
  
            {{-- Pencarian pengeluaran --}}
            <div class="col-8">
              <form action="{{ route('laporan.pegawai') }}" method="GET">
              <div class="input-group mb-3">
                <input name="search" type="text" value="{{ request('search') }}" class="form-control" placeholder="Cari...">
                <button class="btn btn-secondary" type="submit" id="button-addon2">Cari</button>
              </div>
            </form>
            </div>
          </div>
          @php
              $dateMonth = $bulan;
              $dateYear = $tahun;
              $dateTimeMonth = DateTime::createFromFormat('m', $dateMonth);
              $dateTimeYear = DateTime::createFromFormat('Y', $dateYear);
              $month = $dateTimeMonth->format('F');
              $year = $dateTimeYear->format('Y');
              
            @endphp
              <h4>{{$month}} {{ $year }}</h4>
    <table class="table">
        <thead>
            <table class="table table-bordered">
            <tr class="text-center">
                <th>No.</th>
                <th>Nama Pegawai</th>
                <th>Jumlah Transaksi</th>
                <th>Jumlah Pengeluaran</th>
                <th>Ket / Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawais as $pegawai)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        {{ $pegawai->nama_pegawai }}
                    </td>
                    <td>
                        @php
                            $jumlahTransaksi = $pegawai->transaksi()->where('status_transaksi', 1)->whereMonth('tgl_selesai', $bulan)->whereYear('tgl_selesai', $tahun)->count();

                            echo number_format($jumlahTransaksi, 0, ',', '.')
                        @endphp
                    </td>
                    <td>
                        @php
                            $jumlahPengeluaran = $pegawai->pengeluaran()->whereMonth('tgl_pengeluaran', $bulan)->whereYear('tgl_pengeluaran', $tahun)->count();

                            echo number_format($jumlahPengeluaran, 0, ',', '.')
                        @endphp
                    </td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="" class="btn btn-sm btn-info me-2">
                                Detail
                            </a>
                            {{-- <a class="btn btn-sm btn-warning me-2">
                                <i class="fas fa-print"></i>
                            </a> --}}
                            
                        </div>
                    </td>
                  </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-end mt-2">
    {{ $pegawais->links() }}
</div>
@endsection