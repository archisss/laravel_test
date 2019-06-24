<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PDO;
use PDOException;

class mysql extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'mysql:createdb {name?}';
    protected $signature = 'mysql:createdb {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create mysql database schema based on the database config file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       /* $schemaName = $this->argument('name') ?: config("database.connections.mysql.database");
        $charset = config("database.connections.mysql.charset",'utf8mb4');
        $collation = config("database.connections.mysql.collation",'utf8mb4_unicode_ci');

        config(["database.connections.mysql.database" => null]);*/

        //$query = "CREATE DATABASE testdb;";

        //echo config(["database.connections.mysql.database" => $schemaName]);

        //DB::statement($query);

       //config(["database.connections.mysql.database" => $schemaName]);

       $database = env('DB_DATABASE', false);

        if (! $database) {
            $this->info('Skipping creation of database as env(DB_DATABASE) is empty');
            return;
        }

        if (! env('DB_CHARSET')){
            $this->info('env(DB_CHARSET) is empty');
            return;
        }

        if (! env('DB_COLLATION')){
            $this->info('env(DB_COLLATION) is empty');
            return;
        }

        try {
            $pdo = $this->getPDOConnection(env('DB_HOST'), env('DB_PORT'), env('DB_USERNAME'), env('DB_PASSWORD'));

            $pdo->exec(
                'CREATE DATABASE IF NOT EXISTS '.$database.' CHARACTER SET '.env('DB_CHARSET').' COLLATE '.env('DB_COLLATION'));

            $this->info(sprintf('Successfully created %s database', $database));
        } catch (PDOException $exception) {
            $this->error(sprintf('Failed to create %s database, %s', $database, $exception->getMessage()));
        }
    }

    /**
     * @param  string $host
     * @param  integer $port
     * @param  string $username
     * @param  string $password
     * @return PDO
     */
    private function getPDOConnection($host, $port, $username, $password)
    {
        return new PDO(sprintf('mysql:host=127.0.0.1;port=3306;', $host, $port), 'root', 'root');
    }
}
