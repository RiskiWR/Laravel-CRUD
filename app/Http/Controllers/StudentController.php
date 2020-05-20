<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

Use App\Student;
Use App\Hobby;
Use App\Grade;
Use App\Major;

Use PDF;

use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Student::paginate(10);
        $grade = Grade::all();
        $major = Major::all();
        
        return view('student', ['data' => $data, 'grade' => $grade, 'major' => $major]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grade = Grade::all();
        $major = Major::all();
        $hobby = Hobby::all();
        
        return view('students.create', compact('grade','major','hobby'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'grade' => 'required',
            'major' => 'required',
            'hobby' => 'required'
        ]);

        $student =  Student::create([
            'name' => $request->name,
            'major_id' => $request->major,
            'grade_id' => $request->grade,
        ]);

        $student->hobby()->attach($request->hobby);

        return redirect('student')->with('success','Data Berhasil dirubah!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findorfail($id);
        $grade = Grade::all();
        $major = Major::all();
        $hobby = Hobby::all();

        return view('students.edit', compact('grade', 'major', 'hobby','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'grade' => 'required',
            'major' => 'required',
            'hobby' => 'required'
        ]);

        $student = Student::findorfail($id);
        $student->name = $request->name;
        $student->major_id = $request->major;
        $student->grade_id = $request->grade;

        $student->hobby()->sync($request->hobby);
        
        $student->save();

        return redirect('/student')->with('success','Data Berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect('/student')->with('success', 'Data Berhasil dihapus');
    }

    public function trash()
    {
        $data = Student::onlyTrashed()->get();

        return view('students.trash', compact('data'));
    }

    public function restore($id){
        $student = Student::onlyTrashed()->where('id', $id);
        $student->restore();

        return redirect('/student')->with('success', 'Data Berhasil dikembalikan!');
    }
    public function restore_all(){
        $student = Student::onlyTrashed();
        $student->restore();

        return redirect('/student')->with('success', 'Semua Data Berhasil dikembalikan!');
    }
    public function kill($id){
        $student = Student::onlyTrashed()->where('id', $id)->first();
        $student->hobby()->detach();
        $student->forceDelete();


        return redirect('/student')->with('success', 'Data Berhasil dihapus permanen!');
    }

    public function kill_all()
    {
        $student = Student::onlyTrashed();
        // $student->hobby()->detach();
        // $student->forceDelete();

        // Detach not working because mutiple data
 
        return redirect('/student');
    }
    public function search(Request $request)
    {
        
        $keyword = $request->search;
       
        $data = Student::where('name','like','%'.$keyword.'%')->paginate();
        $request->session()->flash('success', $keyword);

        return view('students.results-search',compact('data'));
    }
    public function filter(Request $request)
    {
        $major_id = $request->major;
        $grade_id = $request->grade;
        $data = Student::where([
            ['major_id','like','%'.$major_id.'%'],
            ['grade_id', 'like', '%' . $grade_id . '%']
            ])
            ->paginate();
        $grade = Grade::find($grade_id);
        $major = Major::find($major_id);

        $grades = Grade::all();
        $majors = Major::all();

        // if (isset( $_GET['major'])){
        //     $major_id =  $_GET['major'];
        // }
        // if (isset( $_GET['grade'])){
        //     $grade_id =  $_GET['grade'];
        // }

        return view('students.results-filter',compact('data','majors','grades','grade','major'));
    }


    public function print()
    {
        $data = Student::all();

        $pdf = PDF::loadview('students.pdf', ['data' => $data]);
        // return $pdf->download('daftar-siswa.pdf');
        return $pdf->stream();
    }
    public function pdf()
    {
        $data = Student::all();

        $pdf = PDF::loadview('students.pdf', ['data' => $data]);
        return $pdf->download('daftar-siswa.pdf');

    }

    public function excel(){
        return Excel::download(new StudentsExport, 'daftar-siswa.xlsx');
    }

}
