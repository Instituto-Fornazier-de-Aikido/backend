<?php

declare(strict_types=1);

namespace Tests\Feature\Dojo;

use App\Core\Dojo\Infrastructure\Model\Dojo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DojoQueries extends TestCase
{
    use RefreshDatabase;

    private static User $user;

    public function afterRefreshingDatabase(): void
    {
        self::$user = User::factory()->create();
    }

    #[Test]
    public function itShouldCorrectlyShowADojo(): void
    {
        $dojo = Dojo::factory()->create();
        Passport::actingAs(self::$user, ['*']);
        $response = $this->get(sprintf('/api/dojos/%s', $dojo->uuid));
        $response->assertStatus(200);
    }
}
