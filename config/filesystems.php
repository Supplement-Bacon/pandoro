<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 'ovh'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

        'ovh' => [
            'driver' => 'ovh',
            'authUrl' => env('OS_AUTH_URL', 'https://auth.cloud.ovh.net/v3/'),
            'projectId' => env('OS_PROJECT_ID'),
            'region' => env('OS_REGION_NAME'),
            'userDomain' => env('OS_USER_DOMAIN_NAME', 'Default'),
            'username' => env('OS_USERNAME'),
            'password' => env('OS_PASSWORD'),
            'containerName' => env('OS_CONTAINER_NAME'),

            // Since v1.2
            // Optional variable and only if you are using temporary signed urls.
            // You can also set a new key using the command 'php artisan ovh:set-temp-url-key'.
            'tempUrlKey' => env('OS_TEMP_URL_KEY'),

            // Since v2.1
            // Optional variable and only if you have setup a custom endpoint.
            'endpoint' => env('OS_CUSTOM_ENDPOINT'),

            // Optional variables for handling large objects.
            // Defaults below are 300MB threshold & 100MB segments.
            'swiftLargeObjectThreshold' => env('OS_LARGE_OBJECT_THRESHOLD', 300 * 1024 * 1024),
            'swiftSegmentSize' => env('OS_SEGMENT_SIZE', 100 * 1024 * 1024),
            'swiftSegmentContainer' => env('OS_SEGMENT_CONTAINER', null),

            // Optional variable and only if you would like to DELETE all uploaded object by DEFAULT.
            // This allows you to set an 'expiration' time for every new uploaded object to
            // your container. This will not affect objects already in your container.
            //
            // If you're not willing to DELETE uploaded objects by DEFAULT, leave it empty.
            // Really, if you don't know what you're doing, you should leave this empty as well.
            'deleteAfter' => env('OS_DEFAULT_DELETE_AFTER', null),

            // Optional variable to cache your storage objects in memory
            // You must require league/flysystem-cached-adapter to enable caching
            'cache' => false, // Defaults to false

            // Optional variable to set a prefix on all paths
            'prefix' => null,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
