<?php

use Illuminate\Database\Seeder;
use App\Language;
use App\Pair;

class PairsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language = Language::where(['short_name' => 'ur'])->first();

        $language->pairs()->insert([
        	[
        		'key'			=> 'sign_in',
        		'value'			=> 'سائن ان کریں',
        		'language_id'	=> $language->id
        	],
        	[
        		'key'	=> 'sign_up',
        		'value'	=> 'سائن اپ کریں',
        		'language_id'	=> $language->id
        	]
        ]);

        $language = Language::where(['short_name' => 'en'])->first();

        $language->pairs()->insert([
        	[
        		'key'	=> 'sign_in',
        		'value' => 'Sign In',
        		'language_id'	=> $language->id
        	],
        	[
        		'key'	=> 'sign_up',
        		'value'	=> 'Sign Up',
        		'language_id'	=> $language->id
        	]
        ]);
    }
}
