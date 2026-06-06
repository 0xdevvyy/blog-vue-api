<x-layouts.auth>

    <div class="mx-auto max-w-7xl px-6 py-8 lg:px-10">

        <x-header
            :title="'Edit Post'"
            description="Update your blog post"
            label="Post Dashboard"
        />

        <form
            action="{{ route('post.update', $post) }}"
            method="POST"
            enctype="multipart/form-data"
            class="grid gap-8 lg:grid-cols-[minmax(0,1fr)_360px]"
        >
            @csrf
            @method('PATCH')

            <!-- Main Content -->
            <div>

                <div class="rounded-3xl border border-border bg-card p-8 shadow-sm text-primary">

                    <div class="mb-8 border-b border-border pb-6">
                        <h2 class="text-xl font-semibold">
                            Post Details
                        </h2>

                        <p class="mt-1 text-sm text-muted-foreground">
                            Update the information below.
                        </p>
                    </div>

                    <div class="space-y-6">

                        <x-forms.input
                            name="title"
                            label="Title"
                            type="text"
                            required
                            value="{{  $post->title }}"
                            placeholder="Enter post title..."
                        />

                        <x-forms.input
                            name="slug"
                            label="Slug"
                            type="text"
                            required
                            value="{{ old('slug', $post->slug) }}"
                            placeholder="my-awesome-post"
                        />

                        <x-forms.input
                            name="description"
                            label="Description"
                            type="text"
                            required
                            value="{{ $post->description}}"
                            placeholder="Short description of the article..."
                        />

                        <x-forms.textarea 
                            name="content"
                            label="Content"
                            required
                            value="{{ $post->content}}"
                            placeholder="Content of the article..."
                        >
                        </x-forms.textarea>

                    </div>

                </div>

            </div>

            <!-- Sidebar -->
            <div>

                <div class="sticky top-6 space-y-6">

                    <!-- Publish -->
                    <div class="rounded-3xl border border-border bg-card p-6 shadow-sm">

                        <div class="flex items-center justify-between">
                            <h3 class="font-semibold text-foreground">
                                Publish
                            </h3>

                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">
                                Editing
                            </span>
                        </div>

                        <div class="mt-5 space-y-3 text-sm text-muted-foreground">

                            <div class="flex justify-between">
                                <span>Status</span>
                                <span>{{ $post->status }}</span>
                            </div>

                        </div>

                        <button
                            type="submit"
                            class="mt-6 w-full rounded-xl bg-primary px-4 py-3 font-medium text-white transition hover:opacity-90"
                        >
                            Update Post
                        </button>

                    </div>

                    <!-- Status -->
                    <x-forms.sidebar-options title="Status">

                        @foreach (App\Status::cases() as $status)
                            <label
                                class="flex cursor-pointer items-start gap-3 rounded-xl border border-border p-4 transition hover:bg-background"
                            >
                                <x-forms.input
                                    name="status"
                                    type="radio"
                                    value="{{ $status->value }}"
                                     :checked="old('status', $post->status->value) === $status->value"
                                />

                                <div>
                                    <div class="font-medium">
                                        {{ $status->name }}
                                    </div>
                                </div>

                            </label>
                        @endforeach

                    </x-forms.sidebar-options>

                    <!-- Tags -->
                    <x-forms.checkbox title="Tags">

                        @foreach ($tags as $tag)
                            <label class="flex items-center gap-3">

                                <x-forms.input
                                    name="tags[]"
                                    type="checkbox"
                                    value="{{ $tag->id }}"
                                    :checked="$post->tags->contains($tag->id)"
                                />

                                <span class="text-foreground">{{ $tag->name }}</span>
                            </label>
                        @endforeach

                    </x-forms.checkbox>

                    <!-- Featured Image -->
                    <x-forms.featured-image
                        title="Featured Image"
                        name="blog_image"
                        id="blog_image"
                        :image="$post->blog_image ? Storage::url($post->blog_image) : null"
                    >
                        <x-forms.input
                            name="blog_image"
                            type="file"
                            value=""
                        />
                    </x-forms.featured-image>

                </div>

            </div>

        </form>

    </div>

</x-layouts.auth>