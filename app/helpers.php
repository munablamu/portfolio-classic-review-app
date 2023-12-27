<?php
declare(strict_types=1);

use GuzzleHttp\Client;

if ( !function_exists('logo_url') ) {
    function logo_url(string $extension): string
    {
        $imagesDirectory = 'images/';

        if ( $extension === 'ico' ) {
            $filename = 'favicon.ico';
        } else {
            $filename = 'ClassicMusicReviewAppIcon.png';
        }

        if ( app()->environment('production') ) {
            return (string) app()
                ->make(\Cloudinary\Cloudinary::class)
                ->image($imagesDirectory . $filename)
                ->secure();
        } else {
            return asset('storage/' . $imagesDirectory . $filename);
        }
    }
}

if ( !function_exists('top_background_url') ) {
    function top_background_url(): string
    {
        $imagesDirectory = 'images/';
        $filename = 'top_image.png';

        if ( app()->environment('production') ) {
            return (string) app()
                ->make(\Cloudinary\Cloudinary::class)
                ->image($imagesDirectory . $filename)
                ->secure();
        } else {
            return asset('storage/' . $imagesDirectory . $filename);
        }
    }
}

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

if ( !function_exists('subscription_icon_url') ) {
    function subscription_icon_url(?string $filename): string
    {
        $subscriptionIconDirectory = 'subscription_icons/';

        if ( app()->environment('production') ) {
            return (string) app()
                ->make(\Cloudinary\Cloudinary::class)
                ->image($subscriptionIconDirectory . $filename)
                ->secure();
        } else {
            return asset('storage/' . $subscriptionIconDirectory . $filename);
        }
    }
}

if ( !function_exists('highlightKeyword') ) {
    function highlightKeyword(?string $str, string $keyword): ?string
    {
        $delimiter = '/';
        $keyword = preg_quote($keyword, $delimiter); // ユーザー入力のkeywordの中に存在する正規表現の特殊文字をエスケープ

        if ( $str !== null) {
            $str = preg_replace_callback_array(
                ["/$keyword/i" => function($matches) {
                    return '<strong class="strong-color">' . $matches[0] . '</strong>';
                }], $str, 1
            );
        }

        return $str;
    }
}

if ( !function_exists('extractKeywordContext') ) {
    function extractKeywordContext(string $str): ?string
    {
        preg_match('/(.{0,50})<strong class="strong-color">.*?<\/strong>(.{0,50})/u', $str, $matches);

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

if ( !function_exists('translate') ) {
    function translate(string $str, string $targetLang='EN'): string
    {
        $client = new Client();

        $response = $client->post('https://api-free.deepl.com/v2/translate', [
            'headers' => [
                'Authorization' => 'DeepL-Auth-Key ' . config('services.deepl.secret'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'text' => [
                    $str
                ],
                'target_lang' => $targetLang,
            ],
        ]);

        $body = $response->getBody()->__toString();
        $data = json_decode($body);

        return $data->translations[0]->text;
    }
}


if ( !function_exists('isJapanese') ) {
    function isJapanese(string $str): bool
    {
        return preg_match('/[\p{Script=Hiragana}\p{Script=Katakana}\p{Script=Han}ーａ-ｚＡ-Ｚ０-９々〆〤]/u', $str) > 0;
    }
}
