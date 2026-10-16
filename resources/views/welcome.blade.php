<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FixItHub — Community Repair Platform</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-50 text-slate-900">
        <header class="bg-white border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-xl bg-violet-600 text-white flex items-center justify-center font-bold">F</div>
                    <div>
                        <div class="text-xl font-bold">FixItHub</div>
                        <div class="text-xs text-slate-500">Fix More. Waste Less.</div>
                    </div>
                </div>
                <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-600">
                    <a href="#how-it-works">How It Works</a>
                    <a href="#categories">Categories</a>
                    <a href="#impact">Impact</a>
                    <a href="#about">About</a>
                </nav>
                <div class="flex items-center gap-3">
                    <a href="{{ route('login') }}" class="text-sm font-medium text-slate-700">Login</a>
                    <a href="{{ route('register') }}" class="bg-violet-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">Get Started</a>
                </div>
            </div>
        </header>

        <main>
            <section class="bg-gradient-to-br from-violet-50 via-white to-emerald-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <span class="inline-flex rounded-full bg-violet-100 text-violet-700 px-3 py-1 text-sm font-semibold">Community repair platform</span>
                        <h1 class="mt-6 text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">Broken? Let’s Fix It Together.</h1>
                        <p class="mt-6 text-lg text-slate-600 max-w-xl">Connect with trusted local technicians and student volunteers. Find affordable repair services, reduce waste, and give your belongings a second life.</p>
                        <div class="mt-8 flex flex-wrap gap-4">
                            <a href="{{ route('register') }}" class="bg-violet-600 text-white px-6 py-3 rounded-xl font-semibold">Request a Repair</a>
                            <a href="{{ route('register') }}" class="bg-emerald-500 text-white px-6 py-3 rounded-xl font-semibold">Become a Volunteer</a>
                        </div>
                        <div class="mt-10 flex gap-8 text-sm text-slate-600">
                            <div><div class="text-2xl font-bold text-slate-900">2.4k+</div><div>Repairs completed</div></div>
                            <div><div class="text-2xl font-bold text-slate-900">480</div><div>Community helpers</div></div>
                            <div><div class="text-2xl font-bold text-slate-900">1.8t</div><div>Waste avoided</div></div>
                        </div>
                    </div>
                    <div class="bg-white rounded-3xl shadow-[0px_20px_60px_rgba(16,24,40,0.10)] p-6">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-violet-50 rounded-2xl p-5">
                                <div class="text-sm text-violet-700 font-medium">Repair request</div>
                                <div class="mt-4 text-lg font-bold">Laptop battery replacement</div>
                                <div class="mt-2 text-sm text-slate-600">Pending technician assignment</div>
                            </div>
                            <div class="bg-emerald-50 rounded-2xl p-5">
                                <div class="text-sm text-emerald-700 font-medium">EcoFix</div>
                                <div class="mt-4 text-lg font-bold">18.4 kg saved</div>
                                <div class="mt-2 text-sm text-slate-600">This month</div>
                            </div>
                            <div class="md:col-span-2 bg-slate-100 rounded-2xl p-5">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-sm text-slate-500">Featured technicians</div>
                                        <div class="mt-2 text-xl font-bold">Repair crew near you</div>
                                    </div>
                                    <div class="text-violet-600 font-semibold">4.9★</div>
                                </div>
                                <div class="mt-4 grid grid-cols-3 gap-3">
                                    @foreach($technicians as $technician)
                                        <div class="bg-white rounded-xl p-3 shadow-sm">
                                            <div class="h-10 w-10 rounded-full bg-violet-100 flex items-center justify-center text-violet-700 font-semibold">{{ strtoupper(substr($technician->name, 0, 1)) }}</div>
                                            <div class="mt-2 font-medium text-sm">{{ $technician->name }}</div>
                                            <div class="text-xs text-slate-500">{{ $technician->specialization ?? 'General repair' }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="how-it-works" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
                <div class="text-center max-w-2xl mx-auto">
                    <h2 class="text-3xl font-bold">How FixItHub works</h2>
                    <p class="mt-4 text-slate-600">From repair requests to community impact, everything happens in one place.</p>
                </div>
                <div class="mt-12 grid md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-2xl shadow-sm">
                        <div class="h-12 w-12 rounded-xl bg-violet-100 text-violet-700 flex items-center justify-center font-bold">1</div>
                        <h3 class="mt-5 text-xl font-semibold">Request a repair</h3>
                        <p class="mt-3 text-slate-600">Tell us what needs fixing and choose your preferred service time.</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm">
                        <div class="h-12 w-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">2</div>
                        <h3 class="mt-5 text-xl font-semibold">Connect with experts</h3>
                        <p class="mt-3 text-slate-600">Browse verified technicians and student volunteers with matching skills.</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm">
                        <div class="h-12 w-12 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center font-bold">3</div>
                        <h3 class="mt-5 text-xl font-semibold">Track impact</h3>
                        <p class="mt-3 text-slate-600">Monitor progress and see how much waste you avoided through every repair.</p>
                    </div>
                </div>
            </section>

            <section id="categories" class="bg-slate-900 text-white py-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="max-w-2xl">
                        <h2 class="text-3xl font-bold">Popular repair categories</h2>
                        <p class="mt-4 text-slate-300">From everyday devices to household essentials, we help keep valuable items in use.</p>
                    </div>
                    <div class="mt-10 grid md:grid-cols-3 gap-5">
                        @foreach(['Smartphones','Laptops','Computers','Household Appliances','Furniture','Bicycles'] as $category)
                            <div class="rounded-2xl border border-slate-700 bg-slate-800 p-5">
                                <div class="text-lg font-semibold">{{ $category }}</div>
                                <div class="mt-2 text-sm text-slate-300">Trusted local repair support</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <section id="impact" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
                <div class="grid lg:grid-cols-2 gap-10 items-center">
                    <div>
                        <h2 class="text-3xl font-bold">Community impact that feels real</h2>
                        <p class="mt-4 text-slate-600">FixItHub gives neighbors a way to repair, reuse, and reduce waste while building practical support networks.</p>
                        <div class="mt-8 space-y-4">
                            <div class="flex items-center gap-3"><div class="h-3 w-3 rounded-full bg-violet-600"></div><span>Affordable community repair options</span></div>
                            <div class="flex items-center gap-3"><div class="h-3 w-3 rounded-full bg-emerald-600"></div><span>Volunteer-powered local help</span></div>
                            <div class="flex items-center gap-3"><div class="h-3 w-3 rounded-full bg-sky-600"></div><span>EcoFix tracking for every repair</span></div>
                        </div>
                    </div>
                    <div class="bg-white rounded-3xl shadow-sm p-8">
                        <div class="text-sm text-slate-500">EcoFix tracker overview</div>
                        <div class="mt-6 text-4xl font-bold text-emerald-600">2,864kg</div>
                        <div class="mt-2 text-slate-600">Estimated waste avoided this year</div>
                        <div class="mt-8 grid grid-cols-2 gap-4">
                            <div class="bg-violet-50 rounded-xl p-4"><div class="text-violet-700 text-2xl font-bold">430</div><div class="text-sm text-slate-600">Repairs</div></div>
                            <div class="bg-emerald-50 rounded-xl p-4"><div class="text-emerald-700 text-2xl font-bold">86</div><div class="text-sm text-slate-600">Volunteers</div></div>
                        </div>
                    </div>
                </div>
            </section>

            <footer id="about" class="bg-slate-100 border-t border-slate-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 flex flex-col md:flex-row justify-between gap-6 text-slate-600">
                    <div>
                        <div class="text-2xl font-bold text-slate-900">FixItHub</div>
                        <div class="mt-2">Fix More. Waste Less. Help Each Other.</div>
                    </div>
                    <div class="flex gap-8 text-sm">
                        <a href="#how-it-works">How It Works</a>
                        <a href="#categories">Categories</a>
                        <a href="#impact">Impact</a>
                    </div>
                </div>
            </footer>
        </main>
    </body>
</html>
