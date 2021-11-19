<?php

namespace Neputer\Traits;

use Neputer\Entities\History;

/**
 * Trait HistoryTrait
 * @package Neputer\Traits
 */
trait HistoryTrait
{

    /**
     * Get all of the histories for the entity/model.
     */
    public function histories()
    {
        return $this->morphMany(History::class, 'historyable');
    }

}
