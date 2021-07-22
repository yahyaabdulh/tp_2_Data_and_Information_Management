<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Validator;
use Hash;
use DB;

class Employes extends Controller
{
    public function index()
    {
        $employes = User::leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->orderBy('users.id', 'desc')
            ->select('users.*', 'roles.name as role_name')
            ->paginate(5);

        return view('employes.index', compact('employes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('employes.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];

        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        DB::beginTransaction();
        $employee = new User();
        $employee->name = ucwords(strtolower($request->name));
        $employee->email = strtolower($request->email);
        $employee->password = Hash::make($request->password);
        $employee->email_verified_at = \Carbon\Carbon::now();
        $employee->telephone = $request->telephone;
        $employee->is_active = $request->has('is_active');
        $employee->employe_no = $request->employe_no;
        $employee->address = $request->address;
        $employee->role_id = $request->role_id;
        $simpan = $employee->save();
        DB::commit();

        return redirect()->route('karyawan.index')
            ->with('success', 'Karyawan baru berhasil disimpan.');
    }

    public function edit($id)
    {
        $employee = User::find($id);
        $roles = Role::pluck('name', 'id');
        return view('employes.edit', compact('employee', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,id,' . $id,
            'password'              => 'required|confirmed'
        ];

        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        var_dump($request->all());
        DB::beginTransaction();
        User::find($id)->update($request->all());
        DB::commit();

        return redirect()->route('karyawan.index')
            ->with('success', 'Karyawan berhasil diubah');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        User::where('id', $id)->delete();
        DB::commit();

        return redirect()->route('karyawan.index')
            ->with('success', 'Karyawan berhasil dihapus');
    }
}
