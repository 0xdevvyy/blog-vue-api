<x-layouts.auth>

    <div class="class="mx-auto max-w-7xl px-6 py-8 lg:px-10">

        <x-header
            :title="'Create Post'"
            description="Write and publish a new blog post"
            label="Post Dashboard"
        />

        <form
            action="{{ route('post.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="grid gap-8 lg:grid-cols-[minmax(0,1fr)_360px]"
        >
            @csrf

            <!-- Main Content -->
            <div>

                <div class="rounded-3xl border border-border bg-card p-8 shadow-sm text-primary">

                    <div class="mb-8 border-b border-border pb-6">
                        <h2 class="text-xl font-semibold">
                            Post Details
                        </h2>

                        <p class="mt-1 text-sm text-muted-foreground">
                            Fill out the information below to create your article.
                        </p>
                    </div>

                    <div class="space-y-6">

                        <x-forms.input
                            name="title"
                            label="Title"
                            type="text"
                            
                            placeholder="Enter post title..."
                        />

                        <x-forms.input
                            name="slug"
                            label="Slug"
                            type="text"
                            
                            placeholder="my-awesome-post"
                        />

                        <x-forms.input
                            name="description"
                            label="Description"
                            type="text"
                            
                            placeholder="Short description of the article..."
                            
                        />

                        <div>
                            {{-- <label class="mb-3 block text-sm font-medium">
                                Content
                            </label> --}}

                           
{{-- 
                            <x-forms.input
                            name="content"
                            label="Content"
                            type="textarea"
                            
                            placeholder="Content of the article..."
                            
                            /> --}}

                            <x-forms.textarea 
                                name="content"
                                label="Content"
                                placeholder="Content of the article..."
                            />

                            
                        </div>

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

                            <span
                                class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700"
                            >
                                Ready
                            </span>
                        </div>

                        <div class="mt-5 space-y-3 text-sm text-muted-foreground">

                            <div class="flex justify-between">
                                <span>Status</span>
                                <span>Draft</span>
                            </div>

                            <div class="flex justify-between">
                                <span>Visibility</span>
                                <span>Public</span>
                            </div>

                        </div>

                        <button
                            type="submit"
                            class="mt-6 w-full rounded-xl bg-primary px-4 py-3 font-medium text-white transition hover:opacity-90"
                        >
                            Publish Post
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
                                    {{-- label="Status" --}}
                                    type="radio"
                                    class="w-full rounded-xl border border-border bg-background px-4 py-3"
                                    value="{{ $status->value }}"
                                    {{-- placeholder="Enter post title..." --}}
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
                                    {{-- label="Status" --}}
                                    type="checkbox"
                                    class="w-full rounded-xl border border-border bg-background px-4 py-3"
                                    value="{{ $tag->id }}"
                                    {{-- placeholder="Enter post title..." --}}
                                />

                                <span class="text-foreground">{{ $tag->name }}</span>
                            </label>
                        @endforeach
                    </x-forms.checkbox>

                    <!-- Featured Image -->
                    <div class="rounded-3xl border border-border bg-card p-6 shadow-sm">

                        <h3 class="mb-4 font-semibold">
                            Featured Image
                        </h3>

                        <div class="space-y-4">

                            <img
                                id="image-preview"
                                class="hidden h-56 w-full rounded-2xl object-cover"
                                alt="Image Preview"
                            >

                            <label
                                for="blog_image"
                                class="flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-border px-6 py-10 text-center transition hover:bg-background"
                            >
                                <span id="upload-text" class="font-medium">
                                    Upload Image
                                </span>

                                <span class="mt-1 text-sm text-muted-foreground">
                                    PNG, JPG, WEBP up to 5MB
                                </span>
                            </label>

                            <input
                                id="blog_image"
                                type="file"
                                name="blog_image"
                                accept="image/*"
                                class="hidden"
                            >

                        </div>

                            @error('blog_image')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                    </div>
                    >
                </div>

            </div>

        </form>

    </div>

</x-layouts.auth>