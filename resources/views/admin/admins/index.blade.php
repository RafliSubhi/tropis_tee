@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Kelola Admin</h1>
        <a href="{{ route('admin.admins.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
            Tambah Admin Baru
        </a>
    </div>

    @extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Kelola Admin</h1>
        <a href="{{ route('admin.admins.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
            Tambah Admin Baru
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($admins as $admin)
                    <tr>
                        <td class="text-left py-3 px-4">{{ $admin->name }}</td>
                        <td class="text-left py-3 px-4">{{ $admin->email }}</td>
                        <td class="text-left py-3 px-4">
                            <a href="{{ route('admin.admins.edit', $admin->id) }}" class="text-blue-500 hover:text-blue-700 font-semibold mr-4">Edit</a>
                            <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus admin ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">Tidak ada data admin.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
@endsection

@section('scripts')
<script>
    document.getElementById('select-all-admins').addEventListener('change', function() {
        let checkboxes = document.querySelectorAll('.admin-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });
</script>
@endsection
