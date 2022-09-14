<?php

namespace Database\Factories;

use App\Models\Photo;
use Intervention\Image\Facades\Image;
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
        // images store in folder public/photos
        // thumbnails store in folder public/thumbnails
        // with the same name

        $fakerImage = $this->faker->image(public_path('photos'), 720, 720, false, false);

        $img = Image::make(public_path('photos/').$fakerImage)->resize(50,50);

        $img->save(public_path('thumbnails/').$fakerImage);

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
            // 'path' => basename($fakerFileName),
            // 'path' => basename($fakerImage),
            'path' => $fakerImage,
            'item_id' => 2,
            'thumbnail_path' => $fakerImage
            // 'thumbnail_path' => basename($fakerThumbnail)
        ];
    }
}
