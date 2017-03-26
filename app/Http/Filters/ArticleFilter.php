<?php

namespace App\Http\Filters;

use Kblais\QueryFilter\QueryFilter;

class ArticleFilter extends QueryFilter
{
    public function title($title)
    {
        return $this->like('title', $title);
    }

    public function author($author)
    {
        return $this->builder->whereHas('author', function ($query) use ($author)
        {
            $query->where('name', 'LIKE', "%$author%");
        });
    }
}
