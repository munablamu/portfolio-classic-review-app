<?php
declare(strict_types=1);

if ( !function_exists('jacket_url') ) {
    function jacket_url(?string $filename): string
    {
        $jacketsDirectory = 'jackets/';

        if ( $filename === null ) {
            $filename = 'NO_IMAGE.jpeg';
        }

        if ( app()->environment('production') ) {
            return (string) app()
                ->make(\Cloudinary\Cloudinary::class)
                ->image($jacketsDirectory . $filename)
                ->secure();
        } else {
            return asset('storage/' . $jacketsDirectory . $filename);
        }
    }
}

if ( !function_exists('user_icon_url') ) {
    function user_icon_url(?string $filename): string
    {
        $userIconDirectory = 'user_icons/';

        if ( $filename === null ) {
            $filename = 'default_icon.jpg';
        }

        if ( app()->environment('production') ) {
            return (string) app()
                ->make(\Cloudinary\Cloudinary::class)
                ->image($userIconDirectory . $filename)
                ->secure();
        } else {
            return asset('storage/' . $userIconDirectory . $filename);
        }
    }
}
