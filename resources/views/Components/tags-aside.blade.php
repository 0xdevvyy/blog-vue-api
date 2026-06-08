@props([
    'title',
    'description',
    'btnTitle' => null,
    'btnUrl' => route('auth.dashboard'),  
])

<aside>
    <div class="mb-4 top-6">

        <div class="rounded-3xl border border-border bg-card p-6 shadow-sm">

            <div class="mb-6 flex items-start justify-between gap-3">

                <div>
                    <h3 class="font-semibold text-primary">
                        {{ $title }}
                    </h3>

                    <p class="mt-1 text-sm text-secondary">
                        {{ $description }}
                    </p>
                </div>

                <a
                    href="{{$btnUrl}}"
                    class="inline-flex items-center gap-2 rounded-xl bg-primary px-3 py-2 text-sm font-medium text-white transition hover:opacity-90"
                >
                    <span>+</span>
                    <span>{{ $btnTitle }}</span>
                </a>

            </div>

            <details open class="group">

                <summary
                    class="flex cursor-pointer items-center justify-between rounded-xl border border-border bg-background px-4 py-3 text-sm font-medium"
                >
                    All Tags

                    <svg
                        class="h-4 w-4 transition group-open:rotate-180"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 9l-7 7-7-7"
                        />
                    </svg>

                </summary>

                <div class="mt-4 max-h-[500px] space-y-2 overflow-y-auto">

                    {{ $slot }}

                </div>

            </details>

        </div>

    </div>

</aside>