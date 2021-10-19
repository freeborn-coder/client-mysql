<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Dlc;
use App\Models\Game;
use App\Models\Movie;
use App\Models\MovieLink;
use App\Models\Package;
use App\Models\PackageGroup;
use App\Models\PackageSub;
use App\Models\PCRequirement;
use Illuminate\Database\Seeder;

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

        // create record for each model
        $game = Game::create([
            'name' => "LEGO® STAR WARS™: The Force Awakens",
            'steam_app_id' => 438640
        ]);

        Dlc::create([
            'game_id' => $game->id,
            'dlc_number' => '466540'
        ]);

        PCRequirement::create([
            'game_id' => $game->id,
            'minimum' => "<strong>Minimum:<\/strong><br><ul class=\"bb_ul\"><li><strong>OS:<\/strong> Windows XP\/Vista\/7\/8\/10<br><\/li><li><strong>Processor:<\/strong> Intel Core 2 Quad Q6600 (2.4 GHz) \/ AMD Phenom x4 9850 (2.5 GHz)<br><\/li><li><strong>Memory:<\/strong> 4 GB RAM<br><\/li><li><strong>Graphics:<\/strong> GeForce GT 430 (1024 MB)\/ Radeon HD 6850 (1024 MB)<br><\/li><li><strong>DirectX:<\/strong> Version 9.0c<br><\/li><li><strong>Network:<\/strong> Broadband Internet connection<br><\/li><li><strong>Storage:<\/strong> 14 GB available space<br><\/li><li><strong>Sound Card:<\/strong> DirectX compatible<br><\/li><li><strong>Additional Notes:<\/strong> Windows XP and DirectX® 9.0b and below not supported<\/li><\/ul>",
            'recommended' => "<strong>Recommended:<\/strong><br><ul class=\"bb_ul\"><li><strong>OS:<\/strong> Windows XP\/Vista\/7\/8\/10<br><\/li><li><strong>Processor:<\/strong> Intel i5, 4 x 2.6 GHz or AMD equivalent<br><\/li><li><strong>Memory:<\/strong> 4 GB RAM<br><\/li><li><strong>Graphics:<\/strong> NVIDIA GeForce GTX 480 or ATI Radeon HD 5850 or better, 1Gb RAM<br><\/li><li><strong>DirectX:<\/strong> Version 11<br><\/li><li><strong>Network:<\/strong> Broadband Internet connection<br><\/li><li><strong>Storage:<\/strong> 14 GB available space<br><\/li><li><strong>Sound Card:<\/strong> DirectX compatible<br><\/li><li><strong>Additional Notes:<\/strong> Windows XP and DirectX® 9.0b and below not supported<\/li><\/ul>"
        ]);

        $package = Package::create([
            'game_id' => $game->id,
            'package_number' => 92457
        ]);

        $pack_group = PackageGroup::create([
            'game_id' => $game->id,
            'title' => "Buy LEGO® STAR WARS™: The Force Awakens"
        ]);

        PackageSub::create([
            'package_id' => $package->id,
            'package_group_id' => $pack_group->id,
            'price_in_cents_with_discount' => 2999.95
        ]);

        $movie = Movie::create([
            'game_id' => $game->id,
            'name' => "LEGO® Star Wars™: The Force Awakens - Announce Trailer",
        ]);

        MovieLink::create([
            'movie_id' => $movie->id,
            'format' => 'webm',
            'quality_480' => "http:\/\/cdn.akamai.steamstatic.com\/steam\/apps\/256660456\/movie480.webm?t=1458847589",
            'quality_max' => "http:\/\/cdn.akamai.steamstatic.com\/steam\/apps\/256660456\/movie_max.webm?t=1458847589"
        ]);

        MovieLink::create([
            'movie_id' => $movie->id,
            'format' => 'mp4',
            'quality_480' => "http:\/\/cdn.akamai.steamstatic.com\/steam\/apps\/256660456\/movie480.mp4?t=1458847589",
            'quality_max' => "http:\/\/cdn.akamai.steamstatic.com\/steam\/apps\/256660456\/movie_max.mp4?t=1458847589"
        ]);

        Achievement::create([
            'game_id' => $game->id,
            'name' => "I'll Come Back For You!",
            'path' => "https:\/\/cdn.akamai.steamstatic.com\/steamcommunity\/public\/images\/apps\/438640\/b8ff93d1dbcaa228b67b8e64d9fb6999126564e3.jpg",
            'highlighted' => true
        ]);

        Achievement::create([
            'game_id' => $game->id,
            'name' => "It Belongs To Me!",
            'path' => "https:\/\/cdn.akamai.steamstatic.com\/steamcommunity\/public\/images\/apps\/438640\/73d4d1f430a2878110aacbcd770fbd24573559bb.jpg",
            'highlighted' => true
        ]);
    }
}
