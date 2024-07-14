<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @if (session('error'))
        <div class="mb-4 text-red-600">
            {{ session('error') }}
        </div>
        @endif
        <form method="POST" action="{{ route('surveys.store') }}">
            @csrf
            <input type="text" name="indicator"
            placeholder="{{ __('Tambahkan judul indikator disini!') }}"
            class="mb-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            {{ old('indicator') }}>
            <x-input-error :messages="$errors->get('indicator')" class="mt-2" />

            <textarea
                name="question"
                placeholder="{{ __('Tambahkan pertanyaan disini!') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('question') }}</textarea>
            <x-input-error :messages="$errors->get('question')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Tambah Pertanyaan') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>