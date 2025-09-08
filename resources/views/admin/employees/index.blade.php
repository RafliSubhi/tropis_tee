@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Karyawan</h1>
        <a href="{{ route('admin.employees.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Karyawan Baru
        </a>
    </div>

    <!-- Search Form -->
    <div class="mb-4">
        <form action="{{ route('admin.employees.index') }}" method="GET">
            <div class="flex items-center">
                <input type="text" name="search" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Cari anggota berdasarkan nama..." value="{{ request('search') }}">
                <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cari</button>
            </div>
        </form>
    </div>

    <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Foto</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Jabatan</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Alamat</th>
                    <th class="px-4 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($employees as $employee)
                    <tr>
                        <td class="border-t px-4 py-2">
                            <img src="{{ asset('storage/' . $employee->foto) }}" alt="{{ $employee->nama }}" class="h-16 w-16 object-cover rounded">
                        </td>
                        <td class="border-t px-4 py-2">{{ $employee->nama }}</td>
                        <td class="border-t px-4 py-2">{{ $employee->jabatan }}</td>
                        <td class="border-t px-4 py-2">{{ $employee->email }}</td>
                        <td class="border-t px-4 py-2 max-w-xs truncate">{{ $employee->alamat }}</td>
                        <td class="border-t px-4 py-2 text-center">
                            <a href="{{ route('admin.employees.edit', $employee->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Anda yakin ingin menghapus data anggota ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border-t px-4 py-2 text-center">Tidak ada data anggota.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
<script>
    document.getElementById('select-all-employees').addEventListener('change', function() {
        let checkboxes = document.querySelectorAll('.employee-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    function validateBulkDelete(form) {
        let checkboxes = form.querySelectorAll('.employee-checkbox');
        let isChecked = false;
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                isChecked = true;
            }
        });

        if (!isChecked) {
            alert('Belum memilih item untuk dihapus.');
            return false;
        }

        return confirm('Anda yakin ingin menghapus karyawan yang dipilih?');
    }
</script>
@endsection
