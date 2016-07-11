<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
				'taxonomy_name'             => 'Chưa phân loại',
				'taxonomy_slug'             => 'chua-phan-loai',
				'taxonomy_parent'           => 0,
				'taxonomy_seo_title'        => '',
				'taxonomy_focus_keyword'    => '',
				'taxonomy_meta_description' => '',
				'created_at'                => new DateTime,
				'taxonomy_type'	=>	'category'
        	],
        	[
				'taxonomy_name'             => 'Tin tức',
				'taxonomy_slug'             => 'tin-tuc',
				'taxonomy_parent'           => 0,
				'taxonomy_seo_title'        => 'Tin tức',
				'taxonomy_focus_keyword'    => 'Tin tức',
				'taxonomy_meta_description' => 'Tuyển tập tin tức hay nhất trong nước',
				'created_at'                => new DateTime,
				'taxonomy_type'	=>	'category'
        	],
        	[
				'taxonomy_name'             => 'Sản phẩm',
				'taxonomy_slug'             => 'san-pham',
				'taxonomy_parent'           => 0,
				'taxonomy_seo_title'		=> 'Sản phẩm',
				'taxonomy_focus_keyword'    => 'Sản phẩm',
				'taxonomy_meta_description' => 'Các sản phẩm hấp dẫn nhấp',
				'created_at'                => new DateTime,
				'taxonomy_type'	=>	'category'
        	],
        	[
				'taxonomy_name'             => 'Dự án',
				'taxonomy_slug'             => 'du-an',
				'taxonomy_parent'           => 0,
				'taxonomy_seo_title'		=> 'Dự án',
				'taxonomy_focus_keyword'    => 'Dự án',
				'taxonomy_meta_description' => 'Các dự án hấp dẫn nhất',
				'created_at'                => new DateTime,
				'taxonomy_type'	=>	'category'
        	],
        	[
				'taxonomy_name'             => 'Tin trong nước',
				'taxonomy_slug'             => 'tin-trong-nuoc',
				'taxonomy_parent'           => 2,
				'taxonomy_seo_title'		=> 'Tin trong nước',
				'taxonomy_focus_keyword'    => 'Tin trong nước',
				'taxonomy_meta_description' => 'Tin trong nước hấp dẫn nhất',
				'created_at'                => new DateTime,
				'taxonomy_type'	=>	'category'
        	],
        	[
				'taxonomy_name'             => 'Tin Quốc Tế',
				'taxonomy_slug'             => 'tin-quoc-te',
				'taxonomy_parent'           => 2,
				'taxonomy_seo_title'		=> 'Tin Quốc Tế',
				'taxonomy_focus_keyword'    => 'Tin Quốc Tế',
				'taxonomy_meta_description' => 'Tin quốc tế hấp dẫn nhất',
				'created_at'                => new DateTime,
				'taxonomy_type'	=>	'category'
        	],
        	[
				'taxonomy_name'             => 'Điện thoại di động',
				'taxonomy_slug'             => 'dien-thoai-di-dong',
				'taxonomy_parent'           => 3,
				'taxonomy_seo_title'		=> 'Điện thoại di động',
				'taxonomy_focus_keyword'    => 'Điện thoại di động',
				'taxonomy_meta_description' => 'Điện thoại di động hấp dẫn nhất',
				'created_at'                => new DateTime,
				'taxonomy_type'	=>	'category'
        	],
        	[
				'taxonomy_name'             => 'Máy tính bảng',
				'taxonomy_slug'             => 'may-tinh-bang',
				'taxonomy_parent'           => 3,
				'taxonomy_seo_title'		=> 'Máy tính bảng',
				'taxonomy_focus_keyword'    => 'Máy tính bảng',
				'taxonomy_meta_description' => 'Máy tính bảng hấp dẫn nhất',
				'created_at'                => new DateTime,
				'taxonomy_type'	=>	'category'
        	],
        	[
				'taxonomy_name'             => 'Laptop',
				'taxonomy_slug'             => 'laptop',
				'taxonomy_parent'           => 3,
				'taxonomy_seo_title'		=> 'Laptop',
				'taxonomy_focus_keyword'    => 'Laptop',
				'taxonomy_meta_description' => 'Laptop hấp dẫn nhất',
				'created_at'                => new DateTime,
				'taxonomy_type'	=>	'category'
        	],
        	[
				'taxonomy_name'             => 'Điều hòa',
				'taxonomy_slug'             => 'dieu-hoa',
				'taxonomy_parent'           => 3,
				'taxonomy_seo_title'		=> 'Điều hòa',
				'taxonomy_focus_keyword'    => 'Điều hòa',
				'taxonomy_meta_description' => 'Điều hòa hấp dẫn nhất',
				'created_at'                => new DateTime,
				'taxonomy_type'	=>	'category'
        	],
        ]);
    }
}
