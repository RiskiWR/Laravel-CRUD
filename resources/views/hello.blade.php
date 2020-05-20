@extends('layouts.content')

@section('content')
    <h5>Hello!,</h5> 
    <hr>   

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