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
        return asset($this->getThumbnailPath($path, $image, $type));
    }

    public function getThumbnailPath($path, $image, $type)
    {
        $img = explode('.', $image);
        $thumbnail = $img[0] . '-' . $type . '.' . $img[1];
        if (Storage::exists($path . $thumbnail)) {
            $thmbnailPath = 'storage' . $path . $thumbnail;

        } else {
            $thmbnailPath = 'storage' . $path . $image;
        }
        return $thmbnailPath;
    }
}
