<?php

namespace App\Facades;

use App\Services\FileService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string save(\Illuminate\Http\UploadedFile $file, string $path)
 * @method static string update(\Illuminate\Http\UploadedFile $newFile, string $existingFilePath, string $path)
 * @method static bool delete(string $filePath)
 *
 * @see FileService
 */
class FileFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return FileService::class;
    }
}
