{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    {{-- Page hero with subtle grid/aurora background (pure Tailwind, no extra deps) --}}
    <x-slot name="header">
        <div class="relative overflow-hidden rounded-2xl p-6">
            {{-- Background layers --}}
            <div aria-hidden="true">
                <div class="pointer-events-none absolute inset-0 -z-10">
                    {{-- grid pattern --}}
                    <div class="absolute inset-0 opacity-[0.08] [mask-image:radial-gradient(60%_60%_at_50%_0%,black,transparent)]">
                        <div class="absolute inset-0 [background-image:linear-gradient(to_right,rgba(0,0,0,.15)_1px,transparent_1px),linear-gradient(to_bottom,rgba(0,0,0,.15)_1px,transparent_1px)] [background-size:24px_24px] dark:[background-image:linear-gradient(to_right,rgba(255,255,255,.15)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.15)_1px,transparent_1px)]"></div>
                    </div>
                    {{-- aurora glow --}}
                    <div class="absolute -top-24 right-0 h-64 w-64 rounded-full blur-3xl opacity-40 bg-gradient-to-tr from-fuchsia-400 via-purple-400 to-sky-400"></div>
                    <div class="absolute -bottom-20 -left-10 h-64 w-64 rounded-full blur-3xl opacity-40 bg-gradient-to-tr from-amber-300 via-rose-400 to-pink-500"></div>
                </div>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h2 class="font-semibold text-3xl tracking-tight bg-gradient-to-r from-fuchsia-400 via-pink-500 to-orange-400 bg-clip-text text-transparent">
                        {{ __('Dashboard') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Handpick, polish, and publish your open roles.
                    </p>
                </div>

                <div class="flex items-center gap-2">
                    {{-- (Optional) quick search; harmless without backend --}}
   {{-- Enhanced Quick Search (button on the left, longer input, softer colors; no native clear) --}}
<form method="GET" action="{{ url()->current() }}" class="hidden md:flex items-center gap-2 relative">
    {{-- Submit button on the LEFT --}}
    <button type="submit"
            class="inline-flex items-center justify-center h-9 px-4 rounded-full text-sm font-medium text-white
                   bg-gradient-to-r from-indigo-600 to-slate-700 hover:from-indigo-700 hover:to-slate-800
                   focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-indigo-500 transition">
        🔍 Search
    </button>

    <div class="relative">
        {{-- Use type="text" to avoid the browser's built-in blue ✕ for type="search" --}}
        <input
            id="q"
            name="q"
            type="text"
            inputmode="search"
            enterkeyhint="search"
            value="{{ request('q') }}"
            placeholder="Search jobs…"
            class="h-9 w-80 lg:w-96 pr-8 rounded-full border
                   border-slate-300/70 dark:border-slate-700/70
                   bg-slate-50/80 dark:bg-slate-900/40 backdrop-blur
                   px-3 text-sm text-slate-800 dark:text-slate-100 placeholder:text-slate-400
                   focus:outline-none focus:ring-2 focus:ring-indigo-500/70 transition"
        />

        {{-- Single red ❌ clear button — appears only when a search is active --}}
        @if(request('q'))
            <button type="button"
                    onclick="window.location='{{ url()->current() }}'"
                    aria-label="Clear search"
                    class="absolute right-2 top-1/2 -translate-y-1/2 text-[13px] leading-none
                           text-red-500 hover:text-red-600 dark:hover:text-red-400
                           focus:outline-none select-none">
                ❌
            </button>
        @endif
    </div>
</form>




                    <a href="{{ route('jobs.create') }}"
                       class="inline-flex items-center gap-2 h-9 px-4 rounded-full text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-purple-500 transition">
                        <span class="text-base leading-none">➕</span>
                        <span>Add Job</span>
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- Shell card --}}
            <section class="rounded-2xl border border-white/20 dark:border-white/10 bg-white/60 dark:bg-gray-900/30 backdrop-blur-xl shadow-[0_12px_35px_-12px_rgba(0,0,0,0.35)] ring-1 ring-black/5">
                {{-- Toolbar --}}
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between p-5 border-b border-white/30 dark:border-white/10">
                    <div class="space-y-0.5">
                        <h3 class="text-xl sm:text-2xl font-semibold tracking-tight text-gray-900 dark:text-gray-100">Available Jobs</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Browse, update, or remove listings.</p>
                    </div>

                    <div class="flex items-center gap-2">
                        {{-- Sort (no JS needed; safe without jobs.index route) --}}
                        <form method="GET" action="{{ url()->current() }}" class="flex items-center">
                            <label for="sort" class="sr-only">Sort</label>
                            <select id="sort" name="sort" onchange="this.form.submit()"
                                    class="h-9 rounded-full border border-gray-300/60 dark:border-white/10 bg-white/80 dark:bg-gray-900/40 backdrop-blur px-3 text-sm text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500/70 transition">
                                <option value="">Sort by</option>
                                <option value="recent" @selected(request('sort')==='recent')>Most recent</option>
                                <option value="title" @selected(request('sort')==='title')>Title (A–Z)</option>
                                <option value="location" @selected(request('sort')==='location')>Location</option>
                            </select>
                            @if(request('q'))
                                <input type="hidden" name="q" value="{{ request('q') }}">
                            @endif
                        </form>
                    </div>
                </div>

                <div class="p-5">
                    @if ($jobs->isEmpty())
                        {{-- Empty state --}}
                        <div class="text-center py-16">
                            <img src="/assets/no-jobs.svg" alt="No jobs" class="mx-auto w-40 mb-6 opacity-90" />
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">No jobs yet</h4>
                            <p class="mt-1 text-gray-600 dark:text-gray-400">Create your first listing to get started.</p>
                            <a href="{{ route('jobs.create') }}"
                               class="mt-6 inline-flex items-center gap-2 px-4 py-2 rounded-full text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-purple-500 transition">
                                <span class="text-lg leading-none">➕</span>
                                <span class="text-sm font-medium">Add Job</span>
                            </a>
                        </div>
                    @else
                        {{-- Grid of cards --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($jobs as $job)
                                @php $titleId = 'job-title-'.$job->id; @endphp

                                <article
                                    role="link"
                                    tabindex="0"
                                    onclick="window.location.href='{{ route('jobs.show', $job->id) }}'"
                                    onkeydown="if(event.key==='Enter'||event.key===' '){ event.preventDefault(); window.location.href='{{ route('jobs.show', $job->id) }}'; }"
                                    aria-label="View details for {{ $job->title }}"
                                    aria-describedby="{{ $titleId }}"
                                    class="group relative overflow-hidden rounded-2xl border border-white/20 dark:border-white/10 bg-white/70 dark:bg-gray-800/40 backdrop-blur-xl shadow-[0_10px_30px_-14px_rgba(0,0,0,0.45)] transition
                                           motion-safe:hover:-translate-y-0.5 motion-safe:hover:shadow-[0_18px_40px_-16px_rgba(0,0,0,0.5)]
                                           focus-visible:ring-2 focus-visible:ring-purple-500/80 cursor-pointer outline-none">
                                    {{-- top accent line --}}
                                    <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-blue-500 via-violet-500 to-fuchsia-500 opacity-70"></div>

                                    <div class="p-5 flex flex-col h-full">
                                        <div class="flex items-start gap-3">
                                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-purple-500/20 to-blue-500/20 border border-white/20 dark:border-white/10">
                                                <span class="text-lg" aria-hidden="true">💼</span>
                                            </div>
                                            <div class="min-w-0">
                                                <h4 id="{{ $titleId }}" class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white line-clamp-2">
                                                    {{ $job->title }}
                                                </h4>
                                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                                    Listing ID: #{{ $job->id }}
                                                </p>
                                            </div>
                                        </div>

                                        {{-- Meta chips --}}
                                        <div class="mt-4 flex flex-wrap items-center gap-2">
                                            <span class="inline-flex items-center gap-1.5 rounded-full border border-white/30 dark:border-white/10 bg-white/60 dark:bg-white/10 px-2.5 py-1 text-xs text-gray-800 dark:text-gray-200">
                                                📍 <span class="truncate">{{ $job->location }}</span>
                                            </span>
                                            <span class="inline-flex items-center gap-1.5 rounded-full border border-white/30 dark:border-white/10 bg-white/60 dark:bg-white/10 px-2.5 py-1 text-xs text-gray-800 dark:text-gray-200">
                                                🕒 <span class="truncate">{{ ucfirst($job->employment_type) }}</span>
                                            </span>
                                        </div>

                                        {{-- Details --}}
                                        <dl class="mt-4 grid grid-cols-1 gap-2 text-sm text-gray-700 dark:text-gray-300">
                                            <div class="flex items-center gap-2">
                                                <dt class="text-base leading-none">🧠</dt>
                                                <dd class="truncate">Experience: {{ $job->experience_level ?? 'N/A' }}</dd>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <dt class="text-base leading-none">💰</dt>
                                                <dd class="truncate">Salary: {{ $job->salary ?? 'N/A' }}</dd>
                                            </div>
                                        </dl>

                                        {{-- Actions & Bookmark --}}
                                        <div class="mt-5 flex items-center justify-between gap-2">
                                            <div class="flex gap-2">
                                                <a href="{{ route('jobs.edit', $job->id) }}"
                                                onclick="event.stopPropagation();"
                                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-medium text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 transition">
                                                    ✏️ Edit
                                                </a>

                                                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" class="m-0" onsubmit="event.stopPropagation(); return confirm('Delete this job?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            onclick="event.stopPropagation();"
                                                            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-medium text-white bg-gradient-to-r from-rose-600 to-pink-600 hover:from-rose-700 hover:to-pink-700 transition">
                                                        🗑️
                                                    </button>
                                                </form>
                                            </div>

                                            {{-- Form Tombol Bookmark --}}
                                            @auth
                                                @php
                                                    $isBookmarked = auth()->user()->bookmarkedJobs->contains($job->id);
                                                @endphp
                                                <form action="{{ route('jobs.bookmark', $job->id) }}" method="POST" class="m-0" onsubmit="event.stopPropagation();">
                                                    @csrf
                                                    <button type="submit"
                                                            onclick="event.stopPropagation();"
                                                            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-medium transition
                                                            {{ $isBookmarked ? 'bg-amber-100 text-amber-700 border border-amber-300 dark:bg-amber-500/20 dark:text-amber-300 dark:border-amber-500/30' : 'bg-gray-100 text-gray-700 border border-gray-300 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-700 dark:hover:bg-gray-700' }}">
                                                        {{ $isBookmarked ? '⭐ Saved' : '☆ Save' }}
                                                    </button>
                                                </form>
                                            @endauth
                                        </div>

                                    {{-- soft spotlight on hover --}}
                                    <div class="pointer-events-none absolute inset-0 opacity-0 group-hover:opacity-100 transition
                                                bg-[radial-gradient(500px_circle_at_var(--x,50%)_var(--y,50%),rgba(168,85,247,0.10),transparent_60%)]"></div>
                                </article>
                            @endforeach
                        </div>

                        {{-- Pagination --}}
                        <div class="mt-8 flex items-center justify-between flex-wrap gap-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                @if($jobs->total() > 0)
                                    Showing
                                    <span class="font-medium text-gray-800 dark:text-gray-200">{{ $jobs->firstItem() }}</span>–
                                    <span class="font-medium text-gray-800 dark:text-gray-200">{{ $jobs->lastItem() }}</span>
                                    of
                                    <span class="font-medium text-gray-800 dark:text-gray-200">{{ $jobs->total() }}</span>
                                    jobs
                                @else
                                    No jobs found.
                                @endif
                            </p>
                            <div class="w-full sm:w-auto flex justify-end">
                                {{-- Use your custom elegant pagination --}}
                                {{ $jobs->onEachSide(1)->links('vendor.pagination.modern') }}
                            </div>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </div>

    {{-- Floating Add button for mobile --}}
    <a href="{{ route('jobs.create') }}"
       class="sm:hidden fixed bottom-6 right-6 inline-flex items-center justify-center w-14 h-14 rounded-full text-white bg-gradient-to-r from-blue-600 to-purple-600 shadow-lg hover:scale-105 active:scale-95 transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-purple-500 z-50"
       aria-label="Add Job">
        ➕
    </a>

    {{-- Optional: cursor-follow glow (respects reduced motion) --}}
    <script>
        const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (!prefersReduced) {
            document.addEventListener('mousemove', (e) => {
                document.querySelectorAll('article.group').forEach(card => {
                    const r = card.getBoundingClientRect();
                    const x = e.clientX - r.left;
                    const y = e.clientY - r.top;
                    card.style.setProperty('--x', `${x}px`);
                    card.style.setProperty('--y', `${y}px`);
                });
            });
        }
    </script>
</x-app-layout>
