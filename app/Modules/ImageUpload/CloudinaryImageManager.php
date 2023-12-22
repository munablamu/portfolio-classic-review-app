<?php
declare(strict_types=1);

namespace App\Modules\ImageUpload;

use Cloudinary\Cloudinary;
use Illuminate\Http\UploadedFile;

class CloudinaryImageManager implements ImageManagerInterface
{

    public function __construct(private Cloudinary $cloudinary)
    {

    }

    /**
     * @throws \Cloudinary\Api\Exception\ApiError
     */
    public function save(UploadedFile $file, ?string $dir): string
    {
        $publicId = $file->getClientOriginalName();

        if ( $dir === null ) {
            return $this->cloudinary
                ->uploadApi()->upload($file->getRealPath(), [
                    'public_id' => pathinfo($publicId, PATHINFO_FILENAME),
                    'overwrite' => false,
                ])['public_id'];
        } else {
            return $this->cloudinary
                ->uploadApi()->upload($file->getRealPath(), [
                    'folder' => $dir,
                    'public_id' => pathinfo($publicId, PATHINFO_FILENAME),
                    'overwrite' => false,
                ])['public_id'];
        }
    }

    /**
     * @throws \Cloudinary\Api\Exception\ApiError
     */
    public function delete(string $path): void
    {
        $this->cloudinary->uploadApi()->destroy($path);
    }
}
