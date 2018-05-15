<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class)
        //$this->call(userSeeder::class);
        $this->call(SongSeeder::class);
        
            
    }
}

class userSeeder extends Seeder{
    public function run(){
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            ]);
    }
}
class SongSeeder extends Seeder{
    public function run(){
        DB::table('song')->insert([
            [
            'name'=>"Đời Dạy Tôi Only A",
            'filename'=> "Doi-Day-Toi-Only-A.wav",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name'=>"Thấy Là Yêu Thương OnlyC",
                'filename'=> "Thay-La-Yeu-Thuong-Only-C.wav",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
    
        ]);
    }
}
