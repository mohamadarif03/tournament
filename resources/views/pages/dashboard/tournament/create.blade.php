@extends('pages.dashboard.layouts.main')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-1 gap-7">
        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                {{ session('success') }}
            </div>
        @endif
        <form enctype="multipart/form-data" action="{{ route('tournament.store') }}"
            class="theme-form theme-form-2 mega-form" method="POST">
            @csrf
            <div class="border border-black/10 dark:border-white/10 p-5 rounded-md">
                <div class="mb-5">
                    <p class="text-sm font-bold">Input Group</p>
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px font-semibold">Nama
                    </label>
                    <input
                        class="form-input w-full rounded-lg border border-black/10 dark:border-white/10 bg-transparent px-3 py-2.5 placeholder:text-black/60 dark:placeholder:text-white/60 hover:z-10 hover:border-black dark:hover:border-white focus:z-10 focus:border-black dark:focus:border-white"
                        placeholder="Nama" type="text" id="name" name="name" value="{{ old('name') }}" />
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px font-semibold">Deskripsi
                    </label>
                    <textarea id="description" name="description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Deskripsi"></textarea>
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px font-semibold">
                        Foto
                    </label>
                    <input
                        class="form-input w-full rounded-lg border border-black/10 dark:border-white/10 bg-transparent px-3 py-2.5 placeholder:text-black/60 dark:placeholder:text-white/60 hover:z-10 hover:border-black dark:hover:border-white focus:z-10 focus:border-black dark:focus:border-white"
                        placeholder="" type="file" id="live_image_url" name="live_image_url" />
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px font-semibold">Tournament Dimulai
                    </label>
                    <input
                        class="form-input w-full rounded-lg border border-black/10 dark:border-white/10 bg-transparent px-3 py-2.5 placeholder:text-black/60 dark:placeholder:text-white/60 hover:z-10 hover:border-black dark:hover:border-white focus:z-10 focus:border-black dark:focus:border-white"
                        type="datetime-local" name="starter_at" id="">
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px font-semibold">Tournament Berakhir
                    </label>
                    <input
                        class="form-input w-full rounded-lg border border-black/10 dark:border-white/10 bg-transparent px-3 py-2.5 placeholder:text-black/60 dark:placeholder:text-white/60 hover:z-10 hover:border-black dark:hover:border-white focus:z-10 focus:border-black dark:focus:border-white"
                        type="datetime-local" name="completed_at" id="">
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px font-semibold">Slot
                    </label>
                    <select id="countries" name="slot"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Pilih Slot</option>
                        <option value="8">8 Slot</option>
                        <option value="16">16 Slot</option>
                        <option value="32">32 Slot</option>
                        <option value="64">64 Slot</option>
                        <option value="128">128 Slot</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px font-semibold">Hadiah
                    </label>
                    <input
                        class="form-input w-full rounded-lg border border-black/10 dark:border-white/10 bg-transparent px-3 py-2.5 placeholder:text-black/60 dark:placeholder:text-white/60 hover:z-10 hover:border-black dark:hover:border-white focus:z-10 focus:border-black dark:focus:border-white"
                        placeholder="Hadiah" type="number" id="price_pool" name="price_pool" />
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 font-bold">Game</label>
                    <select id="countries" name="game_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Pilih Game</option>
                        @foreach ($games as $game)
                            <option value="{{ $game->id }}">{{ $game->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 font-bold">Lokasi</label>
                    <select id="locationdrop" onchange="handleLocationChange" name="location"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Pilih Lokasi</option>
                        <option value="Online">Online</option>
                        <option value="Offline">Offline</option>
                    </select>
                </div>
                <div class="mb-4" id="address" style="display: none">
                    <label class="mt-1.5 flex -space-x-px font-semibold">Pilih Alamat</label>
                    <input
                        class="form-input w-full rounded-lg border border-black/10 bg-transparent px-3 py-2.5 placeholder:text-black/60"
                        placeholder="Alamat" type="text" id="inputaddress" name="address" />
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 font-bold">Pembayaran</label>
                    <select id="pricedrop" onchange="handlepriceChange" name="registration_fee"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 handlepriceChange">
                        <option selected>Pilih Pembayaran</option>
                        <option value="Gratis">Gratis</option>
                        <option value="Bayar">Bayar</option>
                    </select>
                </div>
                <div class="mb-4" id="price" style="display: none">
                    <label class="mt-1.5 flex -space-x-px font-semibold">Biaya Pendaftaran
                    </label>
                    <input
                        class="form-input w-full rounded-lg border border-black/10 bg-transparent px-3 py-2.5 placeholder:text-black/60"
                        placeholder="Biaya" type="number" id="registration_fee" name="registration_fee" />
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-5">
                    <span>Kirim</span>
                </button>
            </div>
        </form>

    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#locationdrop").change(function() {
                var selectedValue = $(this).val();
                var addressDiv = $("#address");
                var inputAddress = $("#inputaddress");


                if (selectedValue === "Offline") {
                    addressDiv.show();
                    inputAddress.attr("name", "location");
                    $("#locationdrop option[value='Offline']").text("Offline");
                } else {
                    addressDiv.hide();
                    inputAddress.attr("name", "address");
                    $("#locationdrop option[value='Offline']").text("Offline");
                }
            });
        });
    </script>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#pricedrop").change(function() {
                var selectValue = $(this).val();
                console.log(selectValue);
                var priceDiv = $("#price");
                var inputPrice = $("#registration_fee");


                if (selectValue === "bayar") {
                    priceDiv.show();
                    inputPrice.attr("name", "location");
                    $("#locationdrop option[value='Offline']").text("Offline");
                } else {
                    priceDiv.hide();
                    inputPrice.attr("name", "address");
                    $("#locationdrop option[value='Offline']").text("Offline");
                }
            });
        });
    </script>
