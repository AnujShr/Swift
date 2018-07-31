<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;
    const ADMIN_IMAGE_PATH = '/public/admin/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'confirmation_token', 'confirmed', 'skill', 'profile_picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function oldPictures()
    {
        return $this->hasMany(UserImage::class);
    }


    public function getThumbnail($path, $image, $type)
    {
        $img = explode('.', $image);
        $thumbnail = $img[0] . '-' . $type . '.' . $img[1];
        if (Storage::exists($path . $thumbnail)) {
            $thmbnailPath = '/storage/' . 'admin/' . $thumbnail;

        } else {
            $thmbnailPath = '/storage/' . 'admin/' . $image;
        }
        return asset($thmbnailPath);
    }

    public function profilePicture()
    {
        $profile_pictures = $this->profile_picture;
        if ($profile_pictures)
            return $this->getThumbnail(User::ADMIN_IMAGE_PATH, $profile_pictures, 'thumb');
        else
            return '';
    }

    public static function adminDetail()
    {
        $user = User::query()->find(auth()->id());
        return $user;
    }
}
