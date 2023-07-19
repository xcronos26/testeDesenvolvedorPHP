<?php include("cabecario.php"); ?>
<div class="caixa">
<h2>Teste 3 Séries de TV</h2>


  <form><!-- Formulário simples para verificação da consujlta no banco de dados-->
    <label for="datetime">Data e Hora:</label><!--  opcional pois será usado o valor da data e hora atual para exibir o próximo seriado que vai ser passado. não o que está passando no momento mas -->
    <input type="datetime-local" id="datetime" name="datetime"><!-- seleção não somente do dia da semana mas também do horário que sera exibido-->
    <br>
    <label for="serie">Qual série que deseja saber:</label><!-- filtro para selecionar somente a serie que deseja saber -->
    <select id="serie" name="serie">
      <option value="">Todas as séries</option>
      <option value="1">Como vencer na vida</option>
      <option value="2">O beijo que eu te dei</option>
      <option value="3">A vida de um TI no suporte</option>
      <option value="4">Emagrecer e preciso</option>
      <option value="5">Papuda o ponto final</option>
      <option value="6">Chegando la</option>
      <option value="7">a industria do amanha</option>
      <option value="8">amanha te conto</option>
      <option value="9">fome mortal</option>
      <option value="10">CRIPTONS O DINHEIRO DO AMANHA</option>
    </select>
    <br>
    <button type="button" onclick="proximaexibicao()">Próxima exibição</button><!-- botão para execultar a função em javascript -->
  </form><!-- fim do formulário de pesquisa de serie -->

  <div id="resposta"></div><!-- div que será colocada a resposta -->
<img  id="imagemserie" style="display:none">


<script type="application/javascript">

function proximaexibicao() {// função de saber qual e a próxima exibição
    var dia = document.getElementById("datetime").value;// pegando o valor do dia que deseja saber a consulta
    var serie = document.getElementById("serie").value;// pegando a serie em espesífico

    var dado = {// montando a variavel de dados
        datetime: dia,// pegando o dia e colocando em datetime
        serie: serie//colocando a seire variavel em serie que esta no banco de dados
    };
    var imgs = document.getElementById("imagemserie");
    var pedidophp = new XMLHttpRequest(); // objeto para requisição no PHP
    pedidophp.onreadystatechange = function() { //verificar se ta tudo certo com a conversa com o servidor
        if (pedidophp.readyState === 4 && pedidophp.status === 200) {// verifica o status do pedido sendo 4 como concluida e 200 como certo pelo protocolo http
            document.getElementById("resposta").innerHTML = pedidophp.responseText;// coloca no html a resposta vinda do servidor 
        }// fim da verificação 
    };// fim da função
    imgs.style.display = "block";
    imgs.setAttribute("src", "img/"+ serie + ".png");
    imgs.setAttribute("width", "150px");
    pedidophp.open("POST", "proximaserie.php", true);// abre a conversa com o servidor passando como POST
    pedidophp.setRequestHeader("Content-type", "application/json"); // define o ti´po de dado que sera retornado do servidor para JSON
    pedidophp.send(JSON.stringify(dado));// envia os dados para a requisição  utilizando JSON
   
    
}

</script>
</div>
<?php include ("rodape.php"); // rodape para nao ter que ficar digitando tudo xD ?>
        