<?php

namespace App\Http\Controllers;

use Request;

class HomeController extends Controller
{

    public function index()
    {
//        return view('welcome');

//        return redirect('home/1');

//        return redirect()->route('home_show', ['id' => 1]);
//        $yourName = 'Natthawut';
//        return view('index', ['name' => $yourName]);
        // Or
        // return view('index')->with('name', $yourName);

        return view('index');
    }

    public function show($id)
    {
        //

    }

    public function secondPage()
    {
        return 'Second page';
    }

    public function gradeForm()
    {
        return view('grade_form');
    }

    public function gradeCalculate()
    {
        $name = Request::input('name');
        $score = Request::input('score');
        $grade = 'A';
        // TODO ...

        return view('grade_result', ['name' => $name, 'grade' => $grade]);
    }
}
