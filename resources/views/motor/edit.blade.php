@extends('layouts.main')

@section('content')
<div class="align-content-end mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('motor.update', $motor->plat_motor) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="border p-3 rounded">
                                <div class="form-group mt-2">
                                    <label label for="plat_motor">Plat Motor</label>
                                    <input id="plat_motor" type="text" class="form-control @error('plat_motor') is-invalid @enderror" name="plat_motor" value="{{ old('plat_motor', $motor->plat_motor) }}" required autocomplete="plat_motor" readonly>
                                    @error('plat_motor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            <div class="form-group">
                                <label for="nama_motor">{{ __('Nama Motor') }}</label>
                                    <input id="nama_motor" type="text" class="form-control @error('nama_motor') is-invalid @enderror" name="nama_motor" value="{{ old('nama_motor', $motor->nama_motor) }}" required autocomplete="nama_motor">

                                    @error('nama_motor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            <div class="form-group mt-2">
                                <label for="">Pilih Warna</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input id="warna_merah" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="merah" {{ $motor->warna == 'merah' ? 'checked' : '' }} required auto>
                                        <label class="form-check-label" for="warna_biru">Merah</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="warna_biru" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="biru" {{ $motor->warna == 'biru' ? 'checked' : '' }} required auto>
                                        <label class="form-check-label" for="warna_biru">Biru</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="warna_hijau" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="hijau" {{ $motor->warna == 'hijau' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="warna_hijau">{{ __('Hijau') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="warna_kuning" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="kuning" {{ $motor->warna == 'kuning' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="warna_kuning">Kuning</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="warna_merah" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="hitam" {{ $motor->warna == 'hitam' ? 'checked' : '' }} required auto>
                                        <label class="form-check-label" for="warna_biru">Hitam</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="warna_merah" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="putih" {{ $motor->warna == 'putih' ? 'checked' : '' }} required auto>
                                        <label class="form-check-label" for="warna_biru">Putih</label>
                                    </div>
                                </div>
                                    @error('warna')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            <div class="form-group">
                                <label for="tipe" class="col-md-4 col-form-label text-md-right">Tipe</label>

                                <select id="tipe" class="form-control @error('tipe') is-invalid @enderror" name="tipe" required autocomplete="tipe" autofocus>
                                    <option value="">--Pilih tipe--</option>
                                    <option value="Yamaha" {{ $motor->tipe == 'Yamaha' ? 'selected' : '' }}>Yamaha</option>
                                    <option value="Honda" {{ $motor->tipe == 'Honda' ? 'selected' : '' }}>Honda</option>
                                    <option value="Suzuki" {{ $motor->tipe == 'Suzuki' ? 'selected' : '' }}>Suzuki</option>
                                    <option value="Ninja" {{ $motor->tipe == 'Ninja' ? 'selected' : '' }}>Ninja</option>
                                    <option value="Trail" {{ $motor->tipe == 'Trail' ? 'selected' : '' }}>Trail</option>
                                </select>

                                    @error('tipe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            <div class="form-group">
                                <label for="tahun" class="col-md-4 col-form-label text-md-right">Tahun</label>
                                    <input id="tahun" type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun', $motor->tahun) }}" required autocomplete="tahun">
                                
                                @error('tahun') 
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tgl_pajak" class="col-md-4 col-form-label text-md-right">Tanggal Pajak</label>
                                <input id="tgl_pajak" type="date" class="form-control @error('tgl_pajak') is-invalid @enderror" name="tgl_pajak" value="{{ old('tgl_pajak', $motor->tgl_pajak->format('Y-m-d')) }}" required autocomplete="tgl_pajak">
                                @error('tgl_pajak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            

                        <div class="form-group">
                            <label for="nama_pemilik" class="col-md-4 col-form-label text-md-right">Nama Pemilik</label>
                                <input id="nama_pemilik" type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" name="nama_pemilik" value="{{ old('nama_pemilik', $motor->nama_pemilik) }}" required autocomplete="nama_pemilik">

                                @error('nama_pemilik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label for="cc" class="col-md-4 col-form-label text-md-right">CC</label>
                                <input id="cc" type="number" class="form-control @error('cc') is-invalid @enderror" name="cc" value="{{ old('cc', $motor->cc) }}" required autocomplete="cc">

                                @error('cc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label for="harga_sewa" class="col-md-4 col-form-label text-md-right">Harga Sewa</label>
                                <input id="harga_sewa" type="number" class="form-control @error('harga_sewa') is-invalid @enderror" name="harga_sewa" value="{{ old('harga_sewa', $motor->harga_sewa) }}" required autocomplete="harga_sewa">
                                @error('harga_sewa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                                <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required autocomplete="status">
                                    <option value="0" {{ $motor->status == 0 ? 'selected' : '' }}>Tersedia</option>
                                    <option value="1" {{ $motor->status == 1 ? 'selected' : '' }}>Disewa</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label for="gambar_motor" class="col-md-4 col-form-label text-md-right">Gambar Motor</label>
                                <div class="custom-file">
                                    <input type="hidden" class="custom-file-input @error('gambar_motor') is-invalid @enderror" id="gambar_motor" name="oldImage" value="{{ $motor->gambar_motor }}">
                                    @if($motor->gambar_motor)
                                        <img src="{{ asset('storage/' . $motor->gambar_motor) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt=""> 
                                    @else
                                        <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                                    @endif
                                        <input class="form-control @error('gambar_motor') is-invalid @enderror" type="file" id="gambar_motor" name="gambar_motor" onchange="previewImage()" value="{{ old('gambar_motor', $motor->gambar_motor) }}">
                                    </div>

                                @error('gambar_motor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tgl_catat" class="col-md-4 col-form-label text-md-right">Tanggal Catat</label>
                                <input id="tgl_catat" type="date" class="form-control @error('tgl_catat') is-invalid @enderror" name="tgl_catat" value="{{ old('tgl_catat', $motor->tgl_catat->format('Y-m-d')) }}" required autocomplete="tgl_catat">
                                @error('tgl_catat')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                              
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('motor.index') }}" class="btn btn-danger">
                                {{ __('Batal') }}
                            </a>
                        </div>                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage() {
    const image = document.querySelector('#gambar_motor');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
  </script>
@endsection