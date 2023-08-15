<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::all();
        return view('admin.instructors.index',['instructors'=>$instructors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Instructor::create([
            'name'=> $request->name,
            'salary'=> $request->salary,
            'address'=> $request->address,
            'hourRate'=> $request->hourRate,
        ]);

        return redirect()->back()->with('msg','Added..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instructor=Instructor::findorfail($id);
        return view('admin.instructors.show',['instructor'=>$instructor]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Instructor::findorfail($id);
        return view('admin.instructors.edit',['data'=>$data]);
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
        $instructor=Instructor::findorfail($id);
        $instructor->update([
            'name'=> $request->name,
            'salary'=> $request->salary,
            'address'=> $request->address,
            'hourRate'=> $request->hourRate,
        ]);

        return redirect()->route('instructors.edit',$instructor['id'])->with('msg','updated..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instructor=Instructor::findorfail($id);
        $instructor->delete();
        return redirect()->route('instructors.index')->with('msg','deleted..');

    }
}
