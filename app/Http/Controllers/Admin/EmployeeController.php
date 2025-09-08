<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = Employee::query();

        if ($request->has('search') && $request->input('search') != '') {
            $search = $request->input('search');
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $employees = $query->latest()->get();

        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:51200',
        ]);

        $path = $request->file('foto')->store('employees', 'public');

        Employee::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'foto' => $path,
        ]);

        return redirect()->route('admin.employees.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Employee $employee)
    {
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees,email,' . $employee->id,
            'alamat' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:51200',
        ]);

        $employee->nama = $validatedData['nama'];
        $employee->jabatan = $validatedData['jabatan'];
        $employee->email = $validatedData['email'];
        $employee->alamat = $validatedData['alamat'];

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            Storage::disk('public')->delete($employee->foto);
            // Simpan foto baru
            $path = $request->file('foto')->store('employees', 'public');
            $employee->foto = $path;
        }

        $employee->save();

        return redirect()->route('admin.employees.index')->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(Employee $employee)
    {
        Storage::disk('public')->delete($employee->foto);
        $employee->delete();

        return redirect()->route('admin.employees.index')->with('success', 'Data anggota berhasil dihapus.');
    }
}