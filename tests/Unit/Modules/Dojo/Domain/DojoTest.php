<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\Dojo\Domain;

use App\Modules\_Common\Domain\VO\UuidV4;
use App\Modules\Dojo\Domain\Address;
use App\Modules\Dojo\Domain\Dojo;
use App\Modules\Dojo\Domain\VO\DojoName;
use Faker\Factory;
use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\_fixtures\BrazilianStateAcronymFixture;
use Tests\_fixtures\UuidV4Fixture;

final class DojoTest extends TestCase
{
    public static function dojosProvider(): Iterator
    {
        $faker = Factory::create('pt_BR');
        $samplesAmount = 10;
        for ($i = 0; $i < $samplesAmount; $i++) {
            yield [
                UuidV4Fixture::get(),
                $faker->firstName(),
                [
                    'street' => $faker->streetName(),
                    'number' => $faker->buildingNumber(),
                    'neighborhood' => $faker->city(),
                    'city' => $faker->city(),
                    'state' => BrazilianStateAcronymFixture::get(),
                    'zipCode' => $faker->postcode(),
                    'complement' => $faker->randomElement([$faker->company(), null]),
                ],
            ];
        }
    }

    /**
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    #[Test]
    #[DataProvider('dojosProvider')]
    public function itShouldCorrectlyBuild(
        string $uuid,
        string $name,
        array $address,
    ): void {
        $uuidMock = $this->createMock(UuidV4::class);
        $uuidMock->method('value')
            ->willReturn($uuid);
        $dojoNameMock = $this->createMock(DojoName::class);
        $dojoNameMock->method('value')
            ->willReturn($name);
        $addressMock = $this->createMock(Address::class);
        $addressMock->method('getStreet')
            ->willReturn($address['street']);
        $addressMock->method('getNumber')
            ->willReturn($address['number']);
        $addressMock->method('getNeighborhood')
            ->willReturn($address['neighborhood']);
        $addressMock->method('getCity')
            ->willReturn($address['city']);
        $addressMock->method('getState')
            ->willReturn($address['state']);
        $addressMock->method('getZipCode')
            ->willReturn($address['zipCode']);

        $dojo = new Dojo(
            $uuidMock,
            $dojoNameMock,
            $addressMock,
        );

        self::assertEquals($uuid, $dojo->getId());
        self::assertEquals($name, $dojo->getName());
        self::assertEquals($addressMock, $dojo->getAddress());
    }
}
