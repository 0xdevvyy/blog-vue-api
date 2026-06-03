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

    <!-- User Profile -->
    <div class="p-4 border-t border-border">

        <div class="bg-background rounded-3xl border border-border p-4">

            <div class="flex items-center gap-3">

                <img
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop"
                    class="w-12 h-12 rounded-2xl object-cover">

                <div class="flex-1 min-w-0">

                    <p class="font-semibold text-foreground truncate">
                        Data Analyst
                    </p>

                    <p class="text-sm text-muted-foreground truncate">
                        analyst@company.com
                    </p>

                </div>

                <button
                    class="p-2 rounded-xl hover:bg-muted transition-colors">

                    <i data-lucide="log-out"
                        class="w-4 h-4 text-muted-foreground">
                    </i>

                </button>

            </div>

        </div>

    </div>

</aside>