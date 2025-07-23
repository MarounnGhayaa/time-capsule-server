<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\User\MediaService;

class MediaController extends Controller {

    public function getImage($filename) {
        return MediaService::getImageFile($filename);
    }

    public function getAudio($filename) {
        return MediaService::getAudioFile($filename);
    }
}
