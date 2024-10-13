<div class="card">
    <div class="card-body">
      <div class="justify-content-center">
          <x-app-logo/>
      </div>
      <!-- /Logo -->
      {{-- <h4 class="mb-2">{{ __('Welcome 👋') }}</h4> --}}
      {{-- <p class="mb-4">Please sign-in to your account and start the adventure</p> --}}
      <form wire:submit.prevent='submit'>
        <x-input type="email" model="email" ph="Alamat Email">{{ __('alamat email') }}</x-input>
        <x-input type="text" model="name" ph="nama lengkap">{{ __('Nama Lengkap') }}</x-input>
        <x-input type="password" model="password" ph="Sandi Baru">{{ __('Kata Sandi') }}</x-input>
        <x-input type="password" model="password_confirmation" ph="Konfirmasi Sandi">{{ __('Kata Sandi') }}</x-input>
        <div class="mb-3">
          <x-submit text="Sign In" load="Mengautentikasi" class="w-100"/>
        </div>
      </form>
      <p class="text-center">
        <x-badge href="{{ route('login') }}" color="secondary" >
          {{ __('Sign In') }}
        </x-badge>
      </p>
    </div>
</div>