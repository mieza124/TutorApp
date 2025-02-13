@extends('layouts.app')

@section('content')
    <h1>{{ $tutor->user->name }}</h1>
    <p>{{ $tutor->bio }}</p>
    <img src="{{ asset('storage/' . $tutor->image) }}" alt="{{ $tutor->user->name }}">
@endsection