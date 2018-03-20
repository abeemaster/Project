<?php

$dsn = 'mysql:host=localhost; dbname=my_db';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth = $dbh->prepare('SELECT name, age FROM student WHERE name = :name AND age > :age');
    $params = array(
        'name' => 'Mike',
        'age' => 22
    );
    $sth->execute($params);
    $students = $sth->fetchAll(PDO::FETCH_ASSOC);
    print_r($students);

    echo '<br>';

    $sth->execute( array('name' => 'Andy', 'age' => 20) );
    $students = $sth->fetchAll(PDO::FETCH_ASSOC);
    print_r($students);

} catch (PDOException $e) {
    echo $e->getMessage();
}
