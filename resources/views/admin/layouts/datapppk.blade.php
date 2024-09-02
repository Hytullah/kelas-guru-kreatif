@extends('admin.account-index')
@section('content')
    <div class="" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
        <a href="{{ route('tambah-soal') }}" class="btn btn-success mb-2">+
            Tambah</a>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Striped Full Width Table</h3>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">No.</th>
                        <th>Jenis Soal</th>
                        <th>Paket</th>
                        <th>Soal</th>
                        <th>Kunci Jawaban</th>
                        <th style="width: 40px">Aksi</th>
                    </tr>
                </thead>
                @if ($dtPppk->isEmpty())
                    <tbody>
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data</td>
                        </tr>

                    </tbody>
                @else
                    @foreach ($dtPppk as $item)
                        <tbody>
                            <td>{{ $item->no }}</td>
                            <td>{{ $item->jenis_soal }}</td>
                            <td>{{ $item->paket }}</td>
                            <td>{!! $item->soal !!}</td>
                            <td>{{ $item->jawaban }}</td>
                            <td>
                                <a href="{{ url('edit-soal', $item->id) }}">
                                    <i class="far fa-edit nav-icon"></i></a> |
                                {{-- <a href="{{ url('deleterencana', $item->id) }}" class="delete" data-id="{{ $item->id }}"> --}}
                                <a href="{{ url('delete-soal', $item->id) }}" class="delete" data-id="{{ $item->id }}">
                                    <i class="fas fa-trash nav-icon danger" style="color: rgb(182, 4, 4);"></i></a>
                            </td>
                        </tbody>
                    @endforeach
                @endif
            </table>
        </div>

    </div>
@endsection
