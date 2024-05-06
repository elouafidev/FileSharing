<?php

namespace Tests\Feature;

use App\Models\Folder;
use App\Models\Role;
use App\Models\Sheet;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class HomeFrontTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_redirect_to_file_manager_page(): void
    {
        $response = $this->get('/');
        $response->assertRedirect('home')->assertStatus(302);

        $response = $this->get('/home');
        $response->assertRedirect('/FileManager')->assertStatus(302);

        $response = $this->get('/FileManager');
        $response->assertStatus(200);
    }
    public function test_unauth_user_canot_access_profile()
    {
        $response = $this->get(route('profile'));
        $response->assertRedirect(route('login'));
        $response->assertStatus(302);
    }
    public function test_no_access_page_if_auth()
    {
        $response = $this->get(route('noaccess'));
        $response->assertStatus(200);
    }

    public function test_unauth_user_canot_access_sheet()
    {
        $response = $this->get(route('file_manager.sheet'));
        $response->assertStatus(404);
    }

    public function test_unauth_user_canot_access_sheet_white_id()
    {
        $sheet = Sheet::factory()->create();
        $response = $this->get(route('file_manager.sheet',['id' => $sheet->id]));
        $response->assertRedirect(route('noaccess'));
        $response->assertStatus(302);
    }
    public function test_auth_user_admin_can_access_sheet()
    {
        $user = User::factory()->create();
        $user->Roles()->attach([Role::factory()->create()->id]);
        $sheet = Sheet::factory()->create();
        $response = $this->actingAs($user)->get(route('file_manager.sheet',['id'=>$sheet->id]));
        $response->assertStatus(200);
    }
    public function test_auth_user_admin_can_access_file_manager_white_id_folder()
    {
        $user = User::factory()->create();
        $user->Roles()->attach([Role::factory()->create()->id]);
        $folder = Folder::factory()->create();
        $response = $this->get(route('file_manager',['id'=>$folder->id]));
        $response->assertStatus(200);
    }

    public function test_contact_page()
    {
        $response = $this->get(route('contact'));
        $response->assertStatus(200);
    }
    public function test_contact_page_post()
    {
        Session::start();
        $response = $this->call('POST', route('contact.store'),[
            '_token' => csrf_token(),
            'name' => fake()->name,
            'email' => fake()->email,
            'subject' => 'test subject',
            'message' => fake()->paragraph()
        ]);

        $response->assertStatus(302);
    }

}
