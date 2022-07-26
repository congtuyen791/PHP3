<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Http\UserUpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::all();
        $users = User::select('id', 'name', 'birthday', 'username', 'email', 'avatar')
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
        return view(
            'admin.user.create',
            ['rooms' => $rooms]
        );
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6|max:32',
            'email' => 'required|min:6|max:32|email',
            'avatar' => 'file',
            'birthday' => 'required|date',
            'username' => 'required|min:6|max:12',
        ]);
        // nếu không đáp ứng các điieeuf kiện trên thì 
        // thoát hàm và quay lại form kèm thêm biến báo lỗi (erors)

        // Nếu đáp ứn đc điều kiện thì sẽ chạy tiếp xuống code bên dưới 
        $user = new User();
        $user->fill($request->all());
        if ($request->hasFile('avatar')) {
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

    public function edit(User $id)
    {
        $rooms = Room::select('id', 'name')->get();
        return view('admin.user.edit', [
            // 'rooms'=> $room
            'user' => $id,
            'rooms' => $rooms

        ]);
    }
    public function update(Request $request)
    {
        $user = User::find($request->id);
        if ($request->hasFile('avatar_up')) {
            $avatar = $request->avatar_up;
            $avatarName = $avatar->hashName();
            $avatarName = $request->username . '_' . $avatarName;
            $avatar_up = $avatar->storeAs('images/users', $avatarName);
        } else {
            $avatar_up = $request->avatar;
        }

        $user->update([
            'name' => $request->name,
            'email'  => $request->email,
            'password' => $request->password,
            'username' => $request->username,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'avatar' => $avatar_up,
            'role' => $request->role,
            'status' => $request->status,
            'room_id' => $request->room_id,
        ]);
        return redirect()->route('users.list');
    }
}
