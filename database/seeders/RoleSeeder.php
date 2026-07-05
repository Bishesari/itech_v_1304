<?php

namespace Database\Seeders;

use App\Enums\RoleColor;
use App\Enums\RoleLevel;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [

            ['slug' => 'newbie',            'name' => 'تازه وارد',              'level' => RoleLevel::SYSTEM,      'color' => RoleColor::BLUE],
            ['slug' => 'super-admin',       'name' => 'سوپر ادمین',             'level' => RoleLevel::SYSTEM,      'color' => RoleColor::RED],
            ['slug' => 'question-manager',  'name' => 'مدیریت بانک سوالات ملی',  'level' => RoleLevel::SYSTEM,      'color' => RoleColor::PURPLE],
            ['slug' => 'question-auditor',  'name' => 'تایید و ممیزی سوالات ملی','level' => RoleLevel::SYSTEM,      'color' => RoleColor::VIOLET],
            ['slug' => 'job-seeker',        'name' => 'کارجو',                  'level' => RoleLevel::SYSTEM,      'color' => RoleColor::EMERALD],
            ['slug' => 'employer',          'name' => 'کارفرما',                'level' => RoleLevel::SYSTEM,      'color' => RoleColor::CYAN],

            ['slug' => 'founder',           'name' => 'موسس',                   'level' => RoleLevel::INSTITUTE,   'color' => RoleColor::TEAL],

            ['slug' => 'branch-manager',    'name' => 'مدیر شعبه',              'level' => RoleLevel::BRANCH,      'color' => RoleColor::INDIGO],
            ['slug' => 'teacher',           'name' => 'مربی',                   'level' => RoleLevel::BRANCH,      'color' => RoleColor::AMBER],
            ['slug' => 'student',           'name' => 'کارآموز',                'level' => RoleLevel::BRANCH,      'color' => RoleColor::LIME],
            ['slug' => 'office-assistant',  'name' => 'مسئول اداری',            'level' => RoleLevel::BRANCH,      'color' => RoleColor::FUCHSIA],
            ['slug' => 'accountant',        'name' => 'حسابدار',                'level' => RoleLevel::BRANCH,      'color' => RoleColor::ORANGE],
        ];
        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['slug' => $role['slug']],
                $role
            );
        }

    }
}
