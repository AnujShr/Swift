<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\ResizeImage;
use App\User;
use App\UserImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $user = User::query()->where('id', $id)->with('oldPictures')->first();
        $basePath = User::ADMIN_IMAGE_PATH;
        return view('admin.profile.index', compact('user', 'basePath'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $user_id = Auth::user()->id;
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user_id,
        ];

        $v = Validator::make($data, $rules);

        if ($v->fails()) {
            return response()->json($v->errors()->toArray(), 422);
        }
        $user = User::query()->find(Auth::user()->id);
        $user->update($data);


        $return = [];
        $return['success'] = true;
        return response()->json($return);
    }

    public function confirmPassword(Request $request)
    {
        $data = $request->all();
        $rules = [
            'confirm_password' => 'required',
        ];
        $v = Validator::make($data, $rules);
        if ($v->fails()) {
            return response()->json($v->errors()->toArray(), 422);
        }
        $user = User::query()->find(Auth::user()->id);
        $match = Hash::check($data['confirm_password'], $user->password);
        if (!$match):
            $error = [
                'confirm_password' => 'Password Confirmation Failed'
            ];
            return response()->json($error, 422);
        endif;

        $return['success'] = true;
        return response()->json($return);
    }

    public function changePassword(Request $request)
    {
        $data = $request->all();
        $rules = [
            'password' => 'required|string|min:6|confirmed',
            'old_password' => 'required',
            'password_confirmation' => 'required'
        ];
        $user = User::query()->find(Auth::user()->id);
        $v = Validator::make($data, $rules);
        if ($v->fails()) {
            return response()->json($v->errors()->toArray(), 422);
        }
        $match = Hash::check($request->old_password, $user->password);
        if (!$match) {
            $error = [
                'old_password' => 'Password Confirmation Failed'
            ];
            return response()->json($error, 422);
        }
        $user->password = Hash::make($data['password']);
        $user->save();
        $return['success'] = true;
        return response()->json($return);
    }

    public function uploadProfilePicture(Request $request)
    {
        $data = $request->all();
        $user = User::query()->find(Auth::id());
        if (isset($data['profile_picture']) && $data['profile_picture'] != '') {
            $rules = [
                'profile_picture' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
            ];
            $this->validate($request, $rules);
            $file = $request->file('profile_picture');
            $unique = uniqid();
            $basePath = User::ADMIN_IMAGE_PATH;


            $fileName = $unique . '.' . $file->getClientOriginalExtension();

            $filePath = Storage::putFileAs($basePath . '/', $file, $fileName);


            $this->dispatch(new ResizeImage($filePath));
            UserImage::create([
                'user_id' => Auth::id(),
                'profile_picture' => $fileName
            ]);
        } else {
            $fileName = $data['oldPicture'];
        };
        if ($fileName != '') {
            $user->profile_picture = $fileName;
            $user->save();
        }
        return back()->with('success', 'Your images has been successfully Upload');
    }

    public function deleteProfilePicture(Request $request)
    {
        $data = $request->all();
        $basePath = User::ADMIN_IMAGE_PATH;
        $fileName = $data['oldPicture'];
        if ($fileName) {
            $img = explode('.', $fileName);
            foreach (\Config::get('image_size.admin.profile_picture') as $type => $dimension) {

                Storage::delete($basePath . '/' . $img[0] . '-' . $type . '.' . $img[1]);
            }
            Storage::delete($basePath . '/' . $fileName);
            UserImage::query()->where('profile_picture', $fileName)->delete();
        }
        $return['success'] = 'true';
        return response()->json($return);
    }
}
