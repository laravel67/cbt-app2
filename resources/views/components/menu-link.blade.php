<x-link href="{{ route('dashboard') }}" active="dashboard">
    <i class="menu-icon tf-icons bx bx-home-circle"></i>{{ __('Dashboard') }}
</x-link>
<x-link href="{{ route('competitorIndex') }}" active="competitorIndex">
    <i class="menu-icon tf-icons bx bx-user-pin"></i>{{ __('Peserta') }}
</x-link>

<x-link href="{{ route('quizIndex') }}" :active="['quizIndex', 'quizCreate', 'quizDetail', 'quizEdit']">
    <i class="menu-icon tf-icons bx bx-book-content"></i>{{ __('Kelola Soal') }}
</x-link>

    


