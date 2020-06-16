function fetchData(){
	$('#datatable').DataTable( {
	  "processing": false,
	  "serverSide": true,
	  "realtime": true,
	  "paging": false,
	  "searching": true,
	  "ajax": {
	      "url": "./scripts/Receitas/post.php",
	      "type": "POST"
	  	}	
	})
}

$("#vendida").on('change', function () {
	let table = $('#datatable').DataTable();
	if($(this).is(':checked')){
		table.destroy();
		$('#datatable').DataTable( {
		  "processing": false,
		  "serverSide": true,
		  "realtime": true,
		  "paging": false,
		  "searching": true,
		  "ajax": {
		      "url": "./scripts/Receitas/postVendidas.php",
		      "type": "POST"
		  	}	
		})
	}
	else{
		table.destroy();
		fetchData();
	}
})

$(document).ready(function(){
	fetchData();
	setInterval(()=>{
		$.ajax({
		type:'post',		//Definimos o método HTTP usado
		dataType: 'json',	//Definimos o tipo de retorno
        url: './scripts/Receitas/fetchDadosR.php',//Definindo o arquivo onde serão buscados os dados
			success: function(dados){
				if(dados != 0){
				 	$('#vendidas').html(dados[0]);
					$('#disponivel').html(dados[1]);
					$('#totais').html(dados[2]);
				}
				else{
					$('#vendidas').html(0);
					$('#disponivel').html(0);
					$('#totais').html(0);
				}               
			}
		});
	}, 500);
});

$(document).on('click', '.update', function (e) {
	//let cliente = document.getElementById('cliente').disabled = true;
	let cpf     = document.getElementById('cpf').disabled    = true;
	let data 	= document.getElementById('data').disabled   = true;
	let status	= document.getElementById('status').disabled = true;
	e.preventDefault();
	let id = $(this).data("id");
	console.log(id);
	$('#myModal2').data('id', id).modal('show').fadeIn("slow");
	$.ajax({
		type:'post',		//Definimos o método HTTP usado
		dataType: 'json',	//Definimos o tipo de retorno
		data: {id:id},
		url: './scripts/Receitas/fetchReceita.php',//Definindo o arquivo onde serão buscados os dados
		success: function(dados){
			$("#medicamentos").empty();
			$("#obs").empty();
                $.each(dados, function(key, value) {
                	var med    = new Option(value.MEDICAMENTO_RECEITA);
                	var obs    = new Option("Dosagem: " + value.DOSAGEM);
					document.getElementById('cliente').value  = String(value.NOME_PACIENTE_RECEITA);
					document.getElementById('cpf').value      = String(value.CPF_PACIENTE_RECEITA);
					document.getElementById('status').value	  = String(value.STATUS_RECEITA);
					document.getElementById('data').value	  = String(value.DATA_RECEITA);
					document.getElementById('idV').value	  = id;
					let itens   = document.getElementById('medicamentos');
					let obser   = document.getElementById('obs');
					obser.add(obs);
					itens.add(med);
			});
		}
	});
});

$(document).on('click', '#btnUpdate', function (e) {
	let id = document.getElementById('idV').value;
	console.log(id);
	$('#myModal3').modal('show').fadeIn("slow");
})

$(document).on('click', '#btnVenda', function (e) {
	let id = document.getElementById('idV').value;
	$.ajax({
		url: './scripts/Receitas/baixaReceita.php',
        type: 'post',
        data: {id:id},
        success: function(data) {
        	console.log(id)
        	$('#myModal3').modal('hide');
        	$('#myModal2').modal('hide');
           	$('#datatable').DataTable().destroy();
				fetchData();
				if(data === "Receita vendida com sucesso!"){
				var notification = alertify.notify(data, 'success', 5);
				}
			else{
				var notification = alertify.notify(data, 'danger', 5);
			}
        }
	})
})