<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FolderPanelTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_panel_folder_index_page_(): void
    {
        $response = $this->get(route('panel.folder.index'));

        $response->assertStatus(200);
    }
}
