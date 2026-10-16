<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ trim($__env->yieldContent('title', config('app.name', 'FixItHub'))) }}</title>
        <meta name="theme-color" content="#f7f8fc">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-900">
        <div class="min-h-screen lg:flex">
            @include('layouts.navigation')

            <div class="min-w-0 flex-1 lg:pl-72">
                <header class="sticky top-0 z-20 border-b border-slate-200/80 bg-white/90 backdrop-blur-xl">
                    <div class="flex min-h-20 items-center justify-between gap-4 px-4 sm:px-8">
                        <div class="min-w-0">
                            @isset($header)
                                {{ $header }}
                            @else
                                <p class="text-sm font-medium text-slate-500">FixItHub community</p>
                            @endisset
                        </div>
                        <div class="hidden items-center gap-3 sm:flex">
                            <span class="text-sm text-slate-500">{{ now()->format('D, M j') }}</span>
                            <span class="h-8 w-px bg-slate-200"></span>
                            <span class="grid h-10 w-10 place-items-center rounded-full bg-violet-100 text-sm font-bold text-violet-700">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                        </div>
                    </div>
                </header>

                <main class="min-h-[calc(100vh-5rem)] px-4 py-7 sm:px-8 sm:py-9">
                    <div class="mx-auto w-full max-w-7xl">
                        @if (session('success'))
                            <div role="status" class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div role="alert" class="mb-6 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800">
                                <p class="font-semibold">Please review the form and try again.</p>
                                <ul class="mt-1 list-inside list-disc">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
