@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Latihan Soal: {{ $kategori->nama_kategori }}</h1>
    <p class="text-center mb-4">Berikut adalah soal yang tersedia dalam kategori ini:</p>

    @if ($kategori->soals->isEmpty())
        <p class="text-center">Tidak ada soal yang tersedia untuk kategori ini.</p>
    @else
        <form action="{{ route('siswa.submitLatihan', $kategori->id) }}" method="POST">
            @csrf

            <div class="row">
                @foreach ($kategori->soals as $soal)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $loop->iteration }}. {{ $soal->soal }}</h5>

                                <div class="form-check">
                                    @foreach ($soal->jawabans as $jawaban)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jawaban[{{ $soal->id }}]" value="{{ $jawaban->id }}" id="jawaban_{{ $jawaban->id }}">
                                            <label class="form-check-label" for="jawaban_{{ $jawaban->id }}">
                                                {{ $jawaban->jawaban }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary btn-block mt-4">Selesai</button>
        </form>
    @endif
</div>
@endsection

<style>
    /* General Styling */
.container {
    margin-top: 30px;
}

/* Card Styles */
.card {
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border: 1px solid #ddd;
}

.card-body {
    padding: 20px;
}

.card-title {
    font-size: 1.2rem;
    margin-bottom: 10px;
}

/* Form Check Styling */
.form-check {
    margin-bottom: 10px;
}

/* Button Styling */
.btn-block {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: white;
    border-radius: 5px;
    font-size: 1.1rem;
}

.btn-block:hover {
    background-color: #0056b3;
}

</style>
