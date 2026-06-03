<x-layouts.layout>
    <div class="min-h-screen flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-3xl border border-gray-200 shadow-xl p-8">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                        Welcome Back
                    </h1>

                    <p class="mt-2 text-sm text-gray-500">
                        Sign in to access your dashboard.
                    </p>
                </div>

                <form action="{{ route('login.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <x-forms.input
                        name="email"
                        label="Email"
                        type="email"
                    />

                    <x-forms.input
                        name="password"
                        label="Password"
                        type="password"
                    />

                    <button
                        type="submit"
                        class="w-full rounded-xl bg-black px-4 py-3 text-sm font-semibold text-white transition hover:bg-gray-800"
                    >
                        Sign In
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.layout>