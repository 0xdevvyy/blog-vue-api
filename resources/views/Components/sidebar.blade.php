<div id="sidebarOverlay"
    class="fixed inset-0 bg-black/50 backdrop-blur-sm z-20 hidden lg:hidden opacity-0 transition-all duration-300"
    onclick="toggleSidebar()">
</div>

<aside id="sidebar"
    class="fixed lg:relative inset-y-0 left-0 z-30
    w-72 h-screen
    bg-card
    border-r border-border
    flex flex-col
    transform -translate-x-full lg:translate-x-0
    transition-all duration-300">

    <!-- Logo -->
    <div class="relative border-b border-border p-6">

        <div class="absolute inset-0 bg-gradient-to-r from-primary/10 via-primary/5 to-transparent">
        </div>

        <div class="relative flex justify-center">
            <a href="{{ route('auth.dashboard') }}"
                class="flex items-center justify-center">

                <img
                    src="{{ asset('build/assets/img/surveyor-logo-dark.png') }}"
                    class="dark:hidden h-20 object-contain">

                <img
                    src="{{ asset('build/assets/img/surveyor-logo.png') }}"
                    class="hidden dark:block h-20 object-contain">
            </a>
        </div>

    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto px-4 py-6">

        <!-- Dashboard -->
        <div class="mb-8">

            <h3 class="sidebar-section">
                Dashboard
            </h3>

            <div class="space-y-2">

                <x-sidebar-links
                    title="dashboard"
                    url="auth.dashboard">

                    <x-icons.post />

                </x-sidebar-links>

            
            </div>

        </div>

    </nav>

    <form method="POST" action="{{ route('session.destroy') }}">
        @csrf
        <div class="p-4 border-t border-border">

        <button class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"></path>
                </svg>
                <span>Log Out</span>
            </button>

        </div>
    </form>

</aside>