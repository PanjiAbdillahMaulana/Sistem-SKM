<x-skm-layout>
    <a href="/">&#8592; Home</a>
    <form class="max-w-2xl mx-auto pt-4" method="POST" action="{{ route('skm.store') }}">
        @csrf
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="name" id="floating_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
        </div>
    
        <div class="relative z-0 w-full mb-5 group">
            <input type="number" min="0" name="age" id="age" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_age" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Umur</label>
        </div>
    
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Pilih Jenis Kelamin</label>
                <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
    
            <div class="relative z-0 w-full mb-5 group">
                <label for="education" class="block mb-2 text-sm font-medium text-gray-900">Pendidikan Terakhir</label>
                <select id="education" name="education" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
        </div>
    
        <div class="relative z-0 w-full mb-5 group">
            <label for="occupation" class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan</label>
            <select id="occupation" name="occupation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" oninput="checkOtherOccupation(this)" required>
                <option value="PNS">PNS</option>
                <option value="TNI">TNI</option>
                <option value="POLRI">POLRI</option>
                <option value="SWASTA">SWASTA</option>
                <option value="WIRAUSAHA">WIRAUSAHA</option>
                <option value="LAINNYA">LAINNYA</option>
            </select>
            <input type="text" name="other_occupation" id="otherOccupation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Isikan dengan pekerjaan anda" style="display:none;" />
        </div>
    
        <!-- Pertanyaan survei -->
        @foreach ($surveys as $survey)
            <div class="tab mt-6">
                <h6>{{ $survey->question }}</h6>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                    <label class="w-full p-4 bg-gray-100 rounded-lg shadow-md mb-4 md:mb-0 hover:bg-gray-200 cursor-pointer">
                        <input type="radio" name="answers[{{ $survey->id }}]" value="1" class="hidden" required>
                        <p class="text-gray-700">{{ $survey->answer1 }}</p>                    
                    </label>
                    <label class="w-full p-4 bg-gray-100 rounded-lg shadow-md mb-4 md:mb-0 hover:bg-gray-200 cursor-pointer">
                        <input type="radio" name="answers[{{ $survey->id }}]" value="2" class="hidden" required>
                        <p class="text-gray-700">{{ $survey->answer2 }}</p>                        
                    </label>
                    <label class="w-full p-4 bg-gray-100 rounded-lg shadow-md mb-4 md:mb-0 hover:bg-gray-200 cursor-pointer">
                        <input type="radio" name="answers[{{ $survey->id }}]" value="3" class="hidden" required>
                        <p class="text-gray-700">{{ $survey->answer3 }}</p>
                    </label>
                    <label class="w-full p-4 bg-gray-100 rounded-lg shadow-md mb-4 md:mb-0 hover:bg-gray-200 cursor-pointer">
                        <input type="radio" name="answers[{{ $survey->id }}]" value="4" class="hidden" required>
                        <p class="text-gray-700">{{ $survey->answer4 }}</p>
                    </label>
                </div>
            </div>
        @endforeach

        <!-- Feedback -->
        <div class="relative z-0 w-full mb-5 group mt-6">
            <label for="feedback" class="block mb-2 text-sm font-medium text-gray-900">Feedback</label>
            <textarea name="feedback" id="feedback" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Masukkan feedback Anda (Submit langsung jika tidak mengisi)"></textarea>
        </div>
    
        <div class="flex justify-between mt-3">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit Survey</button>
        </div>
    </form>
    
    <script>
        function checkOtherOccupation(selectElement) {
            var otherOccupationInput = document.getElementById('otherOccupation');
            if (selectElement.value === 'LAINNYA') {
                otherOccupationInput.style.display = 'block';
            } else {
                otherOccupationInput.style.display = 'none';
            }
        }
    </script>
    

    {{-- @foreach ($surveys as $survey)
            <div class="tab mt-3">
                <h6>{{ $survey->question }}</h6>
                <div class="grid grid-cols-1 md:grid-cols-4 md:gap-4">
                    <button type="button" class="w-full p-4 bg-gray-100 rounded-lg shadow-md mb-4 md:mb-0 focus:outline-none">
                        <p class="text-gray-700">{{ $survey->answer1 }}</p>
                    </button>
                    <button type="button" class="w-full p-4 bg-gray-100 rounded-lg shadow-md mb-4 md:mb-0 focus:outline-none">
                        <p class="text-gray-700">{{ $survey->answer2 }}</p>
                    </button>
                    <button type="button" class="w-full p-4 bg-gray-100 rounded-lg shadow-md mb-4 md:mb-0 focus:outline-none">
                        <p class="text-gray-700">{{ $survey->answer3 }}</p>
                    </button>
                    <button type="button" class="w-full p-4 bg-gray-100 rounded-lg shadow-md mb-4 md:mb-0 focus:outline-none">
                        <p class="text-gray-700">{{ $survey->answer4 }}</p>
                    </button>
                </div>

                <input type="range" class="form-range w-full" min="1" max="4" step="1" id="answer_{{ $survey->id }}" name="answers[{{ $survey->id }}]">
            </div>
        @endforeach --}}
  
    {{-- <form id="regForm" method="POST" action="{{ route('surveys.store') }}">
        @csrf
    
        <!-- Informasi pengunjung -->
        <div class="tab">
            <h6>Nama</h6>
            <p><input placeholder="Nama..." oninput="this.className = ''" name="name"></p>
        </div>
    
        <div class="tab">
            <h6>Usia</h6>
            <p><input type="number" min="0" placeholder="Usia dalam angka" oninput="this.className = ''" name="age"></p>
        </div>
    
        <div class="tab">
            <h6>Jenis Kelamin</h6>
            <p>
                <select name="gender" oninput="this.className = ''">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </p>
        </div>
    
        <div class="tab mt-3">
            <h6>Pendidikan Terakhir</h6>
            <p>
                <select name="education" oninput="this.className = ''">
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </p>
        </div>

    
        <!-- Pertanyaan survei -->
        @foreach ($surveys as $survey)
            <div class="tab mt-3">
                <h6>{{ $survey->question }}</h6>
                <input type="range" class="form-range" min="1" max="4" step="1" id="answer_{{ $survey->id }}" name="answers[{{ $survey->id }}]">
            </div>
        @endforeach
    
        <!-- Tombol untuk lanjut ke bagian selanjutnya atau submit -->
        <div class="flex justify-between mt-3">
            <button type="button" onclick="nextPrev(1)" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Next</button>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit Survey</button>
        </div>
    </form> --}}
    
    <script>
        function checkOtherOccupation(selectElement) {
            var otherOccupationInput = document.getElementById('otherOccupation');
            if (selectElement.value === 'LAINNYA') {
                otherOccupationInput.style.display = 'block';
            } else {
                otherOccupationInput.style.display = 'none';
            }
        }
    </script>
</x-skm-layout>