<?php

namespace App\Traits;

trait SaveImages
{
    public function saveLogo($file)
    {
        $filename = 'logo-company-' . time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public', $filename);

        return $filename;
    }
}
