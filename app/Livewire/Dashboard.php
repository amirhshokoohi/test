<?php

namespace App\Livewire;

use App\Models\User;
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
    public $countAllUsers;

    public function getServerStatus($key)
    {
        $url = str_replace('serverIp', $this->getServerIp(), 'http://serverIp:19999/api/v1/data?chart='.$key.'&after=-1&format=json');
        return Http::get($url);
    }

    public function getServerIp()
    {
        return env('SERVER_IP');
    }

    public function users()
    {
        $this->countAllUsers = User::count();
    }


    public function render()
    {
        return view('livewire.dashboard');
    }

    public function getCpuData()
    {
        $cpuUsage = $this->getServerStatus('system.cpu');
        /* CPU Usage */
        $cpuCollection = $cpuUsage["data"][0];
        array_shift($cpuCollection);
        $cpuResult = intval(round(array_sum($cpuCollection)));
        /* END CPU Usage */
        $this->cpuUsage = $cpuResult;
    }

    public function getRamData()
    {
        $memoryUsage = $this->getServerStatus('system.ram');
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
        $diskUsage = $this->getServerStatus('disk_space._tmp');
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

}
