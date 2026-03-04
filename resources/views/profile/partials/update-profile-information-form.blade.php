<section class="container mt-5">
    <header class="mb-4">
        <h2 class="h4 text-primary">Profile Information</h2>
        <p class="text-muted">Update your account's profile information and email address.</p>
    </header>

    <!-- Form to resend verification -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Update profile form -->
    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input 
                type="text"
                id="name"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input 
                type="email"
                id="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 alert alert-warning">
                    Your email address is unverified.
                    <button form="send-verification" class="btn btn-link p-0">Click here to re-send the verification email.</button>
                </div>

                @if (session('status') === 'verification-link-sent')
                    <div class="mt-2 alert alert-success">
                        A new verification link has been sent to your email address.
                    </div>
                @endif
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">Save</button>

            @if (session('status') === 'profile-updated')
                <span class="text-success">Saved.</span>
            @endif
        </div>
    </form>
</section>
