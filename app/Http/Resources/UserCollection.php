<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    private $statusText;

    public function __construct($resource, $statusText = 'success')
    {
        parent::__construct($resource);
        $this->statusText = $statusText;
    }


    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'status' => $this->statusText,
            'count' => $this->collection->count(),

        ];
    }
}
