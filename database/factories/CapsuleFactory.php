<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Capsule>
 */
class CapsuleFactory extends Factory
{
    public function definition(): array
    {
        return [
            "user_id" => 1,
            "title" => $this->faker->realText(15),
            "message" => $this->faker->realText(),
            "privacy" => $this->faker->randomElement(['public', 'private', 'unlisted']),
            "longitude" => $this->faker->longitude,
            "latitude" => $this->faker->latitude,
            "country" => $this->faker->country,
            "ip_address" => $this->faker->ipv4,
            "is_surprise" => $this->faker->boolean,
            "image_path" => 'images/' . $this->faker->uuid . '.jpg',
            "audio_path" => 'audio/' . $this->faker->uuid . '.mp3',
            "cover_image" => 'covers/' . $this->faker->uuid . '.jpg',
            "reveal_at" => $this->faker->dateTimeBetween('now', '+1 year'),
            "mood" => $this->faker->word,
            "emoji" => $this->faker->randomElement(['😊', '😢', '🎉', '💡', '❤️', '🔥', '🌟', '📦', '🎁', '🕰️']),
            "color" => $this->faker->hexColor,
        ];
    }
}
