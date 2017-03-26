<?php

namespace App\Http\Filters;

use Kblais\QueryFilter\QueryFilter;

class ArticleFilter extends QueryFilter
{
    public function title($title)
    {
        return $this->like('title', $title);
    }
}
