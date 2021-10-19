<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

class CourseUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lessons = Lesson::all();

        return view('lecturers.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('lecturers.lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([

            'course_id' => 'required',
            'title' => 'required',
            'duration' => 'required',
            'video' => 'required',
    
            ]);
    
            Lesson::create($request->all());
    
            return redirect()->route('lecturers.lessons.index')
    
                    ->with('success','Lesson created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
        return view('lecturers.lessons.show',compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
        return view('lecturers.lessons.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        //

        $request->validate([

            'course_id' => 'required',
            'title' => 'required',
            'duration' => 'required',
            'video' => 'required',
    
            ]);
    
            Lesson::where('id', $lesson->id)->update($request->except(['_token', '_method']));
    
            return redirect()->route('lecturers.lessons.index')
    
                    ->with('success','Lesson updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
        $lesson->delete();
        return redirect()->route('lecturers.lessons.index')
    
        ->with('success','Lesson deleted successfully.');
    }
}
