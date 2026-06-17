<!DOCTYPE html>
<html lang="en" class="antialiased dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Welcome</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

  {{-- Tailwind CDN (great for dev; switch to compiled Tailwind in prod) --}}
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = { darkMode: 'class' };
  </script>

  <style>
    @media (prefers-reduced-motion: no-preference) {
      @keyframes float {
        0% { transform: translateY(0) }
        50% { transform: translateY(-8px) }
        100% { transform: translateY(0) }
      }
      @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(24px) }
        to { opacity: 1; transform: translateY(0) }
      }
    }
    .animate-fadeInUp { animation: fadeInUp .8s ease-out forwards }
    .animate-float { animation: float 6s ease-in-out infinite }
  </style>
</head>

<body class="relative min-h-screen text-white bg-gradient-to-br from-gray-900 via-gray-900 to-black selection:bg-purple-500/30 selection:text-white">
  {{-- Background: soft grid + aurora glows --}}
  <div aria-hidden="true">
    <div class="pointer-events-none absolute inset-0 opacity-[0.08] [mask-image:radial-gradient(60%_60%_at_50%_35%,black,transparent)]">
      <div class="absolute inset-0
        [background-image:linear-gradient(to_right,rgba(255,255,255,.14)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.14)_1px,transparent_1px)]
        [background-size:24px_24px]"></div>
    </div>

    <div class="pointer-events-none absolute -top-24 -left-16 h-72 w-72 rounded-full blur-3xl bg-gradient-to-tr from-fuchsia-500 via-violet-500 to-sky-400 opacity-30 animate-float"></div>
    <div class="pointer-events-none absolute -bottom-24 -right-16 h-72 w-72 rounded-full blur-3xl bg-gradient-to-tr from-amber-300 via-rose-400 to-pink-500 opacity-25 animate-float" style="animation-delay:-3s"></div>
  </div>

  <main class="relative z-10 flex items-center justify-center px-4 py-16">
    <section class="w-full max-w-xl">
      {{-- Glass card --}}
      <div class="animate-fadeInUp rounded-2xl border border-white/15 bg-white/10 backdrop-blur-xl shadow-[0_20px_50px_-20px_rgba(0,0,0,0.5)] p-8 text-center space-y-6">
        {{-- Logo/Icon --}}
        <div class="flex justify-center">
          <div class="h-12 w-12 rounded-xl border border-white/20 bg-gradient-to-br from-purple-500/20 to-blue-500/20 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" role="img">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c-1.657 0-3-1.343-3-3V5h6v3c0 1.657-1.343 3-3 3zm-6 8h12a2 2 0 002-2v-5a2 2 0 00-2-2h-1V7a2 2 0 00-2-2h-4a2 2 0 00-2 2v3H6a2 2 0 00-2 2v5a2 2 0 002 2z"/>
            </svg>
          </div>
        </div>

        {{-- Headings --}}
        <div class="space-y-2">
          <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight bg-gradient-to-r from-fuchsia-400 via-pink-500 to-orange-400 bg-clip-text text-transparent">
            Welcome to Your Job Portal
          </h1>
          <h2 class="text-[15px] sm:text-lg font-medium text-gray-300">
            Crafted by Waleed
          </h2>
        </div>

        {{-- Subtext --}}
        <p class="text-[15px] sm:text-base leading-relaxed text-gray-300/90">
          Manage job listings with clarity and control. Whether you're hiring or applying, this portal keeps everything elegant and efficient.
        </p>

        {{-- CTAs --}}
        @guest
          <div class="space-y-3">
            <a href="{{ route('login') }}"
               class="group inline-flex w-full items-center justify-center gap-2 rounded-full px-4 py-2.5 text-[15px] sm:text-base font-semibold text-white
                      bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700
                      focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-purple-500 focus-visible:ring-offset-2 focus-visible:ring-offset-black transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -ml-1 transition-transform group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/>
              </svg>
              <span>Log In</span>
            </a>

            @if (Route::has('register'))
              <a href="{{ route('register') }}"
                 class="inline-flex w-full items-center justify-center rounded-full px-4 py-2.5 text-[15px] sm:text-base font-semibold text-gray-100
                        border border-white/20 hover:bg-white/10
                        focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-purple-500/70 focus-visible:ring-offset-2 focus-visible:ring-offset-black transition">
                Register
              </a>
            @endif
          </div>
        @else
          <a href="{{ url('/dashboard') }}"
             class="inline-flex items-center justify-center rounded-full px-6 py-2.5 text-[15px] sm:text-base font-semibold text-white
                    bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700
                    focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-purple-500 focus-visible:ring-offset-2 focus-visible:ring-offset-black transition">
            Go to Dashboard
          </a>
        @endguest
      </div>

      {{-- Optional tiny footer --}}
      <p class="mt-6 text-center text-xs text-gray-400/80">
        Tip: toggle <span class="font-medium text-gray-300">dark mode</span> via your OS or app settings—this page is tuned for both.
      </p>
    </section>
  </main>
</body>
</html>
