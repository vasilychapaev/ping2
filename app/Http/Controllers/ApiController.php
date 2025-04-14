<?php

namespace App\Http\Controllers;

use App\Models\IpInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function ping()
    {
        return response()->json([
            'message' => 'pong',
            'time' => now()->toDateTimeString()
        ]);
    }

    public function ipinfo(Request $request)
    {
        return response()->json([
            'ip' => $request->ip()
        ]);
    }

    public function ipdb(Request $request)
    {
        $ip = $request->ip();
        
        IpInfo::create([
            'ip_address' => $ip
        ]);

        $lastRequests = IpInfo::latest()
            ->take(10)
            ->get();

        return response()->json([
            'current_ip' => $ip,
            'last_requests' => $lastRequests
        ]);
    }

    public function webhook(Request $request)
    {
        return response()->json([
            'time' => now()->toDateTimeString()
        ]);
    }
}
