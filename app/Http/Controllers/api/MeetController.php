<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Meet;
use App\Models\MeetAttendance;
use Illuminate\Http\Request;

class MeetController extends Controller
{
    public function schedule()
    {

        date_default_timezone_set("Asia/Makassar");
        $today = date('Y/m/d');

        $data = Meet::with(['meetResults', 'meetAttendances'])
            ->where('begin', '>=', $today)->get();

        return response()->json([
            'responsecode' => '1',
            'responsemsg' => 'success',
            'meet' => $data,
        ], 201);
    }
    public function history()
    {
        date_default_timezone_set("Asia/Makassar");
        $today = date('Y/m/d');

        $data = Meet::with(['meetResults', 'meetAttendances'])
            ->where('status', 1)->get();

        return response()->json([
            'responsecode' => '1',
            'responsemsg' => 'success',
            'meet' => $data,
        ], 201);
    }

    public function attendance($userid)
    {
        $data = MeetAttendance::with(['user', 'meet'])
            ->where('user_id', $userid)
            ->whereHas('meet', function ($q) {
                $q->where('status', 1);
            })
            ->get();

        return response()->json([
            'responsecode' => '1',
            'responsemsg' => 'success',
            'data' => $data,
        ], 201);
    }
    public function meet($barcode)
    {
        $data = Meet::where('barcode', $barcode)->first();

        if ($data) {
            return response()->json([
                'responsecode' => '1',
                'responsemsg' => 'success',
                'data' => $data,
            ], 201);
        } else {
            return response()->json([
                'responsecode' => '0',
                'responsemsg' => 'failed',
                'data' => new Meet(),
            ], 201);
        }
    }
}
