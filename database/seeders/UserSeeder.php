<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'edouard',
            'email' => 'edouard@admin.com',
            'password' => bcrypt('wefashion123')
        ]);
    }
}
