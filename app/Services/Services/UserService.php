<?php


namespace App\Services\Services;


use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserService extends Service implements UserServiceInterface
{
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->setRepository($userRepository);
    }

    public function changePassword($request)
    {
//        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
//            // The passwords matches
//            return redirect()->back()->with("error", "Mật khẩu cũ không chính xác. Vui lòng thử lại.");
//        }
//        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
//            //Current password and new password are same
//            return redirect()->back()->with("error", "Mật khẩu mới không thể giống như mật khẩu cũ của bạn. Vui lòng chọn một mật khẩu khác nhau.");
//        }
//        //Change Password
//        $user = Auth::user();
//        $user->password = bcrypt($request->get('new-password'));
//        $user->save();
//        return redirect()->back()->with("success", "Mật khẩu đã thay đổi thành công!");
    }
}
