<?php

namespace App\Services;

use App\Models\Link;

class LinkService
{
    public static function getAll(): array
    {
        return (new Link())->findAll();
    }
}
