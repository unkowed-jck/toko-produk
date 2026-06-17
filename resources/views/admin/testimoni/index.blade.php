@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #78350F;">Kelola Testimoni</h2>
        <a href="{{ route('admin.testimoni.create') }}" class="btn-amber btn">+ Tambah Testimoni</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead style="background: #FEF3C7;">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Asal</th>
                    <th>Komentar</th>
                    <th>Rating</th>
                    <th>Media</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimoni as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->asal ?? '-' }}</td>
                    <td>{{ Str::limit($item->komentar, 60) }}</td>
                    <td>
                        @for($i = 1; $i <= 5; $i++)
                            {{ $i <= $item->rating ? '⭐' : '☆' }}
                        @endfor
                    </td>
                    <td>
                        @if($item->tipe_media === 'foto')
                            <img src="{{ asset('storage/' . $item->foto) }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                        @elseif($item->tipe_media === 'video')
                            <span class="badge bg-warning text-dark">🎥 Video</span>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        @if($item->aktif)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.testimoni.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.testimoni.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus testimoni ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">Belum ada testimoni.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $testimoni->links() }}
</div>
@endsection