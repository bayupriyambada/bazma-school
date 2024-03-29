<div>
    <form class="card card-md" wire:submit.prevent="handleLogin()" autocomplete="off">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Login to your account</h2>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" wire:model.defer="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="mb-2">
                <label class="form-label">
                    Password
                </label>
                <div class="input-group input-group-flat">
                    <input type="password" wire:model.defer="password" class="form-control" placeholder="Password"
                        autocomplete="off">
                </div>
            </div>
            <div class="mb-2">
                {{-- <label class="form-check">
                    <input type="checkbox" class="form-check-input" />
                    <span class="form-check-label">Remember me on this device</span>
                </label> --}}
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
        </div>
    </form>
</div>
