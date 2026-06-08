@props([
    'title',
    'name',
    'image' => null,
])

<div class="rounded-3xl border border-border bg-card p-6 shadow-sm">
    <h3 class="mb-4 font-semibold">
        {{ $title }}
    </h3>

    <div class="space-y-4">

        <img
            id="{{ $name }}_preview"
            src="{{ $image }}"
            class="{{ $image ? '' : 'hidden' }} h-56 w-full rounded-2xl object-cover"
            alt="Image Preview"
        >

        <label
            for="{{ $name }}"
            class="flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-border px-6 py-10 text-center transition hover:bg-background"
        >
            <span class="font-medium">
                Upload Image
            </span>

            <span class="mt-1 text-sm text-muted-foreground">
                PNG, JPG, WEBP up to 5MB
            </span>
        </label>

        {{ $slot }}
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('input[type="file"]').forEach(input => {

        input.addEventListener('change', (e) => {

            const file = e.target.files[0];

            if (!file) return;

            const preview = document.getElementById(
                `${input.id}_preview`
            );

            const text = document.getElementById(
                `${input.id}_upload_text`
            );

            if (preview) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('hidden');
            }

            if (text) {
                text.textContent = 'Change Image';
            }

        });

    });

});
</script>