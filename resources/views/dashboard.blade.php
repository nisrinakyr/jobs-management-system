{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    {{-- Short, encouraging header --}}
    <x-slot name="header">
        <div class="rounded-xl px-4 py-1 relative overflow-hidden">
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
                <div class="absolute inset-0 opacity-[0.06] [mask-image:radial-gradient(60%_60%_at_50%_0%,black,transparent)]">
                    <div class="absolute inset-0 [background-image:linear-gradient(to_right,rgba(0,0,0,.10)_1px,transparent_1px),linear-gradient(to_bottom,rgba(0,0,0,.10)_1px,transparent_1px)] [background-size:20px_20px] dark:[background-image:linear-gradient(to_right,rgba(255,255,255,.10)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.10)_1px,transparent_1px)]"></div>
                </div>
                <div class="absolute -top-10 right-0 h-40 w-40 rounded-full blur-2xl opacity-25 bg-gradient-to-tr from-slate-200 to-indigo-200 dark:from-gray-800 dark:to-indigo-900"></div>
            </div>

            <h2 class="font-semibold text-[1.35rem] tracking-tight text-slate-800 dark:text-slate-100">
                Welcome{{ Auth::check() && Auth::user()?->name ? ', '.Auth::user()->name : '' }} 👋
            </h2>
        </div>
    </x-slot>

    <div class="py-10 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-950 dark:to-gray-900">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- HERO / ENCOURAGEMENT --}}
            <section class="relative overflow-hidden rounded-2xl border border-white/20 dark:border-white/10 bg-white/70 dark:bg-gray-900/40 backdrop-blur-xl p-6 sm:p-8 shadow-[0_12px_35px_-12px_rgba(0,0,0,0.35)] ring-1 ring-black/5">

                {{-- Background Blur Layers --}}
                <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
                    <div class="absolute -top-28 -left-10 h-72 w-72 rounded-full blur-3xl opacity-30 bg-gradient-to-tr from-indigo-300 via-purple-300 to-pink-300 dark:from-indigo-900 dark:via-fuchsia-900 dark:to-pink-900"></div>
                    <div class="absolute -bottom-28 right-0 h-72 w-72 rounded-full blur-3xl opacity-30 bg-gradient-to-tr from-amber-300 via-rose-300 to-pink-300 dark:from-amber-900 dark:via-rose-900 dark:to-pink-900"></div>
                </div>

                {{-- Konten Utama --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 relative z-10">
                    <div class="lg:col-span-2">
                        <p class="text-sm text-slate-600 dark:text-slate-400">You’re logged in — let’s make progress today.</p>
                        <h1 class="mt-1 text-2xl sm:text-3xl font-semibold tracking-tight text-slate-900 dark:text-slate-100">
                            Your next great role (or hire) is a few focused steps away.
                        </h1>
                        <p class="mt-3 text-[0.95rem] leading-7 text-slate-700 dark:text-slate-300">
                            Explore openings, refine listings, and keep momentum. A small action now compounds over the week.
                            We’ll keep things calm, structured, and fast.
                        </p>

                        <div class="mt-5 flex flex-wrap items-center gap-3">
                            <a href="{{ url('/showingjobspage') }}"
                               class="inline-flex items-center h-10 rounded-full px-5 text-sm font-semibold text-white bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-indigo-500 transition">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                View Jobs
                            </a>
                            <a href="{{ route('jobs.create') }}"
                               class="inline-flex items-center h-10 rounded-full px-5 text-sm font-medium text-slate-800 dark:text-slate-100 border border-white/30 bg-white/60 dark:bg-gray-900/50 hover:bg-white/80 dark:hover:bg-gray-900/70 transition">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                Post a Job
                            </a>
                            <a href="{{ route('profile.edit') }}"
                               class="inline-flex items-center h-10 rounded-full px-5 text-sm font-medium text-slate-800 dark:text-slate-100 border border-white/30 bg-white/60 dark:bg-gray-900/50 hover:bg-white/80 dark:hover:bg-gray-900/70 transition">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                Update Profile
                            </a>
                        </div>
                    </div>

                    {{-- Tiny Wins / Stats dengan Splash Color Eksklusif --}}
                    <div class="grid grid-cols-3 gap-3 lg:grid-cols-1">

                        <div class="group relative overflow-hidden rounded-xl border border-white/40 dark:border-white/10 bg-white/70 dark:bg-white/10 p-4 hover:-translate-y-1 hover:shadow-lg hover:border-indigo-300/60 dark:hover:border-indigo-500/40 transition-all duration-300 cursor-default">
                            {{-- Splash Effect --}}
                            <div class="absolute -right-6 -top-6 w-24 h-24 rounded-full blur-2xl opacity-40 bg-gradient-to-br from-indigo-400 to-blue-400 group-hover:opacity-60 transition-opacity duration-300"></div>

                            <div class="relative z-10">
                                <div class="text-[11px] uppercase tracking-wide text-slate-500 dark:text-slate-400 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">Focus</div>
                                <div class="mt-1 text-2xl font-extrabold text-indigo-600 dark:text-indigo-400">Today</div>
                            </div>
                        </div>

                        <div class="group relative overflow-hidden rounded-xl border border-white/40 dark:border-white/10 bg-white/70 dark:bg-white/10 p-4 hover:-translate-y-1 hover:shadow-lg hover:border-orange-300/60 dark:hover:border-orange-500/40 transition-all duration-300 cursor-default">
                            {{-- Splash Effect Oren --}}
                            <div class="absolute -right-6 -top-6 w-24 h-24 rounded-full blur-2xl opacity-40 bg-gradient-to-br from-orange-400 to-amber-400 group-hover:opacity-60 transition-opacity duration-300"></div>

                            <div class="relative z-10">
                                <div class="text-[11px] uppercase tracking-wide text-slate-500 dark:text-slate-400 group-hover:text-orange-600 dark:group-hover:text-orange-400 transition-colors">Roles</div>
                                <div class="mt-1 text-2xl font-extrabold text-orange-500 dark:text-orange-400">Live</div>
                            </div>
                        </div>

                        <div class="group relative overflow-hidden rounded-xl border border-white/40 dark:border-white/10 bg-white/70 dark:bg-white/10 p-4 hover:-translate-y-1 hover:shadow-lg hover:border-rose-300/60 dark:hover:border-rose-500/40 transition-all duration-300 cursor-default">
                            {{-- Splash Effect --}}
                            <div class="absolute -right-6 -top-6 w-24 h-24 rounded-full blur-2xl opacity-40 bg-gradient-to-br from-rose-400 to-pink-400 group-hover:opacity-60 transition-opacity duration-300"></div>

                            <div class="relative z-10">
                                <div class="text-[11px] uppercase tracking-wide text-slate-500 dark:text-slate-400 group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors">Pipeline</div>
                                <div class="mt-1 text-2xl font-extrabold text-rose-600 dark:text-rose-400">Ready</div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            {{-- NEXT STEPS CHECKLIST --}}
            <section class="rounded-2xl border border-white/20 dark:border-white/10 bg-white/60 dark:bg-gray-900/35 backdrop-blur-xl p-6 sm:p-8 shadow-[0_10px_28px_-14px_rgba(0,0,0,0.35)] ring-1 ring-black/5">
                <h3 class="text-lg font-semibold tracking-tight text-slate-900 dark:text-slate-100">Next steps to build momentum</h3>
                <ul class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-3 text-[0.95rem] text-slate-700 dark:text-slate-300">
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 mt-0.5 text-indigo-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Browse openings and shortlist 3 roles to focus on today.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 mt-0.5 text-indigo-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Polish one job description for clarity and requirements.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 mt-0.5 text-indigo-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Set a fair range: add or review salary info for transparency.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 mt-0.5 text-indigo-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Share a role with a colleague or candidate for feedback.</span>
                    </li>
                </ul>

                <div class="mt-5 flex flex-wrap items-center gap-3">
                    <a href="{{ url('/showingjobspage') }}"
                       class="inline-flex items-center h-10 rounded-full px-5 text-sm font-semibold text-white bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 transition">
                        Start Now
                    </a>
                    <a href="{{ route('jobs.create') }}"
                       class="inline-flex items-center h-10 rounded-full px-5 text-sm font-medium text-slate-800 dark:text-slate-100 border border-white/30 bg-white/60 dark:bg-gray-900/50 hover:bg-white/80 dark:hover:bg-gray-900/70 transition">
                        Add a Role
                    </a>
                </div>
            </section>

            {{-- RECENT JOBS TEASER (optional, shows if you pass $recentJobs) --}}
            @isset($recentJobs)
            @if($recentJobs->count())
            <section class="rounded-2xl border border-white/20 dark:border-white/10 bg-white/60 dark:bg-gray-900/35 backdrop-blur-xl p-6 sm:p-8 shadow-[0_10px_28px_-14px_rgba(0,0,0,0.35)] ring-1 ring-black/5">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold tracking-tight text-slate-900 dark:text-slate-100">Recently added</h3>
                    <a href="{{ url('/showingjobspage') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">See all</a>
                </div>
                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($recentJobs as $job)
                        <a href="{{ route('jobs.show', $job->id) }}"
                           class="group rounded-xl border border-white/30 dark:border-white/10 bg-white/70 dark:bg-gray-800/40 backdrop-blur-xl p-4 shadow hover:shadow-lg transition">
                            <div class="flex items-start justify-between gap-3">
                                <h4 class="text-sm font-semibold text-slate-900 dark:text-slate-100 line-clamp-2">
                                    {{ $job->title }}
                                </h4>
                                <span class="text-[11px] text-slate-500 dark:text-slate-400 whitespace-nowrap">
                                    {{ optional($job->created_at)->diffForHumans() }}
                                </span>
                            </div>
                            <p class="mt-2 text-xs text-slate-600 dark:text-slate-400 flex items-center">
                                <svg class="w-3.5 h-3.5 mr-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $job->location }} • {{ ucfirst($job->employment_type) }}
                            </p>
                            <p class="mt-1 text-xs text-slate-600 dark:text-slate-400 line-clamp-2">
                                {{ $job->description ?: 'No description provided.' }}
                            </p>
                        </a>
                    @endforeach
                </div>
            </section>
            @endif
            @endisset

            {{-- TESTIMONIAL / ENCOURAGEMENT CARD --}}
            <section class="rounded-2xl border border-dashed border-white/30 dark:border-white/10 bg-white/50 dark:bg-gray-900/30 backdrop-blur-xl p-6 sm:p-8">
                <figure class="max-w-3xl">
                    <blockquote class="text-[1.05rem] leading-7 text-slate-800 dark:text-slate-200">
                        “Consistent, small improvements beat random bursts. One clear job post, one solid shortlist, one thoughtful message —
                        that’s how great teams and careers are built.”
                    </blockquote>
                    <figcaption class="mt-3 text-sm text-slate-600 dark:text-slate-400">— Your friendly dashboard</figcaption>
                </figure>
            </section>
        </div>
    </div>

    {{-- Shortcuts: press "J" to go to Jobs --}}
    <script>
        document.addEventListener('keydown', (e) => {
            if ((e.key === 'j' || e.key === 'J') && !e.target.matches('input, textarea')) {
                window.location.href = @json(url('/showingjobspage'));
            }
        });
    </script>
</x-app-layout>
