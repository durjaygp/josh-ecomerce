<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Order;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rules;




class DashboardController extends Controller
{
    public function index(){
        return view('backEnd.admin.admin');
    }

    public function createAdmin()
    {
        $roles = Role::latest()->whereNotIn('id', [1, 2])->get();
        return view('backEnd.create_admin.create', compact('roles'));
    }

    public function saveAdmin(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->name;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);
        $user->save();

        // Assign role to user
        $role = Role::findById($request->role_id); // Retrieve role by ID
        $user->assignRole($role); // Assign role to user

        return redirect()->back()->with('success','Admin Created Successfully');
    }

    public function userList(){
        $users = User::latest()->get();
        return view('backEnd.create_admin.index',compact('users'));
    }

    public function userDelete($id){
        $user = User::find($id);

        if ($user){
            // Check if the user has associated blog records
            $hasBlogs = Blog::where('user_id', $user->id)->exists();

            if ($hasBlogs) {
                return redirect()->back()->with('error', 'User cannot be deleted because they created associated Blogs.');
            } else {
                // No associated blog records, proceed with deletion
                $user->delete();
                return redirect()->back()->with('success', 'User deleted successfully');
            }
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }
}
