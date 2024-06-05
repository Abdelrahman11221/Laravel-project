<?php
namespace App\Http\Traits;

trait filetrait{
    public function uploading($file, $filenamePrefix, $path, $oldFilePath = null)
    {
        try {
            $extension = $file->getClientOriginalExtension();
            $timestamp = time();
            $filename = $timestamp . '_' . $filenamePrefix . '.' . $extension;

            $file->move(public_path($path), $filename);

            if (!is_null($oldFilePath)) {
                unlink(public_path($oldFilePath));
            }

            return $filename;
        } catch (\Exception $e) {
            // Handle the exception, log it, or throw a more specific exception
            // For example: throw new FileUploadException('Failed to upload file');
            return null;
        }
    }
}