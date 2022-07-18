<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::all();
        $users = User::select('id', 'name', 'birthday', 'username', 'email')
            ->where('id', '>', '3') // (ten truong, toan tu dk, gia tri)
            // ->where('id', '<=', '7')
            ->paginate(5);
        // ->cursorPaginate(5); truy vấn where id > 5 limit 5
        // dd($users);
        return view('admin.user.list', ['user_list' => $users]);
    }



    // public function delete($id) {
    //     // dd($id);
    //     // cách 1
    //     // if($id) {
    //     //     $user = User::find($id);
    //     //     if ($user->delete()) {
    //     //         return redirect()->route('users.list');
    //     //     }

    //     // }
    //     // cách 2
    //     // if($id) {
    //     //     if(User::destroy($id)){
    //     //         return redirect()->back();
    //     //     }
    //     // }
    // }

    public function delete(User $user)
    {
        if ($user->delete()) {
            return redirect()->back();
        }
    }
    public function create()
    {
        $rooms = Room::select('id', 'name')->get();
        return view('admin.user.create',
            ['rooms' => $rooms]
        );
    }
    public function store(Request $request) {
        $user = new User();
        $user->fill($request->all());
        if($request->hasFile('avatar')) {
            // neu avatar co file => true
            $avatar = $request->avatar;
            $avatarName = $avatar->hashName();
            $avatarName = $request->username . '_' . $avatarName;
            // $avatar->storeAs('images/users', $avatarName);
            $user->avatar = $avatar->storeAs('images/users', $avatarName);
        } else {
            $user->avatar = '';
        }
        $user->save();
        return redirect()->route('users.list');
    }
}
