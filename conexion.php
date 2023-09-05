<?php

	function conexion(){
		$host = "host=containers-us-west-112.railway.app";
		$port = "6969";
		$dbname = "dbname=railway";
		$user = "user=postgres";
		$password = "password=G6EwWHhXWpuP0oCHAgXq";

		$db = pg_connect("$host $port $dbname $user $password");

		return $db;
	}

?>