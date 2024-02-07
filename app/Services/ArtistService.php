<?php

namespace App\Services;

use App\Models\Artist;
use Spatie\QueryBuilder\QueryBuilder;


/**
 * Artist service
 */
class ArtistService {
    /**
     * Get QueryBuilder object with allowed filters, to select all artist
     * @return QueryBuilder
     */
    public function list(): QueryBuilder {
        return QueryBuilder::for(Artist::class)
            ->allowedFilters(['email', 'active']);
    }
}
