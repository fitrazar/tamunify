@section('title', 'Pendaftaran Tamu Umum')

<x-guest-layout>
    <div class="min-h-screen bg-gray-50 py-8 px-4 p-20">
        <div class="container mx-auto max-w-3xl">

            <a href="{{ route('checkin') }}"
                class="mt-4 inline-flex items-center text-[#006838] mb-6 hover:underline font-semibold">
                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Beranda
            </a>

            <div class="shadow-lg rounded-lg overflow-hidden bg-white">
                <div class="bg-[#006838] text-white p-6 rounded-t-lg">
                    <h2 class="text-2xl font-semibold">Pendaftaran Tamu Umum</h2>
                    <p class="text-white">Silakan isi data diri Anda untuk mendaftar kunjungan satu kali</p>
                </div>

                <form action="{{ route('store.one-time') }}" method="POST" enctype="multipart/form-data" class="p-6">
                    @csrf

                    {{-- Data Diri --}}
                    <div class="mb-6">
                        <div class="grid md:grid-cols-2 gap-4">

                            <div class="mb-4">
                                <x-input.input-label for="name" :value="__('Nama Lengkap')" />
                                <x-input.text-input id="name" class="mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name"
                                    placeholder="Masukan nama lengkap" />
                                <x-input.input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-input.input-label for="identity_number" :value="__('NIK / No. Identitas')" />
                                <x-input.text-input id="identity_number" class="mt-1 w-full" type="number"
                                    name="identity_number" :value="old('identity_number')" required autofocus
                                    autocomplete="identity_number" placeholder="Masukan nomor identitas" />
                                <x-input.input-error :messages="$errors->get('identity_number')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-input.input-label for="company" :value="__('Perusahaan / Instansi')" />
                                <x-input.text-input id="company" class="mt-1 w-full" type="text" name="company"
                                    :value="old('company')" required autofocus autocomplete="company"
                                    placeholder="Masukan nama perusahaan" />
                                <x-input.input-error :messages="$errors->get('company')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-input.input-label for="phone" :value="__('Nomor Telepon')" />
                                <x-input.text-input id="phone" class="mt-1 w-full" type="number" name="phone"
                                    :value="old('phone')" required autofocus autocomplete="phone"
                                    placeholder="Masukan nomor telepon" />
                                <x-input.input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-input.input-label for="email" :value="__('Email')" />
                                <x-input.text-input id="email" class="mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus autocomplete="email"
                                    placeholder="Masukan alamat email" />
                                <x-input.input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-input.input-label for="purpose" :value="__('Tujuan Kunjungan')" />
                                <x-input.select-input id="purpose" class="mt-1 w-full" type="text" name="purpose"
                                    required autofocus autocomplete="purpose">
                                    <option value="" disabled selected>Pilih Tujuan Kunjungan</option>
                                    @foreach (\App\Enums\PurposeType::cases() as $purpose)
                                    <option value="{{ $purpose->value }}" {{ old('purpose')==$purpose->value ?
                                        'selected' : '' }}>
                                        {{ $purpose->value }}
                                    </option>
                                    @endforeach
                                </x-input.select-input>
                                <x-input.input-error :messages="$errors->get('purpose')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-input.input-label for="person_to_meet" :value="__('Orang yang ingin anda temui')" />
                                <x-input.text-input id="person_to_meet" class="mt-1 w-full" type="text"
                                    name="person_to_meet" :value="old('person_to_meet')" required autofocus
                                    autocomplete="person_to_meet"
                                    placeholder="Masukan nama orang yang ingin anda temui" />
                                <x-input.input-error :messages="$errors->get('person_to_meet')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-input.input-label for="department" :value="__('Departement / Divisi')" />
                                <x-input.select-input id="department" class="mt-1 w-full" type="text" name="department"
                                    required autofocus autocomplete="department">
                                    <option value="" disabled selected>Pilih Departement / Divisi</option>
                                    @foreach (\App\Enums\DepartmentType::cases() as $department)
                                    <option value="{{ $department->value }}" {{ old('department')==$department->value ?
                                        'selected' : '' }}>
                                        {{ $department->value }}
                                    </option>
                                    @endforeach
                                </x-input.select-input>
                                <x-input.input-error :messages="$errors->get('department')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-input.input-label for="visit_date" :value="__('Tanggal Kunjungan')" />
                                <x-input.text-input id="visit_date" class="mt-1 w-full" type="date" name="visit_date"
                                    :value="old('visit_date')" required autofocus autocomplete="visit_date" />
                                <x-input.input-error :messages="$errors->get('visit_date')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-input.input-label for="exit_date" :value="__('Tanggal Keluar Kunjungan')" />
                                <x-input.text-input id="exit_date" class="mt-1 w-full" type="date" name="exit_date"
                                    :value="old('exit_date')" required autofocus autocomplete="exit_date" />
                                <x-input.input-error :messages="$errors->get('exit_date')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-input.input-label for="visit_time" :value="__('Waktu Kunjungan')" />
                                <x-input.text-input id="visit_time" class="mt-1 w-full" type="time" name="visit_time"
                                    :value="old('visit_time')" required autofocus autocomplete="visit_time" />
                                <x-input.input-error :messages="$errors->get('visit_time')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-input.input-label for="exit_time" :value="__('Waktu Keluar Kunjungan')" />
                                <x-input.text-input id="exit_time" class="mt-1 w-full" type="time" name="exit_time"
                                    :value="old('exit_time')" required autofocus autocomplete="exit_time" />
                                <x-input.input-error :messages="$errors->get('exit_time')" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <x-input.input-label for="vehicle_number"
                                    :value="__(key: 'Nomor Kendaraan (Opsional)')" />
                                <x-input.text-input id="vehicle_number" class="mt-1 w-full" type="text"
                                    name="vehicle_number" :value="old('vehicle_number')" autofocus
                                    autocomplete="vehicle_number" placeholder="Masukan nomor kendaraan" />
                                <x-input.input-error :messages="$errors->get('vehicle_number')" class="mt-2" />
                            </div>
                            <div class="mb-4 col-span-2">
                                <x-input.input-label for="additional_info"
                                    :value="__(key: 'Informasi Tambahan (Opsional)')" />
                                <x-input.text-area id="additional_info" class="mt-1 w-full" name="additional_info"
                                    :value="old('additional_info')" autofocus autocomplete="additional_info"
                                    placeholder="Masukan informasi tambahan">
                                    {{ old('additional_info') }}
                                </x-input.text-area>
                                <x-input.input-error :messages="$errors->get('additional_info')" class="mt-2" />
                            </div>


                            <div class="space-y-2 col-span-2">
                                <label class="block text-sm font-medium">Foto Diri</label>
                                <div class="border-2 border-dashed border-[#a3c4a1] rounded-lg p-4 text-center">
                                    <i class="fa-solid fa-upload mx-auto h-8 w-8 text-gray-400"></i>

                                    <p class="mt-2 text-xs text-gray-500">Klik untuk mengambil foto atau unggah foto
                                        Anda</p>
                                    <input type="file" name="photo"
                                        class="mt-2 text-xs h-8 w-full border border-gray-300 rounded"
                                        accept="image/*" />
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- Tombol --}}
                    <div class="flex justify-end gap-4">
                        <a href="{{ route('checkin') }}"
                            class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100">Batal</a>
                        <button type="submit"
                            class="px-4 py-2 bg-[#006838] text-white rounded hover:bg-[#004d29]">Daftar
                            Kunjugan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>