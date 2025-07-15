@extends('layouts.application')

@section('content')
<main class="p-4 mx-auto max-w-screen-xl md:p-6">
    <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">
            Centre de Support
        </h2>
        <p class="mb-6 text-sm text-gray-600 dark:text-gray-400">
            Une question ? Un souci technique ? Contacte notre équipe.
        </p>

        <form method="POST" action="{{ route('admin.profil.support.send') }}" class="grid grid-cols-1 gap-6">
            @csrf

            <div>
                <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sujet</label>
                <input type="text" id="subject" name="subject" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white dark:border-gray-600">
            </div>

            <div>
                <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
                <textarea id="message" name="message" rows="5" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white dark:border-gray-600"></textarea>
            </div>

            <div>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90 transition">
                    Envoyer
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
