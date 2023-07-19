<?php include("cabecario.php"); ?>
<div class="caixa">
<h2>Teste 1 número Primo</h2>
    <table class="tabela">
        <thead>
            <tr>
                <th>Numero</th>
                <th>Multiplicador</th>
            </tr>
        </thead>
        <tbody id="numerosprimos">
            
        </tbody>
    </table>

</div>

<script type="application/javascript">
    var resultadonumeros = document.getElementById("numerosprimos");// obeter onde sera impresso os valores
    var res = "";// variavel que sera armazenada o resultados



    for (let i = 1; i <= 100; i++) {// laço de repetição apra obter os valores de 1 a 100
        var divisores = [];// armazenamento dos divisorres  de cara numero

        for (let d = 1; d <= 100; d++) {// laço de repetição para marcar verificar os numeros que são divisores
            if (i % d === 0) {// condição para  se 'i' e divisivel por 'd' caso sim guarda na array
            divisores.push(d);// adicionar o valor de 'd' na array 
            }// fim da condição
        }// fim do loop de verificação dos divisores

        if (divisores.length === 2) {// verificação se o numero tem algum divisor ou não
            res += "<tr><td>" + i + "</td> <td> [PRIMO]</td> </tr>";// caso seja divisivel por ele mesmo  escrever [PRIMO]
        } else {// caso tenha divisores  seus divisores serão exibidos entre '[' e separados por virgula
            res += "<tr><td>" + i + "</td><td> [" + divisores.join(",") + "]</td> </tr>";
        }//fim da escrita no '<p>'


    }// fim do laço de repetição dos valores


    resultadonumeros.innerHTML = res;// atualizando o valor em <p> para imprimir tudo certinho
</script>

<?php include ("rodape.php"); // rodape para nao ter que ficar digitando tudo xD ?>
        
        
