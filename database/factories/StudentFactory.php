<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;

    /** @var list<string> */
    protected static array $maleFirstNames = [
        'Ahmed', 'Mohamed', 'Abdirahman', 'Ismail', 'Ibrahim', 'Yusuf', 'Ali', 'Hassan',
        'Omar', 'Khalid', 'Saeed', 'Jamal', 'Abdi', 'Warsame', 'Mahad',
    ];

    /** @var list<string> */
    protected static array $femaleFirstNames = [
        'Ayan', 'Hodan', 'Fadumo', 'Amina', 'Khadija', 'Sahra', 'Hamda', 'Nimo', 'Sagal', 'Shukri',
    ];

    /** @var list<string> */
    protected static array $lastNames = [
        'Mohamed', 'Hassan', 'Ali', 'Yusuf', 'Ibrahim', 'Ahmed', 'Ismail', 'Abdi', 'Warsame', 'Jama',
    ];

    /** @var list<string> */
    protected static array $districts = [
        'Jigjiga Yar, Hargeisa, Somaliland',
        'New Hargeisa, Hargeisa, Somaliland',
        'Mohamed Mooge, Hargeisa, Somaliland',
        'October, Hargeisa, Somaliland',
        'Isha Boorama, Hargeisa, Somaliland',
        '26 June, Hargeisa, Somaliland',
        'Ahmed Dhagah, Hargeisa, Somaliland',
        'State House, Hargeisa, Somaliland',
    ];

    public function definition(): array
    {
        $gender = fake()->randomElement(['male', 'female']);
        $firstName = $gender === 'male'
            ? fake()->randomElement(static::$maleFirstNames)
            : fake()->randomElement(static::$femaleFirstNames);
        $lastName = fake()->randomElement(static::$lastNames);
        $fullName = "{$firstName} {$lastName}";

        return [
            'student_id' => 'STU-'.now()->format('Y').'-'.fake()->unique()->numerify('####'),
            'full_name' => $fullName,
            'address' => fake()->randomElement(static::$districts),
            'phone' => $this->somalilandPhone(),
            'email' => fake()->unique()->safeEmail(),
            'photo' => null,
            'gender' => $gender,
            'date_of_birth' => fake()->dateTimeBetween('-30 years', '-18 years'),
        ];
    }

    protected function somalilandPhone(): string
    {
        $prefix = fake()->randomElement(['63', '65']);
        $number = fake()->unique()->numerify('#######');

        return "+252 {$prefix} {$number}";
    }
}
