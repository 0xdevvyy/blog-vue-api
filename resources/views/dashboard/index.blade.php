<x-layouts.auth>

    

    <div class="mx-auto max-w-7xl px-6 py-8 lg:px-10">

        <!-- Hero Section -->
        <div class="grid items-start gap-8 lg:grid-cols-[minmax(0,1fr)_320px]">
            <x-header
                :title="'Welcome back, ' . Auth::user()->name"
                description="My blog for my project in the span of a year of unemployment."
                button-text="+ New Post"
                :button-url="route('post.create')"
                label="Dashboard"
            />
            <x-tags-aside
                title="Tags"
                description="All Tags Post"
                btn-title="New Post" 
                :btn-url="route('auth.dashboard')"
            >
                @forelse ($tags as $tag)

                    <div
                        class="group flex items-center justify-between rounded-xl border border-border px-4 py-3 transition-all duration-200 hover:bg-background">
                        <div>
                            <p class="text-sm font-medium">
                                #{{ $tag->name }}
                            </p>
                        </div>

                        <div class="relative h-6 w-24">
                            {{-- Count --}}
                            <div
                                class="absolute inset-y-0 right-0 flex items-center transition-opacity duration-200 group-hover:opacity-0"
                            >
                                <span
                                    class="rounded-full bg-background px-2 py-1 text-xs text-secondary"
                                >
                                    {{ $tag->posts_count }}
                                </span>
                            </div>

                            {{-- Actions --}}
                            <div
                                class="absolute inset-y-0 right-0 flex items-center gap-2 opacity-0 transition-opacity duration-200 group-hover:opacity-100"
                            >
                                <button
                                    type="button"
                                    class="edit-tag-btn cursor-pointer text-xs font-medium text-primary hover:underline"
                                    data-action="{{ route('tag.update', $tag) }}"
                                    data-name="{{ $tag->name }}"
                                >
                                    Edit
                                </button>

                                <button
                                    type="button"
                                        data-action="{{ route('tag.update', $tag) }}"
                                        data-name="{{ $tag->name }}"
                                        class="delete-tag-btn rounded-lg p-1 text-error transition hover:bg-red-50 cursor-pointer"
                                        >
                                     <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 7L18.132 19.142A2 2 0 0116.138 21H7.862A2 2 0 015.868 19.142L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h8"
                                            />
                                        </svg>
                                </button>

                            </div>
                        </div>
                    </div>

                @empty

                    <div class="rounded-xl border border-dashed border-border p-6 text-center">
                        <p class="text-sm text-secondary">
                            No tags found.
                        </p>
                    </div>

                @endforelse
            </x-tags-aside>
        </div>
        
        <!-- Stats -->
        <section class="mb-8 grid gap-6 md:grid-cols-4">

            <div class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                <p class="text-sm text-secondary">
                    Total Posts
                </p>

                <h3 class="mt-2 text-3xl font-bold text-primary">
                    {{ $posts->total() }}
                </h3>
            </div>

            <div class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                <p class="text-sm text-secondary">
                    Published
                </p>

                <h3 class="mt-2 text-3xl font-bold text-green-500">
                    {{ $publishCount ?? 0 }}
                </h3>
            </div>

            <div class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                <p class="text-sm text-secondary">
                    Drafts
                </p>

                <h3 class="mt-2 text-3xl font-bold text-amber-500">
                    {{ $draftCount ?? 0 }}
                </h3>
            </div>
            <div class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                <p class="text-sm text-secondary">
                    Archive
                </p>

                <h3 class="mt-2 text-3xl font-bold text-foreground">
                    {{ $archivePost ?? 0 }}
                </h3>
            </div>

        </section>

        <!-- Posts Table Card -->
        <section class="overflow-hidden rounded-3xl border border-border bg-card shadow-sm">

            <!-- Header -->
            <div class="border-b border-border p-6">

                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                    <div>
                        <h2 class="text-xl font-semibold text-primary">
                            All Blog Posts
                        </h2>

                        <p class="mt-1 text-sm text-secondary">
                            Manage and organize your content.
                        </p>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row">

                        <input
                            type="text"
                            placeholder="Search posts..."
                            class="rounded-xl border border-border bg-background px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20"
                        >

                        <a
                            href="/posts/create"
                            class="rounded-xl border border-border px-4 py-3 text-center text-sm font-medium transition hover:bg-background"
                        >
                            Filter
                        </a>

                    </div>

                </div>

            </div>

            <!-- Table -->
            <x-tables.table
                :headers="[
                    ['label' => 'Post'],
                    ['label' => 'Status'],
                    ['label' => 'Created'],
                    [
                        'label' => 'Actions',
                        'class' => 'px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-secondary'
                    ]
                ]"
            >

                @forelse ($posts as $post)

                    <tr class="border-b border-border transition hover:bg-background/50">

                        <td class="px-6 py-5">

                            <div class="group flex items-center gap-4">

                                <div class="overflow-hidden rounded-2xl border border-border">
                                    <img
                                        src="{{  asset('storage/' . $post->blog_image) }}"
                                        alt="{{ $post->title }}"
                                        class="h-20 w-20 object-cover transition duration-500 group-hover:scale-110"
                                    >
                                </div>

                                <div>
                                    <h3 class="font-semibold text-primary">
                                        {{ $post->title }}
                                    </h3>

                                    <p class="mt-1 max-w-md text-sm text-secondary line-clamp-2">
                                        {{ Str::limit(strip_tags($post->content), 120) }}
                                    </p>

                                    <p class="mt-2 text-xs text-secondary">
                                        {{ $post->slug }}
                                    </p>
                                </div>

                            </div>

                        </td>

                        <td class="px-6 py-5">
                            <span class="inline-flex rounded-full px-3 py-1 text-xs font-medium {{ $post->status->badge() }}">
                                {{ $post->status->label() }}
                            </span>
                        </td>

                        <td class="px-6 py-5 text-sm text-secondary">
                            {{ $post->created_at->format('M d, Y') }}
                        </td>

                        <td class="px-6 py-5">

                            <div class="flex justify-end gap-2">

                                <a
                                    href="{{ route('post.edit', $post->id) }}"
                                    class="rounded-xl border border-border px-4 py-2 text-sm font-medium transition text-primary hover:bg-background"
                                >
                                    Edit
                                </a>

                                {{-- <a
                                    href="/blog/{{ $post->slug }}"
                                    target="_blank"
                                    class="rounded-xl bg-green-500/10 px-4 py-2 text-sm font-medium text-green-600 transition hover:bg-green-500 hover:text-white"
                                >
                                    View
                                </a> --}}
                                <form action="{{ route('post.delete', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="rounded-xl bg-red-500/10 px-4 py-2 text-sm font-medium text-red-600 transition hover:bg-red-500 hover:text-white"
                                    >
                                        Delete
                                    </button>
                                </form>

                               

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="px-6 py-16 text-center">

                            <div class="mx-auto max-w-md">

                                <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-background">
                                    x
                                </div>

                                <h3 class="text-lg font-semibold text-primary">
                                    No posts found
                                </h3>

                                <p class="mt-2 text-secondary">
                                    Start creating your first blog post and build your content library.
                                </p>

                                <a
                                    href="/posts/create"
                                    class="mt-6 inline-flex rounded-xl bg-primary px-5 py-3 font-medium text-white"
                                >
                                    Create Post
                                </a>

                            </div>

                        </td>
                    </tr>

                @endforelse

            </x-tables.table>

        </section>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $posts->links() }}
        </div>
        

    </div>

   <x-modal.tags
    id="edit-tag-modal"
    title="Edit Tag"
    formId="edit-tag-form"
    method="PUT"
>
    <div class="space-y-4">

        <label
            for="edit-tag-name"
            class="block text-sm font-medium text-primary"
        >
            Tag Name
        </label>

        <input
            id="edit-tag-name"
            name="name"
            type="text"
            class="w-full rounded-xl border border-border px-4 py-3"
        >

        <div class="flex justify-end gap-3">
            <button
                type="button"
                data-close-modal="edit-tag-modal"
                class="rounded-xl border border-border px-4 py-2"
            >
                Cancel
            </button>

            <button
                type="submit"
                class="rounded-xl bg-primary px-4 py-2 text-white"
            >
                Update Tag
            </button>
        </div>

    </div>
</x-modal.tags>


<x-modal.tags
    id="delete-tag-modal"
    title="Delete Tag"
    formId="delete-tag-form"
    method="DELETE"
>
    <div class="space-y-6">

        <p
            id="delete-tag-message"
            class="text-sm text-secondary"
        ></p>

        <div class="flex justify-end gap-3">

            <button
                type="button"
                data-close-modal="delete-tag-modal"
                class="rounded-xl border border-border px-4 py-2"
            >
                Cancel
            </button>

            <button
                type="submit"
                class="rounded-xl bg-red-600 px-4 py-2 text-white"
            >
                Delete Tag
            </button>

        </div>

    </div>
</x-modal.tags>
    

</x-layouts.auth>