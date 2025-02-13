<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Posting;
use App\Models\Subject;
use App\Models\TutoringSession;
use App\Models\Tutor;
use App\Models\User;

class PostingController extends Controller
{
        
    public function userIndex(Request $request)
    {
        // Fetch the authenticated user's ID
        $userId = Auth::id();

        // Fetch all subjects
        $subjects = Subject::all();

        // Initialize query
        $query = Posting::query()->with(['tutoringsession.subject']);

        // Apply filters
        $this->applyFilters($request, $query);

        // Filter postings by the authenticated user's ID and sort by updated_at in descending order
        $postings = $query->whereHas('tutor', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
        })->orderBy('updated_at', 'desc')->get();

        return view('postings.user', compact('postings', 'subjects'));
    }

    public function applyFilters(Request $request)
    {
        $subjects = Subject::all();
        $query = Posting::query()->with(['tutoringsession.subject']);

        if ($request->filled('tutor_name')) {
            $query->whereHas('tutoringsession', function ($query) use ($request) {
                $query->whereHas('tutor', function ($query) use ($request) {
                    $query->whereHas('user', function ($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->tutor_name . '%');
                    });
                });
            });
        }
     
        // Filter by subject ID
        if ($request->filled('subject_id')) {
            $query->whereHas('tutoringsession', function ($query) use ($request) {
            $query->where('subject_id', $request->subject_id);
            });
        }

        // Filter by date range
        if ($request->filled('date_start') && $request->filled('date_end')) {
                $query->whereHas('tutoringsession', function ($query) use ($request) {
                    $query->whereBetween('schedule', [$request->date_start, $request->date_end]);
            });
        } elseif ($request->filled('date_start')) {
            $query->whereHas('tutoringsession', function ($query) use ($request) {
                $query->where('schedule', '>=', $request->date_start);
            });
        } elseif ($request->filled('date_end')) {
            $query->whereHas('tutoringsession', function ($query) use ($request) {
                $query->where('schedule', '<=', $request->date_end);
            });
        }

        // Retrieve filtered postings
        $postings = $query->orderBy('updated_at', 'desc')->get();
        return view('postings.index', compact('postings', 'subjects'));

    }

    public function create()
    {
        $subjects = Subject::all();
        return view('postings.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'subject_id' => 'required|integer|exists:subjects,id',
            'schedule' => 'required|string',
            'registered' => 'required|integer',
            'availability' => 'required|integer',
            'mode' => 'required|string|in:Physical,Online',
            'fees' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //$imagePath = $request->file('image') ? $request->file('image')->store('images', 'public') : null;
        
        $tutoringSession = TutoringSession::create([
            'subject_id' => $request->subject_id,
            'tutor_id' => Auth::user()->tutor->id,
            'schedule' => $request->schedule,
            'registered' => $request->registered,
            'availability' => $request->availability,
            'mode' => $request->mode,
            'fees' => $request->fees,
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('images', $imageName, 'public');
        }

        $posting = Posting::create([
            'tutor_id' => Auth::user()->tutor->id,
            'tutoringsession_id' => $tutoringSession->id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('postings.user', ['id' => $posting->id])->with('success', 'Posting created successfully.');
                
    }

    public function edit($id)
    {
        $posting = Posting::findOrFail($id);
        $subjects = Subject::all();
        return view('postings.edit', compact('posting', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'subject_id' => 'required|integer|exists:subjects,id',
            'schedule' => 'required|string',
            'registered' => 'required|integer',
            'availability' => 'required|integer',
            'mode' => 'required|string|in:Physical,Online',
            'fees' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $posting = Posting::findOrFail($id);
        $tutoringSession = $posting->tutoringsession;

        $tutoringSession->update([
            'subject_id' => $request->subject_id,
            'schedule' => $request->schedule,
            'registered' => $request->registered,
            'availability' => $request->availability,
            'mode' => $request->mode,
            'fees' => $request->fees,
        ]);

        $imageName = $posting->image; // Keep the existing image name by default
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('images', $imageName, 'public');
        }

        $posting->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        //return redirect()->route('postings.user')->with('success', 'Posting updated successfully.');
        return redirect()->route('postings.user', ['id' => $id])->with('success', 'Posting updated successfully.');
    }

    public function destroy($id)
    {
        $posting = Posting::findOrFail($id);
        $posting->delete();
        return redirect()->route('postings.user', ['id' => $id])->with('success', 'Posting deleted successfully.');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
