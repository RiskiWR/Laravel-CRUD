<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<title>Hello, world!</title>
  </head>
  <body>

<h3>Daftar Siswa</h3>
<table class="table table-bordered">
    <thead class="thead-light"">
        <tr>
            <th class="text-center">No</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Kelas</th>
            <th>Hobi</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($data as $student)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{ $student->name}}</td>
            <td>{{ $student->major->name}}</td>
            <td>{{ $student->grade->name}}</td>
            <td>
                @foreach ($student->hobby as $hobby)
                    <div>{{ $hobby->name}}</div>
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    
  </body>

  
</html>