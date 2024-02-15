<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        Project::truncate();
        for ($i = 0; $i < 40; $i++) {

            $type = Type::inRandomOrder()->first();

            $newproject = new Project();

            $newproject->title = $faker->sentence(7);
            $newproject->description = $faker->text(500);
            $newproject->slug = Str::of($newproject->title)->slug('-');
            $newproject->languages = $faker->randomElement(['HTML, CSS e JS', 'PHP']);
            $newproject->frameworks = $faker->randomElement(['Laravel', 'Lang', 'Vue', 'Angular', 'Bootstrap']);
            $newproject->type_id = $type->id;
            $newproject->save();
        }
    }
}
