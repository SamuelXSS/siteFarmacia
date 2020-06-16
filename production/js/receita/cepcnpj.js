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
      } //end if.
      else {
          //CEP não Encontrado.
          limpa_formulário_cep();
          alert("CEP não encontrado.");
      }
  }

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            document.getElementById('cep').value = cep.substring(0,5)
            +"-"
            +cep.substring(5);

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value="...";
            document.getElementById('bairro').value="...";
            document.getElementById('cidade').value="...";
            document.getElementById('uf').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

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
};

$(document).ready(function(){
    document.getElementById('inscricao').disabled = true;
    // Adicionamos o evento onclick ao botão com o ID "pesquisar"
    $('#cnpj').on('blur', function(e) {
      
      // Aqui recuperamos o cnpj preenchido do campo e usamos uma expressão regular para limpar da string tudo aquilo que for diferente de números
      var cnpj = $('#cnpj').val().replace(/[^0-9]/g, '');
      
      // Fazemos uma verificação simples do cnpj confirmando se ele tem 14 caracteres
      if(cnpj.length == 14) {
      
        // Aqui rodamos o ajax para a url da API concatenando o número do CNPJ na url
        $.ajax({
          url:'https://www.receitaws.com.br/v1/cnpj/' + cnpj,
          method:'GET',
          dataType: 'jsonp', // Em requisições AJAX para outro domínio é necessário usar o formato "jsonp" que é o único aceito pelos navegadores por questão de segurança
          complete: function(xhr){
          
            // Aqui recuperamos o json retornado
            response = xhr.responseJSON;
            
            // Na documentação desta API tem esse campo status que retorna "OK" caso a consulta tenha sido efetuada com sucesso
            if(response.status == 'OK') {
            
              // Agora preenchemos os campos com os valores retornados
              $('#razao').val(response.nome);
              $('#inscricao').val(response.situacao);
            
            // Aqui exibimos uma mensagem caso tenha ocorrido algum erro
            } else {
              alert(response.message); // Neste caso estamos imprimindo a mensagem que a própria API retorna
            }
          }
        });
      
      // Tratativa para caso o CNPJ não tenha 14 caracteres
      } else {
        var cssMessage = "display: block; position: fixed; top: 0; left:70%; right: 10%; width: 15%; padding-top: 30px; z-index: 9999";
        var cssInner = "margin: 0 auto; box-shadow: 1px 1px 5px black;";
        var mensagem = "<strong>CNPJ Inválido.";
        // monta o html da mensagem com Bootstrap
        var dialogo = "";
        dialogo += '<div id="message" style="'+cssMessage+'">';
        dialogo += '    <div class="alert alert-danger alert-dismissable" style="'+cssInner+'">';
        dialogo += '    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
        dialogo +=          mensagem;
        dialogo += '    </div>';
        dialogo += '</div>';
    
        // adiciona ao body a mensagem com o efeito de fade
        $("body").append(dialogo);
        $("#message").hide();
        $("#message").fadeIn(200);
    
        // contador de tempo para a mensagem sumir
        setTimeout(function() {
            $('#message').fadeOut(300, function(){
                $(this).remove();
            });
        }, 2500); // milliseconds
      }
    });
    

  });