<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Hobby;

class HobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = Hobby::paginate(10);
        return view('hobby', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hobby.create');
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
            'name' => 'required'
        ]);

        $data = new Hobby;

        $data->name = $request->name;

        $data->save();

        return redirect('/hobby');
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
        $data = Hobby::find($id);

        return view('hobby.edit', compact('data'));
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
            'name' => 'required'
        ]);

        $hobby = Hobby::findorfail($id);
        $hobby->name = $request->name;


        $hobby->save();

        return redirect('/hobby');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hobby = Hobby::find($id);
        $hobby->delete();

        return redirect('/hobby');
    }

    public function search(Request $request)
    {

        $keyword = $request->search;

        $data = Hobby::where('name', 'like', '%' . $keyword . '%')->paginate();
        $request->session()->flash('success', $keyword);

        return view('hobby.search', compact('data'));
    }
}
