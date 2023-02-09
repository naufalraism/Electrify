<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = User::find(Auth::id());

        return view('profile.update', compact('user'));
    }

    public function update(UpdateProfileRequest $request, User $user)
    {
        if (@$request->profile_picture) {
            $folder = '/storage/user/';
            $fileName = $request->profile_picture->getClientOriginalName();
            $ext = $request->profile_picture->getClientOriginalExtension();
            $fileFullName = $fileName . "_" . Str::random(10) . "_" . time() . $ext;
            $request->profile_picture->move(public_path($folder), $fileFullName);
            $file = $folder . $fileFullName;
        }

        $profile_picture = @$file ?? $user->profile_picture;

        DB::beginTransaction();
        try {
            $user->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'email' => $request->email,
                'password' => @$request->password ? Hash::make($request->password) : $user->password,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'profile_picture' => $profile_picture
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            abort(500);
        }

        DB::commit();
        return back()->with('success-swal', 'Profile has been saved!');
    }
}
