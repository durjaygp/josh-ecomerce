<?php
namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use \Illuminate\Database\Eloquent\Factories\HasFactory;



class BlogSeeder extends Seeder
{
  // Use the full namespace for HasFactory
    use HasFactory;
    public function run()
    {
        Blog::factory()->count(30)->create();
    }
}
