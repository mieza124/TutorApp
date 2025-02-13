@extends('layouts.app')
@section('content')
    <div class="postings-container">
        <h2>SEARCH</h2><br>
        <form action="{{ route('postings.index') }}" method="GET">  
        <table>
            <tr>
                <td><h3>Tutor's Name</h3></td>
                <td><input type="text" name="tutor_name" placeholder="Tutor Name" value="{{ request('tutor_name') }}"></td>
            </tr>
            <tr>
                <td><h3>Subject</h3></td>
                <td><select name="subject_id">
                <option value="">Subject</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
                </select>
                </td>
            </tr>
            <tr>
                <td><h3>Date Start</h3></td>
                <td>
                    <input type="date" name="date_start" placeholder="Start Date" value="{{ request('date_start') }}">
                </td>
            </tr>
            <tr>
                <td><h3>Date End</h3></td>
                <td>
                    <input type="date" name="date_end" placeholder="End Date" value="{{ request('date_end') }}">
                </td>
            </tr>
            <tr>
                <td><h3></h3></td>
                <td colspan="2" style="text-align: left;">
                <button type="submit">Apply Filters</button>
                </td>
            </tr>
        </table><br>
        <h1>GET YOUR TUTORING CLASS HERE</h1><br>
        @foreach($postings as $index => $posting)
            <div class="posting">
                <div>
                <h2># {{ $index + 1 }}</h2>
                <h2>{{ $posting->title }}</h2>
                <p>{{ $posting->description }}</p>   
                <table>
                        <tr>
                        <td style="text-align: left;">
                        <table class="table" > 
                        <tr>
                            <th style="text-align: left;">Subject Name</th>
                            <td style="text-align: left;">: {{ $posting->tutoringsession->subject->name }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Level</th>
                            <td style="text-align: left;">: {{ $posting->tutoringsession->subject->level }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Schedule</th>
                            <td style="text-align: left;">: {{ $posting->tutoringsession->schedule }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Available</th>
                            <td style="text-align: left;">: {{ $posting->tutoringsession->availability }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Registered</th>
                            <td style="text-align: left;">: {{ $posting->tutoringsession->registered }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Teaching Mode</th>
                            <td style="text-align: left;">: {{ $posting->tutoringsession->mode }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Fees (RM)</th>
                            <td style="text-align: left;">: {{ $posting->tutoringsession->fees }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Tutor Name</th>
                            <td style="text-align: left;">: {{ $posting->tutor->user ? $posting->tutor->user->name : 'No tutor assigned' }}</td>
                        </tr>   
                        </table>
                        </td>
                        
                        </td>
                        <td style="text-align: right;">
                            @if ($posting->image)
                            <img src="{{ asset('storage/images/' . $posting->image) }}" alt="Posting Image" width=500">
                            @endif
                        </td>
                        </tr>
                </table>
                </div>                
            </div>
        @endforeach
    </div>    
@endsection
