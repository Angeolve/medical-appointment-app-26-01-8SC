<?php


use App\Models\User;
use Tests\TestCase; // Asegúrate de que esta línea exista
use Illuminate\Foundation\Testing\RefreshDatabase;

// EL CAMBIO CLAVE: Debes incluir TestCase::class aquí
uses(TestCase::class, RefreshDatabase::class);

test('un usuario no puede eliminarse a sí mismo', function () {

    // 1) Crear un usuario en la BD de pruebas
    $user = User::factory()->create(
        [
            'email_verified_at' => now()
        ]
    );

    // 2) Simular que el usuario inició sesión
    $this->actingAs($user, 'web');

    // 3) Simular que intenta borrar un usuario
    $response = $this->delete(route('admin.users.destroy', $user));

    // 4) Esperar a que el servidor bloquee esta acción
    $response->assertStatus(403);

    // 5) Verificamos que el usuario siga existiendo en la base de datos
    $this->assertDatabaseHas('users', [
        'id' => $user->id,
    ]);

});