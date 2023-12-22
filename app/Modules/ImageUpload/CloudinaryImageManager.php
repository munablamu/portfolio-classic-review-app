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
    public function save(UploadedFile $file, ?string $dir=null): string
    {
        $publicId = $file->getClientOriginalName();

        if ( $dir === null ) {
            // public_idを明示しないことで、自動でランダムなIDを採番してくれる
            return $this->cloudinary
                ->uploadApi()->upload($file->getRealPath(), [
                    // 'public_id' => pathinfo($publicId, PATHINFO_FILENAME),
                    'overwrite' => false,
                ])['public_id'];
        } else {
            // public_idを明示しないことで、自動でランダムなIDを採番してくれる
            $publicId =  $this->cloudinary
                ->uploadApi()->upload($file->getRealPath(), [
                    'folder' => $dir,
                    // 'public_id' => pathinfo($publicId, PATHINFO_FILENAME),
                    'overwrite' => false,
                ])['public_id'];
            return pathinfo($publicId, PATHINFO_BASENAME);
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
