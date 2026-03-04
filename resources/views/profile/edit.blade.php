@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">{{ Auth::user()->name }}</h2>

    {{-- Update Profile Information --}}
    <div class="card mb-4">
        <div class="card-header">Update Profile Information</div>
        <div class="card-body">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    {{-- Update Password --}}
    <div class="card mb-4">
        <div class="card-header">Update Password</div>
        <div class="card-body">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    {{-- Delete Account --}}
    <div class="card mb-4">
        <div class="card-header text-danger">Delete Account</div>
        <div class="card-body">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
