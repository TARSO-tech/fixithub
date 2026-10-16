<aside x-data="{ open: false }" class="relative z-30 lg:fixed lg:inset-y-0 lg:left-0 lg:w-72">
    <div class="flex h-16 items-center justify-between border-b border-slate-200 bg-white px-5 lg:hidden">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
            <span class="grid h-9 w-9 place-items-center rounded-xl bg-violet-600 text-base font-extrabold text-white">F</span>
            <span class="text-lg font-extrabold tracking-tight">FixItHub</span>
        </a>
        <button type="button" @click="open = !open" class="grid h-10 w-10 place-items-center rounded-xl border border-slate-200 text-slate-600" :aria-expanded="open" aria-label="Toggle navigation">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                <path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/>
            </svg>
        </button>
    </div>

    <div :class="open ? 'block' : 'hidden'" class="absolute inset-x-0 top-16 max-h-[calc(100vh-4rem)] overflow-y-auto border-b border-slate-200 bg-white p-4 shadow-xl lg:static lg:block lg:h-screen lg:max-h-none lg:border-b-0 lg:border-r lg:p-5 lg:shadow-none">
        <div class="hidden items-center gap-3 px-3 py-3 lg:flex">
            <span class="grid h-11 w-11 place-items-center rounded-2xl bg-violet-600 text-lg font-extrabold text-white shadow-lg shadow-violet-200">F</span>
            <div>
                <a href="{{ route('dashboard') }}" class="text-xl font-extrabold tracking-tight text-slate-900">FixItHub</a>
                <p class="text-xs font-medium text-slate-500">Fix more. Waste less.</p>
            </div>
        </div>

        <div class="mt-2 rounded-2xl bg-gradient-to-br from-violet-50 to-indigo-50 p-4">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-violet-600">Your workspace</p>
            <p class="mt-1 text-sm font-semibold text-slate-800">{{ Auth::user()->name }}</p>
            <p class="mt-0.5 text-xs capitalize text-slate-500">{{ str_replace('_', ' ', Auth::user()->role) }}</p>
        </div>

        <nav class="mt-7 space-y-1" aria-label="Main navigation">
            <p class="px-3 pb-2 text-[11px] font-bold uppercase tracking-[0.16em] text-slate-400">Menu</p>
            <a href="{{ route('dashboard') }}" @click="open = false" class="nav-item {{ request()->routeIs('dashboard') ? 'nav-item-active' : '' }}">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="3" width="7" height="8" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/><rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="15" width="7" height="6" rx="1.5"/></svg>
                <span>Overview</span>
            </a>
            <a href="{{ route('repair-requests.index') }}" @click="open = false" class="nav-item {{ request()->routeIs('repair-requests.*') ? 'nav-item-active' : '' }}">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M14.7 6.3a4 4 0 0 0-5.6 5.6L4 17v3h3l5.1-5.1a4 4 0 0 0 5.6-5.6L15 12l-3-3 2.7-2.7Z"/></svg>
                <span>Repair requests</span>
            </a>
            <a href="{{ route('technicians.index') }}" @click="open = false" class="nav-item {{ request()->routeIs('technicians.*') ? 'nav-item-active' : '' }}">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="9" cy="8" r="3.5"/><path stroke-linecap="round" d="M3 20c.4-3.5 2.3-5.5 6-5.5s5.6 2 6 5.5m1.5-10.5a3.5 3.5 0 0 1 0 7m1.5 2c1.8.5 2.8 1.7 3 3.5"/></svg>
                <span>Find technicians</span>
            </a>
            <a href="{{ route('appointments.index') }}" @click="open = false" class="nav-item {{ request()->routeIs('appointments.*') ? 'nav-item-active' : '' }}">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"/><path stroke-linecap="round" d="M16 3v4M8 3v4M3 10h18"/></svg>
                <span>Appointments</span>
            </a>
            <a href="{{ route('conversations.index') }}" @click="open = false" class="nav-item {{ request()->routeIs('conversations.*') ? 'nav-item-active' : '' }}">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M20 11.5a7.5 7.5 0 0 1-7.5 7.5H5l-2 2v-8.5A7.5 7.5 0 0 1 10.5 5h2A7.5 7.5 0 0 1 20 12Z"/><path stroke-linecap="round" d="M8 11h8M8 14h5"/></svg>
                <span>Messages</span>
            </a>
        </nav>

        <div class="mt-8 rounded-2xl border border-emerald-100 bg-emerald-50 p-4">
            <div class="flex items-center gap-2 text-emerald-800">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M20 4c-8 0-13 3-13 9a5 5 0 0 0 5 5c6 0 8-6 8-14ZM4 21c1-5 5-8 11-11"/></svg>
                <span class="text-sm font-bold">Small fixes, big impact</span>
            </div>
            <p class="mt-2 text-xs leading-5 text-emerald-800/75">Every repair gives something useful a second life.</p>
        </div>

        <div class="mt-8 border-t border-slate-200 pt-4">
            <a href="{{ route('profile.edit') }}" @click="open = false" class="nav-item {{ request()->routeIs('profile.*') ? 'nav-item-active' : '' }}">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path stroke-linecap="round" d="M4.5 21a7.5 7.5 0 0 1 15 0"/></svg>
                <span>Profile settings</span>
            </a>
            <form method="POST" action="{{ route('logout') }}" class="mt-1">
                @csrf
                <button type="submit" class="nav-item w-full text-left text-slate-500 hover:bg-rose-50 hover:text-rose-700">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M10 17l5-5-5-5m5 5H3m9-9h6a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3h-6"/></svg>
                    <span>Sign out</span>
                </button>
            </form>
        </div>
    </div>
</aside>
