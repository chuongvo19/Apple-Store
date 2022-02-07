<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    //
    public function create()
    {
        return view('backend.account.create');
    }
    public function store(Request $request)
    {
        // dd($request->input());
        
        $hashingPassword = Hash::make($request->input('password'));
        // avatar admin
        // dd($request->file('avatar'));
        [$file, $fileName] = $this->upload($request);
        // end file image
        $account = new User;
        $account->user_name = $request->input('user_name');
        $account->first_name = $request->input('first_name');
        $account->last_name = $request->input('last_name');
        $account->email = $request->input('email');
        $account->password = $hashingPassword;
        $account->telephone = $request->input('number_phone');
        $account->role = 2;
        $account->avatar = $fileName;
        $result = $account->save();
        if($result)
        {
            $file->storeAs('',$fileName,'avatars');
        }else
            {
                return redirect()->route('account.create')->with('notification', 'Tạo Tài Khoản Thất Bại');
            }
        return redirect()->route('account.create')->with('notification', 'Create Success');
    }
    public function index()
    {
        $admins = User::select('id','last_name', 'first_name', 'telephone', 'email', 'avatar')
                        ->where('role', 1)
                        ->orWhere('role', 2)
                        ->paginate(10);
        return view('backend.account.admin', compact('admins'));
    }

    public function clientIndex()
    {
        $accounts = User::select('id','last_name', 'first_name', 'telephone', 'email', 'avatar')
                        ->where('role', 3)
                        ->paginate(10);
  ('backend.account.client', compact('accounts'));
    }
    public function show($id)
    {
        $account = User::where('id', $id)->first();
        return view('backend.account.edit', compact('account'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->input());
        [$file, $fileName] = $this->upload($request);
        $account = User::where('id', $id);
        //Select * FROM USERS Where id = $id
        $result = $account->update([
            'user_name' => $request->input('user_name'),
            'last_name' => $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'email' => $request->input('email'),
            'telephone' => $request->input('number_phone'),
            'avatar' => $fileName,
        ]);
        if($result)
        {
            if ($request->hasFile('avatar')) {
                $file->storeAs('',$fileName,'avatars');
                if($request->input('avatar') != null)
                Storage::disk('avatars')->delete($request->input('avatar'));
            }
            return redirect()->route('account.show', $id)->with('notification', 'Update Success');
        }
    }
    // upload file
    public function upload(Request $request)
    {
        if($request->hasFile('avatar'))
        {
            $myTime = Carbon::now()->format('YmdHis');
            $file = $request->file('avatar');
            $fileName = $myTime.'-'.$file->getClientOriginalName();
            return [$file, $fileName];
        }
        return [null, $request->input('avatar')];
    }
    // change admin
    public function showChangePassword($id)
    {
        return view('backend.account.change-password');
    }
    public function changePassword(Request $request, $id)
    {
        $validated = $request->validate([
            'password' => 'confirmed|min:8',
        ]);
        $account = User::where('id', $id);
        $passwordOld = $account->select('password')->first()->password;
        if(Hash::check($request->input('password_old'), $passwordOld))
        {
            $hashedPassword = Hash::make($request->input('password'));
            $account->update([
                'password' => $hashedPassword,
            ]);
            return redirect()->back()->with('notification', 'Update Success');
        }else
            {
                return redirect()->back()->with('notification', 'Nhập sai mật khẩu cũ');
            }
        
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('notification', 'Delete Success');
    }

    public function searchAdmin(Request $request)
    {
        $searchText = $request->input('search');
        $admins = User::select('id','last_name', 'first_name', 'telephone', 'email', 'avatar')
                        ->where(function($query) {
                            $query->where('role', 1);
                            $query->orWhere('role', 2);
                        })
                        ->where(function($query) use ($searchText) {
                            $query->where('last_name', 'LIKE', '%'.$searchText.'%');
                            $query->orWhere('first_name', 'LIKE', '%'.$searchText.'%');
                        })
                        ->paginate(10);
        $admins->appends(['search' => $searchText]);
        return view('backend.account.admin', compact('admins'));
    }
    public function searchClient(Request $request)
    {
        $searchText = $request->input('search');
        $accounts = User::select('id','last_name', 'first_name', 'telephone', 'email', 'avatar')
                        ->where(function($query) {
                            $query->where('role', 3);
                        })
                        ->where(function($query) use ($searchText) {
                            $query->where('last_name', 'LIKE', '%'.$searchText.'%');
                            $query->orWhere('first_name', 'LIKE', '%'.$searchText.'%');
                        })
                        ->paginate(10);
        $accounts->appends(['search' => $searchText]);
        return view('backend.account.client', compact('accounts'));
    }

    // admin rights
    public function adminRights()
    {
        $admins = User::where('role', 1)->get();
        $employees = User::where('role', 2)->get();
        return view('backend.account.admin-rights', compact('admins', 'employees'));
    }

    // change role admin
    public function changeRole($id)
    {
        $account = User::where('id', $id)->first();
        $role = $account->role;
        if($role == 1)
        {
            $changeRole = User::where('id', $id)
                    ->update([
                        'role' => 2,
                    ]);
            $role = 2;
        }elseif($role == 2)
            {
                $changeRole = User::where('id', $id)
                        ->update([
                            'role' => 1,
                        ]);
                $role = 1;
            }
        $result = array(
            'name' => $account->last_name.' '.$account->first_name,
            'role' => $role,
            'id'   => $id,
        );

        return $result;
    }
}
