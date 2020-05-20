
<div class="card mb-5">
    <div class="card-body">
        <ul class="nav flex-column">
            <h5>Menu</h5>
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(1) == '') {{ 'active' }} @endif" href="{{ route('welcome')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(1) == 'student') {{ 'active' }} @endif" href="{{ route('student.index')}}">Siswa</a>
            </li>
            <li class="nav-item">
            <a class="nav-link @if (Request::segment(1) == 'major') {{ 'active' }} @endif" href="{{ route('major.index')}}">Jurusan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(1) == 'grade') {{ 'active' }} @endif" href="{{ route('grade.index')}}">Kelas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(1) == 'hobby') {{ 'active' }} @endif" href="{{ route('hobby.index')}}">Hobi</a>
            </li>
        </ul>
    </div>
</div>