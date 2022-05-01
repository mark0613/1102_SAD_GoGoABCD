<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Module\ShareData;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
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
    public function registerProcess() {

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

    }

    public function logout() {
        Auth::logout();
        return Redirect::to('/user/auth/login');
    }
}
?>