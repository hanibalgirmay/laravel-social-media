<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    //
    public function index($user)
    {
        $user = User::findOrFail($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profiles.index', [
            'user' => $user,
            "follows" => $follows
        ]);
    }

    public function edit(\App\Models\UserInfo $user)
    {
        // $this->authorize('update', $user->user_info);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->user_info);
        $data = request()->validate([
            'title' => "required",
            'bio' => "required",
            'url' => "url",
            "profile_image" => "",
        ]);

        //does not validate user just accept
        // $user->user_info()->update($data);

        //better way
        //exrea layer of protection

        if (request('profile_image')) {
            $imagePath = request('profile_image')->store('avatar', 'public');

            $profile_image = Image::make(public_path("storage/${imagePath}"));
            $profile_image->fit(600, 350, function ($constraint) {
                $constraint->upsize();
            });
            $profile_image->save();
            // dd($data);
            $imageArr = ['profile_image' => $imagePath];
        }
        auth()->user()->user_info->update(array_merge(
            $data,
            $imageArr ?? [],
        ));



        return redirect("/profile/{$user->id}");
    }
}
