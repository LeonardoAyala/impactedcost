<?php

use Illuminate\Database\Seeder;
use App\ProjectCategory;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project_category = new ProjectCategory();
        $project_category->name = 'Pre-proyecto';
        $project_category->save();

        $project_category = new ProjectCategory();
        $project_category->name = 'Proyecto';
        $project_category->save();

        $project_category = new ProjectCategory();
        $project_category->name = 'Capacitación';
        $project_category->save();

        $project_category = new ProjectCategory();
        $project_category->name = 'Vacaciones';
        $project_category->save();

        $project_category = new ProjectCategory();
        $project_category->name = 'Estándares';
        $project_category->save();

        $project_category = new ProjectCategory();
        $project_category->name = 'Servicios';
        $project_category->save();
    }
}
