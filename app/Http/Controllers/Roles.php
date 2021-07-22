<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use DB;

class Roles extends Controller
{
    public function index()
    {
        $roles = Role::latest()->paginate(5);
        return view('roles.index', compact('roles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
        ]);

        DB::beginTransaction();
        Role::create($request->all());
        DB::commit();

        return redirect()->route('jabatan.index')
            ->with('success', 'Jabatan baru berhasil ditambah.');
    }

    public function edit($id)
    {
        $roles = Role::find($id);
        return view('roles.edit', compact('roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,id,' . $id,
        ]);

        DB::beginTransaction();
        Role::find($id)->update($request->all());
        DB::commit();

        return redirect()->route('jabatan.index')
            ->with('success', 'Jabatan berhasil diubah');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        Role::where('id', $id)->delete();
        DB::commit();

        return redirect()->route('jabatan.index')
            ->with('success', 'Jabatan berhasil dihapus');
    }
}
