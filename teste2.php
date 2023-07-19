<?php include("cabecario.php"); ?>
<div class="caixa">
<h2>Teste 2 Array ASCII</h2>

<?php
$caracteresascii = range(',', '|');// gerar todos os caracteres ascii da ',' ate a '|'
$retirada = array_splice($caracteresascii, array_rand($caracteresascii), 1);// revovendo somente um elemento da array '$caracteresascii'

function encontrarCaracterFaltando($tdcascii) {// em busca do caracter perdido
    $mi = ord($tdcascii[0]);// pegando a inicial
    $mx = ord(end($tdcascii));// pegando o ultimo caracter
  
    for ($i = $mi; $i <= $mx; $i++) {// laço de repetição para verificar qual e o caracter que esta faltando
        if (!in_array(chr($i), $tdcascii)) {// verificando se o caracter da vez esta na array
            return chr($i);// caso nao esteja escontramos o caracter que ta faltando
        }
    }
  
    return null;
}

$caracterFaltando = encontrarCaracterFaltando($caracteresascii);// Encontrar e mostrar o caracter que esta faltando
echo "Ocaracter que foi removido foi o ". $retirada[0] . " <br> O caracter faltando é: " . $caracterFaltando;
?>

</div>


<?php include ("rodape.php");// rodape para nao ter que ficar digitando tudo xD ?>