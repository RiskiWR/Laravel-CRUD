@extends('layouts.content')

@section('content')
    <h5>Hello!, {{Auth::user()->name}}</h5> 
    <hr>   

    @if (session('status'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Proses Berhasil, </strong> {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
                    

    <div class="row">

        <div class="col-lg-3 mb-3 mb-md-0">
            <div class="card">
                <div class="card-body text-center">
                    <h5>{{ $student->count()  }}</h5>
                    <p>Siswa</p>               
                </div>
            </div>
        </div>
        <div class="col-lg-3  mb-3 mb-md-0">
            <div class="card">
                <div class="card-body text-center">
                    <h5>{{ $major->count()  }}</h5>
                    <p>Jurusan</p>               
                </div>
            </div>
        </div>
        <div class="col-lg-3  mb-3 mb-md-0">
            <div class="card">
                <div class="card-body text-center">
                    <h5>{{ $grade->count()  }}</h5>
                    <p>Kelas</p>               
                </div>
            </div>
        </div>
        <div class="col-lg-3  mb-3 mb-md-0">
            <div class="card">
                <div class="card-body text-center">
                    <h5>{{ $hobby->count()  }}</h5>
                    <p>Hobi</p>               
                </div>
            </div>
        </div>
   
        
    </div>

@endsection

