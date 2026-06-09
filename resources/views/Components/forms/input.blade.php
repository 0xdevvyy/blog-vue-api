@props([
    'label' => null,
    'name',
    'type' => 'text',
    'value' => null,
    'id'
])

<div>
    @if ($label)
        <label
            for="{{ $name }}"
            class="mb-2 block text-sm font-medium text-primary"
        >
            {{ $label }}
        </label>
    @endif

    @if ($type === 'file')
        <input
            id="{{ $name }}"
            name="{{ $name }}"
            type="file"
            accept="image/*"

            {{ $attributes->merge([
                'class' => 'hidden'
            ]) }}
        />
    @else
        <input
            {{-- id="{{ $id }}" --}}
            name="{{ $name }}"
            type="{{ $type }}"
            value="{{ old($name, $value) }}"
            {{ $attributes->merge([
                'class' => 'w-full rounded-xl border border-border px-4 py-3 outline-none transition focus:border-black focus:ring-2 focus:ring-black/10 text-foreground'
            ]) }}
        />
    @endif

    @error($name)
        <p class="mt-2 text-sm text-error">
            {{ $message }}
        </p>
    @enderror
</div>