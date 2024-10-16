@extends('admin.account-index')
@section('content')
    {{-- <div class="content-wrapper"> --}}

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Beranda</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                        {{-- <li class="breadcrumb-item active">Beranda</li> --}}
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3 col-6">

                    @if (auth()->user()->role === 'user')
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>2</h3>
                                <p>PPPK</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-"></i>
                            </div>
                            <a href="{{ url('table') }}" class="small-box-footer"><i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    @endif


                    @if (auth()->user()->role === 'user_guru')
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>1</h3>
                                <p>Tenaga Teknis</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-"></i>
                            </div>
                            {{-- <a href="{{ route('') }}">Paket 3 (Teknis)</a> --}}
                            <a href="{{ url('table') }}" class="small-box-footer"><i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    @endif
                </div>

                {{-- <div class="col-lg-3 col-6">

                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>
                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>
                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>
                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div> --}}

            </div>
        </div>
    </section>

    {{-- </div> --}}
@endsection
