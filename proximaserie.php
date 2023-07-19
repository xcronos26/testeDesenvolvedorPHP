<?php

class TVShow // bora pegar as series da tv tudo encapsulado
{
  private $db;// deixando tudo bem escondidinho para os demais

  public function __construct(){ // construtor para fazer a conexao com o banco de dados 
    $this->db = new mysqli('localhost', 'root', '', 'desenvolvedor');// nome e usuarios usados no banco de daods. neste caso o banco local
    if ($this->db->connect_errno) {// verificando se foi feito a conexão com o banco de dados 
      die("Falha ao conectar ao banco de dados: " . $this->db->connect_error); // MAAAAATA a conexão caso tenha um erro xD
    }
  }

  public function proximaserie($datetime, $serie) // função publica para saber qual a proxima serie
  {
    $diasehoras = $datetime ? date('Y-m-d H:i:s', strtotime($datetime)) : date('Y-m-d H:i:s');// montando o dia e a hora da pesquisa

    $query = "SELECT s.titulo, s.canal, si.dia_da_semana, si.horario
              FROM series_tv s
              JOIN series_tv_intervalos si ON s.id = si.id_serie_tv
              WHERE CONCAT(si.dia_da_semana, ' ', si.horario) > ?
              " . ($serie ? "AND s.id = ?" : "") . "
              ORDER BY CONCAT(si.dia_da_semana, ' ', si.horario) ASC
              LIMIT 1";// montando o sql que sera usado no mySQL

    $stmt = $this->db->prepare($query);// montando a execulção do banco de dados 
    if ($serie) {// verificando o filtro da serie 
      $stmt->bind_param("si", $diasehoras, $serie);// se tiver a serie 
    } else {
      $stmt->bind_param("s", $diasehoras);// caso nao tenha o filtro da serie 
    }
    $stmt->execute();// execultando a função
    $stmt->bind_result($titulo, $canal, $dia_da_semana, $horario);// resultado vindo do banco 
    $stmt->fetch();// verificando contagem
    $stmt->close();// fechando 

    if ($titulo) {
      $proximaserieexibida = "A próxima série  é \"$titulo\", que será exibida no dia $dia_da_semana às $horario no $canal .";// foi utilizado \" para sair " como caracter e nao fechar a string
    } else {
      $proximaserieexibida = "Não há nenhuma série de TV futura.";// caso de algum problema e nao tenha nem uma serie registrada no banco
    }

    return $proximaserieexibida;// manda a resposta montada vinda do banco
  }
}

$tvShow = new TVShow();// receber a class

$data = json_decode(file_get_contents('php://input'), true);// mandando em JSON para a pagina
$datetime = $data['datetime'];// dia e hora soliucitada
$serie = $data['serie']; // serie solicitada

$resultado = $tvShow->proximaserie($datetime, $serie); // resultado em JSON para a requisição

echo $resultado;// manda o que foi montado

?>
