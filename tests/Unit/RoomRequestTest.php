<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Http\Requests\RoomRequest;
use Faker\Factory;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class RoomRequestTest extends TestCase
{
    public static function validData(): array
    {
        $faker = Factory::create();

        return [
            [
                [
                    'name'     => 'test',
                    'card_set' => 'this is a test',
                ],
            ],
            [
                [
                    'name'     => $faker->word(),
                    'card_set' => $faker->word(),
                ],
            ],
        ];
    }

    /** @return array<int,mixed> */
    public static function inValidData(): array
    {
        $faker = Factory::create();

        return [
            [[]], // missing fields
            [
                [
                    'name' => 'test',
                ],
            ],
            [
                [
                    'card_set' => $faker->word(),
                ],
            ],
            [
                [
                    'name'     => str_repeat('a', RoomRequest::ROOM_NAME_LENGTH + 1),
                    'card_set' => $faker->word(),
                ],
            ],
        ];
    }

    #[Test]
    #[DataProvider('validData')]
    public function test_valid_request(array $data): void
    {
        $request = new RoomRequest();

        $validator = Validator::make($data, $request->rules());

        $this->assertTrue($validator->passes());
    }

    #[Test]
    #[DataProvider('inValidData')]
    public function test_invalid_request(array $data): void
    {
        $request = new RoomRequest();

        $validator = Validator::make($data, $request->rules());

        $this->assertFalse($validator->passes());
    }
}
