<?php

namespace App\Http\Controllers;

use App\Models\Employment;
use App\Models\Meet;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jabatan = count(Employment::all());
        $pegawai = count(User::where('role_id', 2)->get());
        $admin = count(User::where('role_id', 1)->get());
        $rapat = count(Meet::all());


        $userToken = "cm6dl2uoSKW8VnsccvUEXU:APA91bE28mapMxMrUZ-Zs9asaRm16yg5unu1ZOcYcy-_oN-EwsXKKaqv8JIhmwNjiqDpG4yAFsgJX5zah48-KDAk0P2E5RJbkX2qX4Iff3diGs7Q7RD91b7ODMrv6aGHtfOP-QVJoJeO";
        // $users = User::all();
        // foreach ($users as $key => $value) {
        //     $this->sendFCM($value->remember_token, "TGUPP Mobile", "Kegiatan rapat baru 31/11/2022");
        // }

        return view('home', [
            'data' => Meet::orderby('begin', 'asc')->get(),
            'jabatan' => $jabatan,
            'pegawai' => $pegawai,
            'admin' => $admin,
            'rapat' => $rapat,

        ]);
    }

    public function sendFCM($token, $title, $body)
    {
        $SERVER_API_KEY = "AAAAXIxpSbY:APA91bEQ__NawWw36uFJA5BakyFdXYAEoolgzrIPhsfFhF0PzH978EY-FDYGE6Qbqaoqcs3LRRuwjIHX2-LCRwQMKYloWMqPYxhtRxV9E4OH9cR-tjivKq9FdXTpjx9vYtlwwRtQ4suX";

        // $token = [];
        // $dataUser = User::where('hak_akses', '2')->get();
        // foreach ($dataUser as $key => $value) {
        //     $token[$key] = $value->remember_token;
        // }

        // dd($token);

        $data = [

            "registration_ids" =>
            [$token],


            "notification" => [

                "title" => $title,

                "body" => $body,

                "sound" => "default" // required for sound on ios

            ],

        ];

        $dataString = json_encode($data);

        $headers = [

            'Authorization: key=' . $SERVER_API_KEY,

            'Content-Type: application/json',

        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        // dd($response);
    }
}
