<div>
    <h2 class="mb-2 mx-2">{{ __('Verifikasi Email!') }}</h2>
    <p class="mb-4 mx-2">
      {{ __('Selamat anda sudah berhasil terdaftar sebagai peserta Olimpiode Sains Pondok Pesantren Al-munawwaroh') }}
    </p>
    <x-btn-action href="{{ route('login') }}">{{ __('Login') }}</x-btn-action>
    <a href="https://wa.link/jqqvga" target="_blank" class='btn btn-primary'>{{ __('Hubungi Admin') }}</a>
    <div class="mt-4">
      <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" alt="girl-doing-yoga-light" width="500" class="img-fluid" data-app-dark-img="illustrations/girl-doing-yoga-dark.png" data-app-light-img="illustrations/girl-doing-yoga-light.png">
    </div>
</div>