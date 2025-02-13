@extends('layouts.app')
@section('content')
    <div class="userpostings-container">
        <h2>YOUR POSTINGS</h2><br>
        <a href="{{ route('postings.create') }}" class="btn btn-success mb-3">Create New Posting</a><br>
        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif
        @if($postings->isEmpty())
            <p>No postings available.</p>
        @else
            <br><table class="table table-bordered" style="width: 100%;">    
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Subject</th>
                        <th>Schedule</th>
                        <th>Registered</th>
                        <th>Availability</th>
                        <th>Mode</th>
                        <th>Fees</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($postings as $index => $posting)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $posting->title }}</td>
                            <td>{{ $posting->description }}</td>
                            <td>{{ $posting->tutoringsession->subject->name }}</td>
                            <td>{{ $posting->tutoringsession->schedule }}</td>
                            <td>{{ $posting->tutoringsession->registered }}</td>
                            <td>{{ $posting->tutoringsession->availability }}</td>
                            <td>{{ $posting->tutoringsession->mode }}</td>
                            <td>{{ $posting->tutoringsession->fees }}</td>
                            <td>
                                <a href="{{ route('postings.edit', $posting->id) }}" class="btn btn-primary btn-sm" style="width: 60px;">Edit</a><br>
                                <form action="{{ route('postings.destroy', $posting->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="width: 60px;">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
    </div>
@endsection

