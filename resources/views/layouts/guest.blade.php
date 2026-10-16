<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'FixItHub') }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[#f7f8fc] font-sans text-slate-900 antialiased">
        <main class="grid min-h-screen lg:grid-cols-[1.05fr_.95fr]">
            <section class="relative hidden overflow-hidden bg-gradient-to-br from-violet-700 via-violet-700 to-indigo-900 p-12 text-white lg:flex lg:flex-col lg:justify-between xl:p-16">
                <div class="absolute -right-24 top-20 h-80 w-80 rounded-full border-[50px] border-white/5"></div>
                <div class="absolute -bottom-36 -left-24 h-96 w-96 rounded-full border-[55px] border-white/5"></div>
                <a href="{{ route('home') }}" class="relative z-10 flex items-center gap-3">
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-white text-xl font-extrabold text-violet-700 shadow-lg">F</span>
                    <span>
                        <span class="block text-xl font-extrabold tracking-tight">FixItHub</span>
                        <span class="block text-xs font-medium text-violet-200">Fix more. Waste less.</span>
                    </span>
                </a>
                <div class="relative z-10 max-w-xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-violet-200">A better way to repair</p>
                    <h1 class="mt-5 text-5xl font-extrabold leading-tight tracking-tight xl:text-6xl">Make fixing<br>the first choice.</h1>
                    <p class="mt-6 max-w-lg text-lg leading-8 text-violet-100">Find local repair experts, connect with your community, and give the things you love a second life.</p>
                </div>
                <p class="relative z-10 text-sm text-violet-200">Fix More. Waste Less. Help Each Other.</p>
            </section>
            <section class="flex min-h-screen flex-col justify-center px-5 py-10 sm:px-10 lg:px-14 xl:px-24">
                <a href="{{ route('home') }}" class="mx-auto mb-10 flex items-center gap-3 lg:hidden">
                    <span class="grid h-11 w-11 place-items-center rounded-2xl bg-violet-600 text-lg font-extrabold text-white">F</span>
                    <span class="text-xl font-extrabold tracking-tight">FixItHub</span>
                </a>
                <div class="mx-auto w-full max-w-md">
                    {{ $slot }}
                </div>
                <p class="mx-auto mt-10 max-w-md text-center text-xs leading-5 text-slate-400">By continuing, you support local repair and a more sustainable community.</p>
            </section>
        </main>
    </body>
</html>
