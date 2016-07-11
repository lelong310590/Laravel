<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lar_users')->insert([
        	[
				'user_login'    => 'superadmin',
				'user_email'    => 'superadmin@gmail.com',
				'user_password' => bcrypt('123456'),
				'user_info'		=> json_encode(['user_realname' => 'Lê Ngọc Long', 'user_tel' => '012822369690' , 'user_address' => '11/215/143 Nguyễn Chính', 'user_social' => 'http://facebook.com']),
				'user_level'    => 0,
				'user_status'	=> 1,
				'created_at'    => new DateTime
        	],
        	[
				'user_login'    => 'administrator',
				'user_email'    => 'administrator@gmail.com',
				'user_password' => bcrypt('123456'),
				'user_info'		=> json_encode(['user_realname' => 'Lê Ngọc Long', 'user_tel' => '012822369690' , 'user_address' => '11/215/143 Nguyễn Chính', 'user_social' => 'http://facebook.com']),
				'user_level'    => 0,
				'user_status'	=> 1,
				'created_at'    => new DateTime
        	],
        	[
				'user_login'    => 'supermodarator',
				'user_email'    => 'supermodarator@gmail.com',
				'user_password' => bcrypt('123456'),
				'user_info'		=> json_encode(['user_realname' => 'Lê Ngọc Long', 'user_tel' => '012822369690' , 'user_address' => '11/215/143 Nguyễn Chính', 'user_social' => 'http://facebook.com']),
				'user_level'    => 0,
				'user_status'	=> 1,
				'created_at'    => new DateTime
        	],
        	[
				'user_login'    => 'modarator',
				'user_email'    => 'modarator@gmail.com',
				'user_password' => bcrypt('123456'),
				'user_info'		=> json_encode(['user_realname' => 'Lê Ngọc Long', 'user_tel' => '012822369690' , 'user_address' => '11/215/143 Nguyễn Chính', 'user_social' => 'http://facebook.com']),
				'user_level'    => 0,
				'user_status'	=> 1,
				'created_at'    => new DateTime
        	],
        	[
				'user_login'    => 'seniormember',
				'user_email'    => 'seniormember@gmail.com',
				'user_password' => bcrypt('123456'),
				'user_info'		=> json_encode(['user_realname' => 'Lê Ngọc Long', 'user_tel' => '012822369690' , 'user_address' => '11/215/143 Nguyễn Chính', 'user_social' => 'http://facebook.com']),
				'user_level'    => 0,
				'user_status'	=> 0,
				'created_at'    => new DateTime
        	],
        	[
				'user_login'    => 'juniormember',
				'user_email'    => 'juniormember@gmail.com',
				'user_password' => bcrypt('123456'),
				'user_info'		=> json_encode(['user_realname' => 'Lê Ngọc Long', 'user_tel' => '012822369690' , 'user_address' => '11/215/143 Nguyễn Chính', 'user_social' => 'http://facebook.com']),
				'user_level'    => 0,
				'user_status'	=> 0,
				'created_at'    => new DateTime
        	],
        ]);
    }
}
