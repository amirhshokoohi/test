<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Dashboard extends Component
{

    public $cpuUsage;
    public $ramUsed;
    public $ramCapacity;
    public $ramUsedPercent;
    public $diskUsed;
    public $diskCapacity;
    public $diskUsedPercent;


    public function render()
    {
        return view('livewire.dashboard');
    }

    public function getCpuData()
    {
        $cpuUsage = Http::get('http://116.203.130.57:19999/api/v1/data?chart=system.cpu&after=-1&format=json');
        /* CPU Usage */
        $cpuCollection = $cpuUsage["data"][0];
        array_shift($cpuCollection);
        $cpuResult = intval(round(array_sum($cpuCollection)));
        /* END CPU Usage */
        $this->cpuUsage = $cpuResult;
    }

    public function getRamData()
    {
        $memoryUsage = Http::get('http://116.203.130.57:19999/api/v1/data?chart=system.ram&after=-1&format=json');
        /* RAM Usage */
        $ramCollection = $memoryUsage["data"][0];
        array_shift($ramCollection);
        $ramUsed = round($ramCollection[1], 2);
        $ramCapacity = round(array_sum($ramCollection), 2);
        $ramUsedPercent = round(($ramUsed * 100) / $ramCapacity, 2);
        /*END RAM Usage */
        $this->ramUsed = $ramUsed;
        $this->ramCapacity = $ramCapacity;
        $this->ramUsedPercent = $ramUsedPercent;
    }

    public function getDiskData()
    {
        $diskUsage = Http::get('http://116.203.130.57:19999/api/v1/data?chart=disk_space._tmp&after=-1&format=json');
        /* SWAP Usage */
        $diskCollection = $diskUsage["data"][0];
        array_shift($diskCollection);
        $diskUsed = round($diskCollection[1], 2);
        $diskCapacity = round(array_sum($diskCollection), 2);
        $diskUsedPercent = round(($diskUsed * 100) / $diskCapacity, 2);
        /*END SWAP Usage */
        $this->diskUsed = $diskUsed;
        $this->diskCapacity = $diskCapacity;
        $this->diskUsedPercent = $diskUsedPercent;
    }
    public function getCpuDataRoute()
    {
        $this->getCpuData();
        return response()->json(['cpuUsage' => $this->cpuUsage]);
    }

    public function getRamDataRoute()
    {
        $this->getRamData();
        return response()->json([
            'ramUsed' => $this->ramUsed,
            'ramCapacity' => $this->ramCapacity,
            'ramUsedPercent' => $this->ramUsedPercent,
        ]);
    }

    public function getDiskDataRoute()
    {
        $this->getDiskData();
        return response()->json([
            'diskUsed' => $this->diskUsed,
            'diskCapacity' => $this->diskCapacity,
            'diskUsedPercent' => $this->diskUsedPercent,
        ]);
    }

   /* public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('toast_success', ' :) به امید دیدار  ');
    }*/
}
