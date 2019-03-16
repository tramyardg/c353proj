Controllers interact with the database. This is where CRUD operations are done.

For example:
```
public function save(Customer $customer)
{    
    $sql = 'INSERT INTO `customer` (`fullname`, `email`, `password`, `phone`) VALUES (?, ?, ?, ?)';
    $stmt = DB::getInstance()->prepare($sql);
    $exec = $stmt->execute(
        array(
            $customer->getFullName(),
            $customer->getEmail(),
            $customer->getPassword(),
            $customer->getPhone()
        )
    );
    return $exec;
}
```