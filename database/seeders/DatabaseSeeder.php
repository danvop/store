<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Photo;
use App\Models\Store;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $files = File::files(public_path("photos/"));
        array_map(fn($file) => File::delete($file->getPathname()), $files);

        $user = User::factory()->create();

        $defaultStore = Store::factory()->create([
            'user_id' => $user->id,
            'name' => 'No Store',
            'description' => 'Default Store'
        ]);


        Item::factory()->count(2)->create([
            'store_id' => $defaultStore->id,
            'user_id' => $user->id,
        ]);

        $stores = Store::factory()->count(2)->create([
            'user_id' => $user->id
        ]);

        foreach($stores as $store){
            $sub_stores = Store::factory()->count(2)->create([
                'user_id' => $user->id,
                'parent_id' => $store->id
            ]);

            foreach($sub_stores as $store) {
                Store::factory()->count(2)->create([
                    'user_id' => $user->id,
                    'parent_id' => $store->id
                ]);
            }

        }

        foreach(Store::all() as $store) {
            Item::factory()->count(2)->create([
                'store_id' => $store->id,
                'user_id' => $user->id,
            ]);
        }

        foreach(Store::all() as $store) {
            Item::factory()->count(2)->has(
                Photo::factory()->count(3)
                )->create([
                'store_id' => $store->id,
                'user_id' => $user->id,
            ]);
        }





    }
}
