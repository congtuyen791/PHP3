<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index(){
        $rooms = Room::with('users')->paginate(5);
        return view('admin.room.list', ['room_list' => $rooms]);
   }
}
