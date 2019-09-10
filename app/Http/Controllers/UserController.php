<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePassword;
use App\Http\Requests\UserUpdate;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit()
    {
        return view('userLogin.update');
    }

    public function update(UserUpdate $request, $id)
    {
        $this->userService->update($request, $id);
        return redirect()->route('home');
    }

    public function viewChangePassword()
    {
        return view('userLogin.changePassword');
    }

    public function changePassword(ChangePassword $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Mật khẩu cũ không chính xác. Vui lòng thử lại.");
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "Mật khẩu mới không thể giống như mật khẩu cũ của bạn. Vui lòng chọn một mật khẩu khác nhau.");
        }
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success", "Mật khẩu đã thay đổi thành công!");
    }

    public function destroy($id)
    {
        //
    }
}
