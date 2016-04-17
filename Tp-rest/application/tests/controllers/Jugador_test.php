<?php

class Jugador_test extends TestCase
{
	public function test_index()
	{
		$this->request->enableHooks();
		$output = $this->request('GET', 'jugadores');
		echo $output;
		$this->assertContains('Javier', $output);		
	}
/*
	public function test_ver()
	{
		$this->request('GET', 'jugadores/8');
		$this->assertResponseCode(200);	
	}

	public function test_verOjeos($id)
	{
		$this->request('GET', 'jugadores/8/ojeos');
		$this->assertResponseCode(200);	
	}*/
}
