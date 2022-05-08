<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Module\ShareData;

use App\Models\User;
use App\Models\Member;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use DB;
use Auth;
use AuthenticatesAndRegistersUsers;

class UserAuthController extends Controller {
    public function registerPage() {
        $name = 'register';
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
        ];
        return view('user.register', $binding);
    }
    public function registerUserProcess() {
        $rules = [
            "username" => [
                'required',
                'max:50',
            ],
            "email" => [
                'required',
                'max:50',
                'email',
            ],
            "password" => [
                'required',
                'min:8',
                'alpha_num',
            ],
        ];
        $input = request()->all();
        $validator = Validator::make($input, $rules);
        if($validator->passes()) {
            $input["password"] = bcrypt($input['password']);
            $input["u_type"] = "member";
            unset($input["_token"]);

            User::create($input);
            $u_id = DB::table('users')
                ->where("email", "=", $input["email"])
                ->value("u_id");

            $member = [
                'u_id' => $u_id,
            ];
            DB::table("member")->insert($member);

            return Redirect::to("/user/auth/login");
            exit;
        }
        return redirect('/user/auth/register')->withErrors($validator);
    }
    public function registerMerchantProcess() {

    }

    public function loginPage() {
        $name = "login";
        $binding = [
            'title' => ShareData::TITLE,
            'name' => $name,
        ];
        return view('user.login', $binding);
    }
    public function loginProcess() {
        $response = [
            "status" => "fail",
        ];        
       $input = request()->all();
       //$input['username']  $input['password']
       $password = DB::table('users')-> where('username','=',$input['username'])-> value("password");
       if(  $input['password']==$password ){
            $response["status"]="success";
       }else{
            $response["status"]="error";
       }
    }

    public function logout() {
        Auth::logout();
        return Redirect::to('/user/auth/login');
    }
}
?>