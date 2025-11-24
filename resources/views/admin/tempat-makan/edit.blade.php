<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Tempat Makan') }}
            </h2>
            <a href="{{ route('admin.tempat-makan.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
        </div>
    </x-slot>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <strong>Whoops!</strong> Ada masalah dengan input Anda:<br><br>
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.tempat-makan.update', $tempatMakan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Left Column: Form Inputs -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b-2 border-blue-500">
                                    Informasi Tempat Makan
                                </h3>

                                <!-- Nama Tempat -->
                                <div>
                                    <label for="nama_tempat" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Nama Tempat <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text"
                                        name="nama_tempat"
                                        id="nama_tempat"
                                        value="{{ old('nama_tempat', $tempatMakan->nama_tempat) }}"
                                        placeholder="Masukkan nama tempat makan"
                                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                        required>
                                </div>

                                <!-- Kategori -->
                                <div>
                                    <label for="kategori_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Kategori <span class="text-red-500">*</span>
                                    </label>
                                    <select name="kategori_id"
                                        id="kategori_id"
                                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                        required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach($kategori as $kat)
                                            <option value="{{ $kat->id }}"
                                                {{ old('kategori_id', $tempatMakan->kategori_id) == $kat->id ? 'selected' : '' }}>
                                                {{ $kat->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Alamat -->
                                <div>
                                    <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Alamat <span class="text-red-500">*</span>
                                    </label>
                                    <textarea name="alamat"
                                        id="alamat"
                                        rows="4"
                                        placeholder="Masukkan alamat lengkap"
                                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"
                                        required>{{ old('alamat', $tempatMakan->alamat) }}</textarea>
                                </div>

                                <!-- Jam Operasional -->
                                <div>
                                    <label for="jam_operasional" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Jam Operasional
                                    </label>
                                    <input type="text"
                                        name="jam_operasional"
                                        id="jam_operasional"
                                        value="{{ old('jam_operasional', $tempatMakan->jam_operasional) }}"
                                        placeholder="Contoh: 08:00 - 22:00"
                                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                </div>

                                <!-- Coordinate Inputs -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="latitude" class="block text-sm font-semibold text-gray-700 mb-2">
                                            Latitude <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text"
                                            name="latitude"
                                            id="latitude"
                                            value="{{ old('latitude', $tempatMakan->latitude) }}"
                                            readonly
                                            class="w-full px-4 py-3 bg-gray-100 border-2 border-gray-300 rounded-lg cursor-not-allowed"
                                            required>
                                    </div>
                                    <div>
                                        <label for="longitude" class="block text-sm font-semibold text-gray-700 mb-2">
                                            Longitude <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text"
                                            name="longitude"
                                            id="longitude"
                                            value="{{ old('longitude', $tempatMakan->longitude) }}"
                                            readonly
                                            class="w-full px-4 py-3 bg-gray-100 border-2 border-gray-300 rounded-lg cursor-not-allowed"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column: Map -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b-2 border-orange-500">
                                    Ubah Lokasi di Peta
                                </h3>

                                <div class="bg-orange-50 border-l-4 border-orange-500 p-3 mb-4">
                                    <p class="text-sm text-orange-700">
                                        <strong>📍 Tips:</strong> Klik pada peta untuk mengubah lokasi tempat makan. Marker biru menunjukkan lokasi saat ini.
                                    </p>
                                </div>

                                <!-- Map Container -->
                                <div id="map" class="w-full rounded-lg border-4 border-gray-300 shadow-lg" style="height: 500px;"></div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between mt-8 pt-6 border-t-2 border-gray-200">
                            <a href="{{ route('admin.tempat-makan.index') }}"
                                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                                ← Batal
                            </a>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-8 rounded-lg transition duration-200 shadow-md hover:shadow-lg flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                Update Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>

    <script>
        // Get existing coordinates from the database
        const existingLat = {{ $tempatMakan->latitude ?? 'null' }};
        const existingLng = {{ $tempatMakan->longitude ?? 'null' }};

        // Initialize map - center on existing location if available, otherwise Jember
        let initialLat = existingLat !== null ? existingLat : -8.1706;
        let initialLng = existingLng !== null ? existingLng : 113.7026;
        let initialZoom = existingLat !== null ? 15 : 13;

        const map = L.map('map').setView([initialLat, initialLng], initialZoom);

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 19
        }).addTo(map);

        // Initialize marker variable
        let marker = null;

        // If existing coordinates exist, place marker automatically
        if (existingLat !== null && existingLng !== null) {
            marker = L.marker([existingLat, existingLng]).addTo(map);
            marker.bindPopup(`<b>Lokasi Saat Ini</b><br>Lat: ${existingLat.toFixed(6)}<br>Lng: ${existingLng.toFixed(6)}`).openPopup();
        }

        // Handle map click event - allow moving the marker
        map.on('click', function(e) {
            const lat = e.latlng.lat;
            const lng = e.latlng.lng;

            // Update input fields
            document.getElementById('latitude').value = lat.toFixed(6);
            document.getElementById('longitude').value = lng.toFixed(6);

            // Remove existing marker if any
            if (marker) {
                map.removeLayer(marker);
            }

            // Add new marker at clicked location
            marker = L.marker([lat, lng]).addTo(map);
            marker.bindPopup(`<b>Lokasi Baru</b><br>Lat: ${lat.toFixed(6)}<br>Lng: ${lng.toFixed(6)}`).openPopup();
        });

        // If there are old values (from validation errors), use those instead
        @if(old('latitude') && old('longitude'))
            const oldLat = {{ old('latitude') }};
            const oldLng = {{ old('longitude') }};

            // Remove existing marker
            if (marker) {
                map.removeLayer(marker);
            }

            marker = L.marker([oldLat, oldLng]).addTo(map);
            marker.bindPopup(`<b>Lokasi Dipilih</b><br>Lat: ${oldLat.toFixed(6)}<br>Lng: ${oldLng.toFixed(6)}`);
            map.setView([oldLat, oldLng], 15);
        @endif
    </script>
</x-app-layout>
