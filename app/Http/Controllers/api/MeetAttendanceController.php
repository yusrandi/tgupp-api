<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\MeetAttendance;
use Illuminate\Http\Request;

class MeetAttendanceController extends Controller
{
    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'time' => 'required|max:255',
        //     'meet_id' => 'required|max:255',
        //     'user_id' => 'required|max:255',
        // ]);

        date_default_timezone_set("Asia/Makassar");
        // $today = date('l, j F Y ; h:i a');
        $today = date('Y/m/j H:i a');

        $checkAttendance = MeetAttendance::where(['meet_id' => $request->meet_id, 'user_id' => $request->user_id])->first();

        if ($checkAttendance) {
            return response()->json([
                'responsecode' => '0',
                'responsemsg' => 'Maaf, anda telah mengisi kehadiran',
            ], 201);
        } else {
            $save = MeetAttendance::create([
                'time' => $today,
                'meet_id' => $request->meet_id,
                'user_id' => $request->user_id,
            ]);

            return response()->json([
                'responsecode' => '1',
                'responsemsg' => 'success',
                'data' => $save,
            ], 201);
        }
    }
}
