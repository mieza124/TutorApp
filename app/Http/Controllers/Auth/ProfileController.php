<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tutor;
use App\Models\Posting;
use App\Models\Subject;

class ProfileController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $tutor = Tutor::where('user_id', $user->id)->first();

        return view('profile.edit', compact('user', 'tutor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $tutor = Tutor::updateOrCreate(
            ['user_id' => $user->id],
            ['bio' => $request->bio]
        );

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $tutor->image = $imagePath;
            $tutor->save();
        }

        return redirect()->route('profile.edit', $id)->with('success', 'Profile updated successfully.');
    }
}
