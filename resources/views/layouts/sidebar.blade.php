@php
$activePage = $activePage ?? '';
$unreadNotifications = auth()->user()->unreadNotifications()->count();
@endphp

<div class="w-64 bg-[#006838] text-white p-4 relative z-10">
    {{-- Logo --}}
    <div class="mb-8">
        <div class="relative w-full h-16 mb-4">
            <img src="{{ asset('assets/images/tamunify-logo.png') }}" alt="Tamunify - PT Pupuk Kujang"
                class="object-contain w-full h-full filter invert brightness-0">
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="space-y-1 text-sm">
        <a href="{{ route('dashboard.index') }}"
            class="flex items-center px-4 py-3 {{ $activePage === 'dashboard' ? 'bg-[#005028] rounded-md' : 'text-green-100 hover:bg-[#005028] rounded-md' }}">
            <i class="fas fa-home mr-3 w-5"></i> Dashboard
        </a>
        <a href="#"
            class="flex items-center px-4 py-3 {{ $activePage === 'visitors' ? 'bg-[#005028] rounded-md' : 'text-green-100 hover:bg-[#005028] rounded-md' }}">
            <i class="fas fa-users mr-3 w-5"></i> Tamu
        </a>
        <a href="#"
            class="flex items-center justify-between px-4 py-3 {{ $activePage === 'notifications' ? 'bg-[#005028] rounded-md' : 'text-green-100 hover:bg-[#005028] rounded-md' }}">
            <div class="flex items-center">
                <i class="fas fa-bell mr-3 w-5"></i> Notifikasi
            </div>
            @if ($unreadNotifications > 0)
            <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                {{ $unreadNotifications }}
            </span>
            @endif
        </a>
        <a href="#"
            class="flex items-center px-4 py-3 {{ $activePage === 'schedule' ? 'bg-[#005028] rounded-md' : 'text-green-100 hover:bg-[#005028] rounded-md' }}">
            <i class="fas fa-calendar-alt mr-3 w-5"></i> Jadwal
        </a>
        <a href="#"
            class="flex items-center px-4 py-3 {{ $activePage === 'reports' ? 'bg-[#005028] rounded-md' : 'text-green-100 hover:bg-[#005028] rounded-md' }}">
            <i class="fas fa-chart-bar mr-3 w-5"></i> Laporan
        </a>
        <a href="#"
            class="flex items-center px-4 py-3 {{ $activePage === 'manage-admins' ? 'bg-[#005028] rounded-md' : 'text-green-100 hover:bg-[#005028] rounded-md' }}">
            <i class="fas fa-user-cog mr-3 w-5"></i> Kelola Admin
        </a>
        <a href="#"
            class="flex items-center px-4 py-3 {{ $activePage === 'settings' ? 'bg-[#005028] rounded-md' : 'text-green-100 hover:bg-[#005028] rounded-md' }}">
            <i class="fas fa-cog mr-3 w-5"></i> Pengaturan
        </a>
    </nav>

    {{-- Logout --}}
    <div class="absolute bottom-4 w-56">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="flex items-center px-4 py-3 text-green-100 hover:bg-[#005028] rounded-md">
            <i class="fas fa-sign-out-alt mr-3 w-5"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</div>