<?php

namespace App\Http\Controllers;

use App\Exports\HonorsExport;
use App\Exports\MeetsExport;
use App\Models\Meet;
use App\Models\MeetAttendance;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;


class ReportController extends Controller
{

    public function reportHonor()
    {

        return view('report-salary', [
            'data' => $this->resultDataHonor(null)
        ]);
    }


    public function filterReportHonor(Request $request)
    {
        // return $request->date;
        if ($request->submitbutton == 'filter') {
            Session::flash('data', $request->date);

            // return $this->resultDataHonor($request->date);
            return view('report-salary', [
                'data' => $this->resultDataHonor($request->date),
            ]);
        } else {

            return Excel::download(new HonorsExport($this->resultDataHonor(Session::get('data'))), 'Laporan Honor.xlsx');
        }
    }
    public function reportMeet()
    {
        // return $this->resultData(null);
        return view('report-meet', [
            'data' => $this->resultData(null),

        ]);
    }
    public function filterReportMeet(Request $request)
    {
        if ($request->submitbutton == 'filter') {
            Session::flash('data', $request->date);
            return view('report-meet', [
                'data' => $this->resultData($request->date),
            ]);
        } else {

            return Excel::download(new MeetsExport($this->resultData(Session::get('data'))), 'Laporan Rapat.xlsx');
        }
    }


    public function resultData($daterange)
    {
        if ($daterange) {
            $date = explode('-', $daterange);
            return Meet::with(['meetResults', 'meetAttendances'])
                ->where('status', 1)
                ->whereBetween('begin', [str_replace(' ', '', $date[0]), str_replace(' ', '', $date[1])])
                ->orderby('begin')
                ->get();
        } else {
            return Meet::with(['meetResults', 'meetAttendances'])
                ->where('status', 1)->get();
        }
    }

    public function resultDataHonor($daterange)
    {
        if ($daterange) {
            $date = explode('-', $daterange);

            $data =  MeetAttendance::with('user')
                ->orderby('user_id')
                ->whereBetween('time', [str_replace(' ', '', $date[0]), str_replace(' ', '', $date[1])])
                ->get()
                ->groupby('user_id');
        } else {
            $data =  MeetAttendance::with('user')
                ->orderby('user_id')
                ->get()
                ->groupby('user_id');
        }

        // return $data;

        $dataCollect = collect();

        foreach ($data as $key => $value) {
            // echo $key;
            // echo "\r\n";
            $salary = 0;
            foreach ($value as $keyValue => $valueValue) {

                // echo $valueValue->user->title->salary;

                $salary += (int) $valueValue->user->title->salary;
                // echo "\r\n";
            }
            // echo $salary . ',' . $value->first()->user->fullname . ',' . $value->first()->user->title->name;
            $dataCollect->add([
                'salary' => $salary,
                'fullname' => $value->first()->user->fullname,
                'title' => $value->first()->user->title->name
            ]);

            // echo "\r\n";
        }
        return $dataCollect;
    }
}
