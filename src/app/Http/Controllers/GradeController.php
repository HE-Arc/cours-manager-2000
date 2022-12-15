<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();

        return view("grades.index", ["grades" => $grades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->id;

        return view('grades.create', ['courseId' => $id]);
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
            "value" => "required|min:1|max:6",
            "coeff" => "required|gt:0|lt:100"
        ]);

        $grade = new Grade();
        $grade->value = $request->value;
        $grade->coeff = $request->coeff;
        $grade->course_id = $request->course_id;
        $grade->user_id = Auth::user()->id;
        $grade->save();

        return redirect()
            ->route("courses.show", $request->course_id)
            ->with("success", "Ajout de la note réussi !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grade = Grade::findOrFail($id);
        return view('grades.show', ['grade' => $grade]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = Grade::findOrFail($id);
        return view('grades.edit', ['grade' => $grade]);
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
        $grade = Grade::findOrFail($id);
        $grade->update($request->all());

        $course_id = $grade->course->id;

        return redirect()
            ->route("courses.show", $course_id)
            ->with("success", "Modification de la note réussie !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $course_id = $grade->course->id;

        $grade->delete();

        return redirect()
            ->route("courses.show", $course_id)
            ->with("success", "Suppression de la note réussie !");
    }
}
