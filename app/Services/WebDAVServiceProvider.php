<?php

namespace App\Services;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use League\Flysystem\WebDAV\WebDAVAdapter;
use Sabre\DAV\Client;

class WebDAVServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Storage::extend('custom', function ($app, $config) {
            // Initialize WebDAV client
            $client = new Client([
                'baseUri'  => $config['baseUri'],
                'userName' => $config['userName'],
                'password' => $config['password'],
            ]);

            // Create WebDAV adapter
            $adapter = new WebDAVAdapter($client);
            $filesystem = new Filesystem($adapter);

            // Return Laravel-compatible FilesystemAdapter
            return new FilesystemAdapter($filesystem, $adapter);
        });
    }
}
