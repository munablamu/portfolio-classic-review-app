<?php
declare(strict_types=1);

namespace App\Modules\ImageUpload;

use Illuminate\Http\UploadedFile;

interface ImageManagerInterface
{
    /**
     * @param \Illuminate\Http\File|\Illuminate\http\UploadedFile|string $file
     * @return string
     */
    public function save(UploadedFile $file, ?string $dir): string;

    public function delete(string $path): void;
}
