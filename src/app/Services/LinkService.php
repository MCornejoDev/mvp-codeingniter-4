<?php

namespace App\Services;

use App\Models\Link;
use Exception;

class LinkService
{
    public static function getAll(?int $page = 1, ?int $limit = 5): array
    {
        $model = new Link();

        $data = [
            'links' => $model->paginate($limit, 'default', $page),
            'pager' => $model->pager,
        ];

        return $data;
    }

    public static function create(array $data): bool
    {
        try {
            $data['url_short'] = self::shortenUrl($data['url']);

            return (new Link())->insert($data);
        } catch (Exception $e) {
            //throw $th;
        }
    }

    public static function shortenUrl(string $url): string
    {
        $url = str_replace('http://', '', $url);
        $url = str_replace('https://', '', $url);

        return substr($url, 0, 10);
    }
}
