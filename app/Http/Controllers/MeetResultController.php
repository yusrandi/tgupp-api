<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use App\Models\MeetResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class MeetResultController extends Controller
{

    public function index(Meet $meet)
    {
        $meetResult = MeetResult::where('meet_id', $meet->id)->first();

        return view('meet-result', [
            'meet' => $meet,
            'id' => $meet->barcode,
            'meetResult' => $meetResult
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'leader' => 'required|max:255',
            'notulen' => 'required|max:255',
            'result' => 'required|max:255',
            'meet_id' => 'required|max:255',
        ]);

        $data['user_id'] = auth()->user()->id;
        $save = MeetResult::create($data);
        $save ? Session::flash('message', "Created Data Successfully") : Session::flash('error', "Created Data Failed");
        return redirect()->route('meet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MeetResult  $meetResult
     * @return \Illuminate\Http\Response
     */
    public function show(MeetResult $meetResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MeetResult  $meetResult
     * @return \Illuminate\Http\Response
     */
    public function edit(MeetResult $meetResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MeetResult  $meetResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MeetResult $meetResult)
    {
        $data = $request->validate([
            'leader' => 'required|max:255',
            'notulen' => 'required|max:255',
            'result' => 'required|max:255',
            'meet_id' => 'required|max:255',
        ]);

        $data['user_id'] = auth()->user()->id;
        $save = $meetResult->update($data);
        $save ? Session::flash('message', "Updated Data Successfully") : Session::flash('error', "Updated Data Failed");
        return redirect()->route('meet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeetResult  $meetResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeetResult $meetResult)
    {
        //
    }
}
