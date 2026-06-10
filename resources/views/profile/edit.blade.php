<x-app-layout>
    <x-slot name="header">
        <div class="rounded-xl px-4 py-3 relative overflow-hidden">
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
                <div class="absolute inset-0 opacity-[0.06] [mask-image:radial-gradient(60%_60%_at_50%_0%,black,transparent)]">
                    <div class="absolute inset-0 [background-image:linear-gradient(to_right,rgba(0,0,0,.12)_1px,transparent_1px),linear-gradient(to_bottom,rgba(0,0,0,.12)_1px,transparent_1px)] [background-size:20px_20px] dark:[background-image:linear-gradient(to_right,rgba(255,255,255,.12)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.12)_1px,transparent_1px)]"></div>
                </div>
                <div class="absolute -top-10 right-0 h-40 w-40 rounded-full blur-2xl opacity-25 bg-gradient-to-tr from-slate-200 to-indigo-200 dark:from-gray-800 dark:to-indigo-900"></div>
            </div>

            <h2 class="font-semibold text-[1.35rem] tracking-tight text-slate-800 dark:text-slate-100">
                My Profile
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- List Lowongan yang Di-bookmark --}}
            <div class="p-6 sm:p-8 rounded-2xl border border-white/20 dark:border-white/10 bg-white/60 dark:bg-gray-900/30 backdrop-blur-xl shadow-[0_8px_30px_-12px_rgba(0,0,0,0.3)] ring-1 ring-black/5">
                <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white flex items-center gap-2">
                    ⭐ Saved Jobs
                </h3>

                @if($bookmarkedJobs->isEmpty())
                    <p class="text-sm text-gray-500 dark:text-gray-400 italic">You haven't bookmarked any jobs yet.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($bookmarkedJobs as $job)
                            <a href="{{ route('jobs.show', $job->id) }}" class="block p-4 rounded-xl border border-gray-200/60 dark:border-gray-700/50 bg-white/50 dark:bg-gray-800/40 hover:bg-white dark:hover:bg-gray-800/80 transition shadow-sm group">
                                <h4 class="font-semibold text-indigo-600 dark:text-indigo-400 group-hover:underline">{{ $job->title }}</h4>
                                <div class="mt-2 text-xs text-gray-600 dark:text-gray-400 flex items-center gap-4">
                                    <span>📍 {{ $job->location }}</span>
                                    <span>💼 {{ ucfirst($job->employment_type) }}</span>
                                    @if($job->salary)
                                        <span>💰 {{ $job->currency ?? 'IDR' }} {{ number_format($job->salary, 0, ',', '.') }}</span>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Bagian Update Info Profil Bawaan Laravel --}}
            <div class="p-6 sm:p-8 rounded-2xl border border-white/20 dark:border-white/10 bg-white/60 dark:bg-gray-900/30 backdrop-blur-xl shadow-[0_8px_30px_-12px_rgba(0,0,0,0.3)] ring-1 ring-black/5">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Bagian Update Password Bawaan Laravel --}}
            <div class="p-6 sm:p-8 rounded-2xl border border-white/20 dark:border-white/10 bg-white/60 dark:bg-gray-900/30 backdrop-blur-xl shadow-[0_8px_30px_-12px_rgba(0,0,0,0.3)] ring-1 ring-black/5">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Bagian Hapus Akun Bawaan Laravel --}}
            <div class="p-6 sm:p-8 rounded-2xl border border-white/20 dark:border-white/10 bg-white/60 dark:bg-gray-900/30 backdrop-blur-xl shadow-[0_8px_30px_-12px_rgba(0,0,0,0.3)] ring-1 ring-black/5">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
