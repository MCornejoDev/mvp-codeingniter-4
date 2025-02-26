<?php

namespace App\Models;

use CodeIgniter\Model;

class Link extends Model
{
    protected $table = 'links';
    protected $primaryKey = 'id';
    protected $allowedFields = ['url', 'url_short', 'clicks', 'link_user_id'];
    protected $useTimestamps = true;

    protected $afterFind = ['getUser'];

    protected $validationRules = [
        'url' => 'required|valid_url_strict|is_unique[links.url]',
    ];

    protected $validationMessages = [
        'url' => [
            'required' => 'La URL es obligatoria.',
            'valid_url_strict' => 'La URL ingresada no es válida.',
            'is_unique' => 'Esta URL ya ha sido acortada.'
        ]
    ];

    protected function getUser(array $data)
    {

        if (!empty($data['data'])) {
            $model = new User();

            if (isset($data['data'][0])) {
                foreach ($data['data'] as &$post) {
                    $post['user'] = $model->select(['id', 'username', 'email'])->find($post['link_user_id'] ?? null);
                }
            } else {
                $data['data']['user'] = $model->select(['id', 'username', 'email'])->find($data['data']['link_user_id'] ?? null);
            }
        }

        return $data;
    }
}
