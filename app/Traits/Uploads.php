<?php

namespace App\Traits;

trait Uploads
{
    public function storeImage($dataImage, $pathImage): bool|string
    {
        if ($dataImage != null) {
            return $this->moveImageToStorage($dataImage, $pathImage);
        }
        else
            return false;

    }

    public function updateImage($dataImage, $pathImage, $oldName): bool|string
    {
        if (file_exists($oldName)) {
            @unlink($oldName);
        }
        if ($dataImage != null)
            return $this->moveImageToStorage($dataImage, $pathImage);
        else
            return false;

    }

    public function deleteImage($oldName): bool
    {
        if (file_exists($oldName)) {
            @unlink($oldName);
            return true;
        } else {
            return false;
        }
    }

    protected function moveImageToStorage($dataImage, $pathImage): string
    {
        $newName = $this->generateRandomName($dataImage);
        $dataImage->storePubliclyAs($pathImage, $newName);
        return $newName;
    }

    private function generateRandomName($dataImage): string
    {
        return uniqid() . time() . rand(1111111, 9999999) . '.' . $dataImage->extension();
    }
}
