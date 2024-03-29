@extends('pages.dashboard.layouts.main')

@section('content')
    <div class="container">

        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('game.create') }}" type="button"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-5">
            +Tambah Data
        </a>
        <div x-data="basic"
            class="border bg-lightwhite dark:bg-white/5 dark:border-white/10 border-black/10 p-5 rounded-md">
            <div class="mb-5">
                <p class="text-sm font-semibold">Games</p>
            </div>
            <div class>
                <table id="myTable" class="whitespace-nowrap table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Logo</th>
                            <th>Jumlah Anggota Inti</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $key => $game)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $game->name }}</td>
                                <td>{{ $game->jumlahTeam }}</td>
                                <td><img src="{{ asset('storage/' . $game->logo) }}" alt="logo" srcset=""
                                        width="200"></td>
                                <td>
                                    <div class="flex">
                                        <a href="{{ route('game.edit', $game->id) }}" type="button"
                                            class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded mb-5 mr-6">
                                            <span>Edit</span>
                                        </a>
                                        <form onsubmit="return confirm('Yakin Ingin Menghapus Data Ini?')" method="POST"
                                            action="{{ route('game.destroy', $game) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded mb-5 cursor-pointer">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>



                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
