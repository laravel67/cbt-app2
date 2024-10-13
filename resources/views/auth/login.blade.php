<x-layout-auth>
    <div class="card">
        <div class="card-body">
          <div class="justify-content-center">
              <x-app-logo/>
          </div>
          <h4 class="mb-2">{{ __('Welcome 👋') }}</h4>
          <p class="mb-4">Please sign-in to your account and start the adventure</p>
          <form class="mb-3" wire:submit.prevent='submit'>
            <x-input type="text" model="user" ph="email atau nisn/nip">{{ __('Email atau Nisn/Nip') }}</x-input>
            <x-input type="password" ph="Kata Sandi">{{ __('Kata Sandi') }}</x-input>
            <div class="mb-3">
                <x-submit text="Sign In" load="Mengautentikasi" class="w-100"/>
            </div>
          </form>
          <p class="text-center">
            <a href="{{ route('register') }}" class="badge bg-secondary shadow-none rounded-0">
                <span>Daftar</span>
            </a>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="badge bg-info shadow-none rounded-0">
                <span>{{ __('Lupa Sandi ?') }}</span>
                </a>
            @endif
          </p>
        </div>
    </div>
</x-layout-auth>