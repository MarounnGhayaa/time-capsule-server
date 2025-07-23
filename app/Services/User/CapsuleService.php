<?php

namespace App\Services\User;

use App\Models\Capsule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;
use Illuminate\Validation\ValidationException;
use App\Services\User\MediaService;
use Illuminate\Support\Str;


class CapsuleService {
    public static function getPublicCapsules() {
        return Capsule::where('privacy', 'public')
            ->where('reveal_at', '<', now())
            ->with('capsuleAuthor')
            ->get();
    }

    public static function getUserCapsules($userId) {
        return Capsule::where('user_id', $userId)->get();
    }

    public static function getPastCapsules($userId) {
        return Capsule::where('user_id', $userId)
            ->where('reveal_at', '<', now())
            ->orderBy('reveal_at', 'desc')
            ->get();
    }

    public static function getUpcomingCapsules($userId) {
        return Capsule::where('user_id', $userId)
            ->where('reveal_at', '>', now())
            ->get();
    }

    public static function getSharedCapsuleData($token) {
        $capsule = Capsule::where('unlisted_token', $token)->first();

        if (!$capsule) {
            return null;
        }

        return [
            'title' => $capsule->title,
            'message' => $capsule->message,
            'privacy' => $capsule->privacy,
            'longitude' => $capsule->longitude,
            'latitude' => $capsule->latitude,
            'ip_address' => $capsule->ip_address,
            'country' => $capsule->country,
            'is_surprise' => $capsule->is_surprise,
            'image_path' => $capsule->image_path,
            'audio_path' => $capsule->audio_path,
            'cover_image' => $capsule->cover_image,
            'reveal_at' => $capsule->reveal_at,
            'mood'=> $capsule->mood,
            'emoji' => $capsule->emoji,
            'color' => $capsule->color
        ];
    }


    public static function createCapsule(array $data, $id = null) {
        $dataReq = [
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'privacy' => 'required|in:private,public,unlisted',
            'is_surprise' => 'required|boolean',
            'image_path' => 'string',
            'audio_path' => 'string',
            'cover_image' => 'string',
            'reveal_at' => 'required|date',
            'mood' => 'required|string',
            'emoji' => 'required|string',
            'color' => 'required|string',
        ];

        $validator = Validator::make($data, $dataReq);

        $validatedData = $validator->validated();
        $validatedData['user_id'] = Auth::id();

        $ip = request()->ip();
        $location = Location::get($ip);

        $validatedData['longitude'] = $location->longitude ?? null;
        $validatedData['latitude'] = $location->latitude ?? null;
        $validatedData['ip_address'] = $ip;
        $validatedData['country'] = $location->countryName ?? 'Somewhere On Earth';
        
        if (!empty($validatedData['audio_path']) && str_starts_with($validatedData['audio_path'], 'data:audio')) {
            $validatedData['audio_path'] = MediaService::saveBase64Audio($validatedData['audio_path']);
        }

        if (!empty($validatedData['cover_image']) && str_starts_with($validatedData['cover_image'], 'data:image')) {
            $validatedData['cover_image'] = MediaService::saveBase64Image($validatedData['cover_image']);
        }

        if (!empty($validatedData['image_path']) && str_starts_with($validatedData['image_path'], 'data:image')) {
            $validatedData['image_path'] = MediaService::saveBase64Image($validatedData['image_path']);
        }

        $capsule = $id ? Capsule::find($id) : new Capsule();
        if ($id && !$capsule) {
            throw new \Exception("Capsule with id {$id} not found.");
        }

        if (($validatedData['privacy'] ?? null) === 'unlisted') {
            $capsule->unlisted_token = Str::uuid();
        } else {
            $capsule->unlisted_token = null;
        }
        
        $capsule->fill($validatedData);
        $capsule->save();

        return $capsule;
    }
}