### Chemistry game NKU ###
# Author: Hai Hoang #


# Set up Guide #
* This project contains both relative and absolute paths.
* The only absolute path that needs to be changed is contained in the ROOT variable in the settings.php file.
* These are the settings for the databse. This is also contained in the settings.php file.

    {
        $host = '127.0.0.1';
        $db = 'chemgame';
        $user = 'root';
        $pass = '';
        $port = 3306;
        $charset = 'utf8mb4';
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => FALSE,
        );
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $this->pdo = new PDO($dsn, $user, $pass, $opt);

    }
