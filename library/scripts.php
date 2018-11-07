<!-- BUSCA CEP RESIDENCIAL E COMERCIAL -->
<!-- Adicionando Javascript -->
	<script type="text/javascript" >

        $(document).ready(function() {
			
            $("#btnResid").click(function() {

                //Nova variavel "cep" somente com digitos.
                //var cep = $(this).val().replace(/\D/g, '');
				var cep = $("#cepResid").val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressao regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#ruaResid").val("...");
                        $("#bairroResid").val("...");
                        $("#cidadeResid").val("...");
                        $("#ufResid").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("http://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#ruaResid").val(dados.logradouro);
                                $("#bairroResid").val(dados.bairro);
                                $("#cidadeResid").val(dados.localidade);
                                $("#ufResid").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado nao foi encontrado.
                                limpa_formulario_cep();
                                alert("CEP nao encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep e invalido.
                        limpa_formulario_cep();
                        alert("Formato de CEP invalido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulario.
                    limpa_formulario_cep();
                }
            });
        });
		
        $(document).ready(function() {
			
            $("#btnCom").click(function() {

                //Nova variavel "cep" somente com digitos.
                //var cep = $(this).val().replace(/\D/g, '');
				var cep = $("#cepCom").val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressao regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#ruaCom").val("...");
                        $("#bairroCom").val("...");
                        $("#cidadeCom").val("...");
                        $("#ufCom").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("http://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#ruaCom").val(dados.logradouro);
                                $("#bairroCom").val(dados.bairro);
                                $("#cidadeCom").val(dados.localidade);
                                $("#ufCom").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado nao foi encontrado.
                                limpa_formulario_cep();
                                alert("CEP nao encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep e invalido.
                        limpa_formulario_cep();
                        alert("Formato de CEP invalido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulario.
                    limpa_formulario_cep();
                }
            });
        });
</script>

<!-- DATA INICIO GYO -->
<script>
	$(document).ready(function(){
		var date_input=$('input[name="dtIniGYO"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd/mm/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>

<!-- AUTOCOMPLETE -->
<script>
$(function() {
    $( "#apresentador" ).autocomplete({
        source: function(request, response) {
            $.getJSON(
                "library/autocomplete_name.php",
                { term:request.term, extraParams:$('#term').val() }, 
                response
            );
        },
        minLength: 2,
        select: function(event, ui){
            //On select action
        }
    });
});
</script>

<script>
$(function() {
    $( "#padrinho" ).autocomplete({
        source: function(request, response) {
            $.getJSON(
                "library/autocomplete_name.php",
                { term:request.term, extraParams:$('#term').val() }, 
                response
            );
        },
        minLength: 2,
        select: function(event, ui){
            //On select action
        }
    });
});
</script>

<script>
$(function() {
    $( "#presenteGYO" ).autocomplete({
        source: function(request, response) {
            $.getJSON(
                "library/autocomplete_name.php",
                { term:request.term, extraParams:$('#term').val() }, 
                response
            );
        },
        minLength: 2,
        select: function(event, ui){
            //On select action
        }
    });
});
</script>