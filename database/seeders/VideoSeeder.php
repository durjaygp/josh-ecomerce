<?php
//
//namespace Database\Seeders;
//
//use Faker\Factory as Faker;
//use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\DB;
//
//class VideoSeeder extends Seeder
//{
//    /**
//     * Run the database seeds.
//     */
//    public function run(): void
//    {
//        $faker = Faker::create();
//        $fake_images = [
//            '1.jpg', '8.jpg', '9.jpg', '10.jpg', '7.jpg', '6.jpg', '5.jpg', '4.jpg', '3.jpg', '2.jpg', '11.jpg',
//        ];
//
//        $categoryIds = \App\Models\VideoCategory::pluck('id')->toArray();
//   //     $files = Storage::disk('webdav')->files('video');
//        // Extract only file names and sort them alphabetically
//    //    $videos = collect($files)->map(fn($file) => basename($file))->sort()->values()->all();
//        $files = Storage::disk('webdav')->files('video');
//
//        // Extract only file names and sort them alphabetically
//        $videos = collect($files)->map(function ($file) {
//            return basename($file); // Extract file name
//        })->sort()->values()->all(); // Sort and reindex array
//
//        foreach ($videos as $video){
//           $row[] = $video;
//        }
//
//        for ($i = 1; $i <= 20; $i++) {
//            DB::table('videos')->insert([
//                'name' => $faker->sentence(),
//                'slug' => $faker->unique()->slug(),
//                'image' => 'uploads/images/' . $faker->randomElement($fake_images),
//                'main_content' => $faker->sentence(),
//                'description' => $faker->paragraph(),
//                'video_category_id' => $faker->randomElement($categoryIds),
//                'status' => 1,
//                'video' => $row,
//                'seo_description' => 'SEO description goes here',
//                'seo_title' => 'SEO tags go here',
//                'seo_keywords' => 'SEO keywords go here',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ]);
//        }
//    }
//}


namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $fake_images = [
            '1.jpg', '8.jpg', '9.jpg', '10.jpg', '7.jpg', '6.jpg', '5.jpg', '4.jpg', '3.jpg', '2.jpg', '11.jpg',
        ];

        $categoryIds = \App\Models\VideoCategory::pluck('id')->toArray();
        $files = Storage::disk('webdav')->files('video');

        // Extract only file names and sort them alphabetically
        $videos = collect($files)
            ->map(fn($file) => basename($file))
            ->sort()
            ->values()
            ->all();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('videos')->insert([
                'name' => $faker->sentence(),
                'slug' => $faker->unique()->slug(),
                'image' => 'uploads/images/' . $faker->randomElement($fake_images),
                'main_content' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'video_category_id' => $faker->randomElement($categoryIds),
                'status' => 1,
                'video' => !empty($videos) ? $faker->randomElement($videos) : null, // Ensure only one video per row
                'seo_description' => 'SEO description goes here',
                'seo_title' => 'SEO tags go here',
                'seo_keywords' => 'SEO keywords go here',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
