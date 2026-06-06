@props([
    'title',
    'name',
    // 'type' => 'checkbox',
    // 'options' => [],
])

<div class="rounded-3xl border border-border bg-card p-6 shadow-sm text-foreground">

    <h3 class="mb-4 font-semibold ">
        {{ $title }}
    </h3>

    <div class="space-y-3">

        {{ $slot }}

    </div>

</div>