<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Language::class)->create([
    		'name'				=> 'English',
    		'short_name'		=> 'en',
    		'text_direction'	=> 'ltr',
            'text_align'		=> 'left',
            'flex_direction'	=> 'row'
    	]);

    	factory(Language::class)->create([
    		'name'				=> 'اردو',
    		'short_name'		=> 'ur',
    		'text_direction'	=> 'rtl',
            'text_align'		=> 'right',
            'flex_direction'	=> 'row-reverse'
        ]);
    }
}
