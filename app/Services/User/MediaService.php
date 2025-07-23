<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Response;

class MediaService {
    public static function getImageFile($filename) {
        $path = storage_path('app/private/images/' . $filename);

        if (!file_exists($path)) {
            abort(404, 'Image not found');
        }

        return Response::file($path);
    }

    public static function getAudioFile($filename) {
        $path = storage_path('app/private/audios/' . $filename);

        if (!file_exists($path)) {
            abort(404, 'Audio not found');
        }

        return Response::file($path, [
            'Content-Type' => 'audio/mpeg',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    }

    public static function saveBase64Image($base64Image) {
        preg_match("/^data:image\/(.*);base64,/", $base64Image, $matches);
        $imageType = $matches[1] ?? 'png';

        $imageData = preg_replace("/^data:image\/(.*);base64,/", '', $base64Image);
        $imageData = base64_decode($imageData);

        $directory = storage_path('app/private/images');
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        $fileName = uniqid() . '.' . $imageType;
        file_put_contents($directory . '/' . $fileName, $imageData);

        return 'private/images/' . $fileName;
    }

    public static function saveBase64Audio($base64Audio) {
        preg_match("/^data:audio\/(.*);base64,/", $base64Audio, $matches);
        $audioType = $matches[1] ?? 'mp3';

        if ($audioType === 'mpeg') {
            $audioType = 'mp3';
        }

        $audioData = preg_replace("/^data:audio\/(.*);base64,/", '', $base64Audio);
        $audioData = base64_decode($audioData);

        $directory = storage_path('app/private/audios');
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        $fileName = uniqid() . '.' . $audioType;
        file_put_contents($directory . '/' . $fileName, $audioData);

        return 'private/audios/' . $fileName;
    }
}
