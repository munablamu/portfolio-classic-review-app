<?php

require 'vendor/autoload.php';

use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Resize;
use Cloudinary\Transformation\Format;
use Symfony\Component\Finder\Finder;

$cloudinary = new Cloudinary();

$finder = new Finder();
$finder->files()->in('storage/app/public');

foreach ($finder as $file) {
    $publicId = $file->getRelativePathname();
    $cloudinary->uploadApi()->upload($file, [
        'folder' => pathinfo($publicId, PATHINFO_DIRNAME),
        'public_id' => pathinfo($publicId, PATHINFO_FILENAME),
        'overwrite' => true,
    ]);
}
