<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
</head>

<script>

let x;

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('uf').value=("");
}

function meu_callback(conteudo) {
    
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value=(conteudo.logradouro);
        document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value=(conteudo.localidade);
        document.getElementById('uf').value=(conteudo.uf);
        document.getElementById('numero').focus();
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        //Chama a pesquisa para ser realizada pelo Postmon
        pesquisacep(x, true);
    }
}

//Callback Postmon
function meu_callbackpost(conteudo) {
    
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value=(conteudo.logradouro);
        document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value=(conteudo.localidade);
        document.getElementById('uf').value=(conteudo.uf);
        document.getElementById('numero').focus();
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}


function pesquisacep(valor, post) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {
            x = cep;

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value="...";
            document.getElementById('bairro').value="...";
            document.getElementById('cidade').value="...";
            document.getElementById('uf').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            
            //verificação para ver por onde sera realizada a pesquisa
            if(post == true){
                script.src = "https://api.postmon.com.br/v1/cep/"+cep+"/?callback=meu_callback";
            } else {
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callbackpost';
            }

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
}

</script>
</head>


<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container justify-content-center">
            <a  class = "navbar-brand " href="">
                <img src="/img/new-index-petiko.png" width = "250" height = "30" class ="d-inline-block align-top" alt="">
            </a>
        </div>
    </nav>
    {{-- Mensagens de sucesso e erros --}}
    @if (session('status'))
        <div class="bg-success pt-2 text-white d-flex justify-content-center">
            <h5>Pedido Realizado com sucesso com Sucesso!!!</h5>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-danger pt-2 text-white d-flex justify-content-center">
            <h5>Ops... Aconteceu algo de errado!</h5>
        </div>
    @endif
        
    {{-- Body com campos para as abas selecionaveis e o conteudo das mesmas --}}
    <div class="container app">
        <div class="row">
            <div class="col-md-3 menu">
                <ul>
                @yield('selection')
                </ul>
            </div>

            <div class="col-md-9">
            <div class="container pagina">
                <div class="row">
                    <div class="col">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>