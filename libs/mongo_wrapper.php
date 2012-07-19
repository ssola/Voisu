<?php
class Mongo_Wrapper
{

	public $connection;
	public $collection;
	public $has_results = false;
	public $num_results = 0;

	public function __construct($host = 'localhost:27017')
	{
		$this->connection = new Mongo($host);
	}

	public function setDatabase($c)
	{
		$this->db = $this->connection->selectDB($c);
	}

	public function setCollection($c)
	{
		$this->collection = $this->db->selectCollection($c);
	}

	public function insert($f)
	{
		$this->collection->insert($f);
	}
	
	public function getOne($f) {
		$cursor = $this->collection->findOne($f);

		return (object)$cursor;		
	}

	public function search($f, $fields, $sort, $limit, $skip ) {
		$cursor = $this->collection->findOne($f);

		return (object)$cursor;				
	}

	public function get($f, $fields, $limit, $skip)
	{
		$cursor = $this->collection->find($f, $fields)->sort(array("created"=>-1))->limit($limit)->skip(1);

		$k = array();
		$i = 0;

		while( $cursor->hasNext())
		{
		    $k[$i] = (object)$cursor->getNext();
			$i++;
		}

		$data['num'] = $cursor->count();
		$data['results'] = $k;
		return $data;
	}

	public function update($f1, $f2)
	{
		$this->collection->update($f1, $f2);
	}

	public function getAll()
	{
		$cursor = $this->collection->find();
		foreach ($cursor as $id => $value)
		{
			echo "$id: ";
			var_dump( $value );
		}
	}

	public function delete($f, $one = FALSE)
	{
		$c = $this->collection->remove($f, $one);
		return $c;
	}

	public function ensureIndex($args)
	{
		return $this->collection->ensureIndex($args);
	}

}
?>