<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;


class UsersStat extends Component
{
    public $countAllUsers;
    public $onlineUsers;
    public $activeUsers;
    public $deactiveUsers;

    public function mount()
    {
        $this->countAllUsers = User::count();
        $this->onlineUsers = User::query()->where('is_online' , 1 )->count();
        $this->activeUsers = User::query()->where('status' , 1 )->count();
        $this->deactiveUsers = User::query()->where('status' , 0 )->count();
    }

    public function render()
    {
        //dd($this->onlineUsers);
        return view('livewire.users-stat');
    }
}
