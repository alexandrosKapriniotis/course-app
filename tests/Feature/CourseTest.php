<?php

namespace Tests\Feature;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseTest extends TestCase
{
    /** @test */
    function a_course_requires_a_valid_title(){
        $this->json('POST','api/courses/',[
            'description' => 'my description'
        ])->assertStatus(422)->assertSeeText('The title field is required.');
    }

    /** @test */
    function a_course_requires_a_valid_description(){
        $this->json('POST','api/courses/',[
            'title' => 'My Course'
        ])->assertStatus(422)->assertSeeText('The description field is required.');
    }

    /** @test */
    function a_user_can_get_all_courses() {
        $this->json('GET','api/courses/')
             ->assertStatus(200)
             ->assertJsonCount(Course::count());
    }

    /** @test */
    function a_user_can_get_a_specific_course() {
        $course = Course::factory()->create(['title' => 'My Course', 'description' => 'my description']);

        $response = $this->json('GET','api/courses/'. $course->id)
            ->assertStatus(200);

        $this->assertEquals('My Course', $response->json('title'));
        $this->assertEquals('my description', $response->json('description'));
    }

    /** @test */
    function a_user_can_create_a_course() {
        $coursesBefore = Course::count();

        $this->json('POST','api/courses/',[
            'title' => 'My Course',
            'description' => 'my description'
        ])->assertStatus(201);

        $this->assertEquals($coursesBefore + 1, Course::count());
    }

    /** @test */
    function a_user_can_update_a_course() {
        $course = Course::factory()->create(['title' => 'My Course', 'description' => 'my description']);

        $this->json('PUT','api/courses/'. $course->id,[
            'title' => 'My changed Course',
            'description' => 'my description'
        ])->assertStatus(200);

        $this->assertEquals('My changed Course', $course->fresh()->title);
    }

    /** @test */
    function a_user_can_delete_a_course() {
        $course = Course::factory()->create(['title' => 'My Course', 'description' => 'my description']);

        $this->json('DELETE', '/api/courses/'. $course->id)
             ->assertStatus(204);

        $this->json('GET', '/api/courses/'. $course->id)->assertStatus(404);
    }
}
