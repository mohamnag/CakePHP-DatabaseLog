CakePHP DatabaseLog
===
This plugin is a fork of the webtechnick's original one which can be found [here](https://github.com/webtechnick/CakePHP-DatabaseLogger-Plugin).

I generally changed the points I did not like about it, and it was mainly the ```admin_``` prefix and removed a bunch of bad practices in HTML files.

## Install
Add this as a submodule to your `app/Plugin/DatabaseLog` directory:

	$ git submodule add git://github.com/dereuromark/CakePHP-DatabaseLog.git app/Plugin/DatabaseLog

Import the schema into your database:

	$ cake schema create --plugin DatabaseLog

Create a config file in `app/Config/database_log.php` with the following content:

```php
$config = array(
    'DatabaseLog' => array(
        'write' => 'default', //DataSource to write to.
        'read' => 'default', //Datasource to read from.
    )
);
```

Pro Tip: You can read from a different datasource than you write to, and they both can be different than your default.

Update the file `app/Config/bootstrap.php` with the following configuration:

```php
App::uses('CakeLog', 'Log');
CakeLog::config('default', array('engine' => 'DatabaseLog.DatabaseLog'));
```

Note that 2.4 drops the suffix, so for all those who use the newest version of cake, its just `Database`:

```php
CakeLog::config('default', array('engine' => 'DatabaseLog.Database'));
```

## Usage
Anywhere in your app where you call log() or CakeLog::write the DatabaseLog engine will be used.

```php
$this->log('This is a detailed message logged to the database', 'error');
CakeLog::write('error', 'This is a detailed message logged to the database');
```

Navigate to ```http://www.example.com/database_log/logs``` to view/search/delete your logs.

## License
This plugin ins licensed under MIT license.