<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\Folder;
use App\Models\Role;
use App\Models\Sheet;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    /**
     * test Dashboard panel
     */
    public function test_unauth_user_canot_access_panel(): void
    {
        $response = $this->get('/AdminPanel');
        $response->assertRedirect('AdminPanel/login');
    }
    public function test_auth_user_admin_can_access_panel(): void
    {
        $user = User::factory()->create();
        $user->Roles()->attach([Role::factory()->create()->id]);
        $response = $this->actingAs($user)->get('/AdminPanel');
        $response->assertRedirect('AdminPanel/folder');
    }
    public function test_auth_user_visitor_canot_access_panel(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/AdminPanel');
        $response->assertForbidden();
    }
    public function test_unauth_user_canot_access_panel_file_manager(): void
    {
        $response = $this->get(route('panel.folder.index'));
        $response->assertRedirect('AdminPanel/login');
    }
    public function test_auth_user_admin_can_access_file_manager_create_sheet(): void
    {
        $user = User::factory()->create();
        $user->Roles()->attach([Role::factory()->create()->id]);
        $sheet = Sheet::factory()->create();
        $folder = Folder::factory()->create();
        $response = $this->actingAs($user)->get(route('panel.folder.sheet.create',$folder,$sheet));
        $response->assertStatus(200);
    }
    public function test_auth_user_admin_can_access_file_manager_sheet_edit(): void
    {
        $user = User::factory()->create();
        $user->Roles()->attach([Role::factory()->create()->id]);
        $sheet = Sheet::factory()->create();
        $folder = Folder::factory()->create();
        $sheet->folder_id = $folder->id;
        $sheet->save();
        $response = $this->actingAs($user)->get(route('panel.folder.sheet.edit',['folder_id' => $folder->id,'id'=>$sheet->id]));
        $response->assertStatus(200);
    }
    public function test_auth_user_admin_can_access_file_manager_create_folder(): void
    {
        $user = User::factory()->create();
        $user->Roles()->attach([Role::factory()->create()->id]);
        $folder = Folder::factory()->create();
        $response = $this->actingAs($user)->get(route('panel.folder.create',$folder));
        $response->assertStatus(200);
    }
    public function test_auth_user_admin_can_access_contact_show()
    {
        $user = User::factory()->create();
        $user->Roles()->attach([Role::factory()->create()->id]);
        $contact = Contact::factory()->create();
        $response = $this->actingAs($user)->get(route('panel.contact.show', $contact));
        $response->assertOk();
    }

    public function test_unauth_user_canot_access_panel_contact(): void
    {
        $response = $this->get(route('panel.contact.index',false));
        $response->assertRedirect('AdminPanel/login');
    }
    public function test_unauth_user_cannot_access_panel_contact_show(): void{
        $contact = Contact::factory()->create();
        $response = $this->get(route('panel.contact.show',['id'=>$contact->id],false));
        $response->assertRedirect('AdminPanel/login');
    }
    public function test_auth_user_admin_can_access_contact(): void
    {
        $user = User::factory()->create();
        $user->Roles()->attach([Role::factory()->create()->id]);
        $response = $this->actingAs($user)->get(route('panel.contact.index'));
        $response->assertOk();
    }

    public function test_unauth_user_canot_access_panel_profile_user(): void
    {
        $response = $this->get(route('panel.user.profile',false));
        $response->assertRedirect('AdminPanel/login');
    }
    public function test_auth_user_admin_can_access_panel_profile_user(): void
    {
        $user = User::factory()->create();
        $user->Roles()->attach([Role::factory()->create()->id]);
        $response = $this->actingAs($user)->get(route('panel.user.profile',false));
        $response->assertStatus(200);
    }

    public function test_unauth_user_cannot_access_panel_folders(): void{
        $response = $this->get(route('panel.folder.index'));
        $response->assertRedirect('AdminPanel/login');

    }
    public function test_auth_user_admin_can_access_panel_folders(): void{
        $user = User::factory()->create();
        $user->Roles()->attach([Role::factory()->create()->id]);
        $response = $this->actingAs($user)->get(route('panel.folder.index'));
        $response->assertStatus(200);
    }
    public function test_unauth_user_cannot_access_panel_folders_edit(): void{
        $folder = Folder::factory()->create();
        $response = $this->get(route('panel.folder.edit',['id' => $folder->id],false));
        $response->assertRedirect('AdminPanel/login');
    }
    public function test_auth_user_admin_can_access_panel_folders_edit(): void{
        $user = User::factory()->create();
        $user->Roles()->attach([Role::factory()->create()->id]);
        $folder = Folder::factory()->create();
        $response = $this->actingAs($user)->get(route('panel.folder.edit',['id'=>$folder->id]));
        $response->assertStatus(200);
    }
    public function test_unauth_user_cannot_access_panel_folders_create(): void{
        $folder = Folder::factory()->create();
        $response = $this->get(route('panel.folder.create',['parent_id' => $folder->id],false));
        $response->assertRedirect('AdminPanel/login');
    }
    public function test_auth_user_admin_can_access_panel_folders_create(): void{
        $user = User::factory()->create();
        $user->Roles()->attach([Role::factory()->create()->id]);
        $folder = Folder::factory()->create();
        $response = $this->actingAs($user)->get(route('panel.folder.create',['parent_id' => $folder->id],false));
        $response->assertStatus(200);
    }
    public function test_unauth_user_cannot_access_panel_folders_index(): void{
        $response = $this->get(route('panel.folder.index',false));
        $response->assertRedirect('AdminPanel/login');
    }
    public function test_unauth_user_cannot_access_panel_folders_show(): void{
        $response = $this->get(route('panel.folder.show',false));
        $response->assertRedirect('AdminPanel/login');
    }
}
