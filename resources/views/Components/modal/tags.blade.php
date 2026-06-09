@props([
    'id',
    'title',
    'action' => '',
    'method' => 'POST',
    'formId' => null,
])

<div
    id="{{ $id }}"
    class="fixed inset-0 z-50 hidden overflow-y-auto"
    role="dialog"
    aria-modal="true"
>
    <div
        class="absolute inset-0 bg-black/40 backdrop-blur-sm"
        data-close-modal="{{ $id }}"
    ></div>

    <div class="flex min-h-screen items-center justify-center p-4">
        <div
            class="relative w-full max-w-lg overflow-hidden rounded-3xl border border-white/20 bg-white/80 shadow-2xl backdrop-blur-xl"
        >
            <form
                id="{{ $formId }}"
                action="{{ $action }}"
                method="POST"
            >
                @csrf

                @if (strtoupper($method) !== 'POST')
                    @method($method)
                @endif

                <div class="flex items-center justify-between border-b border-border px-6 py-5">
                    <h3 class="text-lg font-semibold text-primary">
                        {{ $title }}
                    </h3>

                    <button
                        type="button"
                        data-close-modal="{{ $id }}"
                        class="rounded-xl p-2 transition hover:bg-background"
                    >
                        ✕
                    </button>
                </div>

                <div class="p-6">
                    {{ $slot }}
                </div>
            </form>
        </div>
    </div>
</div>

@once
<script>

     function openModal(id)
        {
            const modal = document.getElementById(id);

            modal.classList.remove('hidden');

            document.body.classList.add('overflow-hidden');
        }

    document.addEventListener('DOMContentLoaded', () => {

        function closeModal(id)
        {
            const modal = document.getElementById(id);

            modal.classList.add('hidden');

            document.body.classList.remove('overflow-hidden');
        }

        document.querySelectorAll('[data-close-modal]')
            .forEach(element => {
                element.addEventListener('click', () => {
                    closeModal(element.dataset.closeModal);
                });
            });

        document.querySelectorAll('.edit-tag-btn')
            .forEach(button => {
                button.addEventListener('click', () => {

                    document
                        .getElementById('edit-tag-form')
                        .action = button.dataset.action;

                    document
                        .getElementById('edit-tag-name')
                        .value = button.dataset.name;

                    openModal('edit-tag-modal');
                });
            });

        document.querySelectorAll('.delete-tag-btn')
            .forEach(button => {
                button.addEventListener('click', () => {

                    document
                        .getElementById('delete-tag-form')
                        .action = button.dataset.action;

                    document
                        .getElementById('delete-tag-message')
                        .textContent =
                        `Are you sure you want to delete "${button.dataset.name}"?`;

                    openModal('delete-tag-modal');
                });
            });

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {

                document
                    .querySelectorAll('[role="dialog"]')
                    .forEach(modal => {
                        modal.classList.add('hidden');
                    });

                document.body.classList.remove('overflow-hidden');
            }
        });

    });
</script>
@endonce