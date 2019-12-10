<?php
function getAll($table = null)
{
  $query = "SELECT * FROM $table";
  return $query;
}
// . array_keys($where)[0] . "= '" . $where[array_keys($where)[0]] . "'";
function getWhere($table = null, $where = [], $parameter)
{
  $query = "SELECT * FROM $table WHERE ";
  foreach ($where as $column => $value) {
    $query .= $column . "=" . $value . $parameter;
  }
  $query = rtrim($query, $parameter);
  return $query;
}

function insert($table= null, $row = [])
{
  $rowSize = sizeof($row);
  $que = "INSERT INTO $table ()";
  $que = rtrim($que, ')');
  foreach ($row as $value) {
    $que .= $value . ',';
  }

  $query = rtrim($que, ',');
  $query .= ') VALUES (';

  for ($i = 1; $i <= $rowSize; $i++) {
      $query .= '?,';
  }
  $query = rtrim($hasil, ',');
  $query .= ')';
  return $query;
}

function update($table = null, $row = [], $where = null)
{
  $que = "UPDATE $table SET ";

  foreach ($row as $key) {
    $que .= $key . ' = ? ,';
  }
  $query = rtrim($que, ',');
  $query .= ' WHERE ' . $where . ' = ?';

  return $query;
}

function delete($table = null, $where = null)
{
  $query = "DELETE FROM $table WHERE ";
  $query .= $where . ' = ?';

  return $query;
}

 ?>
