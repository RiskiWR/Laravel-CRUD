@extends('layouts.content')

@section('content')

    @if (session('success'))
        <h5 class="d-inline"><span class="font-weight-normal">Mencari :</span> {{ session('success') }} </h5>
        @if ($data->total() == 0)
            <span class="badge badge-danger">
            Data tidak ditemukan
            </span>
            @else
            <span class="badge badge-success">
                {{$data->total()}} Hasil
            </span>
            
        @endif      
    @endif 

    <form action="{{route('grade.search')}}" method="GET">  
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari.." name="search" >
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>

    <ul class="list-group">
            <li class="list-group-item bg-secondary active bg-secondary border-secondary">Jurusan</li>
        @foreach ($data as $grade)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$grade->name}} 
                <span class="d-flex">
                <a class="btn btn-primary btn-sm text-white" href="{{ route('grade.edit',$grade->id )}}">Edit</a>
                <form action="{{ route('grade.destroy',$grade->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm text-white">Delete</button>
                </form>
                </span> 
            </li>
        @endforeach
    </ul>
    <br>
     {{ $data->links() }}
@endsection

