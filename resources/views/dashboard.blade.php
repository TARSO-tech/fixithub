<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-medium text-slate-500">Your FixItHub space</p>
            <h1 class="mt-1 truncate text-xl font-bold tracking-tight text-slate-900 sm:text-2xl">
                {{ Auth::user()->role === 'technician' ? 'Technician dashboard' : (Auth::user()->role === 'student_volunteer' ? 'Volunteer dashboard' : (Auth::user()->role === 'administrator' ? 'Admin dashboard' : 'Dashboard')) }}
            </h1>
        </div>
    </x-slot>

    <div class="space-y-7">
        <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-violet-700 via-violet-700 to-indigo-800 px-6 py-7 text-white shadow-xl shadow-violet-200/60 sm:px-8 sm:py-9">
            <div class="relative z-10 flex flex-col justify-between gap-7 md:flex-row md:items-center">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold text-violet-200">A little care goes a long way</p>
                    <h2 class="mt-2 text-2xl font-bold tracking-tight sm:text-3xl">Good to see you, {{ Str::before($user->name, ' ') }}.</h2>
                    <p class="mt-3 max-w-xl text-sm leading-6 text-violet-100 sm:text-base">Keep your repairs moving, connect with your local repair community, and see the impact of choosing to fix.</p>
                </div>
                <a href="{{ route('repair-requests.create') }}" class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-violet-700 shadow-sm transition hover:-translate-y-0.5 hover:bg-violet-50">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" d="M12 5v14m-7-7h14"/></svg>
                    Request a repair
                </a>
            </div>
            <div class="pointer-events-none absolute -right-10 -top-24 h-72 w-72 rounded-full border-[36px] border-white/5"></div>
            <div class="pointer-events-none absolute -bottom-36 right-40 h-72 w-72 rounded-full border-[36px] border-white/5"></div>
        </section>

        <section class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4" aria-label="Your activity">
            <article class="surface-card flex items-start justify-between p-5">
                <div>
                    <p class="text-sm font-medium text-slate-500">Repair requests</p>
                    <p class="mt-3 text-3xl font-bold tracking-tight text-slate-900">{{ number_format($repairCount) }}</p>
                    <p class="mt-2 text-xs text-slate-500">All your submitted repairs</p>
                </div>
                <span class="grid h-11 w-11 place-items-center rounded-xl bg-violet-50 text-violet-700">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M14.7 6.3a4 4 0 0 0-5.6 5.6L4 17v3h3l5.1-5.1a4 4 0 0 0 5.6-5.6L15 12l-3-3 2.7-2.7Z"/></svg>
                </span>
            </article>
            <article class="surface-card flex items-start justify-between p-5">
                <div>
                    <p class="text-sm font-medium text-slate-500">Upcoming appointments</p>
                    <p class="mt-3 text-3xl font-bold tracking-tight text-slate-900">{{ number_format($appointmentCount) }}</p>
                    <p class="mt-2 text-xs text-slate-500">Pending and scheduled</p>
                </div>
                <span class="grid h-11 w-11 place-items-center rounded-xl bg-sky-50 text-sky-700">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"/><path stroke-linecap="round" d="M16 3v4M8 3v4M3 10h18"/></svg>
                </span>
            </article>
            <article class="surface-card flex items-start justify-between p-5">
                <div>
                    <p class="text-sm font-medium text-slate-500">Unread messages</p>
                    <p class="mt-3 text-3xl font-bold tracking-tight text-slate-900">{{ number_format($unreadMessages) }}</p>
                    <p class="mt-2 text-xs text-slate-500">Conversations need your attention</p>
                </div>
                <span class="grid h-11 w-11 place-items-center rounded-xl bg-amber-50 text-amber-700">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M20 11.5a7.5 7.5 0 0 1-7.5 7.5H5l-2 2v-8.5A7.5 7.5 0 0 1 10.5 5h2A7.5 7.5 0 0 1 20 12Z"/></svg>
                </span>
            </article>
            <article class="surface-card flex items-start justify-between p-5">
                <div>
                    <p class="text-sm font-medium text-slate-500">Estimated waste avoided</p>
                    <p class="mt-3 text-3xl font-bold tracking-tight text-slate-900">{{ number_format((float) $wasteAvoided, 1) }} <span class="text-base font-semibold">kg</span></p>
                    <p class="mt-2 text-xs text-slate-500">{{ $completedRepairs }} completed {{ Str::plural('repair', $completedRepairs) }}</p>
                </div>
                <span class="grid h-11 w-11 place-items-center rounded-xl bg-emerald-50 text-emerald-700">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M20 4c-8 0-13 3-13 9a5 5 0 0 0 5 5c6 0 8-6 8-14ZM4 21c1-5 5-8 11-11"/></svg>
                </span>
            </article>
        </section>

        <section class="grid grid-cols-1 gap-6 xl:grid-cols-[1.55fr_1fr]">
            <div class="surface-card overflow-hidden">
                <div class="flex items-center justify-between gap-4 border-b border-slate-100 px-5 py-5 sm:px-6">
                    <div>
                        <h2 class="font-bold text-slate-900">Recent repair requests</h2>
                        <p class="mt-1 text-sm text-slate-500">A quick look at your latest repairs</p>
                    </div>
                    <a href="{{ route('repair-requests.index') }}" class="shrink-0 text-sm font-semibold text-violet-700 hover:text-violet-900">View all <span aria-hidden="true">→</span></a>
                </div>
                @if ($repairRequests->isEmpty())
                    <div class="px-6 py-12 text-center">
                        <span class="mx-auto grid h-12 w-12 place-items-center rounded-2xl bg-violet-50 text-violet-700">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M14.7 6.3a4 4 0 0 0-5.6 5.6L4 17v3h3l5.1-5.1a4 4 0 0 0 5.6-5.6L15 12l-3-3 2.7-2.7Z"/></svg>
                        </span>
                        <h3 class="mt-4 font-semibold text-slate-900">No repairs yet</h3>
                        <p class="mt-1 text-sm text-slate-500">Start by telling the community what needs fixing.</p>
                        <a href="{{ route('repair-requests.create') }}" class="mt-4 inline-flex rounded-lg bg-violet-600 px-4 py-2 text-sm font-semibold text-white hover:bg-violet-700">Create a repair request</a>
                    </div>
                @else
                    <div class="divide-y divide-slate-100">
                        @foreach ($repairRequests as $repair)
                            @php
                                $statusStyle = match (strtolower($repair->status)) {
                                    'completed' => 'bg-emerald-50 text-emerald-700 ring-emerald-600/20',
                                    'in progress' => 'bg-sky-50 text-sky-700 ring-sky-600/20',
                                    'cancelled' => 'bg-rose-50 text-rose-700 ring-rose-600/20',
                                    'accepted', 'scheduled' => 'bg-violet-50 text-violet-700 ring-violet-600/20',
                                    default => 'bg-amber-50 text-amber-700 ring-amber-600/20',
                                };
                            @endphp
                            <div class="flex items-center justify-between gap-4 px-5 py-4 sm:px-6">
                                <div class="flex min-w-0 items-center gap-3">
                                    <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-slate-100 text-sm font-bold text-slate-600">{{ strtoupper(substr($repair->category, 0, 1)) }}</span>
                                    <div class="min-w-0">
                                        <p class="truncate text-sm font-semibold text-slate-900">{{ $repair->title }}</p>
                                        <p class="mt-1 truncate text-xs text-slate-500">{{ $repair->item_name }} <span class="px-1">·</span> {{ $repair->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <span class="shrink-0 rounded-full px-2.5 py-1 text-xs font-semibold ring-1 ring-inset {{ $statusStyle }}">{{ $repair->status }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="space-y-6">
                <div class="surface-card p-5 sm:p-6">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="text-sm font-semibold text-emerald-700">EcoFix tracker</p>
                            <h2 class="mt-1 text-lg font-bold text-slate-900">Your repair impact</h2>
                        </div>
                        <span class="grid h-10 w-10 place-items-center rounded-xl bg-emerald-50 text-emerald-700">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M20 4c-8 0-13 3-13 9a5 5 0 0 0 5 5c6 0 8-6 8-14ZM4 21c1-5 5-8 11-11"/></svg>
                        </span>
                    </div>
                    <div class="mt-6 rounded-2xl bg-gradient-to-br from-emerald-50 to-teal-50 p-5">
                        <p class="text-3xl font-extrabold tracking-tight text-emerald-800">{{ number_format((float) $wasteAvoided, 1) }} kg</p>
                        <p class="mt-1 text-sm text-emerald-800/75">estimated waste avoided through completed repairs</p>
                    </div>
                    <p class="mt-4 text-xs leading-5 text-slate-500">Impact is an estimate based on repaired item weights. Only completed repairs are included.</p>
                    <div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-4">
                        <span class="text-sm text-slate-600">Technicians in the community</span>
                        <span class="text-sm font-bold text-slate-900">{{ number_format($technicianCount) }}</span>
                    </div>
                </div>

                <div class="surface-card p-5 sm:p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="font-bold text-slate-900">Next appointments</h2>
                            <p class="mt-1 text-sm text-slate-500">Your upcoming schedule</p>
                        </div>
                        <a href="{{ route('appointments.index') }}" class="text-sm font-semibold text-violet-700 hover:text-violet-900">See all</a>
                    </div>
                    @forelse ($appointments as $appointment)
                        <div class="mt-4 flex items-center gap-3 border-t border-slate-100 pt-4">
                            <div class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-sky-50 text-center text-xs font-bold leading-tight text-sky-700">
                                <span>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M') }}<br>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d') }}</span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="truncate text-sm font-semibold text-slate-900">Repair appointment</p>
                                <p class="mt-1 text-xs text-slate-500">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }} · {{ $appointment->technician?->name ?? 'Technician' }}</p>
                            </div>
                            <span class="rounded-full bg-amber-50 px-2 py-1 text-[11px] font-semibold text-amber-700">{{ $appointment->status }}</span>
                        </div>
                    @empty
                        <p class="mt-5 rounded-xl bg-slate-50 px-4 py-5 text-center text-sm text-slate-500">No appointments scheduled yet.</p>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
