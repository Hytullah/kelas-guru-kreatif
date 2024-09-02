@extends('admin.account-index')
@section('content')
    <style>
        /* CSS untuk kotak navigasi soal */
        .box {
            border: 1px solid #000;
            width: 35px;
            text-align: center;
            margin-right: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
            background-color: white;
            /* Latar belakang default kotak */
        }

        .number {
            font-size: 15px;
            color: black;
        }

        .color {
            width: 33px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
            font-size: 15px;
        }

        /* CSS untuk kotak navigasi soal yang telah dijawab */
        .box.answered {
            /* background-color: gray; */
            /* Latar belakang ketika pertanyaan telah dijawab */
        }
    </style>
    <section>
        <div class="row d-flex flex-column mb-2 mt-2 p-3">
            <div class="row" style="border:1px solid grey;background-color: #e9ecef;">
                <div class="col-sm-8 pt-4 pb-4">

                    <h3 class="m-0">SELEKSI PPPK 2023 JABATAN FUNGSIONAL GURU</h3>
                </div>
                <div class="col-sm-8">
                    {{-- <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Kursusku</li>
                        <li class="breadcrumb-item"><a href="#">SELEKSI PPPK 2023 JABATAN FUNGSIONAL GURU</a>
                        </li>
                    </ol> --}}
                </div>
            </div>
        </div>


        <div class="row">

            <div class="info col-lg-7 mt-0 mb-4 mt-lg-0 d-flex align-items-stretch flex-column" data-aos="fade-up"
                data-aos-delay="200">
                <div class="info p-3" style="border:1px solid grey;">
                    <div class="info d-flex flex-column align-items-end" style="width:100%;">
                        <p id="hitung-mundur" style="border: 1px solid red"></p>
                    </div>
                    <form action="{{ route('store-jawaban') }}" method="POST" class="form-check" id="jawaban-form">
                        @csrf
                        @foreach ($dtSoal as $item)
                            <div class="info d-flex flex-row">
                                <div class="info mr-2 mb-0 p-2"
                                    style="background-color:#e9ecef; width:11vh; height:fit-content;">
                                    <p>Soal <b style="font-size: 150%">{{ $item->no }}</b></p>
                                    @php
                                        // Memeriksa apakah pertanyaan ini sudah dijawab dalam sesi
                                        $isAnswered = Session::has('jawaban_user.' . $item->id);
                                    @endphp
                                    @if ($isAnswered)
                                        <p style="color: green">Sudah dijawab</p>
                                        {{-- <p>Waktu Anda: 4,00</p>
                                        <p>Pertanyaan sudah ditandai</p> --}}
                                    @else
                                        <p style="color: red">Belum dijawab</p>
                                        {{-- <p>Ditandai dari 4,00</p>
                                        <p>Tandai pertanyaan</p> --}}
                                    @endif

                                </div>
                                <div class="info p-3" style="background-color: rgb(200, 227, 254); width: 100%;">
                                    <div class="info">
                                        {!! $item->soal !!}
                                    </div>
                                    <div class="info">
                                        <!-- Menambahkan input hidden dengan nama yang mengandung id soal -->
                                        <input type="hidden" name="soal_id[]" value="{{ $item->id }}">

                                        <!-- Isi formulir dengan pilihan jawaban -->
                                        <input type="radio" name="jawaban[{{ $item->id }}]" value="a"
                                            @if ($item->id && Session::has('jawaban_user.' . $item->id) && Session::get('jawaban_user.' . $item->id) === 'a') checked @endif>
                                        {{ $item->jawaban_a }}<br>
                                        <input type="radio" name="jawaban[{{ $item->id }}]" value="b"
                                            @if ($item->id && Session::has('jawaban_user.' . $item->id) && Session::get('jawaban_user.' . $item->id) === 'b') checked @endif>
                                        {{ $item->jawaban_b }}<br>
                                        <input type="radio" name="jawaban[{{ $item->id }}]" value="c"
                                            @if ($item->id && Session::has('jawaban_user.' . $item->id) && Session::get('jawaban_user.' . $item->id) === 'c') checked @endif>
                                        {{ $item->jawaban_c }}<br>
                                        <input type="radio" name="jawaban[{{ $item->id }}]" value="d"
                                            @if ($item->id && Session::has('jawaban_user.' . $item->id) && Session::get('jawaban_user.' . $item->id) === 'd') checked @endif>
                                        {{ $item->jawaban_d }}<br>
                                        @if ($item->no <= 90)
                                            <input type="radio" name="jawaban[{{ $item->id }}]" value="e"
                                                @if ($item->id && Session::has('jawaban_user.' . $item->id) && Session::get('jawaban_user.' . $item->id) === 'e') checked @endif>
                                            {{ $item->jawaban_e }}<br>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        @endforeach

                        {{-- <div class="info d-flex flex-row justify-content-end mt-3" style="width:100%;">
                        <button type="submit" class="btn btn-warning btn-sm">
                            Simpan Jawaban
                        </button>
                    </div> --}}
                        <div class="info d-flex flex-row justify-content-between mt-3" style="width:100%;">
                            <?php
                            // Halaman yang diminta oleh pengguna (gunakan input dari pengguna atau atur ke halaman default)
                            $page = request()->get('page', 1);
                            
                            // Total soal
                            $totalSoal = $totalSoal;
                            ?>

                            <a href="?page={{ $page - 1 }}&paket={{ $paket }}">
                                <button type="button" id="kirim-jawaban-button"
                                    class="btn btn-secondary btn-sm {{ $page <= 1 ? 'd-none' : '' }}">
                                    Halaman Sebelumnya
                                </button>
                            </a>

                            @if ($page < $totalSoal)
                                <a href="?page={{ $page + 1 }}&paket={{ $paket }}">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        Halaman Selanjutnya
                                    </button>
                                </a>
                            @else
                                <a href="#" onclick="konfirmasiSelesai(); return false;">
                                    <button type="button" class="btn btn-success btn-sm {{ $page <= 1 ? 'd-none' : '' }}"
                                        aria-label="Selesai">
                                        Selesai
                                    </button>
                                </a>
                            @endif
                    </form>
                </div>

            </div>
        </div>
        <div class="col-lg-5 mb-4 d-flex flex-wrap align-items-start" data-aos="fade-up" data-aos-delay="100">
            <div class=" info d-flex flex-column p-2" style="border:1px solid grey; width:100%;">
                <div class="info">
                    Navigasi Soal
                </div>

                {{-- saya ingin halaman dibawah ini memiliki background color jika jawaban sudah dipilih dan tidak ada background color jika belum memilih jawaban --}}
                <div class="jenis-soal mt-3">
                    <span style="font-size: 150%;">Teknis</span>
                    <div class="info grid text-center d-flex flex-wrap flex-row">
                        @php
                            $totalData = count($allSoal);
                        @endphp
                        @for ($i = 1; $i <= 90; $i++)
                            @php
                                // Memeriksa apakah pertanyaan ini sudah dijawab dalam sesi
                                $isAnswered = Session::has('jawaban_user.' . $i);
                                $backgroundColor = $isAnswered ? 'gray' : 'white';
                            @endphp

                            <a href="?page={{ $i }}">
                                <div class="box"
                                    onclick="updateAnswerBackground({{ $i }}, {{ $i }})">
                                    <div class="number">{{ $i }}</div>
                                    <div class="color" style="background-color: {{ $backgroundColor }}">&nbsp;</div>
                                </div>
                            </a>
                        @endfor
                    </div>
                </div>

                <div class="jenis-soal mt-3">
                    <span style="font-size: 150%;">Manajerial</span>
                    <div class="info grid text-center d-flex flex-wrap flex-row">
                        @php
                            $totalData = count($allSoal);
                        @endphp
                        @for ($i = 91; $i <= 115; $i++)
                            {{-- Ubah rentang nomor soal yang ingin Anda masukkan ke kategori Manajerial --}}
                            @php
                                // Memeriksa apakah pertanyaan ini sudah dijawab dalam sesi
                                $isAnswered = Session::has('jawaban_user.' . $i);
                                $backgroundColor = $isAnswered ? 'gray' : 'white';
                            @endphp

                            <a href="?page={{ $i }}">
                                <div class="box"
                                    onclick="updateAnswerBackground({{ $i }}, {{ $i }})">
                                    <div class="number">{{ $i }}</div>
                                    <div class="color" style="background-color: {{ $backgroundColor }}">&nbsp;</div>
                                </div>
                            </a>
                        @endfor
                    </div>
                </div>

                <div class="jenis-soal mt-3">
                    <span style="font-size: 150%;">Sosial Kultural</span>
                    <div class="info grid text-center d-flex flex-wrap flex-row">
                        @php
                            $totalData = count($allSoal);
                        @endphp
                        @for ($i = 116; $i <= 135; $i++)
                            {{-- Ubah rentang nomor soal yang ingin Anda masukkan ke kategori Manajerial --}}
                            @php
                                // Memeriksa apakah pertanyaan ini sudah dijawab dalam sesi
                                $isAnswered = Session::has('jawaban_user.' . $i);
                                $backgroundColor = $isAnswered ? 'gray' : 'white';
                            @endphp

                            <a href="?page={{ $i }}">
                                <div class="box"
                                    onclick="updateAnswerBackground({{ $i }}, {{ $i }})">
                                    <div class="number">{{ $i }}</div>
                                    <div class="color" style="background-color: {{ $backgroundColor }}">&nbsp;</div>
                                </div>
                            </a>
                        @endfor
                    </div>
                </div>

                <div class="jenis-soal mt-3">
                    <span style="font-size: 150%;">Wawancara</span>
                    <div class="info grid text-center d-flex flex-wrap flex-row">
                        @php
                            $totalData = count($allSoal);
                        @endphp
                        @for ($i = 136; $i <= 145; $i++)
                            {{-- Ubah rentang nomor soal yang ingin Anda masukkan ke kategori Manajerial --}}
                            @php
                                // Memeriksa apakah pertanyaan ini sudah dijawab dalam sesi
                                $isAnswered = Session::has('jawaban_user.' . $i);
                                $backgroundColor = $isAnswered ? 'gray' : 'white';
                            @endphp

                            <a href="?page={{ $i }}">
                                <div class="box"
                                    onclick="updateAnswerBackground({{ $i }}, {{ $i }})">
                                    <div class="number">{{ $i }}</div>
                                    <div class="color" style="background-color: {{ $backgroundColor }}">&nbsp;</div>
                                </div>
                            </a>
                        @endfor
                    </div>
                </div>


            </div>
        </div>
        {{-- </div> --}}
    </section>
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Function to submit the form when radio buttons change
        $('input[type=radio]').on('change', function() {
            $(this).closest('form').submit();
        });

        // Fungsi untuk mengubah latar belakang kotak navigasi soal
        function updateAnswerBackground(iteration) {
            // Ganti latar belakang elemen dengan ID "box" berdasarkan iterasi yang diberikan
            var boxElement = document.querySelector('div.box:nth-child(' + iteration + ') .color');

            // Ganti warna latar belakangnya jika jawaban telah dipilih
            var isAnswered = boxElement.style.backgroundColor === 'gray';
            boxElement.style.backgroundColor = isAnswered ? 'white' : 'gray';

            // Selain mengubah latar belakang, Anda juga bisa melakukan tindakan lainnya sesuai kebutuhan.
        }

        // Fungsi yang dipanggil saat pengguna menjawab pertanyaan
        function handleAnswer(iteration, selectedAnswer) {
            var idSoal = iteration;

            // Mengambil kunci jawaban dari tabel "ppkk" menggunakan AJAX
            $.ajax({
                url: '/get-kunci-jawaban/' + idSoal, // Ganti URL ini dengan URL yang sesuai
                method: 'GET',
                success: function(response) {
                    var kunciJawaban = response.kunci_jawaban; // Mengambil kunci jawaban dari respons

                    // Membandingkan jawaban pengguna dengan kunci jawaban
                    if (selectedAnswer === kunciJawaban) {
                        // Menghitung skor berdasarkan nilai radio button yang dipilih
                        var skor = parseInt(localStorage.getItem('skor')) || 0;
                        if (selectedAnswer === '5') {
                            skor += 5; // Jika memilih 5, tambahkan +5 jika benar
                        } else if (selectedAnswer === '4') {
                            skor += 4; // Jika memilih 4, tambahkan +4 jika benar
                        }
                        localStorage.setItem('skor', skor);

                        // Update tampilan skor pada halaman
                        updateSkorTampilan(skor);
                    }

                    // ... Kode lain yang mengelola jawaban pengguna ...
                },
                error: function(error) {
                    console.error('Gagal mengambil kunci jawaban', error);
                }
            });

            // ... Kode lain yang mengelola jawaban pengguna ...
        }

        // Function to save user's answers to localStorage
        function simpanJawaban(idSoal, nilaiJawaban) {
            var idPengguna = getUserId();
            var jawabanKey = 'jawaban_' + idPengguna;
            var jawaban = JSON.parse(localStorage.getItem(jawabanKey)) || {};
            jawaban[idSoal] = nilaiJawaban;
            localStorage.setItem(jawabanKey, JSON.stringify(jawaban));
        }

        // Function to load user's answers from localStorage
        function muatJawaban(idSoal) {
            var idPengguna = getUserId();
            var jawabanKey = 'jawaban_' + idPengguna;
            var jawaban = JSON.parse(localStorage.getItem(jawabanKey));
            if (jawaban && jawaban[idSoal]) {
                var nilaiJawaban = jawaban[idSoal];
                var radio = document.querySelector('input[name="jawaban[' + idSoal + ']"][value="' + nilaiJawaban + '"]');
                if (radio) {
                    radio.checked = true;
                }
            }
        }

        // Panggil fungsi muatJawaban untuk setiap soal yang ada pada halaman saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            @foreach ($dtSoal as $item)
                muatJawaban('{{ $item->id }}');
            @endforeach
        });

        function konfirmasiSelesai() {
            var confirmation = confirm('Anda yakin ingin menghapus semua jawaban?');
            if (confirmation) {
                // Jika pengguna mengonfirmasi, maka lakukan pengalihan
                window.location.href = "{{ url('selesai') }}?confirmation=confirmed";
            }
            // Tidak ada tindakan jika pengguna memilih "Batal"
        }

        function getUserId() {
            // Periksa apakah pengguna sudah login
            if ({{ auth()->check() }}) {
                // Menggunakan sintaks Laravel untuk mendapatkan ID pengguna yang masuk
                return {{ auth()->user()->id }};
            } else {
                // Pengguna belum login, kembalikan nilai default atau lakukan sesuatu yang sesuai dengan kebutuhan Anda
                return 'pengguna-belum-login';
            }
        }
    </script>

    <!-- JavaScript code to automatically submit the form when radio buttons change -->
    {{-- <script>
        // Function to submit the form when radio buttons change
        $('input[type=radio]').on('change', function() {
            $(this).closest('form').submit();
        });
    </script> --}}

    {{-- <script>
        // Fungsi untuk menyimpan jawaban pengguna ke localStorage
        function simpanJawaban(idSoal, nilaiJawaban) {
            var jawaban = localStorage.getItem('jawaban') || '{}';
            jawaban = JSON.parse(jawaban);
            jawaban[idSoal] = nilaiJawaban;
            localStorage.setItem('jawaban', JSON.stringify(jawaban));
        }

        // Fungsi untuk memulihkan jawaban pengguna dari localStorage
        function muatJawaban(idSoal) {
            var jawaban = localStorage.getItem('jawaban');
            if (jawaban) {
                jawaban = JSON.parse(jawaban);
                var nilaiJawaban = jawaban[idSoal];
                if (nilaiJawaban) {
                    var radio = document.querySelector('input[name="jawaban[' + idSoal + ']"][value="' + nilaiJawaban +
                        '"]');
                    if (radio) {
                        radio.checked = true;
                    }
                }
            }
        }

        // Panggil fungsi muatJawaban untuk setiap soal yang ada pada halaman saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            @foreach ($dtSoal as $item)
                muatJawaban('{{ $item->id }}');
            @endforeach
        });

        // Fungsi untuk mengirim jawaban ke server menggunakan AJAX
        function submitJawaban(radio) {
            var nilaiJawaban = radio.value;
            var idSoal = radio.name.split('[')[1].split(']')[0];
            simpanJawaban(idSoal, nilaiJawaban);

            // Selanjutnya, lakukan AJAX seperti yang Anda lakukan sebelumnya
            $.ajax({
                type: 'POST',
                url: '{{ route('store-jawaban') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    soal_id: idSoal,
                    jawaban: nilaiJawaban
                },
                success: function(response) {
                    console.log('Jawaban terkirim ke server');
                },
                error: function(error) {
                    console.error('Gagal mengirim jawaban ke server', error);
                }
            });

            var tombolKirimJawaban = document.querySelector('button[type="submit"]');
            tombolKirimJawaban.style.display = 'block';
        }
    </script> --}}

    <script>
        // Periksa apakah countdown timer sudah berjalan
        var isCountdownInProgress = localStorage.getItem('countdownInProgress');

        if (!isCountdownInProgress) {
            var durationTime = {{ $item->durasi_waktu }};
            var targetDate = new Date();
            targetDate.setMinutes(targetDate.getMinutes() + durationTime);

            // Simpan tanggal target di localStorage
            localStorage.setItem('targetDate', targetDate.getTime());

            // Tandai countdown timer sebagai sedang berjalan
            localStorage.setItem('countdownInProgress', true);
        }

        // Fungsi untuk mengupdate hitung mundur setiap detik
        var countdownInterval = setInterval(function() {
            var targetDateMillis = localStorage.getItem('targetDate');
            if (!targetDateMillis) {
                clearInterval(countdownInterval);
                document.getElementById("hitung-mundur").innerHTML = "Waktu sudah habis!";
                return;
            }

            var currentDate = new Date().getTime();
            var timeLeft = targetDateMillis - currentDate;

            var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

            document.getElementById("hitung-mundur").innerHTML = ` Waktu tersisa 
                <span class="hitung-mundur-value">${hours}</span>:
                <span class="hitung-mundur-value">${minutes}</span>:
                <span class="hitung-mundur-value">${seconds}</span> 
            `;

            if (timeLeft < 0) {
                clearInterval(countdownInterval);
                localStorage.removeItem('targetDate');
                localStorage.removeItem('countdownInProgress');
                document.getElementById("hitung-mundur").innerHTML = "Waktu sudah habis!";
            }
        }, 1000); // Perbarui setiap 1 detik
    </script>
@endsection
