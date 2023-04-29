<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Image upload process
     * @param UploadedFile $file
     * @param string $name
     * 
    */
    public function uploadImageToStorage(UploadedFile $file, string $name)
    {
        $newFilename = $file->getClientOriginalName();
        return Storage::disk( 'media' )->putFileAs( date( 'm-d-h-i-s' ), $file, $newFilename );
    }

}
