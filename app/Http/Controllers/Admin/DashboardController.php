<?php
<<<<<<< HEAD

=======
/*
>>>>>>> deea3b07c71f6cd4b20f9d92e9ee7fb75287000c
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.dashboard');
    }

//    public function getCpuData(Request $request)
//    {
//        $cpuUsage = Http::get('http://116.203.130.57:19999/api/v1/data?chart=system.cpu&after=-1&format=json');
//        /* CPU Usage */
//        $cpuCollection = $cpuUsage["data"][0];
//        array_shift($cpuCollection);
//        $cpuResult = intval(round(array_sum($cpuCollection)));
//        /* END CPU Usage */
//        return response()->json(['cpuUsage' => $cpuResult]);
//    }
//
//
//    public function getRamData(Request $request)
//    {
//        $memoryUsage = Http::get('http://116.203.130.57:19999/api/v1/data?chart=system.ram&after=-1&format=json');
//        /* RAM Usage */
//        $ramCollection = $memoryUsage["data"][0];
//        array_shift($ramCollection);
//        $ramUsed = round($ramCollection[1], 2);
//        $ramCapacity = round(array_sum($ramCollection), 2);
//        $ramUsedPercent = round(($ramUsed * 100) / $ramCapacity, 2);
//        /*END RAM Usage */
//        return response()->json(['ramUsed' => $ramUsed, 'ramCapacity' => $ramCapacity, 'ramUsedPercent' => $ramUsedPercent]);
//    }
//
//    public function getDiskData(Request $request)
//    {
//        $diskUsage = Http::get('http://116.203.130.57:19999/api/v1/data?chart=disk_space._tmp&after=-1&format=json');
//        /* SWAP Usage */
//        $diskCollection = $diskUsage["data"][0];
//        array_shift($diskCollection);
//        $diskUsed = round($diskCollection[1], 2);
//        $diskCapacity = round(array_sum($diskCollection), 2);
//        $diskUsedPercent = round(($diskUsed * 100) / $diskCapacity, 2);
//        /*END SWAP Usage */
//        return response()->json(['diskUsed' => $diskUsed, 'diskCapacity' => $diskCapacity, 'diskUsedPercent' => $diskUsedPercent]);
//    }


<<<<<<< HEAD
}
=======
>>>>>>> deea3b07c71f6cd4b20f9d92e9ee7fb75287000c
