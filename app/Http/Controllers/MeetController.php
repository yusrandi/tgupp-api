<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class MeetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('meet', [
            'data' => Meet::orderby('begin', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Session::flash('message', "Updated Penyakit Successfully");
        // Session::flash('error', "Updated Penyakit Failed");

        return view('meet-form', [
            'id' => $this->generateRandomString(),
            'meet' => new Meet(),
            'status' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'begin' => 'required|max:255',
            'end' => 'required|max:255',
            'place' => 'required|max:255',
            'salary' => 'required',
            'barcode' => 'required',
        ]);
        $save = Meet::create($data);
        $save ? Session::flash('message', "Created Data Successfully") : Session::flash('error', "Created Data Failed");
        return redirect()->route('meet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function show(Meet $meet)
    {
        return view('meet-detail', [
            'meet' => $meet
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function edit(Meet $meet)
    {
        return view('meet-form', [
            'id' => $meet->barcode,
            'meet' => $meet,
            'status' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meet $meet)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'begin' => 'required|max:255',
            'end' => 'required|max:255',
            'place' => 'required|max:255',
            'salary' => 'required',
            'barcode' => 'required',
        ]);
        $update = $meet->update($data);
        $update ? Session::flash('message', "Updated Data Successfully") : Session::flash('error', "Updated Data Failed");
        return redirect()->route('meet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meet $meet)
    {
        //
        // return $meet;

        $update = $meet->delete();
        $update ? Session::flash('message', "Deleted Data Successfully") : Session::flash('error', "Deleted Data Failed");
        return redirect()->route('meet.index');
    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
