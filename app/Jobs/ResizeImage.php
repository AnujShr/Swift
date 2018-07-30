<?php

namespace App\Jobs;

use App\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $filePath;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path_info = pathinfo($this->filePath);
        $basePath = $path_info['dirname'];
        $image_name = $path_info['filename'];
        $extension = $path_info['extension'];

        foreach (\Config::get('image_size.admin.profile_picture') as $sizeName => $size) {

            try {
                $image = Image::make(Storage::get($this->filePath));
            } catch (FileNotFoundException $e) {
                }

            $image->resize(null, $size[1], function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $image->fit($size[0], $size[1]);
            $new_fileName = $image_name . '-' . $sizeName . '.' . $extension;
            Storage::put($basePath . '/' . $new_fileName, $image->encode());
        }
    }
}
