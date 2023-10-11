<section class="my-4">
    <header>
        <h2 class="h4 fw-medium text-dark">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-3 text-muted">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#confirm-user-deletion">
        {{ __('Delete Account') }}
    </button>

    <div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="confirmUserDeletionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{ route('profile.destroy') }}" class="modal-content p-4">
                @csrf
                @method('delete')

                <h2 class="h4 fw-medium text-dark">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-3 text-muted">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="mt-4">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Password') }}" required />

                    @error('password', 'userDeletion')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4 text-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        {{ __('Cancel') }}
                    </button>
                    <button type="submit" class="btn btn-danger ms-2">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
