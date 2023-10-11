@extends('admin.account-index')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Soal-soal</h3>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">No.</th>
                        <th>Soal</th>
                        <th>Progress</th>
                        <th style="width: 40px">#</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1.</td>
                        <td>Soal PPPK 1</td>
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar bg-primary" style="width: 30%"></div>
                            </div>
                        </td>
                        <td style="width:220px;">
                            {{-- <span class="badge bg-primary">30%</span> --}}
                            <a href="{{ route('soal') }}">
                                <button type="button" class="btn btn-primary" data-toggle="collapse"
                                    data-target="#collapseExample">
                                    Masuk
                                </button>
                            </a>
                            {{-- <div id="collapseExample" class="collapse mt-2 p-2"
                                style="width:200px; border:1px solid grey; border-radius:4px;">
                                <form action="forms/contact.php" method="post" role="form" class="info">
                                    <div class="mb-3 d-flex flex-column ml-2">
                                        <label for="nama" class="form-label">Masukkan Token:</label>
                                        <input type="text" class="form-control" id="nama"
                                            aria-describedby="emailHelp"><button type="button"
                                            class="btn btn-secondary mt-2"><a href="{{ route('soal') }}">Mulai</a></button>

                                    </div>
                                </form>

                            </div> --}}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('.btn').click(function() {
                $('#collapseExample').toggleClass('show');
            });
        });
    </script>
@endsection
