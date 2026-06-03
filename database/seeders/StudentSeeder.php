<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            ['full_name' => 'Ahmed Mohamed', 'gender' => 'male', 'address' => 'Jigjiga Yar, Hargeisa, Somaliland', 'phone' => '+252 63 4123456', 'email' => 'ahmed.mohamed@student.sl'],
            ['full_name' => 'Ayan Hassan', 'gender' => 'female', 'address' => 'New Hargeisa, Hargeisa, Somaliland', 'phone' => '+252 65 5234567', 'email' => 'ayan.hassan@student.sl'],
            ['full_name' => 'Abdirahman Ali', 'gender' => 'male', 'address' => 'Mohamed Mooge, Hargeisa, Somaliland', 'phone' => '+252 63 6345678', 'email' => 'abdirahman.ali@student.sl'],
            ['full_name' => 'Hodan Yusuf', 'gender' => 'female', 'address' => 'October, Hargeisa, Somaliland', 'phone' => '+252 65 7456789', 'email' => 'hodan.yusuf@student.sl'],
            ['full_name' => 'Mohamed Ibrahim', 'gender' => 'male', 'address' => 'Isha Boorama, Hargeisa, Somaliland', 'phone' => '+252 63 8567890', 'email' => 'mohamed.ibrahim@student.sl'],
            ['full_name' => 'Fadumo Ahmed', 'gender' => 'female', 'address' => 'Jigjiga Yar, Hargeisa, Somaliland', 'phone' => '+252 65 9678901', 'email' => 'fadumo.ahmed@student.sl'],
            ['full_name' => 'Ismail Hassan', 'gender' => 'male', 'address' => 'New Hargeisa, Hargeisa, Somaliland', 'phone' => '+252 63 1789012', 'email' => 'ismail.hassan@student.sl'],
            ['full_name' => 'Khadija Warsame', 'gender' => 'female', 'address' => 'Mohamed Mooge, Hargeisa, Somaliland', 'phone' => '+252 65 2890123', 'email' => 'khadija.warsame@student.sl'],
            ['full_name' => 'Omar Abdi', 'gender' => 'male', 'address' => 'October, Hargeisa, Somaliland', 'phone' => '+252 63 3901234', 'email' => 'omar.abdi@student.sl'],
            ['full_name' => 'Sahra Jama', 'gender' => 'female', 'address' => 'Isha Boorama, Hargeisa, Somaliland', 'phone' => '+252 65 4012345', 'email' => 'sahra.jama@student.sl'],
            ['full_name' => 'Khalid Ismail', 'gender' => 'male', 'address' => '26 June, Hargeisa, Somaliland', 'phone' => '+252 63 5123456', 'email' => 'khalid.ismail@student.sl'],
            ['full_name' => 'Hamda Mohamed', 'gender' => 'female', 'address' => 'Ahmed Dhagah, Hargeisa, Somaliland', 'phone' => '+252 65 6234567', 'email' => 'hamda.mohamed@student.sl'],
            ['full_name' => 'Yusuf Ali', 'gender' => 'male', 'address' => 'State House, Hargeisa, Somaliland', 'phone' => '+252 63 7345678', 'email' => 'yusuf.ali@student.sl'],
            ['full_name' => 'Nimo Ibrahim', 'gender' => 'female', 'address' => 'Jigjiga Yar, Hargeisa, Somaliland', 'phone' => '+252 65 8456789', 'email' => 'nimo.ibrahim@student.sl'],
            ['full_name' => 'Mahad Hassan', 'gender' => 'male', 'address' => 'New Hargeisa, Hargeisa, Somaliland', 'phone' => '+252 63 9567890', 'email' => 'mahad.hassan@student.sl'],
            ['full_name' => 'Sagal Abdi', 'gender' => 'female', 'address' => 'Mohamed Mooge, Hargeisa, Somaliland', 'phone' => '+252 65 1678901', 'email' => 'sagal.abdi@student.sl'],
            ['full_name' => 'Jamal Yusuf', 'gender' => 'male', 'address' => 'October, Hargeisa, Somaliland', 'phone' => '+252 63 2789012', 'email' => 'jamal.yusuf@student.sl'],
            ['full_name' => 'Amina Warsame', 'gender' => 'female', 'address' => 'Isha Boorama, Hargeisa, Somaliland', 'phone' => '+252 65 3890123', 'email' => 'amina.warsame@student.sl'],
            ['full_name' => 'Saeed Ahmed', 'gender' => 'male', 'address' => '26 June, Hargeisa, Somaliland', 'phone' => '+252 63 4901234', 'email' => 'saeed.ahmed@student.sl'],
            ['full_name' => 'Shukri Hassan', 'gender' => 'female', 'address' => 'Ahmed Dhagah, Hargeisa, Somaliland', 'phone' => '+252 65 5012345', 'email' => 'shukri.hassan@student.sl'],
            ['full_name' => 'Abdi Mohamed', 'gender' => 'male', 'address' => 'State House, Hargeisa, Somaliland', 'phone' => '+252 63 6123456', 'email' => 'abdi.mohamed@student.sl'],
            ['full_name' => 'Warsame Ali', 'gender' => 'male', 'address' => 'Jigjiga Yar, Hargeisa, Somaliland', 'phone' => '+252 65 7234567', 'email' => 'warsame.ali@student.sl'],
        ];

        $year = now()->format('Y');

        foreach ($students as $index => $student) {
            Student::create([
                'student_id' => sprintf('STU-%s-%04d', $year, $index + 1),
                'full_name' => $student['full_name'],
                'address' => $student['address'],
                'phone' => $student['phone'],
                'email' => $student['email'],
                'photo' => null,
                'gender' => $student['gender'],
                'date_of_birth' => now()->subYears(rand(18, 28))->subDays(rand(0, 364))->format('Y-m-d'),
            ]);
        }
    }
}
