@extends('frontpage.layouts.main')

@section('content')
  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('assets/images/gambar6.webp');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
	  <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
		<div class="col-md-9 ftco-animate pb-5">
		  <h1 class="mb-3 bread">We Rent Various Types of Vehicles</h1>
		</div>
	  </div>
	</div>
  </section>
	  
<section class="ftco-section bg-light">
	<div class="container">
		<div class="row">
            <form action="{{ route('frontpage.motors') }}" method="GET" class="">
                <div class="input-group mb-3">
                    <input value="{{ Request::input('search') }}" class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" name="search" id="search"/>
                    <button class="btn btn-secondary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                </div>
              </form>
            @foreach ($motors as $motor)
            <div class="col-md-4">
                <div class="car-wrap rounded ftco-animate">
                    <div class="img rounded d-flex align-items-end" style="background-image: url({{ asset('storage/' . $motor->gambar_motor) }});">
                    </div>
                    <div class="text">
                        <h2 class="mb-0"><a href="car-single.html">{{ $motor->nama_motor }} {{ $motor->cc }} cc.</a></h2>
                        <div class="d-flex mb-3">
                            <span class="text-bold">{{ $motor->tipe }}</span>
                            <p class="price ml-auto">Rp {{ number_format($motor->harga_sewa, 0, ',', '.') }} <span>/hari</span></p>
                        </div>
                        <div class="d-flex mb-3">
                            @if ($motor->status == 1)
                                <span class="badge bg-success">Available</span>
                            @else
                                <span class="badge bg-secondary">For Rent</span>
                            @endif
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <a class="btn btn-primary py-2 " data-bs-toggle="modal" data-bs-target="#{{ $motor->plat_motor }}">
                                Details
                            </a>
                        </div>
                        
                        </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="{{ $motor->plat_motor }}" tabindex="-1" aria-labelledby="tesLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tesLabel">Motorcycle Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ asset('storage/' . $motor->gambar_motor) }}" width="100%" alt="">
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Motorcycle Brand: </strong>{{ $motor->nama_motor }}</p>
                                    <p><strong>CC: </strong>{{ $motor->cc }} cc</p>
                                    <p><strong>Color: </strong>{{ $motor->warna }}</p>
                                    <p><strong>Type: </strong>{{ $motor->tipe }}</p>
                                    <p><strong>Year: </strong>{{ $motor->tahun }}</p>
                                    <p><strong>Rental price: </strong>Rp. {{ number_format($motor->harga_sewa, 0, ',', '.') }}</p>
                                    <p><strong>Status: </strong>
                                        @if ($motor->status == 1)
                                            <span class="badge bg-success">Available</span>
                                        @else
                                            <span class="badge bg-secondary">For Rent</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>            
            @endforeach
			  
			<div class="d-flex justify-content-end mt-2">
                {{ $motors->links() }}
            </div>
	    </div>
	</div>
</section>

@endsection