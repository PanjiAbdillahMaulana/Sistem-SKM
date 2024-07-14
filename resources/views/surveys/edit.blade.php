<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('surveys.update', $survey) }}">
            @csrf
            @method('patch')
            <input type="text" 
                name="indicator"
                value="{{ old('indicator', $survey->indicator) }}"
                class="mb-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <x-input-error :messages="$errors->get('indicator')" class="mt-2" />

            <textarea
                name="question"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('question', $survey->question) }}</textarea>
            <x-input-error :messages="$errors->get('question')" class="mt-2" />

            <input type="text" name="answer1"
            placeholder="{{ __('Jawaban bernilai 1') }}"
            class="my-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            value="{{ old('answer1', $survey->answer1) }}">
            <x-input-error :messages="$errors->get('answer1')" class="mt-2" />

            <input type="text" name="answer2"
            placeholder="{{ __('Jawaban bernilai 2') }}"
            class="mb-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            value="{{ old('answer2', $survey->answer2 )}}">
            <x-input-error :messages="$errors->get('answer2')" class="mt-2" />

            <input type="text" name="answer3"
            placeholder="{{ __('Jawaban bernilai 3') }}"
            class="mb-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            value="{{ old('answer3', $survey->answer3 )}}">
            <x-input-error :messages="$errors->get('answer3')" class="mt-2" />
            
            <input type="text" name="answer4"
            placeholder="{{ __('Jawaban bernilai 4') }}"
            class="mb-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            value="{{ old('answer4', $survey->answer4 )}}">
            <x-input-error :messages="$errors->get('answer4')" class="mt-2" />

            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('surveys.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>