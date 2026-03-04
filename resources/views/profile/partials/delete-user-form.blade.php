<section class="container mt-5">
    <div class="card border-danger">
        <div class="card-header bg-danger text-white">
            <h5 class="mb-0">Delete Account</h5>
        </div>

        <div class="card-body">
            <p class="mb-4">
                Once your account is deleted, all of its data will be permanently removed. Please download any important information before continuing.
            </p>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                Delete Account
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')

                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deleteAccountLabel">Confirm Account Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p>This action is permanent. Please enter your password to confirm:</p>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password"
                                   name="password"
                                   id="password"
                                   class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                                   required>
                            @error('password', 'userDeletion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
