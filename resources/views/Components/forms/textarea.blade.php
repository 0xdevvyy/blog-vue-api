@props([
    'label' => null,
    'name',
    'value' => null,
])

 @if ($label)
        <label
            for="{{ $name }}"
            class="mb-2 block text-sm font-medium text-primary"
        >
            {{ $label }}
        </label>
    @endif
    
<textarea
    name="{{ $name }}"
    rows="24"
    {{ $attributes->merge([
        'class' => 'min-h-[600px] w-full rounded-2xl border border-border bg-background px-5 py-4 leading-7 text-foreground outline-none transition focus:border-black focus:ring-2 focus:ring-black/10'
    ]) }}
>{{ old($name, $value) }}</textarea>