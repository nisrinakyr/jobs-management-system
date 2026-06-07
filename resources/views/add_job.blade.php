{{-- resources/views/jobs/create.blade.php --}}
<x-app-layout>
    {{-- Subtle header (short, calm) --}}
    <x-slot name="header">
        <div class="rounded-xl px-4 py-3 relative overflow-hidden">
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
                <div class="absolute inset-0 opacity-[0.06] [mask-image:radial-gradient(60%_60%_at_50%_0%,black,transparent)]">
                    <div class="absolute inset-0 [background-image:linear-gradient(to_right,rgba(0,0,0,.12)_1px,transparent_1px),linear-gradient(to_bottom,rgba(0,0,0,.12)_1px,transparent_1px)] [background-size:20px_20px] dark:[background-image:linear-gradient(to_right,rgba(255,255,255,.12)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.12)_1px,transparent_1px)]"></div>
                </div>
                <div class="absolute -top-10 right-0 h-40 w-40 rounded-full blur-2xl opacity-25 bg-gradient-to-tr from-slate-200 to-indigo-200 dark:from-gray-800 dark:to-indigo-900"></div>
            </div>

            <h2 class="font-semibold text-[1.35rem] tracking-tight text-slate-800 dark:text-slate-100">
                Add a New Job
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Shell --}}
            <section class="rounded-2xl border border-white/20 dark:border-white/10 bg-white/60 dark:bg-gray-900/30 backdrop-blur-xl shadow-[0_12px_35px_-12px_rgba(0,0,0,0.35)] ring-1 ring-black/5">
                <form action="{{ route('jobs.store') }}" method="POST" class="p-6 lg:p-8 space-y-8">
                    @csrf

                    {{-- Validation summary --}}
                    @if ($errors->any())
                        <div class="rounded-xl border border-rose-500/30 bg-rose-500/10 p-4 text-rose-600 dark:text-rose-400">
                            <div class="font-semibold mb-1">Please fix the following:</div>
                            <ul class="list-disc list-inside space-y-0.5 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Basics --}}
                    <div>
                        <h3 class="text-lg font-semibold tracking-tight text-slate-900 dark:text-slate-100">Basics</h3>
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                            {{-- Title --}}
                            <div>
                                <label for="title" class="block text-sm font-medium text-slate-800 dark:text-slate-200">
                                    Job Title <span class="text-rose-500">*</span>
                                </label>
                                <input
                                    id="title"
                                    type="text"
                                    name="title"
                                    value="{{ old('title') }}"
                                    required
                                    placeholder="e.g., Senior Backend Engineer"
                                    class="mt-1 w-full rounded-lg bg-white/70 dark:bg-gray-800/40 border border-white/30 dark:border-white/10 px-3 py-2.5 text-gray-900 dark:text-gray-100 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/70 transition"
                                />
                                @error('title')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Location --}}
                            <div>
                                <label for="location" class="block text-sm font-medium text-slate-800 dark:text-slate-200">
                                    Location <span class="text-rose-500">*</span>
                                </label>
                                <input
                                    id="location"
                                    type="text"
                                    name="location"
                                    value="{{ old('location') }}"
                                    required
                                    placeholder="e.g., Singapore"
                                    class="mt-1 w-full rounded-lg bg-white/70 dark:bg-gray-800/40 border border-white/30 dark:border-white/10 px-3 py-2.5 text-gray-900 dark:text-gray-100 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/70 transition"
                                />
                                @error('location')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Work Mode --}}
                            <div>
                                <label for="work_mode" class="block text-sm font-medium text-slate-800 dark:text-slate-200">
                                    Work Mode <span class="text-rose-500">*</span>
                                </label>
                                <select
                                    id="work_mode"
                                    name="work_mode"
                                    required
                                    class="mt-1 w-full rounded-lg bg-white/70 dark:bg-gray-800/40 border border-white/30 dark:border-white/10 px-3 py-2.5 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/70 transition"
                                >
                                    <option value="" disabled @selected(!old('work_mode'))>Select work mode</option>
                                    <option value="on-site" @selected(old('work_mode') === 'on-site')>On-site</option>
                                    <option value="hybrid" @selected(old('work_mode') === 'hybrid')>Hybrid</option>
                                    <option value="remote" @selected(old('work_mode') === 'remote')>Remote</option>
                                </select>
                                @error('work_mode')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Employment Type --}}
                            <div>
                                <label for="employment_type" class="block text-sm font-medium text-slate-800 dark:text-slate-200">
                                    Employment Type <span class="text-rose-500">*</span>
                                </label>
                                <select
                                    id="employment_type"
                                    name="employment_type"
                                    required
                                    class="mt-1 w-full rounded-lg bg-white/70 dark:bg-gray-800/40 border border-white/30 dark:border-white/10 px-3 py-2.5 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/70 transition"
                                >
                                    @foreach (['full-time','part-time','contract','freelance'] as $type)
                                        <option value="{{ $type }}" @selected(old('employment_type') === $type)>{{ ucfirst($type) }}</option>
                                    @endforeach
                                </select>
                                @error('employment_type')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Salary --}}
                            <div>
                                <label for="salary" class="block text-sm font-medium text-slate-800 dark:text-slate-200">
                                    Salary (optional)
                                </label>
                                <div class="mt-1 flex rounded-lg shadow-sm">
                                    <select
                                        id="currency"
                                        name="currency"
                                        class="w-1/3 min-w-[80px] rounded-l-lg bg-white/70 dark:bg-gray-800/40 border border-r-0 border-white/30 dark:border-white/10 pl-3 pr-8 py-2.5 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/70 transition"
                                    >
                                        <option value="IDR" @selected(old('currency', 'IDR') === 'IDR')>IDR</option>
                                        <option value="USD" @selected(old('currency') === 'USD')>USD</option>
                                        <option value="SGD" @selected(old('currency') === 'SGD')>SGD</option>
                                        <option value="EUR" @selected(old('currency') === 'EUR')>EUR</option>
                                    </select>
                                    <div class="relative flex-grow">
                                        <input
                                            id="salary"
                                            type="number"
                                            step="0.01"
                                            name="salary"
                                            value="{{ old('salary') }}"
                                            placeholder="e.g., 6500"
                                            class="w-full rounded-r-lg bg-white/70 dark:bg-gray-800/40 border border-white/30 dark:border-white/10 px-3 py-2.5 text-gray-900 dark:text-gray-100 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/70 transition"
                                        />
                                        <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-xs text-gray-500">/month</span>
                                    </div>
                                </div>
                                @error('currency')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                                @error('salary')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                    {{-- Experience --}}
                    <div>
                        <h3 class="text-lg font-semibold tracking-tight text-slate-900 dark:text-slate-100">Experience</h3>
                        <input
                            id="experience_level"
                            type="text"
                            name="experience_level"
                            value="{{ old('experience_level') }}"
                            placeholder="e.g., 3+ years with Laravel / NestJS"
                            class="mt-2 w-full rounded-lg bg-white/70 dark:bg-gray-800/40 border border-white/30 dark:border-white/10 px-3 py-2.5 text-gray-900 dark:text-gray-100 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/70 transition"
                        />
                        @error('experience_level')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div>
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold tracking-tight text-slate-900 dark:text-slate-100">Description</h3>
                            <span id="desc-count" class="text-xs text-slate-500"></span>
                        </div>
                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            placeholder="Write a concise role summary, responsibilities, requirements, and benefits…"
                            class="mt-3 w-full rounded-xl bg-white/70 dark:bg-gray-800/40 border border-white/30 dark:border-white/10 px-3 py-3 text-gray-900 dark:text-gray-100 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/70 transition"
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Under-fields note + actions --}}
                    <div class="pt-4 border-t border-white/20 dark:border-white/10 flex flex-col sm:flex-row items-center justify-between gap-3">
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            Fields marked with <span class="text-rose-500">*</span> are required.
                        </p>
                        <div class="flex items-center gap-3">
                            <a href="{{ url('/showingjobspage') }}"
                               class="inline-flex items-center justify-center h-10 px-4 rounded-full text-sm font-medium text-slate-800 dark:text-slate-100 border border-white/25 bg-white/40 dark:bg-gray-900/40 hover:bg-white/60 dark:hover:bg-gray-900/60 transition">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="inline-flex items-center justify-center h-10 px-5 rounded-full text-sm font-semibold text-white bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-indigo-500 transition">
                                ➕ Add Job
                            </button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>

    {{-- Tiny UX helpers --}}
    <script>
        // Live character counter for description
        const desc = document.getElementById('description');
        const counter = document.getElementById('desc-count');
        if (desc && counter) {
            const update = () => counter.textContent = `${desc.value.length} characters`;
            desc.addEventListener('input', update);
            update();
        }
    </script>
</x-app-layout>
