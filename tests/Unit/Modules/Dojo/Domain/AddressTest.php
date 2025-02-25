<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Dojo\Domain;

use App\Core\_Common\Domain\VO\BrazilianStateAcronym;
use App\Core\_Common\Domain\VO\BrazilianZipCode;
use App\Core\Dojo\Domain\Address;
use Faker\Factory;
use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\_fixtures\BrazilianStateAcronymFixture;

class AddressTest extends TestCase
{
    public static function addressProvider(): Iterator
    {
        $faker = Factory::create('pt_BR');
        $samplesAmount = 10;
        for ($i = 0; $i < $samplesAmount; $i++) {
            yield [
                'street' => $faker->streetName(),
                'number' => $faker->buildingNumber(),
                'neighborhood' => $faker->city(),
                'city' => $faker->city(),
                'state' => BrazilianStateAcronymFixture::get(),
                'zipCode' => $faker->postcode(),
                'complement' => $faker->randomElement([$faker->company(), null]),
            ];
        }
    }

    #[Test]
    #[DataProvider('addressProvider')]
    public function itShouldCorrectlyBuild(
        string $street,
        string $number,
        string $neighborhood,
        string $city,
        string $state,
        string $zipCode,
        ?string $complement,
    ): void {
        $brazilianZipCodeMock = $this->createMock(BrazilianZipCode::class);
        $brazilianZipCodeMock->method('value')
            ->willReturn($zipCode);
        $brazilianStateAcronymMock = $this->createMock(BrazilianStateAcronym::class);
        $brazilianStateAcronymMock->method('value')
            ->willReturn($state);

        $address = new Address(
            $street,
            $number,
            $neighborhood,
            $city,
            $brazilianStateAcronymMock,
            $brazilianZipCodeMock,
            $complement
        );

        self::assertEquals($street, $address->getStreet());
        self::assertEquals($number, $address->getNumber());
        self::assertEquals($neighborhood, $address->getNeighborhood());
        self::assertEquals($city, $address->getCity());
        self::assertEquals($state, $address->getState());
        self::assertEquals($zipCode, $address->getZipCode());
        self::assertEquals($complement, $address->getComplement());
    }
}
