<?php
declare(strict_types=1);

namespace App\Modules\ImageUpload;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class LocalImageManager implements ImageManagerInterface
{
    public function save(UploadedFile $file, ?string $dir=null): string
    {
        $tmp_dir_path = ($dir === null) ? '' : $dir . '/';
        do {
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
        } while ( Storage::exists('public/' . $dir . $filename) );

        $tmp_dir_path = ($dir === null) ? '' : '/' . $dir;
        $file->storeAs('public' . $tmp_dir_path, $filename);

        return $filename;
    }

    public function delete(string $path): void
    {
        $filePath = 'public/' . $path;
        if ( Storage::exists($filePath) ) {
            Storage::delete($filePath);
        }
    }
}
