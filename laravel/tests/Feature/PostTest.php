<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class PostTest extends TestCase
{
    public function test_post_list()
    {
        // List all files using API web service
        $response = $this->getJson("/api/posts");
        // Check OK response
        $this->_test_ok($response);
        // Check JSON dynamic values
        $response->assertJsonPath("data",
            fn ($data) => is_array($data)
        );
    }
    
    public function test_post_create() : object
    {
        // Create fake file
        $name  = "jeje.png";
        $size = 500; /*KB*/
        $upload = UploadedFile::fake()->image($name)->size($size);

        // Create fake post

        $placeName = "hola";
        $placeDescription = "si";
        $placeLatitude = 4;
        $placeLatitude = 23;
        $placeCategory_id = 3;
        $placeVisibility_id = 2;
        $placeAuthor_id = 4;


        // Upload fake file using API web service
        $response = $this->postJson("/api/files", [
            "upload" => $upload,
        ]);
        // Check OK response
        $this->_test_ok($response, 201);
        // Check validation errors
        $response->assertValid(["upload"]);
        // Check JSON exact values
        $response->assertJsonPath("data.filesize", $size*1024);
        // Check JSON dynamic values
        $response->assertJsonPath("data.id",
            fn ($id) => !empty($id)
        );
        $response->assertJsonPath("data.filepath",
            fn ($filepath) => str_contains($filepath, $name)
        );
        // Read, update and delete dependency!!!
        $json = $response->getData();
        return $json->data;
    }
    
    public function test_file_create_error()
    {
        // Create fake file with invalid max size
        $name  = "jeje.png";
        $size = 5000; /*KB*/
        $upload = UploadedFile::fake()->image($name)->size($size);
        // Upload fake file using API web service
        $response = $this->postJson("/api/files", [
            "upload" => $upload,
        ]);
        // Check ERROR response
        $this->_test_error($response);
    }
    
    /**
        * @depends test_file_create
        */
    public function test_post_read(object $post)
    {
        // Read one file
        $response = $this->getJson("/api/posts/{$post->id}");
        // Check OK response
        $this->_test_ok($response);

    }
    
    public function test_file_read_notfound()
    {
        $id = "not_exists";
        $response = $this->getJson("/api/places/{$id}");
        $this->_test_notfound($response);
    }
    
    /**
        * @depends test_file_create
        */
    public function test_file_update(object $file)
    {
        
    }
    
    /**
        * @depends test_file_create
        */
    public function test_file_update_error(object $file)
    {
        
    }
    
    public function test_file_update_notfound()
    {
        
    }
    
    /**
        * @depends test_file_create
        */
    public function test_file_delete(object $file)
    {
        
    }
    
    public function test_file_delete_notfound()
    {
        
    }
    
    protected function _test_ok($response, $status = 200)
    {
        // Check JSON response
        $response->assertStatus($status);
        // Check JSON properties
        $response->assertJson([
            "success" => true,
            "data"    => true // any value
        ]);
    }
    
    protected function _test_error($response)
    {
        // Check response
        $response->assertStatus(422);
        // Check validation errors
        $response->assertInvalid(["upload"]);
        // Check JSON properties
        $response->assertJson([
            "message" => true, // any value
            "errors"  => true, // any value
        ]);       
        // Check JSON dynamic values
        $response->assertJsonPath("message",
            fn ($message) => !empty($message) && is_string($message)
        );
        $response->assertJsonPath("errors",
            fn ($errors) => is_array($errors)
        );
    }
    
    protected function _test_notfound($response)
    {
        // Check JSON response
        $response->assertStatus(404);
        // Check JSON properties
        $response->assertJson([
            "success" => false,
            "message" => true // any value
        ]);
        // Check JSON dynamic values
        $response->assertJsonPath("message",
            fn ($message) => !empty($message) && is_string($message)
        );       
    }
}
