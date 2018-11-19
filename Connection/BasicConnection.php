<?php
namespace Connection;
use Connection\DatabaseException;
/**
 * BasicConnection - Operacoes basicas para a conexão com a base de dados
 * 
 * @author Caio Corrêa Chaves
 * @since 0.0.0
 */
class BasicConnection
{
    /**
     * $username
     * 
     * Nome do usuário a conectar na base de dados
     * 
     * @access protected
     * @var string
     */
    protected $username;
    /**
     * $charset
     * 
     * Character set padrão para usar na conexão
     * 
     * @access protected
     * @var string
     */
    protected $charset;
    /**
     * $password
     * 
     * Senha para conexão
     * 
     * @access protected
     * @var string
     */
    protected $password;
    /**
     * $hostname
     * 
     * Nome do host hopedando o banco de dados
     * 
     * @access protected
     * @var string
     */
    protected $hostname;
    /**
     * $database
     * 
     * Nome da base de dados para conectar
     * 
     * @var string
     * @access protected
     */
    protected $database;
    /**
     * $connection
     * 
     * Guarda conexão com o banco de dados
     * 
     * @access private
     * @var mysqli_connect
     */
    private $connection;
    /**
     * function __construct()
     * 
     * Preenche os atributos do objeto
     * 
     * @param string $database Nome da base de dados a ser conectada
     * @param string $username Nome do usuário conectando
     * @param string $password Senha do MySQL
     * @param string $hostname Host hospedando base de dados
     * @param string $charset  Character Set padrão
     */
    function __construct(
        string $database, 
        string $username,
        string $password,
        string $hostname,
        string $charset
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->hostname = $hostname;
        $this->database = $database;
        $this->charset = $charset;
    }
    /**
     * function connect()
     * 
     * Abre conexão com o banco de dados
     * 
     * @throws DatabaseException Se ocorrer um erro durante a conexão
     * @throws DatabaseException Se ocorrer um erro durante a configuração do charset
     * 
     * @return void
     * @access protected
     */
    protected function connect()
    {
        $this->connection = new \mysqli(
            $this->hostname, 
            $this->username, 
            $this->password, 
            $this->database
        );


        if (!$this->connection) {
            throw new DatabaseException($this->connection->error);
        }
        //setar default charset
        if (!$this->connection->set_charset($this->charset)) {
            throw new DatabaseException($this->connection->error);
        }
    }
    /**
     * function close()
     * 
     * Fecha conexão com o banco de dados
     * 
     * @throws DatabaseException Se houver falha no fechamento
     * 
     * @return void
     * @access protected
     */
    protected function close()
    {
        if (!$this->connection->close()) {
            throw new DatabaseException(mysqli_error($this->connection));
        }
    }
    /**
     * function escapeString($dados)
     * 
     * Insere caracteres de escape na query para evitar erros como 
     * SQL Injections
     * 
     * @param array|string $dados Dados a serem "escapados"
     * 
     * @return array|string
     * @access protected
     */
    protected function escapeString($dados)
    {
        //se a variavel NAO é um array coloque os caracteres de escape nela mesma
        if (!is_array($dados)) {
            $dados = $this->connection->real_escape_string($dados);
        } else {
            //se a variavel É um array faça o mesmo procedimento para cada elemento desse array
            foreach ($dados as $key => $value) {
                $dados[$key] = $this->connection->real_escape_string($value);
                if (strpos($key, 'VAR')) {
                    $dados[$key] = "'$dados[$key]'";
                }
            }
        }
        return $dados;
    }
    /**
     * function execute($query)
     * 
     * Executa as querys
     * 
     * @throws DatabaseException Caso haja erros na execução da query
     * 
     * @param string $query    Query a ser executada
     * @param bool   $isSelect Informa se a consulta realizada é ou nao um select
     * 
     * @return bool|array
     * @access protected
     */
    protected function execute(string $query, bool $isSelect = false)
    {
        $success = $this->connection->multi_query($query);

        // DEBUG
        // echo "$success";
        // echo $this->connection->error;

        //execute a query indicada
        $data = null;
        if ($success and $isSelect) {
            $data = $this->prepareSelect();
        }

        if (!$data and !$isSelect) {
            throw new DatabaseException($this->connection->error);
            return false;   
        }
        return $data;
    }
    /**
     * function prepareSelect($data)
     * 
     * Prepara o array corretamente caso seja feito um SELECT ao banco de dados
     * 
     * @return bool|array
     * @access private
     */
    private function prepareSelect()
    {
        $dados = array();
        $rep = true;

        do {
            if ($result = $this->connection->store_result()) {
                while ($row = $result->fetch_assoc()) {
                    $dados[] = $row;
                }
                $result->free();
            }
            if ($this->connection->more_results()) {
                $this->connection->next_result();
            } else {
                $rep = false;
            }
        } while ($rep);

        return $dados;
    }
}
