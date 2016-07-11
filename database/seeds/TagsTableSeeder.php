<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lar_taxonomy')->insert([
         	[
         		'taxonomy_name'	=> 'Bóng đá',
         		'taxonomy_slug'	=> 'bong-da',
         		'created_at'	=> new DateTime,
	            'taxonomy_type'	=>	'tag'
         	],
         	[
         		'taxonomy_name'	=> 'Người đẹp',
         		'taxonomy_slug'	=> 'nguoi-dep',
         		'created_at'	=> new DateTime,
	            'taxonomy_type'	=>	'tag'
         	],
         	[
         		'taxonomy_name'	=> 'David Villa',
         		'taxonomy_slug'	=> 'david-villa',
         		'created_at'	=> new DateTime,
	            'taxonomy_type'	=>	'tag'
         	],
        ]);
    }
}
