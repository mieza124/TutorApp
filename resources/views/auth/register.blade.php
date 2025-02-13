@extends('layouts.app')

@section('content')
    <div class="postings-container">
    <br>
    <div class="row justify-content-center">
        <h1><div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('TUTOR REGISTRATION FORM') }}</div></h1><br>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <table class="table">
                            <tr>
                                <td>
                                    <label for="name">{{ __('Name') }}</label>
                                </td>
                                <td>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="email">{{ __('Email Address') }}</label>
                                </td>
                                <td>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="userid">{{ __('User ID') }}</label>
                                </td>
                                <td>
                                    <input id="userid" type="text" class="form-control @error('userid') is-invalid @enderror" name="userid" value="{{ old('userid') }}" required>
                                    @error('userid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="password">{{ __('Password') }}</label>
                                </td>
                                <td>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                </td>
                                <td>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </td>
                            </tr>
                            <input type="hidden" name="role" value="tutor">                            
                            <tr>
                                <td colspan="2"><br>
                                    <div class="form-group mb-0 text-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

