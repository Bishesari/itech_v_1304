<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            ['name' => 'آذربایجان شرقی', 'slug' => 'east-azerbaijan', 'sort_order' => 1],
            ['name' => 'آذربایجان غربی', 'slug' => 'west-azerbaijan', 'sort_order' => 2],
            ['name' => 'اردبیل', 'slug' => 'ardabil', 'sort_order' => 3],
            ['name' => 'اصفهان', 'slug' => 'isfahan', 'sort_order' => 4],
            ['name' => 'البرز', 'slug' => 'alborz', 'sort_order' => 5],
            ['name' => 'ایلام', 'slug' => 'ilam', 'sort_order' => 6],
            ['name' => 'بوشهر', 'slug' => 'bushehr', 'sort_order' => 7],
            ['name' => 'تهران', 'slug' => 'tehran', 'sort_order' => 8],
            ['name' => 'چهارمحال و بختیاری', 'slug' => 'chaharmahal-bakhtiari', 'sort_order' => 9],
            ['name' => 'خراسان جنوبی', 'slug' => 'south-khorasan', 'sort_order' => 10],
            ['name' => 'خراسان رضوی', 'slug' => 'razavi-khorasan', 'sort_order' => 11],
            ['name' => 'خراسان شمالی', 'slug' => 'north-khorasan', 'sort_order' => 12],
            ['name' => 'خوزستان', 'slug' => 'khuzestan', 'sort_order' => 13],
            ['name' => 'زنجان', 'slug' => 'zanjan', 'sort_order' => 14],
            ['name' => 'سمنان', 'slug' => 'semnan', 'sort_order' => 15],
            ['name' => 'سیستان و بلوچستان', 'slug' => 'sistan-baluchestan', 'sort_order' => 16],
            ['name' => 'فارس', 'slug' => 'fars', 'sort_order' => 17],
            ['name' => 'قزوین', 'slug' => 'qazvin', 'sort_order' => 18],
            ['name' => 'قم', 'slug' => 'qom', 'sort_order' => 19],
            ['name' => 'کردستان', 'slug' => 'kurdistan', 'sort_order' => 20],
            ['name' => 'کرمان', 'slug' => 'kerman', 'sort_order' => 21],
            ['name' => 'کرمانشاه', 'slug' => 'kermanshah', 'sort_order' => 22],
            ['name' => 'کهگیلویه و بویراحمد', 'slug' => 'kohgiluyeh-boyerahmad', 'sort_order' => 23],
            ['name' => 'گلستان', 'slug' => 'golestan', 'sort_order' => 24],
            ['name' => 'گیلان', 'slug' => 'gilan', 'sort_order' => 25],
            ['name' => 'لرستان', 'slug' => 'lorestan', 'sort_order' => 26],
            ['name' => 'مازندران', 'slug' => 'mazandaran', 'sort_order' => 27],
            ['name' => 'مرکزی', 'slug' => 'markazi', 'sort_order' => 28],
            ['name' => 'هرمزگان', 'slug' => 'hormozgan', 'sort_order' => 29],
            ['name' => 'همدان', 'slug' => 'hamedan', 'sort_order' => 30],
            ['name' => 'یزد', 'slug' => 'yazd', 'sort_order' => 31],
        ];

        foreach ($provinces as $province) {
            Province::updateOrCreate(
                ['slug' => $province['slug']],
                $province
            );
        }
    }
}
