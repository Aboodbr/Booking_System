@extends('layouts.app')

@section('content')

  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row justify-content-middle" style="margin-left: 397px;">
      <div class="col-md-6 mt-5">
        <form method="POST" action="{{ route('register') }}" class="appointment-form" >
          @csrf
          <h3 class="mb-3">Register</h3>
          <div class="row">
            <!-- Name -->
            <div class="col-md-12">
              <div class="form-group">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name" required>
              </div>
            </div>

            <!-- Email -->
            <div class="col-md-12">
              <div class="form-group">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required>
              </div>
            </div>

            <!-- Password -->
            <div class="col-md-12">
              <div class="form-group">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <input type="password" name="password" class="form-control" placeholder="Password" required>
              </div>
            </div>

            <!-- Confirm Password -->
            <div class="col-md-12">
              <div class="form-group">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
              </div>
            </div>

            <!-- Login Link -->
            <div class="col-md-12 mt-2 mb-2">
              <a href="{{ route('login') }}">Already registered?</a>
            </div>

            <!-- Submit -->
            <div class="col-md-12">
              <div class="form-group">
                <input type="submit" value="Register" class="btn btn-primary py-3 px-4">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
