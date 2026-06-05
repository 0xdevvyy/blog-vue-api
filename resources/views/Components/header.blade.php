@props([
    'title',
    'description',
    'label',
    'buttonText' => null,
    'buttonUrl' => null,
])

<!-- Mobile Header -->
    <header class="lg:hidden flex items-center justify-between p-6">
        <div class="flex items-center gap-3">
            <button
                onclick="toggleSidebar()"
                class="flex h-11 w-11 items-center justify-center rounded-xl border border-border bg-card shadow-sm text-primary"
            >
                <x-icons.burger />
            </button>

            <h2 class="text-lg font-semibold text-primary">
                {{ $label }}
            </h2>
        </div>

        <button
            onclick="toggleDarkMode()"
            class="theme-toggle flex h-11 w-11 items-center justify-center rounded-xl border border-border bg-card shadow-sm text-primary"
        >
            <span class="light-icon">
                <x-icons.light />
            </span>

            <span class="dark-icon hidden">
                <x-icons.dark />
            </span>
        </button>
    </header>
<section class="relative overflow-hidden rounded-3xl border border-border bg-card mb-8">
    <div class="absolute inset-0 bg-gradient-to-r from-primary/10 via-primary/5 to-transparent"></div>

    <div class="absolute -top-20 -right-20 h-72 w-72 rounded-full bg-primary/10 blur-3xl"></div>

    <div class="relative z-10 flex flex-col gap-8 p-8 lg:flex-row lg:items-center lg:justify-between">

        <div>
            <span class="inline-flex items-center rounded-full border border-primary/20 bg-primary/10 px-4 py-1.5 text-sm font-medium text-foreground">
                {{ $label }}
            </span>

            <h1 class="mt-4 text-4xl font-bold tracking-tight text-primary">
                {{ $title }}
            </h1>

            <p class="mt-3 max-w-xl text-secondary">
                {{ $description }}
            </p>
        </div>

        <div class="flex items-center gap-3">

            @if ($buttonText && $buttonUrl)
                <a
                    href="{{ $buttonUrl }}"
                    class="inline-flex items-center gap-2 rounded-2xl bg-primary px-6 py-3 font-semibold text-white shadow-lg shadow-primary/20 transition hover:-translate-y-1"
                >
                    {{ $buttonText }}
                </a>
            @endif

            <button
                onclick="toggleDarkMode()"
                class="theme-toggle hidden h-12 w-12 items-center justify-center rounded-2xl border border-border bg-card shadow-sm lg:flex text-foreground"
            >
                <span class="light-icon">
                    <x-icons.light />
                </span>

                <span class="dark-icon hidden">
                    <x-icons.dark />
                </span>
            </button>

        </div>

    </div>
</section>