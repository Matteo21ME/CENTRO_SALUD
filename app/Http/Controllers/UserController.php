<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::with('role')->orderBy('id')->get(), 200);
    }

    public function show(int $id)
    {
        return response()->json(User::with('role')->findOrFail($id), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'role_id'  => ['required', 'integer', 'exists:roles,id'],
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id'  => $data['role_id'],
        ]);

        return response()->json($user->load('role'), 201);
    }

    public function update(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name'     => ['sometimes', 'required', 'string', 'max:255'],
            'email'    => ['sometimes', 'required', 'email', 'unique:users,email,' . $id],
            'password' => ['sometimes', 'required', 'string', 'min:6'],
            'role_id'  => ['sometimes', 'required', 'integer', 'exists:roles,id'],
        ]);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return response()->json($user->fresh()->load('role'), 200);
    }

    public function destroy(int $id)
    {
        User::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
