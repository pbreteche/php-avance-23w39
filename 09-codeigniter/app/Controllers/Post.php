<?php

namespace App\Controllers;

use App\Models\PostModel;

class Post extends BaseController
{
    public function index(): string
    {
        $model = model(PostModel::class);

        $data['posts'] = $model->getLatest2();
        return view('post/index', $data);
    }
}
