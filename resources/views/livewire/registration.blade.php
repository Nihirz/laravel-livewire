<div>

    @if (session()->has('success'))
        <div class="alert success-alert">{{ session('success') }}</div>
    @endif
    <form wire:submit.prevent="submit">
        <div class="form-group">
            <input class="form-control" type="text" id="" wire:model="name" placeholder="Name">
        </div>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="form-group">
            <input class="form-control" type="text" id="" wire:model="email" placeholder="Email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control" type="text" id="" wire:model="password" placeholder="password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary" value="register">Register</button>
        </div>
    </form>
</div>
