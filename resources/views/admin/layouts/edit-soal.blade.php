@extends('admin.account-index')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Soal</h1>
                </div>

            </div>
        </div>
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-body" style="width:100%;">
                        <form action="{{ route('update-soal', $soalp3k->id) }}" method="post" class="">
                            @csrf
                            <div class="form-group">
                                <label for="no">No.</label>
                                <input type="number" name="no" class="form-control" value="{{ $soalp3k->no }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_soal">Jenis Soal</label>
                                <input type="text" name="jenis_soal" class="form-control"
                                    value="{{ $soalp3k->jenis_soal }}" required>
                            </div>
                            <div class="form-group">
                                <label for="soal">Soal</label>
                                <textarea id="summernote" name="soal">{{ $soalp3k->soal }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="no">Waktu Pengerjaan</label>
                                <input type="number" name="durasi_waktu" class="form-control"
                                    value="{{ $soalp3k->durasi_waktu }}" required>
                            </div>
                            <div class="form-group">
                                <label for="kategoriKegiatan">Jawaban</label><br>

                                <label>
                                    <input type="radio" name="jawaban" value="a"
                                        {{ $soalp3k->jawaban === 'a' ? 'checked' : '' }}>
                                    a
                                    <input type="text" name="jawaban_a" value="{{ $soalp3k->jawaban_a }}" required>
                                </label><br>

                                <label>
                                    <input type="radio" name="jawaban" value="b"
                                        {{ $soalp3k->jawaban === 'b' ? 'checked' : '' }}> b
                                    <input type="text" name="jawaban_b" value="{{ $soalp3k->jawaban_b }}" required>
                                </label><br>

                                <label>
                                    <input type="radio" name="jawaban" value="c"
                                        {{ $soalp3k->jawaban === 'c' ? 'checked' : '' }}> c
                                    <input type="text" name="jawaban_c" value="{{ $soalp3k->jawaban_c }}" required>
                                </label><br>
                                <label>
                                    <input type="radio" name="jawaban" value="d"
                                        {{ $soalp3k->jawaban === 'd' ? 'checked' : '' }}> d
                                    <input type="text" name="jawaban_d" value="{{ $soalp3k->jawaban_d }}" required>
                                </label><br>
                                <label>
                                    <input type="radio" name="jawaban" value="e"
                                        {{ $soalp3k->jawaban === 'e' ? 'checked' : '' }}> e
                                    <input type="text" name="jawaban_e" value="{{ $soalp3k->jawaban_e }}">
                                </label><br>
                            </div>
                            <div>
                                <input type="submit" value="Ubah" class="btn btn-primary float-right">
                                <a href="{{ route('datapppk') }}" class="btn btn-secondary">Cancel</a>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300, // tinggi editor
                toolbar: [
                    ['style', ['bold', 'italic',
                        'underline'
                    ]], // Opsi untuk Bold, Italic, dan Underline
                    ['insert', ['picture']] // Opsi untuk menyisipkan gambar
                ]
            });
        });
    </script>
@endsection
