<?php

namespace App\Virtual\Models;

use DateTime;

/**
 * @OA\Schema(
 *     title="Course",
 *     description="Course model",
 *     @OA\Xml(
 *         name="Course"
 *     )
 * )
 */
class Course
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

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
     *     format="datetime",
     *     type="string"
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
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var DateTime
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     default="Pending",
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
     *     default=false,
     *     format="int64",
     *     description="Course premium flag",
     *     title="Course premium flag",
     * )
     *
     * @var bool
     */
    private $is_premium;
}
