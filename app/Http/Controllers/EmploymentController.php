<?php

namespace App\Http\Controllers;

use App\Models\Employment;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{

    public function index()
    {
        return view('employment');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Employment $employment)
    {
        //
    }


    public function edit(Employment $employment)
    {
        //
    }


    public function update(Request $request, Employment $employment)
    {
        //
    }


    public function destroy(Employment $employment)
    {
        //
    }
}
