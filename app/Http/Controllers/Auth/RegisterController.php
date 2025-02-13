<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\User;
use App\Models\Tutor;
use App\Models\Subject;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function showRegistrationForm()
    {
        $subjects = Subject::all();        
        return view('auth.register', compact('subjects'));
    }

    protected $redirectTo = '/dashboard'; // You can uncomment this line

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'userid' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'userid' => $data['userid'],
            'password' => Hash::make($data['password']),
            'role' => 'tutor',
        ]);

        Tutor::create([
            'user_id' => $user->id,
            'bio' => '', // Provide a default value for the bio field
        ]);

        return $user;
        
    }
}
