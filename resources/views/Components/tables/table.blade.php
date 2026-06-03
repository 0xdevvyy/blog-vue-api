@props([
    'headers' => [],
])

<div class="overflow-x-auto">
    <table class="w-full">

        <thead>
            <tr class="border-b border-border bg-background/50">
                @foreach ($headers as $header)
                    <th class="{{ $header['class'] ?? 'px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-secondary' }}">
                        {{ $header['label'] }}
                    </th>
                @endforeach
            </tr>
        </thead>

        <tbody>
            {{ $slot }}
        </tbody>

    </table>
</div>