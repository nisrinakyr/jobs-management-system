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

            {{-- Bagian Update Info Profil --}}
            <div class="p-6 sm:p-8 rounded-2xl border border-white/20 dark:border-white/10 bg-white/60 dark:bg-gray-900/30 backdrop-blur-xl shadow-[0_8px_30px_-12px_rgba(0,0,0,0.3)] ring-1 ring-black/5">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Bagian Update Password --}}
            <div class="p-6 sm:p-8 rounded-2xl border border-white/20 dark:border-white/10 bg-white/60 dark:bg-gray-900/30 backdrop-blur-xl shadow-[0_8px_30px_-12px_rgba(0,0,0,0.3)] ring-1 ring-black/5">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Bagian Hapus Akun --}}
            <div class="p-6 sm:p-8 rounded-2xl border border-white/20 dark:border-white/10 bg-white/60 dark:bg-gray-900/30 backdrop-blur-xl shadow-[0_8px_30px_-12px_rgba(0,0,0,0.3)] ring-1 ring-black/5">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
