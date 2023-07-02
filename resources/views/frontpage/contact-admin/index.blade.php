@extends('layouts.main')

@section('content')
  <h1>Daftar Pesan</h1>
  
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Subjek</th>
          <th>Pesan</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($contacts as $contact)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $contact->nama }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->subjek }}</td>
            <td>{{ $contact->pesan }}</td>
            <td class="border text-center">
              <a href="{{ route('contact-admin.show', $contact->id) }}" class="btn btn-primary">Lihat</a>
              <form action="{{ route('contact-admin.destroy', $contact->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">Hapus</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="pagination justify-content-end">
    {{ $contacts->links('pagination::bootstrap-4') }}
  </div>
  @endsection
  