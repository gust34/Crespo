<?php
namespace Connection;
use Connection\BasicConnection;
use Connection\DatabaseException;
/**
 * Connection
 * 
 * Funções de conexão com bases de dados
 * 
 * @author Caio Corrêa Chaves
 */
class Connection extends BasicConnection
{
    
    /**
     * function __construct()
     * 
     * Chama o construtor da classe pai(apenas preenche os atributos)
     * 
     * @param string $database Nome da base de dados a ser conectada
     * @param string $username Nome do usuário conectando
     * @param string $password Senha do MySQL
     * @param string $hostname Host hospedando base de dados
     * @param string $charset  Character Set padrão
     */
    function __construct(
        string $database, 
        string $username = 'root',
        string $password = '',
        string $hostname = 'localhost',
        string $charset = 'utf8'
    ) {
        parent::__construct($database, $username, $password, $hostname, $charset);
    }
    
    /**
     * function dbExec($query, $vars)
     * 
     * Prepara e executa query no banco de dados
     * 
     * @param string $query Query a ser executada
     * @param array  $vars  Configuração das variaveis na query
     * 
     * $vars = array(
     *     "@<nome_var>" => "<valor>"
     * );
     * 
     * @access public
     * @return void
     */
    public function dbExec(string $query, array $vars = null, $show = false) {
        $this->connect();
        $query = $this->escapeString($query);
        $vars = $vars ? $this->escapeString($vars) : '';
        
        if ($vars) {
            foreach ($vars as $key => $value) {
                $query = str_replace($key, $value, $query);
            }
        }
        if (preg_match('/\s@[a-zA-Z]/', $query)) {
            throw new DatabaseException("Variaveis não informadas na query");
        }
        $isSelect = false;
        if (strpos($query, 'SELECT') !== null) {
            $isSelect = true;
        }

        if ($show) {
            echo '<pre>';
            echo str_replace('\n', '<br>', $query) . '<br>';
            exit();
        }

        $return = $this->execute($query, $isSelect);

        $this->close();

        if (is_array($return)) {
            if (count($return) == 1) {
                $return = $return[0];
            }
        }
        
        return $return;
    }
}
