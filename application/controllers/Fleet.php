<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
	Fleet controller passes data from Fleets model to views
*/
class Fleet extends Application
{

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		if($this -> session -> userdata('userrole') == "Owner") {
			$this->data['pagebody'] = 'fleet_owner';
		} else {
			$this->data['pagebody'] = 'fleet_guest';
		}
		$this->data['fleets']   = $this-> fleets -> viewAll();
		$this->render(); 
	}

	/**
	 * Show method for controller, shows specific information for a plane given its identifier
	 */
	public function show($id) {
		$this->data['pagebody'] = 'plane';
		$fleet_plane = $this -> fleets -> get ($id) -> getPlane ();
		$this->data['plane_info'] = array ("values" => $fleet_plane -> getViewArray ());
		$this -> render();
	}

}