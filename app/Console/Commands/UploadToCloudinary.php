<?php

namespace App\Console\Commands;

use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Resize;
use Cloudinary\Transformation\Format;
use Symfony\Component\Finder\Finder;
use Illuminate\Console\Command;

class UploadToCloudinary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:upload-to-cloudinary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload images in public to cloudinary';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cloudinary = new Cloudinary();

        $finder = new Finder();
        $finder->files()->in('storage/app/public');

        foreach ($finder as $file) {
            $relativePathname = $file->getRelativePathname();
            $publicId = ltrim(pathinfo($relativePathname, PATHINFO_FILENAME), './');
            $cloudinary->uploadApi()->upload($file, [
                'folder' => pathinfo($relativePathname, PATHINFO_DIRNAME),
                'public_id' => $publicId,
                'overwrite' => true,
            ]);
        }
    }
}
