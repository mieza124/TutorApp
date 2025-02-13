@extends('layouts.app')

@section('content')
    
    <div class="postings-container">
    <div class="posting">
        <div class="card">
            <h1>
                <div class="card-header text-center">{{ __('LOGIN') }}</div>
            </h1><br>
            <div class="card-body">
                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf <!-- CSRF token for security -->
                    <table class="table">
                        <tr>
                            <td>
                                <label for="userid" class="col-form-label">{{ __('User ID') }}</label>
                            </td>
                            <td>
                                <input id="userid" type="userid" class="form-control @error('userid') is-invalid @enderror" name="userid" value="{{ old('userid') }}" required autocomplete="userid" autofocus>
                                @error('userid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                            </td>
                            <td>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center"><br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

