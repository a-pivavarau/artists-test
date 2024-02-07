<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="Artist API",
 *     version="1.00",
 *     description="Artist API",
 *
 * )
 *
 * @OA\Server(
 *      description="Dev",
 *      url="http://localhost"
 *  )
 *
 * @OA\Schemas (
 *      @OA\Schema(
 *          schema="Collection",
 *          type="object",
 *          @OA\Property(
 *              property="data",
 *              type="array",
 *              items="any",
 *          ),
 *          @OA\Property(
 *              property="links",
 *              type="object",
 *              @OA\Property(
 *                  property="first",
 *                  type="string",
 *                  example="http://localhost/api/v1/resourceName?page=1"
 *              ),
 *              @OA\Property(
 *                  property="last",
 *                  type="string",
 *                  example="http://localhost/api/v1/resourceName?page=100"
 *              ),
 *              @OA\Property(
 *                  property="prev",
 *                  type="string",
 *                  oneOf={
 *                      @OA\Schema(type="string"),
 *                      @OA\Schema(type="null")
 *                  },
 *                  example="null"
 *              ),
 *              @OA\Property(
 *                  property="next",
 *                  type="string",
 *                      oneOf={
 *                      @OA\Schema(type="string"),
 *                      @OA\Schema(type="null")
 *                  },
 *                  example="http://localhost/api/v1/resourceName?page=2"
 *              ),
 *          ),
 *          @OA\Property(
 *              property="meta",
 *              type="object",
 *              @OA\Property(
 *                  property="current_page",
 *                  type="integer",
 *                  example="1"
 *              ),
 *              @OA\Property(
 *                  property="from",
 *                  type="integer",
 *                  example="1"
 *              ),
 *              @OA\Property(
 *                  property="last_page",
 *                  type="integer",
 *                  example="1"
 *              ),
 *              @OA\Property(
 *                  property="path",
 *                  type="string",
 *                  example="http://localhost/api/v1/resourceName"
 *              ),
 *              @OA\Property(
 *                  property="per_page",
 *                  type="integer",
 *                  example="25"
 *              ),
 *              @OA\Property(
 *                  property="to",
 *                  type="integer",
 *                  example="25"
 *              ),
 *              @OA\Property(
 *                  property="total",
 *                  type="integer",
 *                  example="250"
 *              ),
 *          ),
 *     )
 *  )
 **/

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected int $perPage = 25;
}
