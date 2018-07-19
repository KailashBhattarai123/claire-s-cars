<?php
	class DatabaseTable {
		public $pdo;
		public $table;

		function __construct($pdo, $table){
			$this->pdo = $pdo;
			$this->table = $table;
		}

		function save($record, $pk) {
			try{
				$this->insert($record);
			}
			catch(Exception $e) {
				$this->update($record, $pk);
			}
		}

		function insert($record) {
			$keys = array_keys($record);
			$values = implode(', ', $keys);
			$valuesWithCol = implode(', :', $keys);

			$query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithCol . ')';
			$stmt = $this->pdo->prepare($query);
			$stmt->execute($record);
		}

		function find($field, $value) {
			$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
			$criteria = [
				'value' => $value
			];
			$stmt->execute($criteria);

			return $stmt;
		}

		function findAll() {
			$stmt = $this->pdo->prepare('SELECT * FROM ' .$this->table );
			$stmt->execute();
			return $stmt;
		}

		function update($record, $primarykey) {
		        $query = 'UPDATE '.$this->table.' SET ';
		        $parameters = [];
		            foreach ($record as $key => $value) {
		                $parameters[] = $key. ' = :' .$key;
		            }
		        $query .= implode(', ' , $parameters);
		        $query .= ' WHERE '.$primarykey.' = :id';
		        $record['id'] = $record[$primarykey];
		        $stmt = $this->pdo->prepare($query);
		        $stmt->execute($record);
		}


		function delete($field, $value){
			$query = $this->pdo->prepare("DELETE FROM " . $this->table . " WHERE $field = :id" );
				$content = [
					'id' => $value
				];
				$query->execute($content);

		}
	}
?>