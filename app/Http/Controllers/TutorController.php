<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tutor;


class TutorController extends Controller
{
    public function update(Request $request, Tutor $tutor)
    {                
        $request->validate([
            'bio' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'subject' => 'required|exists:subjects,id',
        ]);

        $tutor->bio = $request->input('bio');

        $imageName = $tutor->image; // Keep the existing image name by default
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('images', $imageName, 'public');
        }
        
        $tutor->image = $imageName;
        $tutor->subject_id = $request->input('subject');
        $tutor->save();

        return redirect()->route('dashboard')->with('status', 'Profile updated successfully!');
    }
}
