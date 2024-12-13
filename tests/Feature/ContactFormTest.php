<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_create_contact_page()
    {
        $response = $this->get('/contacts/create');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_access_create_contact_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/contacts/create');
        $response->assertStatus(200);
    }

    public function test_name_is_required_for_contact_creation()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/contacts', [
            'name' => '',
            'contact' => '123456789',
            'email' => 'test@example.com',
        ]);

        $response->assertSessionHasErrors(['name']);
    }

    public function test_contact_is_required_for_contact_creation()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/contacts', [
            'name' => 'John Doe',
            'contact' => '',
            'email' => 'test@example.com',
        ]);

        $response->assertSessionHasErrors(['contact']);
    }

    public function test_email_must_be_valid_for_contact_creation()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/contacts', [
            'name' => 'John Doe',
            'contact' => '123456789',
            'email' => 'not-an-email',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    public function test_name_is_required_for_contact_edit()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $contact = Contact::factory()->create();

        $response = $this->put("/contacts/{$contact->id}", [
            'name' => '',
            'contact' => '123456789',
            'email' => 'test@example.com',
        ]);

        $response->assertSessionHasErrors(['name']);
    }
}
