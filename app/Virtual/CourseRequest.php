<?php

namespace App\Virtual;

use DateTime;

/**
 * @OA\Schema(
 *      title="Store Course request",
 *      description="Store Course request body data",
 *      type="object",
 *      required={"title", "description"}
 * )
 */
class CourseRequest
{
    /**
     * @OA\Property(
     *      title="Title",
     *      description="Title of the new course",
     *      example="My Course"
     * )
     *
     * @var string
     */
    private $title;

    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description of the new course",
     *      example="This is new course's description"
     * )
     *
     * @var string
     */
    private $description;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2023-03-27 17:50:45",
     * )
     *
     * @var DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2023-03-27 17:50:45",
     * )
     *
     * @var DateTime
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     title="Course status.",
     *     description="Course status.",
     *     enum={"Pending", "Published"},
     * )
     *
     * @var string
     */
    private $status;

    /**
     * @OA\Property(
     *     description="Course premium flag",
     *     title="Course premium flag",
     * )
     *
     * @var bool
     */
    private $is_premium;
}
