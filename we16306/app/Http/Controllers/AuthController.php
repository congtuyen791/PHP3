<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// php artisan make:controller AuthController
class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];

        // $email = $request->email;
        // $password = $request->password;

        // $email = $request->input('email');
        // $password = $request->input('password');
        // attempt sẽ có key là tên cột trong DB, value sẽ lấy từ form
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // dd(Auth::user()->role);
            // $user = User::find($email, 'id');
            // if('role' == 1) {
            //     return redirect()->route('users.list');
            // }
            // Nếu khớp thông tin thì sẽ đăng nhập thành công, lưu thông tin vào session
            // Điều hướng quay về quản trị
            return redirect()->route('users.list');
        }
        // Nếu không thì quay ngược về login
        return redirect()->route('auth.getLogin');
    }

    public function getRegister() {
        return view('auth.register');
    }
    public function postRegister(RegisterRequest $request) {
        $request->validate([
            'name' => 'required|min:6|max:32',
            'username' => 'required|min:6|max:32',
            'email' => 'required|min:6|max:32|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6',
        ]);
        $data = $request->all();
        if($data['password'] === $data['password_confirmation']){
            $user = new User();
            $user->name = $data['name'];
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password_confirmation']);
            $user->role = 0;
            $user->status  = 0;
            $user->room_id  = 11;
            // $user->birthday  = '';
            $user->phone  = 0;
            // $user->avatar  = '';
            $user->save();
            return view('auth.login');
        }else{
            return view('auth.register');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.getLogin');
    }
}
