<?php
declare(strict_types=1);

use Illuminate\Support\Collection;

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


if ( !function_exists('highlightKeyword') ) {
    function highlightKeyword(?string $str, string $keyword): ?string
    {
        $keyword = preg_quote($keyword); // ユーザー入力のkeywordの中に存在する正規表現の特殊文字をエスケープ

        if ( $str !== null) {
            $str = preg_replace_callback("/$keyword/i", function($matches) {
                return '<strong>' . $matches[0] . '</strong>';
            }, $str);
        }

        return $str;
    }
}

if ( !function_exists('extractKeywordContext') ) {
    function extractKeywordContext(?string $str): ?string
    {
        preg_match('/(.{0,50})<strong>.*?<\/strong>(.{0,50})/u', $str, $matches);

        if ( !empty($matches) ) {
            $result = $matches[0];

            if (mb_strlen($matches[1]) === 50) {
                $result = '...' . $result;
            }
            if (mb_strlen($matches[2]) === 50) {
                $result .= '...';
            }
        } else {
            if (mb_strlen($str) > 100) {
                $result = mb_substr($str, 0, 100) . '...';
            } else {
                $result = $str;
            }
        }

        return $result;
    }
}
