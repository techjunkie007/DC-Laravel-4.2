<?php

class UserTableSeeder extends Seeder

{
	public function run()
    {
        User::create(['username' => 'Matah','password' => Hash::make('secret')]);
    }

}

?>