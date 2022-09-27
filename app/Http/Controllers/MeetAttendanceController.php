<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use App\Models\MeetAttendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class MeetAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Meet $meet)
    {
        $meetAttendances = MeetAttendance::where('meet_id', $meet->id)->get();
        return view('meet-attendance', [
            'users' => User::where('role_id', '!=', 1)->get(),
            'meet' => $meet,
            'data' => $meetAttendances
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
        // return $request;

        $data = $request->validate([
            'time' => 'required|max:255',
            'meet_id' => 'required|max:255',
            'user_id' => 'required|max:255',
        ]);

        $save = MeetAttendance::create($data);
        $save ? Session::flash('message', "Created Data Successfully") : Session::flash('error', "Created Data Failed");
        return redirect()->route('meet-attendance.index', $data['meet_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MeetAttendance  $meetAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(MeetAttendance $meetAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MeetAttendance  $meetAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(MeetAttendance $meetAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MeetAttendance  $meetAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MeetAttendance $meetAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeetAttendance  $meetAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeetAttendance $meetAttendance)
    {
    }
}
