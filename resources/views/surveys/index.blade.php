<x-app-layout>
    
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8 md:max-w-full">
        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 text-red-600">
                {{ session('error') }}
            </div>
        @endif
        
        <a 
        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" 
        href="{{ route('surveys.create') }}">
        Tambah Pertanyaan</a>
        
        <div class="mt-6 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Indikator
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Pertanyaan
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Jawaban 1
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Jawaban 2
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Jawaban 3
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Jawaban 4
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surveys as $survey)
                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $survey->indicator }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $survey->question }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $survey->answer1 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $survey->answer2 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $survey->answer3 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $survey->answer4 }}
                            </td>
                            <td class="px-6 py-4">
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('surveys.edit', $survey)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('surveys.destroy', $survey) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('surveys.destroy', $survey)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>