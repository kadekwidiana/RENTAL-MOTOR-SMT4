@extends('layouts.main')

@section('content')
<div class="align-content-end mb-4">
        <form method="POST" action="{{ route('motor.store') }}" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="border p-3 rounded">
                <div class="form-group mt-2">
                    <label label for="plat_motor">Plat Motor</label>
                    <input type="text" class="form-control plat_motor @error('plat_motor') is-invalid @enderror" id="plat_motor" name="plat_motor" value="{{ old('plat_motor') }}" placeholder="Masukan Plat Motor" required autofocus>
                    @error('plat_motor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                            <div class="form-group">
                                <label for="nama_motor">{{ __('Nama Motor') }}</label>
                                    <input id="nama_motor" type="text" class="form-control @error('nama_motor') is-invalid @enderror" name="nama_motor" value="{{ old('nama_motor') }}" placeholder="Masukan Nama Motor">

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
                                        <input id="warna_merah" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="merah" {{ old('warna') == 'merah' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="warna_merah">{{ __('Merah') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="warna_biru" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="biru" {{ old('warna') == 'biru' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="warna_biru">{{ __('Biru') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="warna_hijau" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="hijau" {{ old('warna') == 'hijau' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="warna_hijau">{{ __('Hijau') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="warna_kuning" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="kuning" {{ old('warna') == 'kuning' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="warna_kuning">{{ __('Kuning') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="warna_merah" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="hitam" {{ old('warna') == 'hitam' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="warna_hitam">{{ __('Hitam') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="warna_merah" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="putih" {{ old('warna') == 'putih' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="warna_putih">{{ __('Putih') }}</label>
                                    </div>
                                </div>
                                    @error('warna')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="tipe">{{ __('Tipe') }}</label>
                                <select id="tipe" class="form-control @error('tipe') is-invalid @enderror" name="tipe" required autocomplete="tipe" autofocus>
                                    <option value="">--Pilih tipe--</option>
                                    <option value="Yamaha" {{ old('tipe') == 'Yamaha' ? 'selected' : '' }}>Yamaha</option>
                                    <option value="Honda" {{ old('tipe') == 'Honda' ? 'selected' : '' }}>Honda</option>
                                    <option value="Suzuki" {{ old('tipe') == 'Suzuki' ? 'selected' : '' }}>Suzuki</option>
                                    <option value="Ninja" {{ old('tipe') == 'Ninja' ? 'selected' : '' }}>Ninja</option>
                                    <option value="Trail" {{ old('tipe') == 'Trail' ? 'selected' : '' }}>Trail</option>
                                </select>
                            
                                @error('tipe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="tahun">{{ __('Tahun') }}</label>
                                    <input id="tahun" type="number" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') }}" placeholder="Masukan Tahun">
                                    @error('tahun')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label for="tgl_pajak">{{ __('Tanggal Pajak') }}</label>
                                <input id="tgl_pajak" type="date" class="form-control @error('tgl_pajak') is-invalid @enderror" name="tgl_pajak" value="{{ old('tgl_pajak') }}" rplaceholder="Masukan Tanggal Pajak" autofocus>

                                @error('tgl_pajak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama_pemilik">{{ __('Nama Pemilik') }}</label>
                                <input id="nama_pemilik" type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" name="nama_pemilik" value="{{ old('nama_pemilik') }}" placeholder="Masukan Nama Pemilik" autofocus>

                                @error('nama_pemilik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="cc">{{ __('CC') }}</label>
                                <input id="cc" type="number" class="form-control @error('cc') is-invalid @enderror" name="cc" value="{{ old('cc') }}" placeholder="Masukan CC" autofocus>
                                @error('cc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label for="harga_sewa">{{ __('Harga Sewa') }}</label>
                                <input id="harga_sewa" type="number" class="form-control @error('harga_sewa') is-invalid @enderror" name="harga_sewa" value="{{ old('harga_sewa')}}" placeholder="Masukan Harga Sewa" autofocus>
                                @error('harga_sewa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">{{ __('Status') }}</label>
                            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="1" selected>Tersedia</option>
                                <option value="0" >Disewakan</option>
                            </select>                            

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>

                        <div class="form-group">
                            <label for="gambar_motor">{{ __('Gambar Motor') }}</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control @error('gambar_motor') is-invalid @enderror" type="file" id="gambar_motor" name="gambar_motor" onchange="previewImage()" value="{{ old('gambar_motor') }}">

                                @error('gambar_motor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tgl_catat">{{ __('Tanggal Catat') }}</label>
                                <input id="tgl_catat" type="date" class="form-control @error('tgl_catat') is-invalid @enderror" name="tgl_catat" value="{{ old('tgl_catat') ?: date('Y-m-d') }}" required autocomplete="tgl_catat" autofocus>
                            
                                @error('tgl_catat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah') }}
                                </button>
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
    function previewImage(){
      const image = document.querySelector('#gambar_motor');
      const imgPreview = document.querySelector('.img-preview');
      imgPreview.style.display = 'block';
      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);
      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }
  </script>
@endsection




