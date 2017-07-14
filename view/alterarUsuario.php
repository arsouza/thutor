<?php include('menu.php');?> 
<?php
  require_once('../controller/usuario.php');
  Processo('alterar');
?>
<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>

<script type="text/javascript" >
        $(document).ready(function() {
            $("#CEP").mask("99.999-999");
            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#ENDERECO").val("");
                $("#BAIRRO").val("");
                $("#CIDADE").val("");
                $("#UF").val("");
            }            
            //Quando o campo cep perde o foco.
            $("#CEP").blur(function() {
                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');
                //Verifica se campo cep possui valor informado.
                if (cep != "") {
                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;
                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {
                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#ENDERECO").val("...");
                        $("#BAIRRO").val("...");
                        $("#CIDADE").val("...");
                        $("#UF").val("...");
                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#ENDERECO").val(dados.logradouro);
                                $("#BAIRRO").val(dados.bairro);
                                $("#CIDADE").val(dados.localidade);
                                $("#UF").val(dados.uf);
                                $("#ENDERECO_NUMERO").focus();
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
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
            });
        });
</script>

<div class="container">
    <form action="#" id="form" name="form" method="post">
        <h2 class="form-signin-heading"></h2>        
        <?php foreach($rs as $row) { ?>        
        <div class="form-group">
          <div class="col-sm-10">
            <label for="NOME">Nome</label>
            <input type="text" id="NOME" name="NOME" class="form-control" value="<?=utf8_encode($row['NOME']);?>" required>
          </div>  
          <div class="col-sm-2">
            <label for="DATA_NASCIMENTO">Data de Nascimento</label>
            <input type="date" id="DATA_NASCIMENTO" name="DATA_NASCIMENTO" class="form-control" value="<?=$row['DATA_NASCIMENTO'];?>" required>
          </div>
        </div>  
        <div class="form-group">
            <div class="col-sm-2">          
              <label for="CEP">CEP</label>
              <input type="text" id="CEP" name="CEP" class="form-control" value="<?=$row['CEP']; ?>" required>
            </div>
            <div class="col-sm-5">          
              <label for="ENDERECO">Endereço</label>
              <input type="text" id="ENDERECO" name="ENDERECO" class="form-control" value="<?=utf8_encode($row['ENDERECO']); ?>" required>
            </div>

            <div class="col-sm-1">          
              <label for="ENDERECO_NUMERO">N°</label>
              <input type="text" id="ENDERECO_NUMERO" name="ENDERECO_NUMERO" class="form-control" value="<?=$row['ENDERECO_NUMERO']; ?>" required>
            </div>
            <div class="col-sm-4">          
              <label for="BAIRRO">Bairro</label>
              <input type="text" id="BAIRRO" name="BAIRRO" class="form-control" value="<?=utf8_encode($row['BAIRRO']); ?>" required>
            </div>                                    
         </div>
         <div class="form-group">
            <div class="col-sm-4">          
              <label for="COMPLEMENTO">Complemento</label>
              <input type="text" id="COMPLEMENTO" name="COMPLEMENTO" class="form-control" value="<?=utf8_encode($row['COMPLEMENTO']); ?>" required>
            </div>                          
            <div class="col-sm-3">          
              <label for="CIDADE">Cidade</label>
              <input type="text" id="CIDADE" name="CIDADE" class="form-control" value="<?=utf8_encode($row['CIDADE']); ?>" required>
            </div>                          
            <div class="col-sm-1">          
              <label for="UF">UF</label>
              <input type="text" id="UF" name="UF" class="form-control" value="<?=$row['UF']; ?>" required>
            </div>                          
            <div class="col-sm-4">          
              <label for="TELEFONE_RESIDENCIAL">Telefone Residencial</label>
              <input type="text" id="TELEFONE_RESIDENCIAL" name="TELEFONE_RESIDENCIAL" class="form-control" value="<?=$row['TELEFONE_RESIDENCIAL']; ?>" required>        
            </div>                                                                
        </div>
        <div class="form-group">
            <div class="col-sm-12">          
              <label for="BIOGRAFIA">Biografia</label>                  
              <input type="text" id="BIOGRAFIA" name="BIOGRAFIA" class="form-control" value="<?=utf8_encode($row['BIOGRAFIA']);?>" required>
            </div>
        </div>      
        <?php } ?>        
        <br>
        <input type="submit" name="button" id="button" value="Editar" class="btn btn-primary" style="float: right; margin: 1%;""/>
        <input type="hidden" name="OK" id="OK" value="true"/>
    </form>
</div>

