CodeIgniter TEST
===

> CodeIngiter 3.0.4

Pages
---

### BBS

```shell
/bbs/#action/#category/#index
```

#### #action

- lists(index)
- view
- write


Database
---

### Database table sql file

```shell
/database/codeigniter_test.sql
```

### Database config

```php
/* /application/config/database.php */

$db['default'] = array( // THIS IS PRIVATE DATA! SHOULD NOT PUSH CODE TO PUBLIC REPOSITORY!
	// ...
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '0000',
	'database' => 'codeigniter_test',
	'dbdriver' => 'mysqli',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci'
	// ...
);

```