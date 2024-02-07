<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtistIndexRequest;
use App\Http\Resources\ArtistResource;
use App\Services\ArtistService;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Tag(
 *      name="Artists"
 * )
 */

class ArtistController extends Controller
{

    /**
     * @OA\Get (
     *     path="/api/v1/artists",
     *     summary="Get all artists",
     *     description="Returns paginated artists resource. Can filtred by 'active' and 'email' fields",
     *     operationId="get-all-artists",
     *     tags={"Artists"},
     *     @OA\PathParameter(
     *         name="filter[email]",
     *         in="query",
     *         required=false,
     *         allowEmptyValue=true,
     *         example="ma"
     *     ),
     *     @OA\PathParameter(
     *          name="filter[active]",
     *          in="query",
     *          required=false,
     *          allowEmptyValue=true,
     *          example="1"
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="OK",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(ref="#/components/schemas/Collection"),
     *              },
     *             @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(
     *                      ref="#/components/schemas/Artist"
     *                  )
     *              ),
     *          )
     *      )
     * )
     */
    public function index(ArtistIndexRequest $request, ArtistService $service): ResourceCollection
    {
        return ArtistResource::collection(
            $service->list()->paginate($this->perPage)
        );
    }
}
