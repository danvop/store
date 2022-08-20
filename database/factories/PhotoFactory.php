<?php

namespace Database\Factories;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Photo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            //make image
            //make foreign key
            //name
            //path
            //make thumbnail
            //thumblail_path
            // 'path' => $path = $this->faker->image('public/img', 640,480,null,false)
            'name' => $name = $this->faker->sentence(2),
            'path' => $this->faker->image(public_path('photos'), 640,480,null,false),
            'item_id' => 2,
            'thumbnail_path' => $this->faker->image(storage_path('photos'),320,240,null,false)
        ];
    }
}
