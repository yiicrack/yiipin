<?php 
$this->menu = array(
	array(
		"label" => Rights::t( "core", "Assignments" ),
		"url" => array( "/rights/assignment/view" )
	),
	array(
		"label" => Rights::t( "core", "Permissions" ),
		"url" => array( "/rights/authItem/permissions" )
	),
	array(
		"label" => Rights::t( "core", "Roles" ),
		"url" => array( "/rights/authItem/roles" )
	),
	array(
		"label" => Rights::t( "core", "Tasks" ),
		"url" => array( "/rights/authItem/tasks" )
	),
	array(
		"label" => Rights::t( "core", "Operations" ),
		"url" => array( "/rights/authItem/operations" )
	)
);
?>