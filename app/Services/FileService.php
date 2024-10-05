<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public function save(UploadedFile $file, string $path): string
    {
        $filePath = $file->store($path, 'public');
        return asset('storage/' . $filePath);
    }

    public function update(UploadedFile $newFile, string $existingFilePath, string $path): string
    {
        $existingFilePath = str_replace(asset('storage/'), '', $existingFilePath);

        if (Storage::disk('public')->exists($existingFilePath)) {
            Storage::disk('public')->delete($existingFilePath);
        }

        return $this->save($newFile, $path);
    }

    public function delete(string $filePath): bool
    {
        $filePath = str_replace(asset('storage/'), '', $filePath);

        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->delete($filePath);
        }

        return false;
    }
}
