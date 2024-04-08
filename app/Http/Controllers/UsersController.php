<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUsersRequest;

class UsersController extends Controller
{

    private $user;

    public function __construct(Users $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $allUsers = $this->user->getAllUsers();
        return response()->json(['users' => $allUsers]);
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        $this->user->createUser($data);
        return response()->json(['message' => 'User created successfully']);
    }

    public function show($id)
    {
        $user = $this->user->getUserById($id);
        return response()->json(['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $newData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        $this->user->updateUserById($id, $newData);
        return response()->json(['message' => 'User updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->user->deleteUserById($id);
        return response()->json(['message' => 'User deleted successfully']);
    }
}
