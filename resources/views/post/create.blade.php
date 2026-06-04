<x-layouts.auth>

<div class="mx-auto max-w-7xl px-6 py-8">

    <div class="mb-8 flex items-center justify-between">

        <div>
            <h1 class="text-4xl font-bold tracking-tight text-primary">
                Create Post
            </h1>

            <p class="mt-2 text-secondary">
                Write and publish a new blog post.
            </p>
        </div>

        <a
            href="{{ route('posts.index') }}"
            class="rounded-xl border border-border px-4 py-2 text-sm font-medium"
        >
            Back
        </a>

    </div>

    <form
        action="{{ route('post.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="grid gap-8 lg:grid-cols-[1fr_320px]"
    >
        @csrf

        <!-- Main Content -->
        <div class="space-y-6">

            <div class="rounded-3xl border border-border bg-card p-6">

                <label class="mb-2 block text-sm font-medium">
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    class="w-full rounded-xl border border-border bg-background px-4 py-3"
                    placeholder="Enter title..."
                >

            </div>

            <div class="rounded-3xl border border-border bg-card p-6">

                <label class="mb-2 block text-sm font-medium">
                    Slug
                </label>

                <input
                    type="text"
                    name="slug"
                    value="{{ old('slug') }}"
                    class="w-full rounded-xl border border-border bg-background px-4 py-3"
                    placeholder="my-awesome-post"
                >

            </div>

            <div class="rounded-3xl border border-border bg-card p-6">

                <label class="mb-2 block text-sm font-medium">
                    Description
                </label>

                <textarea
                    rows="4"
                    name="description"
                    class="w-full rounded-xl border border-border bg-background px-4 py-3"
                >{{ old('description') }}</textarea>

            </div>

            <div class="rounded-3xl border border-border bg-card p-6">

                <label class="mb-2 block text-sm font-medium">
                    Content
                </label>

                <textarea
                    rows="18"
                    name="content"
                    class="w-full rounded-xl border border-border bg-background px-4 py-3"
                >{{ old('content') }}</textarea>

            </div>

        </div>

        <!-- Sidebar -->
        <div>

            <div class="sticky top-6 space-y-6">

                <div class="rounded-3xl border border-border bg-card p-6">

                    <h3 class="font-semibold">
                        Publish
                    </h3>

                    <button
                        type="submit"
                        class="mt-4 w-full rounded-xl bg-primary px-4 py-3 font-medium text-white"
                    >
                        Publish Post
                    </button>

                </div>
                {{-- will make this as a component also so just i can foreach the item --}}
                <div class="rounded-3xl border border-border bg-card p-6">

                    <label class="mb-2 block text-sm font-medium">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full rounded-xl border border-border bg-background px-4 py-3"
                    >
                        <option value="published">
                            Published
                        </option>

                        <option value="draft">
                            Draft
                        </option>
                    </select>

                </div>
                {{-- will make this a component and a radio --}}
                <div class="rounded-3xl border border-border bg-card p-6">

                    <label class="mb-2 block text-sm font-medium">
                        Tag
                    </label>

                    <select
                        name="tags[]"
                        class="w-full rounded-xl border border-border bg-background px-4 py-3"
                    >
                        <option value="1">
                            Laravel
                        </option>

                        <option value="3">
                            Vue
                        </option>
                    </select>

                </div>

                <div class="rounded-3xl border border-border bg-card p-6">

                    <label class="mb-2 block text-sm font-medium">
                        Blog Image
                    </label>

                    <input
                        type="file"
                        name="blog_image"
                        class="block w-full"
                    >

                </div>

            </div>

        </div>

    </form>

</div>

</x-layouts.auth>
