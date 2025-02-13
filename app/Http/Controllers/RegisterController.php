<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tutor;


class TutorController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'userid' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'bio' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'userid' => $request->userid,
            'password' => Hash::make($request->password),
            'role' => 'tutor',
        ]);

        $tutor = new Tutor;
        $tutor->user_id = $user->id;
        $tutor->bio = $request->bio;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension(); // Generate a unique image name
            $request->file('image')->storeAs('public/images', $imageName); // Save the image in the specified directory
            $tutor->image = $imageName; // Save only the image name in the database
            Log::info('Image uploaded: ' . $imageName); // Log the image name for debugging
        }

        $tutor->save();
        Log::info('Tutor saved: ' . $tutor->id); // Log the tutor ID for debugging
        Log::info('Tutor image: ' . $tutor->image); // Log the tutor image for debugging

        Auth::login($user);

        return redirect()->intended('/dashboard');
    }

    public function update(Request $request, $id)
    {
    $user = User::findOrFail($id);

    // Validate request
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Update user details
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->save();

    // Update tutor details if applicable
    if($tutor = $user->tutor) {
        if ($request->hasFile('image')) {
            // Generate a unique file name
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/images'), $imageName); // Move to the desired directory
            $tutor->image = $imageName; // Store only the filename in the database
        }
        $tutor->bio = $request->input('bio');
        $tutor->save();
    }

    return redirect()->route('profile.edit', $user->id)->with('success', 'Profile updated successfully');
}


}