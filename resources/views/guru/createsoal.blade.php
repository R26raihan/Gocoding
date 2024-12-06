@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat Soal Baru</h1>
    <form action="{{ route('guru.storeSoal') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="soal">Soal</label>
            <textarea id="soal" name="soal" class="form-control" required></textarea>
        </div>
        <div id="jawaban-container" class="mt-3">
            <label>Jawaban</label>
            <div class="jawaban-item mb-2">
                <input type="text" name="jawaban[0][text]" class="form-control mb-1" placeholder="Jawaban" required>
                <label>
                    <input type="radio" name="jawaban[0][is_correct]" value="1"> Benar
                </label>
                <label>
                    <input type="radio" name="jawaban[0][is_correct]" value="0" checked> Salah
                </label>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" onclick="addJawaban()">Tambah Jawaban</button>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>

<script>
    let jawabanIndex = 1;

    function addJawaban() {
        const container = document.getElementById('jawaban-container');
        const jawabanItem = document.createElement('div');
        jawabanItem.classList.add('jawaban-item', 'mb-2');
        jawabanItem.innerHTML = `
            <input type="text" name="jawaban[${jawabanIndex}][text]" class="form-control mb-1" placeholder="Jawaban" required>
            <label>
                <input type="radio" name="jawaban[${jawabanIndex}][is_correct]" value="1"> Benar
            </label>
            <label>
                <input type="radio" name="jawaban[${jawabanIndex}][is_correct]" value="0" checked> Salah
            </label>
        `;
        container.appendChild(jawabanItem);
        jawabanIndex++;
    }
</script>
@endsection
