<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Illuminate\Events\queueable;

class LoginController extends Controller
{
    //
    public function index(){
        return view('admin.login');
    }
    public function postlogin(Request $request){
        //xử lý login
        // dd($request);
        $this->validate($request,[
            'email'=>'required|email:filter',
            'password'=>'required'
        ]);
        $user = User::where('email','=',$request->email)
                    ->where('password','=',$request->password)
                    ->get()->first();

        if (!empty($user)){
            // return view('admin.home',[
            //     'title'=>'Trang chủ'
            // ]);
            return redirect()->route('listClass');
        }else{
            Session()->flash('error','Email hoặc Password không chính xác');
            return redirect()->back();
        }
        // if (Auth::attempt([
        //     'email'=> $request->input('email'),
        //     'password'=>$request->input('password')
        // ])){
        //     return view('admin.home',[
        //         'title'=>'Trang chủ'
        //     ]);
        // }


    }
    public function admin_home(){
        dd("Đăng nhập thành công");
    }
}
