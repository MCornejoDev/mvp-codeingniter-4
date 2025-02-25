<?php

namespace App\Services;

use App\Models\Link;
use Exception;

class LinkService
{
    public static function getAll(?int $page = 1, ?int $limit = 5): array
    {
        $model = new Link();

        $model->where('link_user_id', session()->get('id'));

        $data = [
            'links' => $model->paginate($limit, 'default', $page),
            'pager' => $model->pager,
        ];

        return $data;
    }

    public static function getBySlug(string $slug)
    {
        $model = new Link();

        return $model->where('url_short', $slug)->first();
    }

    public static function create(array $data)
    {
        try {
            $link = new Link();
            $link->insert($data);
            $id = $link->getInsertID();
            $slug = self::generateSlug($id);
            $link->update($id, ['url_short' => $slug]);
            return $link;
        } catch (Exception $e) {

            log_message('error', 'Error create link: ' . $e->getMessage());
            return false;
        }
    }

    public static function updateClicks($link_id)
    {
        try {
            $model = new Link();

            $link = $model->where('id', $link_id)->first();

            $newClicks = (int) $link['clicks'] + 1;
            $model->where('id', $link_id)->set(['clicks' => $newClicks])->update();

            return true;
        } catch (Exception $e) {
            log_message('error', 'Error updating clicks: ' . $e->getMessage());
        }
    }


    private static function generateSlug($id)
    {
        $hash = md5($id . microtime());

        return substr(base_convert(substr($hash, 0, 8), 16, 36), 0, 6);
    }
}
