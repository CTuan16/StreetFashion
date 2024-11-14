<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginGoogleController extends Controller
{
    // Chuyển hướng người dùng đến Google OAuth
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Xử lý callback từ Google
    public function handleGoogleCallback()
    {
        try {
            // Lấy thông tin người dùng từ Google
            $googleUser = Socialite::driver('google')->user();
    
    
            // Kiểm tra xem người dùng đã tồn tại trong database chưa
            $user = User::where('email', $googleUser->getEmail())->first();

            // Nếu chưa tồn tại, tạo mới
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                ]);
            }
            // Đăng nhập người dùng
            Auth::login($user);

            // Chuyển hướng đến trang chủ hoặc trang bạn muốn
            return redirect()->to('/');
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
