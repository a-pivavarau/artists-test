<?php

namespace App\Http\Resources;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Artist
 * @OA\Schemas (
 *     @OA\Schema(
 *         schema="Artist",
 *         type="object",
 *         @OA\Property(
 *             property="id",
 *             type="integer",
 *             example="1"
 *         ),
 *         @OA\Property(
 *             property="first_name",
 *             type="string",
 *             example="Firstname"
 *         ),
 *         @OA\Property(
 *             property="last_name",
 *             type="string",
 *             example="Lastname"
 *          ),
 *         @OA\Property(
 *              property="email",
 *              type="string",
 *              example="example@example.com"
 *          ),
 *         @OA\Property(
 *                property="active",
 *                type="boolean",
 *                example="true"
 *          ),
 *         @OA\Property(
 *                property="created_at",
 *                type="string",
 *                example="2024-02-06T15:43:40.000000Z"
 *          ),
 *         @OA\Property(
 *                property="updated_at",
 *                type="string",
 *                example="2024-02-06T15:43:40.000000Z"
 *          )
 *     )
 *  )
 **/

class ArtistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'active' => $this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
