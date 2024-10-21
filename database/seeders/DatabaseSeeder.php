<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Src\Employer\Infrastructure\EloquentModels\EmployerEloquentModel;
use Src\Job\Infrastructure\EloquentModels\JobEloquentModel;
use Src\JobApplication\Infrastructure\EloquentModels\JobApplicationEloquentModel;
use Src\User\Infrastructure\EloquentModels\UserEloquentModel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = UserEloquentModel::create([
            'name' => 'Anh Quoc',
            'email' => 'anhquoc18092003@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $employer = EmployerEloquentModel::create([
            'company_name' => 'Over Power',
            'user_id' => $user->id,
        ]);

        for ($i = 0; $i < 100; $i++) {
            JobEloquentModel::create([
                'title' => 'Job ' . $i,
                'location' => 'Hanoi' . $i,
                'salary' => 10000000,
                'description' => 'Description ' . $i,
                'experience' => JobEloquentModel::$experiences[rand(0, 2)],
                'category' => JobEloquentModel::$categories[rand(0, 2)],
                'employer_id' => $employer->id,
            ]);
        }

        // foreach ($users as $user) {
        //     $jobs = JobEloquentModel::inRandomOrder()->take(rand(1, 4))->get();
        //     foreach ($jobs as $job) {
        //         JobApplicationEloquentModel::factory()->create([
        //             'job_id' => $job->id,
        //             'user_id' => $user->id,
        //         ]);
        //     }
        // }
    }
}
