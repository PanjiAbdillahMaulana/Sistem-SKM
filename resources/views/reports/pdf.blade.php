<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laporan IKM DISKOMINFO</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                font-family: 'figtree', sans-serif;
                line-height: 1.5;
                color: #333;
            }
            .container {
                max-width: 100%;
                margin-left: auto;
                margin-right: auto;
                padding-left: 1rem;
                padding-right: 1rem;
            }
            .py-8 {
                padding-top: 2rem;
                padding-bottom: 2rem;
            }
            .overflow-x-auto {
                overflow-x: auto;
            }
            .shadow {
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .rounded-lg {
                border-radius: 0.5rem;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                margin-bottom: 1rem;
            }
            th, td {
                padding: 0.75rem;
                text-align: left;
                border: 1px solid #ddd;
            }
            th {
                background-color: #f3f4f6;
                font-size: 0.75rem;
                text-transform: uppercase;
                font-weight: 600;
                color: #4b5563;
            }
            td {
                font-size: 0.875rem;
                vertical-align: top;
            }
            .text-center {
                text-align: center;
            }
            .bg-gray-200 {
                background-color: #edf2f7;
            }
            .bg-white {
                background-color: #ffffff;
            }
            .border-b {
                border-bottom-width: 1px;
            }
            .signature-container {
                margin-top: 50px;
                margin-right: 50px;
            }
            .signature-text {
                font-size: 14px;
                margin-top: 10px;
            }

            .signature-container p{
                text-align: right;
            }
            .signature-text p{
                text-align: right;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="py-8">
                <div class="overflow-x-auto">
                    <div class="min-w-full rounded-lg">
                        <table>
                            <thead>
                                <tr>
                                    <th rowspan="2">
                                        No Responden
                                    </th>
                                    <th colspan="{{ count($indicators) }}" class="text-center">
                                        Nilai Unsur
                                    </th>
                                </tr>
                                <tr>
                                    @foreach($indicators as $indicator)
                                        <th>
                                            {{ $indicator }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groupedResponses as $visitorId => $responses)
                                    <tr>
                                        <td class="border-b">
                                            {{ $loop->iteration }}
                                        </td>
                                        @foreach($indicators as $indicator)
                                            @php
                                                // Mencari jawaban untuk indikator tertentu
                                                $answer = $responses->firstWhere('survey.indicator', $indicator);
                                            @endphp
                                            <td class="border">
                                                {{ $answer ? $answer->answer : '-' }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        Jumlah Nilai Per Unsur
                                    </td>
                                    @foreach($indicators as $indicator)
                                        @php
                                            $total = $groupedResponses->flatMap(function($responses) use ($indicator) {
                                                return $responses->where('survey.indicator', $indicator)->pluck('answer');
                                            })->sum();
                                        @endphp
                                        <td class="text-center">
                                            {{ $total }}
                                        </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>
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
                                        <td class="text-center">
                                            {{ number_format($average, 3) }}
                                        </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>
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
                                        <td class="text-center">
                                            {{ number_format($weightedAverage, 3) }}
                                        </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>
                                        IKM Unit Pelayanan
                                    </td>
                                    <td colspan="{{ count($indicators) }}" class="text-center">
                                        {{ number_format($totalWeightedAverage * 25, 3) }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="signature-container">
                            <p>Jambi, 14 Juli 2024</p>
                            <p>Penanggung Jawab</p>
                            {{-- <img src="/mnt/data/ttd.png" alt="Tanda Tangan" width="150"> --}}
                            <div class="signature-text">
                                <br>
                                <br>
                                <p><strong>(Panji Abdillah Maulana)</strong></p>
                                <p>NIM F1E121020</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
