<?php

namespace App\Http\Resources\Git;

use App\Api\Git\GitResource;

class TreeResource extends GitResource
{
    public function toArray()
    {
        return [
            'name' => $this->entity->getName(),
            'type' => $this->entity->getType(),
            'sha' => $this->entity->getSha(),
            'path' => $this->entity->getPath(),
            'last_commit' => [
                'sha' => $this->entity->getLastCommit()->getSha(),
            ]
        ];
    }
}
