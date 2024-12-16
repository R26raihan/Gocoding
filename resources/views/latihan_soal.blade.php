@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Latihan Soal: {{ $kategori->nama_kategori }}</h1>

    @if (session('result'))
        <div class="alert alert-success">
            <p>Latihan selesai! Berikut hasil Anda:</p>
            <ul>
                <li>Benar: {{ session('result')['benar'] }}</li>
                <li>Total Soal: {{ session('result')['total'] }}</li>
                <li>Skor: {{ session('result')['skor'] }}%</li>
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.submitLatihan', $kategori->id) }}" method="POST">
        @csrf

        @foreach ($kategori->soals as $soal)
            <div class="mb-4">
                <p><strong>{{ $loop->iteration }}. {{ $soal->soal }}</strong></p>
                @foreach ($soal->jawabans as $jawaban)
                    <div>
                        <label>
                            <input type="radio" name="jawaban[{{ $soal->id }}]" value="{{ $jawaban->id }}">
                            {{ $jawaban->jawaban }}
                        </label>
                    </div>
                @endforeach
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Selesai</button>
        <a href="{{ url('/') }}" class="btn btn-primary">Kembali</a>

    </form>
</div>
@endsection
