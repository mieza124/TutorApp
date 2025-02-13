@extends('layouts.app')

@section('content')
<div class="postings-container">
        <br>
        <h1>EDIT POSTINGS</h1><br>
        <form action="{{ route('postings.update', $posting->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table class="table table-bordered">
                <tr>
                    <td><label for="title">Title:</label></td>
                    <td><input type="text" id="title" name="title" value="{{ old('title', $posting->title) }}" style="width: 150%;" required></td>
                </tr>
                <tr>
                    <td><label for="description">Description:</label></td>
                    <td><textarea id="description" name="description" style="width: 150%;" required>{{ old('description', $posting->description) }}</textarea></td>
                </tr>
                <tr>
                    <td><label for="subject_id">Subject:</label></td>
                    <td>
                        <select id="subject_id" name="subject_id" style="width: 150%;" required>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ $subject->id == $posting->tutoringsession->subject_id ? 'selected' : '' }}>{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="schedule">Schedule:</label></td>
                    <td><input type="text" id="schedule" name="schedule" value="{{ old('schedule', $posting->tutoringsession->schedule) }}" style="width: 150%;" required></td>
                </tr>
                <tr>
                    <td><label for="availability">Available:</label></td>
                    <td><input type="number" id="availability" name="availability" value="{{ old('availability', $posting->tutoringsession->availability) }}" style="width: 150%;" required></td>
                </tr>
                <tr>
                    <td><label for="registered">Registered:</label></td>
                    <td><input type="number" id="registered" name="registered" value="{{ old('registered', $posting->tutoringsession->registered) }}" style="width: 150%;" required></td>
                </tr>                
                <tr>
                    <td><label for="mode">Mode:</label></td>
                    <td>
                        <select id="mode" name="mode" required>
                            <option value="Physical" {{ old('mode', $posting->tutoringsession->mode) == 'Physical' ? 'selected' : '' }}>Physical</option>
                            <option value="Online" {{ old('mode', $posting->tutoringsession->mode) == 'Online' ? 'selected' : '' }}>Online</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="fees">Fees: RM</label></td>
                    <td><input type="number" id="fees" name="fees" value="{{ old('fees', $posting->tutoringsession->fees) }}" style="width: 100%;" required></td>
                </tr>
                <tr>
                    <td><label for="image">Image:</label></td>
                    <td>
                        <input type="file" id="image" name="image" accept="image/*"><br>
                        @if ($posting->image)
                            <img src="{{ asset('storage/images/' . $posting->image) }}" alt="Current Image" width="100">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><br>
                        <button type="submit" class="btn btn-success">Update Posting</button>
                        <a href="javascript:history.back()" class="btn btn-secondary">Back to Previous Page</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
@endsection
