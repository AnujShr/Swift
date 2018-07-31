<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserImage extends Model
{
    public static function boot()
    {
        parent::boot();

        static::creating(function () {
            if (self::imageCount() >= 10) {
                self::deleteOldestImage();
            }
        });
    }

    protected $fillable = ['user_id', 'profile_picture'];

    public static function imageCount()
    {
        $user_id = auth()->id();
        $imageCount = UserImage::query()->where('user_id', $user_id)->count();
        return $imageCount;
    }

    public static function deleteOldestImage()
    {
        $user_id = auth()->id();
        $imageCount = UserImage::query()->where('user_id', $user_id)->first();
        $imageCount->delete();
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
            $thmbnailPath = '/storage/' . 'admin/' . $thumbnail;

        } else {
            $thmbnailPath = '/storage/' . 'admin/' . $image;
        }
        return $thmbnailPath;
    }
}
