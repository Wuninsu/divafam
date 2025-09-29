<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
class FilePreviewImport implements ToArray
{
    public function array(array $array)
    {
        // Return the raw array data so we can count beneficiaries
        return $array;
    }
}
