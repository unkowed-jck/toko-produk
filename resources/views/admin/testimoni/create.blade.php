@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4" style="color: #78350F;">Tambah Testimoni</h2>

    <div class="card border-0 p-4" style="border-radius: 16px; background: #FFFBEB;">
        <form action="{{ route('admin.testimoni.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Asal (kota)</label>
                <input type="text" name="asal" class="form-control" value="{{ old('asal') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Komentar</label>
                <textarea name="komentar" class="form-control" rows="4" required>{{ old('komentar') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Rating</label>
                <select name="rating" class="form-select">
                    @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}">{{ $i }} Bintang</option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Tipe Media</label>
                <select name="tipe_media" class="form-select" id="tipe_media" onchange="toggleMedia()">
                    <option value="none">Tidak Ada</option>
                    <option value="foto">Foto</option>
                    <option value="video">Video</option>
                </select>
            </div>

            <div class="mb-3 d-none" id="field_foto">
                <label class="form-label fw-bold">Upload Foto</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
            </div>

            <div class="mb-3 d-none" id="field_video">
                <label class="form-label fw-bold">Upload Video</label>
                <input type="file" name="video" class="form-control" accept="video/mp4,video/mov,video/avi">
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="aktif" id="aktif" checked>
                    <label class="form-check-label fw-bold" for="aktif">Tampilkan di halaman utama</label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn-amber btn">Simpan</button>
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