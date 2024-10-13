@extends('admin.account-index')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Soal-soal</h3>
        </div>
        @if (auth()->user()->role === 'user')
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No.</th>
                            <th>Soal</th>
                            {{-- <th>Progress</th> --}}
                            <th style="width: 220px">Pilihan Soal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Soal</td>
                            {{-- <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar bg-primary" style="width: 30%"></div>
                            </div>
                        </td> --}}
                            <td style="width: 250px;">
                                <form action="{{ route('soal') }}" method="GET">
                                    <div class="d-flex">
                                        <select name="paket" class="form-control mr-2" required>
                                            {{-- @foreach ($paketOptions as $item) --}}
                                            <option value="paket 1">Paket 1</option>
                                            <option value="paket 2">Paket 2</option>
                                            {{-- @endforeach --}}

                                        </select>
                                        <button type="submit" class="btn btn-primary">Masuk</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif


        {{-- SOAL TEKNIS GURU --}}
        @if (auth()->user()->role === 'user_guru')
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No.</th>
                            <th>Soal</th>
                            {{-- <th>Progress</th> --}}
                            <th style="width: 250px">Pilihan Soal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Soal</td>
                            {{-- <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar bg-primary" style="width: 30%"></div>
                            </div>
                        </td> --}}
                            <td style="width: 250px;">
                                <form action="{{ route('soal') }}" method="GET">
                                    <div class="d-flex">
                                        <select name="paket" class="form-control mr-2" required>
                                            {{-- @foreach ($paketOptions as $item) --}}
                                            <option value="paket teknis">Teknis 1</option>
                                            <option value="paket teknis 2">Teknis 2</option>
                                            {{-- @endforeach --}}

                                        </select>
                                        <button type="submit" class="btn btn-primary">Masuk</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>
        @endif

    </div>
    <script>
        $(document).ready(function() {
            $('.btn').click(function() {
                $('#collapseExample').toggleClass('show');
            });
        });
    </script>
@endsection
