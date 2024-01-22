<?php

namespace App\Repositories;

use App\Interfaces\AdminInterface;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminRepository implements AdminInterface
{

    public function all()
    {

        return Admin::all();
    }

    public function store($request)
    {
        $data = new Admin();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();
    }
    public function edit($id)
    {
        return Admin::where('id', $id)->first();
    }
    public function update($request, $id)
    {

        $data = Admin::where('id', $id)->first();
        if ($data->password != null) {
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password =  Hash::make($request->password);
            $data->update();
        }
    }
    public function destroy($id)
    {
        Admin::where('id', $id)->delete();
    }
}
