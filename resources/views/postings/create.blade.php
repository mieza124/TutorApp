@extends('layouts.app')

@section('content')
    <div class="postings-container">
        <br>
        <h1>CREATE POSTINGS</h1><br>
        <form action="{{ route('postings.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td><label for="title">Title:</label></td>
                    <td><input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" style="width: 150%;" required></td>
                </tr>
                <tr>
                    <td><label for="description">Description:</label></td>
                    <td><textarea class="form-control" id="description" name="description" style="width: 150%;" required>{{ old('description') }}</textarea></td>
                </tr>
                <tr>
                    <td><label for="subject_id">Subject:</label></td>
                    <td>
                        <select class="form-control" id="subject_id" name="subject_id" style="width: 150%;" required>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="schedule">Schedule:</label></td>
                    <td><input type="text" class="form-control" id="schedule" name="schedule" value="{{ old('schedule') }}" style="width: 150%;" required></td>
                </tr>
                <tr>
                    <td><label for="availability">Available:</label></td>
                    <td><input type="number" class="form-control" id="availability" name="availability" value="{{ old('availability') }}" style="width: 150%;" required></td>
                </tr>
                <tr>
                    <td><label for="registered">Registered:</label></td>
                    <td><input type="number" class="form-control" id="registered" name="registered" value="{{ old('registered') }}" style="width: 150%;" required></td>
                </tr>                
                <tr>
                    <td><label for="mode">Mode:</label></td>
                    <td>
                        <select class="form-control" id="mode" name="mode" style="width: 150%;" required>
                            <option value="Physical">Physical</option>
                            <option value="Online">Online</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="fees">Fees: RM</label></td>
                    <td><input type="number" step="0.01" class="form-control" id="fees" name="fees" value="{{ old('fees') }}" style="width: 150%;" required></td>
                </tr>
                <tr>
                    <td><label for="image">Image:</label></td>
                    <td><input type="file" class="form-control-file" id="image" name="image"></td>
                </tr><br>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-success">Create Posting</button>
                        <a href="javascript:history.back()" class="btn btn-secondary">Back to Previous Page</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
@endsection
