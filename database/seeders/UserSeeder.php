<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\User\Models\AppUser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        $sourcePath = public_path('assets/img/avatars');
        $destinationPath = public_path('uploads/avatars');

        // Ensure the destination folder exists
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        $user = [
            'Taylor Swift' => ['female', '01.jpg'],
            'Akshara Gowda Bikki' => ['female', '02.jpg'],
            'Sonakshi Sinha' => ['female', '03.jpg'],
            'Shiva Negar' => ['female', '04.jpg'],
            'Nusraat Faria Mazhar' => ['female', '05.jpg'],
            'Jason Statham' => ['male', '06.jpg'],
            'Robert Downey Jr.' => ['male', '07.jpg'],
            'Dwayne Johnson' => ['male', '01.jpg'],
            'Chris Hemsworth' => ['male', '02.jpg'],
            'Tobey Maguire' => ['male', '03.jpg'],
        ];

        // Get the names and genders as separate arrays
        $userKeys = array_keys($user);

        for ($i = 0; $i < 100; $i++) {
            $randomKey = $userKeys[array_rand($userKeys)];
            $randomName = $randomKey;
            $randomGender = $user[$randomKey][0]; // Get the gender
            $avatar = $user[$randomKey][1]; // Get the avatar image file name
            $index = $i + 1;

            // Copy the avatar image to the destination folder if it doesn't exist
            $sourceFile = $sourcePath . DIRECTORY_SEPARATOR . $avatar;
            $destinationFile = $destinationPath . DIRECTORY_SEPARATOR . $avatar;
            if (File::exists($sourceFile) && !File::exists($destinationFile)) {
                File::copy($sourceFile, $destinationFile);
            }

            $data[] = [
                'email' => 'user' . $index . '@mail.com',
                'user_name' => 'user' . $index . '@mail.com',
                'name' => $randomName,
                'password' => Hash::make('123456a@'),
                'gender_code' => $randomGender,
                'avatar' => 'uploads/avatars/' . $avatar, // Store the new path
                'is_active' => 1,
                //'created_at' => now(), // Prefer Laravel's helper for readability
                //'updated_at' => now(),
            ];
        }

        // Truncate the table before seeding
        AppUser::truncate();

        // Bulk insert the data
        //AppUser::insert($data);

        foreach ($data as $userData) {
            AppUser::create($userData); // This triggers model events
        }

        // Output to the console for confirmation
        echo "100 users have been inserted into the AppUser table, and avatars have been copied.\n";
    }
}
