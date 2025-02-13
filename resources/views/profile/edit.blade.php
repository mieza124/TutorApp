@extends('layouts.app')
@section('content')
<div class="postings-container">
    <br>
    <h2>EDIT PROFILE</h2>
    <br>
    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif
    <br>
    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <table class="table table-borderless">
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required style="width: 100%;"></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required style="width: 100%;"></td>
            </tr>
            @if($tutor)
                <tr>
                    <td><label for="bio">Bio:</label></td>
                    <td><textarea class="form-control" id="bio" name="bio" style="width: 100%;">{{ old('bio', $tutor->bio) }}</textarea></td>
                </tr>
                <tr>
                    <td><label for="image">Profile Image:</label></td>
                    <td>
                        <input type="file" class="form-control-file" id="image" name="image"><br><br>
                        @if($tutor && $tutor->image)
                        @php
                            $imagePath = str_replace('images/', '', $tutor->image);
                        @endphp
                            <img src="{{ asset('storage/images/' . $imagePath) }}" alt="Profile Image" class="img-thumbnail mt-2" width="150">
                        @endif

                    </td>
                </tr>
            @endif
            <tr>
                <td colspan="2">
                    <br>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection
