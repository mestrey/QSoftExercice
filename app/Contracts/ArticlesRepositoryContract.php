<?php

namespace App\Contracts;

interface ArticlesRepositoryContract
{
    public function get(int $count = 0, int $page = 0);
    public function delete($article);
    public function create(array $data);
    public function update($article, array $data);
}
