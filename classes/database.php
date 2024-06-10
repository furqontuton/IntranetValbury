<?php

Class Database
{




	//construct
	function __construct()
	{
		$this->con = $this->connect();
	}

	private function connect()
	{
		
		
		try
		{

			$connection = new PDO(SQLSTRING,DBUSER,DBPASS);
			return $connection;

		} 

		catch(PDOException $e)
		{
			echo $e->getMessage();
			die;
		}

		return false;
	}

	//write to DB
	public function write($query,$data_array = [])
	{
	
		$con = $this->connect();

		$statement = $con->prepare($query);	
		$check = $statement->execute($data_array);
	
		if($check)
		{
			return true;
		}
		return false;

	} 

	//read from DB
	public function read($query,$data_array = [])
	{
	
		$con = $this->connect();

		$statement = $con->prepare($query);	
		$check = $statement->execute($data_array);
	
		if($check)
		{
			$result = $statement->fetchAll(PDO::FETCH_OBJ);
			if(is_array($result) && count($result) > 0)
			{
				return $result;
			}			
			return false;
		}
		return false;

	} 


	public function generate_id($max)
	{
		$rand = "";
		$rand_count = rand(4,$max);
		for ($i=0; $i < $rand_count ; $i++) { 
			// code...
			$r = rand(0,5);
			$rand .= $r;
		}

		return $rand;
	}
}

