<?php

namespace App\Http\Controllers\Import;

use App\Services\FileService;

class BaseController
{
    protected $service;

    public function __construct(FileService $service)
    {
        $this->service = $service;
    }
}
