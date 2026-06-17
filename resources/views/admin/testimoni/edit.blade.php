@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4" style="color: #78350F;">Edit Testimoni</h2>

    <div class="card border-0 p-4" style="border-radius: 16px; background: #FFFBEB;">
        <form action="{{ route('admin.testimoni.update', $testimoni) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $testimoni->nama }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Asal (kota)</label>
                <input type="text" name="asal" class="form-control" value="{{ $testimoni->asal }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Komentar</label>
                <textarea name="komentar" class="form-control" rows="4" required>{{ $testimoni->komentar }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Rating</label>
                <select name="rating" class="form-select">
                    @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" {{ $testimoni->rating == $i ? 'selected' : '' }}>{{ $i }} Bintang</option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Tipe Media</label>
                <select name="tipe_media" class="form-select" id="tipe_media" onchange="toggleMedia()">
                    <option value="none" {{ $testimoni->tipe_media === 'none' ? 'selected' : '' }}>Tidak Ada</option>
                    <option value="foto" {{ $testimoni->tipe_media === 'foto' ? 'selected' : '' }}>Foto</option>
                    <option value="video" {{ $testimoni->tipe_media === 'video' ? 'selected' : '' }}>Video</option>
                </select>
            </div>

            <div class="mb-3 {{ $testimoni->tipe_media !== 'foto' ? 'd-none' : '' }}" id="field_foto">
                <label class="form-label fw-bold">Upload Foto Baru</label>
                @if($testimoni->foto)
                    <div class="mb-2">
                        <img src="{{ asset($testimoni->foto) }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                        <small class="text-muted ms-2">Foto saat ini</small>
                    </div>
                @endif
                <input type="file" name="foto" class="form-control" accept="image/*">
            </div>

            <div class="mb-3 {{ $testimoni->tipe_media !== 'video' ? 'd-none' : '' }}" id="field_video">
                <label class="form-label fw-bold">Upload Video Baru</label>
                @if($testimoni->video)
                    <div class="mb-2">
                        <video src="{{ asset('storage/' . $testimoni->video) }}" style="width: 120px; border-radius: 8px;" controls></video>
                        <small class="text-muted ms-2">Video saat ini</small>
                    </div>
                @endif
                <input type="file" name="video" class="form-control" accept="video/mp4,video/mov,video/avi">
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="aktif" id="aktif" {{ $testimoni->aktif ? 'checked' : '' }}>
                    <label class="form-check-label fw-bold" for="aktif">Tampilkan di halaman utama</label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn-amber btn">Update</button>
                <a href="{{ route('admin.testimoni.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
function toggleMedia() {
    const tipe = document.getElementById('tipe_media').value;
    document.getElementById('field_foto').classList.toggle('d-none', tipe !== 'foto');
    document.getElementById('field_video').classList.toggle('d-none', tipe !== 'video');
}
</script>
@endsection