@extends('admin.account-index')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <h1 class="card-title w-100" style="display:flex; justify-content:center;">
                            HASIL TES
                        </h1>
                    </div>
                    <div class="card-body"
                        style="display:flex; justify-content:center; flex-direction: column; align-items: center;">
                        <h5 style="margin-bottom:40px; margin-top:10px;">{{ Auth::user()->nama }}</h5>
                        <hr style="border: 1px solid grey; width: 50%; margin-top: 1px; margin-bottom: 40px;">

                        <h4>SKOR AKHIR</h4>
                        <h3 id="skor-akhir" style="color:green; margin-bottom:70px;"><b>0</b></h3>

                        <p style="margin-bottom: 40px;">Di atas adalah skor hasil tes Anda</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Ambil skor akhir dari komponen Blade dan pasang ke elemen dengan id 'skor-akhir'
        var skorAkhir = {{ $skorAkhir }};
        document.getElementById('skor-akhir').innerText = skorAkhir;
    </script>
@endsection
