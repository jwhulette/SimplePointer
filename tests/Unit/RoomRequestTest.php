<?php

namespace Tests\Unit;

use Faker\Factory;
use Tests\TestCase;
use App\Http\Requests\RoomRequest;
use Illuminate\Support\Facades\Validator;

class RoomRequestTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @dataProvider validData
     */
    public function test_valid_request(array $data)
    {
        $request = new RoomRequest();

        $validator = Validator::make($data, $request->rules());

        $this->assertTrue($validator->passes());
    }

    public function validData()
    {
        $faker = Factory::create(Factory::DEFAULT_LOCALE);

        return [
            [[
                'name' => 'test',
                'card_set' => 'this is a test',
            ]],
            [[
                'name' => $faker->word(),
                'card_set' => $faker->word(),
            ]],
        ];
    }

    /**
     * @dataProvider inValidData
     */
    public function test_invalid_request(array $data)
    {
        $request = new RoomRequest();

        $validator = Validator::make($data, $request->rules());

        $this->assertFalse($validator->passes());
    }

    public function inValidData()
    {
        $faker = Factory::create(Factory::DEFAULT_LOCALE);

        return [
            [[]], // missing fields
            [[
                'name' => 'test',
            ]],
            [[
                'card_set' => $faker->word(),
            ]],
            [[
                'name' => str_repeat('a', RoomRequest::ROOM_NAME_LENGTH + 1),
                'card_set' => $faker->word(),
            ]],
        ];
    }
}
