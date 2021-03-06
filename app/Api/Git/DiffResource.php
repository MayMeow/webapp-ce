<?php

namespace App\Api\Git;

use GitElephant\Objects\Diff\Diff;

class DiffResource
{

    public function __construct($entity)
    {
        $this->entity  = $entity;
    }

    public static function collection(Diff $entity)
    {
        if (null == $entity) return null;
        
        // using classs type with function param definition
        //if (! $entity instanceof DiffObject) throw new \Exception("Entity must be instance of " . DiffObject::class);

        $array = [];
        $AnonymousResource = get_called_class();

        foreach ($entity as $item)
        {
            $array[] = (new $AnonymousResource($item))->toArray();
        }
        
        return $array;
    }

}
