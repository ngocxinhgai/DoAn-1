<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        return view('page.users.show', ['user' => $user]);
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect()->route('login');
    }

    /*
    Show profile
     */
    public function getEditProfile($id)
    {
        $user = User::find($id);
        return View('page.users.edit', ['user' => $user]);
    }

    /*
    Post profile
     */
    public function postEditProfile(Request $request, $id)
    {
        $userDB = User::find($id);

        if($request->change_password == "on")
        {
            // Validate password
            $this->Validate($request, [
                'password'  => 'required|min:8',
                
            ],[
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min'      => 'Mật khẩu chứa ít nhất 8 ký tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Email không đúng định dạng'
            ]);
            
            $userDB->password = bcrypt($request->password);
        }

        // Gán thuộc tính
        
        try{
            $userDB->save();
            Session::flash('success', 'Cập nhật thông tin tài khoản thành công');
        // $user = User::find($id);
        return View('page.users.show', ['user' => $userDB]);
        }catch(\Exception $e){
            Session::flash('error', 'Đã có lỗi trong quá trình sửa tài khoản');
            $user = User::find($id);
            return View('page.users.show', ['user' => $user]);
        }

        
    }
}
