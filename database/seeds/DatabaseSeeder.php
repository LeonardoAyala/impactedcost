<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
        factory(App\User::class, 3)->create()->each(function($user){
            $user->environments()
            ->saveMany(
                factory(App\Environment::class, rand(1, 2))->create()->each(function($environment){
                    $environment->projects()
                    ->saveMany(
                        factory(App\Project::class, rand(1, 2))->create()->each(function($project){
                            $project->reports()
                            ->saveMany(
                                factory(App\Report::class, rand(1, 2))->make()
                            );
                        })


                    );
                })


            );
        });
*/
        $this->call(ProjectCategorySeeder::class);
    }
}
