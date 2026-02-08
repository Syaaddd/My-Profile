<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ImageUploadService extends FileUploadService
{
    /**
     * Upload image with optional resizing
     *
     * @param UploadedFile $file
     * @param string $directory
     * @param array $sizes - ['thumbnail' => [150, 150], 'medium' => [300, 300]]
     * @param string|null $oldFile
     * @return array
     */
    public function uploadImage(UploadedFile $file, string $directory, array $sizes = [], ?string $oldFile = null): array
    {
        // Delete old file if exists
        if ($oldFile) {
            $this->deleteImageWithSizes($oldFile, array_keys($sizes));
        }

        $results = [];
        $extension = $file->getClientOriginalExtension();
        $baseFilename = Str::uuid() . '_' . time();

        // Upload original
        $originalPath = $directory . '/' . $baseFilename . '.' . $extension;
        $file->storeAs($directory, $baseFilename . '.' . $extension, 'public');
        $results['original'] = $originalPath;

        // Create resized versions
        foreach ($sizes as $name => $dimensions) {
            $resizedPath = $directory . '/' . $baseFilename . '_' . $name . '.' . $extension;
            
            $image = Image::read($file->getRealPath());
            $image->scale(width: $dimensions[0], height: $dimensions[1]);
            $image->save(storage_path('app/public/' . $resizedPath));
            
            $results[$name] = $resizedPath;
        }

        return $results;
    }

    /**
     * Delete image with all sizes
     *
     * @param string $originalPath
     * @param array $sizeNames
     * @return void
     */
    public function deleteImageWithSizes(string $originalPath, array $sizeNames = []): void
    {
        // Delete original
        $this->delete($originalPath);

        // Delete resized versions
        $pathInfo = pathinfo($originalPath);
        foreach ($sizeNames as $name) {
            $sizedPath = $pathInfo['dirname'] . '/' . $pathInfo['filename'] . '_' . $name . '.' . $pathInfo['extension'];
            $this->delete($sizedPath);
        }
    }

    /**
     * Get image URL with size
     *
     * @param string|null $path
     * @param string|null $size
     * @return string|null
     */
    public function getImageUrl(?string $path, ?string $size = null): ?string
    {
        if (!$path) {
            return null;
        }

        if ($size) {
            $pathInfo = pathinfo($path);
            $sizedPath = $pathInfo['dirname'] . '/' . $pathInfo['filename'] . '_' . $size . '.' . $pathInfo['extension'];
            
            if (Storage::disk('public')->exists($sizedPath)) {
                return $this->getUrl($sizedPath);
            }
        }

        return $this->getUrl($path);
    }
}