<?php

use Illuminate\Database\Seeder;
// Class User para crear nuevos estados.
use App\Models\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$states = array(
		    		[
		    			'state' => 'Activo'
		    		],
		    		[
		    			'state' => 'Inactivo'
		    		]
		    	);
    	
    	foreach ($states as $value) {
    		$state = new State;
    		$state->state = $value['state'];
    		$state->save();
    	}
    }
}
