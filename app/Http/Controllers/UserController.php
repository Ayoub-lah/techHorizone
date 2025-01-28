<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.layout.users', compact('users'));
    }

    public function block($id)
{
    $user = User::findOrFail($id);
    $user->status = 'bloque';
    $user->save();

    return redirect()->route('admin.users')->with('success', 'User blocked successfully');
}

public function updateRole(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Validate the role input
    $request->validate([
        'role' => 'required|integer|in:0,1,2', // Ensure the role is valid
    ]);

    // Update the user's role
    $user->role = $request->input('role');
    $user->save();

    return redirect()->route('admin.users')->with('success', 'User role updated successfully');
}

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }
}
