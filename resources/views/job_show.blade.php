{{-- resources/views/jobs/show.blade.php --}}
<x-app-layout>
   {{-- Short, subtle header --}}
<x-slot name="header">
    <div class="rounded-xl px-4 py-1 relative overflow-hidden">
        <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute inset-0 opacity-[0.06] [mask-image:radial-gradient(60%_60%_at_50%_0%,black,transparent)]">
                <div class="absolute inset-0 [background-image:linear-gradient(to_right,rgba(0,0,0,.12)_1px,transparent_1px),linear-gradient(to_bottom,rgba(0,0,0,.12)_1px,transparent_1px)] [background-size:20px_20px] dark:[background-image:linear-gradient(to_right,rgba(255,255,255,.12)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.12)_1px,transparent_1px)]"></div>
            </div>
            <div class="absolute -top-10 right-0 h-40 w-40 rounded-full blur-2xl opacity-25 bg-gradient-to-tr from-slate-300 to-indigo-200 dark:from-gray-800 dark:to-indigo-900"></div>
        </div>

        <div class="flex items-center justify-between gap-3">
            <div class="min-w-0">
                <h2 class="text-[1.25rem] sm:text-[1.35rem] font-semibold tracking-tight text-sky-700 dark:text-sky-600 truncate">
                    {{ $job->title }}
                </h2>

                <div class="mt-2 flex flex-wrap items-center gap-2">
                    <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-medium text-slate-700 dark:text-slate-200 bg-slate-200/70 dark:bg-slate-700/40">
                        📍 {{ $job->location }}
                    </span>

                    <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-medium text-slate-700 dark:text-slate-200 bg-slate-200/70 dark:bg-slate-700/40">
                        💼 {{ ucfirst($job->employment_type) }}
                    </span>

                    <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-medium text-slate-700 dark:text-slate-200 bg-slate-200/70 dark:bg-slate-700/40">
                        🏢 {{ ucfirst($job->work_mode ?? 'On-site') }}
                    </span>

                    @if($job->experience_level)
                        <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-medium text-slate-700 dark:text-slate-200 bg-slate-200/70 dark:bg-slate-700/40">
                            🧠 {{ $job->experience_level }}
                        </span>
                    @endif

                    @if ($job->created_at)
                        <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-medium text-slate-700 dark:text-slate-200 bg-slate-200/70 dark:bg-slate-700/40">
                            ⏰ Posted {{ $job->created_at->diffForHumans() }}
                        </span>
                    @endif
                </div>
            </div>

            <div class="flex items-center gap-2 shrink-0">
                <button type="button"
                        onclick="copyJobLink()"
                        class="inline-flex items-center gap-2 h-8 px-3 rounded-full text-xs font-medium text-slate-800 dark:text-slate-100 border border-white/25 bg-white/50 dark:bg-gray-900/40 hover:bg-white/70 dark:hover:bg-gray-900/60 transition">
                    🔗 Copy link
                </button>

                <a href="{{ route('jobs.edit', $job->id) }}"
                   class="inline-flex items-center gap-2 h-8 px-3 rounded-full text-xs font-medium text-white bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 transition">
                    ✏️ Edit
                </a>

                <a href="{{ route('home') }}"
                   class="hidden sm:inline-flex items-center gap-2 h-8 px-3 rounded-full text-xs font-medium text-slate-800 dark:text-slate-100 border border-white/25 bg-white/50 dark:bg-gray-900/40 hover:bg-white/70 dark:hover:bg-gray-900/60 transition">
                    ← Back
                </a>
            </div>
        </div>
    </div>
</x-slot>

    {{-- Main --}}
    <div class="py-6">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Left: Role Overview (Murni dari Database) --}}
            <section class="lg:col-span-2 rounded-2xl border border-white/20 dark:border-white/10 bg-white/70 dark:bg-gray-900/35 backdrop-blur-xl p-6 sm:p-8 shadow-[0_10px_28px_-14px_rgba(0,0,0,0.35)] ring-1 ring-black/5">
                <h3 class="text-lg font-semibold tracking-tight text-slate-800 dark:text-slate-100">Job Description</h3>

                <div class="mt-4 text-[0.95rem] leading-7 text-slate-700 dark:text-slate-300">
                    @if($job->description)
                        {{-- Fitur nl2br buat ngebaca enter/baris baru dari form --}}
                        <p>{!! nl2br(e($job->description)) !!}</p>
                    @else
                        <p class="italic text-slate-500">No description provided for this role.</p>
                    @endif
                </div>

                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                    <div class="rounded-lg border border-white/20 dark:border-white/10 bg-white/60 dark:bg-white/10 px-3 py-2">
                        <div class="text-slate-600 dark:text-slate-400">Experience Level</div>
                        <div class="font-medium text-slate-800 dark:text-slate-100">{{ $job->experience_level ?: 'Not specified' }}</div>
                    </div>
                    <div class="rounded-lg border border-white/20 dark:border-white/10 bg-white/60 dark:bg-white/10 px-3 py-2">
                        <div class="text-slate-600 dark:text-slate-400">Compensation</div>
                        <div class="font-medium text-slate-800 dark:text-slate-100">
                            {{ $job->salary ? ($job->currency ?? 'IDR') . ' ' . number_format($job->salary, 2) . ' / month' : 'Not specified' }}
                        </div>
                    </div>
                </div>
            </section>

            {{-- Right: Snapshot & actions --}}
            <aside class="lg:col-span-1 space-y-6">
                <div class="rounded-2xl border border-white/20 dark:border-white/10 bg-white/70 dark:bg-gray-800/40 backdrop-blur-xl p-6 shadow-[0_10px_30px_-14px_rgba(0,0,0,0.45)]">
                    <h4 class="text-sm font-semibold uppercase tracking-wider text-slate-700 dark:text-slate-300">Snapshot</h4>
                    <dl class="mt-3 space-y-3 text-sm text-slate-800 dark:text-slate-200">
                        <div class="flex items-center justify-between gap-4">
                            <dt class="text-slate-600 dark:text-slate-400">Employment</dt>
                            <dd class="font-medium">{{ ucfirst($job->employment_type) }}</dd>
                        </div>
                        <div class="flex items-center justify-between gap-4">
                            <dt class="text-slate-600 dark:text-slate-400">Work Mode</dt>
                            <dd class="font-medium">{{ ucfirst($job->work_mode ?? 'On-site') }}</dd>
                        </div>
                        <div class="flex items-center justify-between gap-4">
                            <dt class="text-slate-600 dark:text-slate-400">Location</dt>
                            <dd class="font-medium">{{ $job->location }}</dd>
                        </div>
                        <div class="flex items-center justify-between gap-4">
                            <dt class="text-slate-600 dark:text-slate-400">Experience</dt>
                            <dd class="font-medium">{{ $job->experience_level ?: 'Not specified' }}</dd>
                        </div>
                        <div class="flex items-center justify-between gap-4">
                            <dt class="text-slate-600 dark:text-slate-400">Salary</dt>
                            <dd class="font-medium">
                                {{ $job->salary ? ($job->currency ?? 'IDR') . ' ' . number_format($job->salary, 2) : 'Not specified' }}
                            </dd>
                        </div>
                        @if($job->updated_at)
                            <div class="flex items-center justify-between gap-4">
                                <dt class="text-slate-600 dark:text-slate-400">Updated</dt>
                                <dd class="font-medium">{{ $job->updated_at->diffForHumans() }}</dd>
                            </div>
                        @endif
                        <div class="flex items-center justify-between gap-4">
                            <dt class="text-slate-600 dark:text-slate-400">Listing ID</dt>
                            <dd class="font-medium">#{{ $job->id }}</dd>
                        </div>
                    </dl>

                    <div class="mt-6 grid grid-cols-1 gap-2">
                        <a href="{{ route('jobs.edit', $job->id) }}"
                           class="inline-flex items-center justify-center gap-2 h-10 rounded-full text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 transition">
                            ✏️ Edit job
                        </a>
                        <a href="{{ route('home') }}"
                           class="inline-flex items-center justify-center gap-2 h-10 rounded-full text-sm font-medium text-slate-800 dark:text-slate-100 border border-white/25 bg-white/50 dark:bg-gray-900/40 hover:bg-white/70 dark:hover:bg-gray-900/60 transition">
                            ← Back to jobs
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    {{-- Utilities --}}
    <script>
        function copyJobLink() {
            const url = window.location.href;
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(url).then(() => flashCopied());
            } else {
                const ta = document.createElement('textarea');
                ta.value = url; document.body.appendChild(ta); ta.select();
                try { document.execCommand('copy'); } finally { document.body.removeChild(ta); flashCopied(); }
            }
        }
        function flashCopied(){
            const btns = document.querySelectorAll('button[onclick="copyJobLink()"]');
            btns.forEach(btn => {
                const original = btn.innerHTML;
                btn.innerHTML = '✅ Copied';
                setTimeout(() => btn.innerHTML = '🔗 Copy link', 1100);
            });
        }
    </script>
</x-app-layout>
