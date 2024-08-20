<?php

use App\Models\Category;
use App\Models\NewPages;
use App\Models\Setting;

if (!function_exists('printMenuCategory')) {
    function printMenuCategory() {
        return Category::latest()->where('status', 1)->get();
    }
}
if (!function_exists('setting')) {
    function setting() {
        return Setting::find(1);
    }
}

if (!function_exists('websitePages')) {
    function websitePages() {
        return NewPages::latest()->where('status', 1)->get();
    }
}
