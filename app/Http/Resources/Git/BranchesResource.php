<?php

namespace App\Http\Resources\Git;

use App\Api\Git\GitResource;

class BranchesResource extends GitResource
{
    public function toArray()
    {
        return [
            'name' => $this->entity->getName(),
            'hash' => $this->entity->getSha(),
            'full_ref' => $this->entity->getFullRef(),
            'is_current' => $this->entity->getCurrent(),
            'commit' => [
                'hash_short' => $this->entity->getCommit()->getSha(true),
                'message' => $this->entity->getCommit()->getMessage()->getShortMessage(),
                'created_at' => $this->entity->getCommit()->getDateTimeAuthor()
            ]
        ];
    }
}
