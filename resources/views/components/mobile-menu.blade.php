<x-mobile-link href="{{ route('dashboard') }}" active="dashboard">
    <i class="bx bx-home me-2"></i>
    <span class="align-middle">{{ __('Dashboard') }}</span>
</x-mobile-link>
<x-mobile-link href="{{ route('competitorIndex') }}" active="competitorIndex">
    <i class="bx bx-user-pin me-2"></i>
    <span class="align-middle">{{ __('Peserta') }}</span>
</x-mobile-link>
<x-mobile-link href="{{ route('quizIndex') }}" :active="['quizIndex', 'quizCreate', 'quizShow']">
    <i class="bx bx-book-content me-2"></i>
    <span class="align-middle">{{ __('Kelola Soal') }}</span>
</x-mobile-link>
