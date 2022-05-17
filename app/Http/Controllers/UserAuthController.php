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
            DB::transaction(function() use(&$input) {
                User::create($input);
                $u_id = DB::table('users')
                    ->where("email", "=", $input["email"])
                    ->value("u_id");
    
                $member = [
                    'u_id' => $u_id,
                ];
                DB::table("member")->insert($member);
            });

            return Redirect::to("/user/auth/login");
            exit;
        }
        return redirect('/user/auth/register')->withErrors($validator);
    }
    public static function registerMerchantProcess($input) {
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
            $input["u_type"] = "merchant";
            unset($input["_token"]);
            DB::transaction(function() use(&$input) {
                User::create($input);
                $u_id = DB::table('users')
                    ->where("email", "=", $input["email"])
                    ->value("u_id");
    
                $merchant = [
                    'u_id' => $u_id,
                    'm_type' => $input["m_type"]=='admin' ? "a" : "c",
                ];
                DB::table("merchant")->insert($merchant);
            });

            return Redirect::to("/admin");
            exit;
        }
        return redirect('/admin')->withErrors($validator);
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
        $input = request()->all();
        $rules = [
            'account' => 'required',
            'password' => 'required'
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            $account = $input["account"];
            $password = $input["password"];
            if(filter_var($account, FILTER_VALIDATE_EMAIL)) {
                $attempt = Auth::attempt(['email' => $account, 'password' => $password]);
            } 
            else {
                $attempt = Auth::attempt(['username' => $account, 'password' => $password]);
            }

            if ($attempt) {
                return Redirect::intended('/');
            }
            return Redirect::to('/user/auth/login')
                ->withErrors(['fail' => 'Account or Password is wrong!']);
        }
        //fails
        return Redirect::to('/user/auth/login')
            ->withErrors($validator)
            ->withInput(request()->except('password'));
    }

    public function logout() {
        Auth::logout();
        return Redirect::to('/user/auth/login');
    }
}
?>