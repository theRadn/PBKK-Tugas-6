<header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-100 dark:bg-slate-950/90 dark:border-slate-800 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">

        <!-- Navigation Links -->
        <nav class="mx-auto">
            <ul class="flex items-center space-x-8 text-sm font-semibold">
                <li>
                    <a href="{{ route('beranda') }}"
                        class="py-2 transition duration-200 {{ request()->routeIs('beranda') ? 'text-[#0055B8] border-b-2 border-[#0055B8] font-bold dark:text-blue-400 dark:border-blue-400' : 'text-slate-600 hover:text-blue-400 dark:text-slate-400 dark:hover:text-blue-400' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('mahasiswa.detail') }}"
                        class="py-2 transition duration-200 {{ request()->routeIs('mahasiswa.detail') ? 'text-[#0055B8] border-b-2 border-[#0055B8] font-bold dark:text-blue-400 dark:border-blue-400' : 'text-slate-600 hover:text-blue-400 dark:text-slate-400 dark:hover:text-blue-400' }}">
                        Profile
                    </a>
                </li>
                <li>
                    <a href="{{ route('agent.idea') }}"
                        class="py-2 transition duration-200 {{ request()->routeIs('agent.idea') ? 'text-[#0055B8] border-b-2 border-[#0055B8] font-bold dark:text-blue-400 dark:border-blue-400' : 'text-slate-600 hover:text-blue-400 dark:text-slate-400 dark:hover:text-blue-400' }}">
                        Agent
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Dark/Light Mode Toggle Button -->
        <div class="absolute right-4 sm:right-8">
            <button onclick="toggleTheme()"
                class="p-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700 transition flex items-center justify-center w-10 h-10 shadow-sm"
                title="Toggle Dark/Light Mode">
                <!-- Moon icon shows in Light mode -->
                <i class="fa-solid fa-moon dark:hidden text-sm"></i>
                <!-- Sun icon shows in Dark mode -->
                <i class="fa-solid fa-sun hidden dark:block text-amber-400 text-sm"></i>
            </button>
        </div>

    </div>
</header>

<script>
    function toggleTheme() {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    }
</script>
