<x-app-layout>
    <div class="container mx-auto">
        <div class="py-8">
            <div class="overflow-x-auto">
                <div class="min-w-full shadow rounded-lg">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th rowspan="2" class="px-5 py-3 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border border-gray-300">
                                    No Responden
                                </th>
                                <th colspan="{{ count($indicators) }}" class="px-5 py-3 bg-gray-200 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border border-gray-300">
                                    Nilai Unsur
                                </th>
                            </tr>
                            <tr>
                                @foreach($indicators as $indicator)
                                    <th class="px-5 py-3 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border border-gray-300">
                                        {{ $indicator }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($groupedResponses as $visitorId => $responses)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border border-gray-300 text-center">
                                        {{ $loop->iteration }}
                                    </td>
                                    @foreach($indicators as $indicator)
                                        @php
                                            // Mencari jawaban untuk indikator tertentu
                                            $answer = $responses->firstWhere('survey.indicator', $indicator);
                                        @endphp
                                        <td class="px-5 py-5 border border-gray-300 text-center bg-white text-sm ">
                                            {{ $answer ? $answer->answer : '-' }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="px-5 py-5 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border border-gray-300">
                                    Jumlah Nilai Per Unsur
                                </td>
                                @foreach($indicators as $indicator)
                                    @php
                                        $total = $groupedResponses->flatMap(function($responses) use ($indicator) {
                                            return $responses->where('survey.indicator', $indicator)->pluck('answer');
                                        })->sum();
                                    @endphp
                                    <td class="px-5 py-5 bg-gray-200 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border border-gray-300">
                                        {{ $total }}
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="px-5 py-5 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border border-gray-300">
                                    NRR Per Unsur
                                </td>
                                @foreach($indicators as $indicator)
                                    @php
                                        $total = $groupedResponses->flatMap(function($responses) use ($indicator) {
                                            return $responses->where('survey.indicator', $indicator)->pluck('answer');
                                        })->sum();
                                        $count = $groupedResponses->flatMap(function($responses) use ($indicator) {
                                            return $responses->where('survey.indicator', $indicator)->pluck('answer');
                                        })->count();
                                        $average = $count > 0 ? $total / $count : 0;
                                    @endphp
                                    <td class="px-5 py-5 bg-gray-200 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border border-gray-300">
                                        {{ number_format($average, 3) }}
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="px-5 py-5 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border border-gray-300">
                                    NRR Tertimbang Per Unsur
                                </td>
                                @php
                                    $totalWeightedAverage = 0;
                                @endphp
                                @foreach($indicators as $indicator)
                                    @php
                                        $total = $groupedResponses->flatMap(function($responses) use ($indicator) {
                                            return $responses->where('survey.indicator', $indicator)->pluck('answer');
                                        })->sum();
                                        $count = $groupedResponses->flatMap(function($responses) use ($indicator) {
                                            return $responses->where('survey.indicator', $indicator)->pluck('answer');
                                        })->count();
                                        $average = $count > 0 ? $total / $count : 0;
                                        $weightedAverage = $average * (1 / count($indicators));
                                        $totalWeightedAverage += $weightedAverage;
                                    @endphp
                                    <td class="px-5 py-5 bg-gray-200 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border border-gray-300">
                                        {{ number_format($weightedAverage, 3) }}
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="px-5 py-5 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border border-gray-300">
                                    IKM Unit Pelayanan
                                </td>
                                <td colspan="{{ count($indicators) }}" class="px-5 py-5 bg-gray-200 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider border border-gray-300">
                                    {{ number_format($totalWeightedAverage * 25, 3) }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>