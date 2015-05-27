<?php 

class UsersTableSeeder extends Seeder{

	public function run(){
		$user = new User();
		$user->firstname = 'osama';
		$user->lastname = 'mohamed';
		$user->email = 'xgen.osama@gmail.com';
		$user->password = Hash::make('g33k');
		$user->telephone = '01064246173';
		$user->admin=1;
		$user->save();	
	}
}