<?php

namespace App\Http\Controllers;

use App\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PingController extends Controller
{
    //

    public function serverStatus()
    {
        $servers = Server::all();

        // dd($status);

        return view('home', compact('servers'));
    }
}

function GetServerStatus($site, $port)
{
    $status = array("offline", "online");
    $fp = @fsockopen($site, $port, $errno, $errstr, 2);

    if (!$fp) {
        return $status[0];
    } else {
        return $status[1];
    }
}
