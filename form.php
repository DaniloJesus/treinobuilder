<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/css/bootstrap-select.min.css" integrity="sha384-BJPGVhka8+B49CO2MFRKLZ0fD0v142Ssd+px+a64YvT+EoCupeZSxIxPvxafQ4cJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="src/style/form.css">

  <title>Felipe de Paulo - Treino Builder</title>
</head>

<body>
  <?php include('includes/menu.html');
  $contents_exercicio = json_decode(file_get_contents("src/data/videos.json"));
  $contents_metodo = json_decode(file_get_contents("src/data/metodos.json"));
  ?>
  <div class="container mt-3">
    <form>
      <div class="row">
        <div class="form-group col">
          <label for="titulo">Título do Treino:</label>
          <input id="titulo" class="form-control" type="text" placeholder="Treino A (Segunda e Quinta)">
        </div>
        <div class="form-group col">
          <label for="metodo">Método:</label>
          <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="metodo">
            <?php foreach ($contents_metodo as $dataMetodo) : ?>
              <option value="<?php echo $dataMetodo->nome; ?>" data-qtd-exercicios="<?php echo $dataMetodo->qtd_exercicios; ?>" data-tokens="<?php echo $dataMetodo->nome; ?>"><?php echo $dataMetodo->nome; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <!-- <div class="form-group col">
          <label for="series">Quantidade de séries:</label>
          <input id="series" class="form-control" type="text" placeholder="2x, 3x..." value="4x">
        </div> -->
      </div>
      <div class="form-group" id="containerExercicios">
        <div id="selectExercicio1">
          <label for="exercicio1">Escolha o exercício 01:</label>        
          <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="exercicio1">
            <?php foreach ($contents_exercicio as $tipo => $exercicio) : ?>
              <optgroup label="<?php echo ucwords($tipo); ?>">
                <?php foreach ($exercicio as $data) : ?>
                  <option value="<?php echo $data->nome; ?>" data-url-video="<?php echo $data->url_video; ?>" data-tokens="<?php echo $data->nome; ?>"><?php echo $data->nome; ?></option>
                <?php endforeach; ?>
              </optgroup>
            <?php endforeach; ?>
          </select>
        </div>

        <div id="selectExercicio2" class="mt-2">
          <label for="exercicio1">Escolha o exercício 02:</label>        
          <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="exercicio2">
            <?php foreach ($contents_exercicio as $tipo => $exercicio) : ?>
              <optgroup label="<?php echo ucwords($tipo); ?>">
                <?php foreach ($exercicio as $data) : ?>
                  <option value="<?php echo $data->nome; ?>" data-url-video="<?php echo $data->url_video; ?>" data-tokens="<?php echo $data->nome; ?>"><?php echo $data->nome; ?></option>
                <?php endforeach; ?>
              </optgroup>
            <?php endforeach; ?>
          </select>
        </div>
        
        <div id="selectExercicio3"  class="mt-2">
          <label for="exercicio3">Escolha o exercício 03:</label>        
          <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="exercicio3">
            <?php foreach ($contents_exercicio as $tipo => $exercicio) : ?>
              <optgroup label="<?php echo ucwords($tipo); ?>">
                <?php foreach ($exercicio as $data) : ?>
                  <option value="<?php echo $data->nome; ?>" data-url-video="<?php echo $data->url_video; ?>" data-tokens="<?php echo $data->nome; ?>"><?php echo $data->nome; ?></option>
                <?php endforeach; ?>
              </optgroup>
            <?php endforeach; ?>
          </select>
        </div>

      </div>

      <div class="row">
        <div class="form-group col">
          <label for="repeticoes">Repetições:</label>
          <input id="repeticoes" class="form-control" type="text" placeholder="1x15 + 3x 7 a 10" value="1x15 + 3x 7 a 10">
        </div>
        <div class="form-group col">
          <label for="cadencia">Cadência:</label>
          <input id="cadencia" class="form-control" type="text" placeholder="2020, 3030..." value="4040">
        </div>
        <div class="form-group col-6">
          <label for="descanso">Tempo de descanso:</label>
          <input id="descanso" class="form-control" type="text" placeholder="45 segundos, 60 segundos..." value="60 segundos">
        </div>
      </div>
      <div class="row justify-content-between">
        <button id="adicionarExercicio" type="button" class="btn btn-primary btn-lg mt-2 ml-3 col-3">Adicionar Exercício</button>
        <button id="limparTreino" type="button" class="btn btn-warning btn-lg mt-2 ml-3 col-3">Limpar Treino</button>
        <button id="concluirTreino" type="button" class="btn btn-success btn-lg mt-2 mr-3 col-3" data-toggle="modal" data-target="#modalComplementoDoTreino">Concluir Treino</button>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modalComplementoDoTreino" tabindex="-1" role="dialog" aria-labelledby="modalComplementoDoTreinoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalComplementoDoTreinoLabel">Inserir mensagem de complemento do treino</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="labelComplementoTreino" class="col-form-label">Complemento do Treino:</label>
                <textarea class="form-control" id="labelComplementoTreino"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-primary">Submit Btn</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->

      <div id="tabelaTrienoContainer">
        <table id="tabelaTreino" class="table table-sm table-hover table-striped table-light mt-4">
          <thead class="thead-dark">
            <tr>
              <th class="colExercicio">Exercício</th>
              <!-- <th class="colSeries">Séries</th> -->
              <th class="colMetodo">Método</th>
              <th class="colRepeticoes">Repetições</th>
              <th class="colCadencia">Cadência</th>
              <th class="colDescanso">Descanso</th>
              <th class="colBotaoRemover"></th>
            </tr>
          </thead>
          <tbody></tbody>

        </table>
      </div>
      <div id="descricaoMetodo"></div>
    </form>
  </div>
</body>

</html>
<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.min.js" integrity="sha384-ykzduUaBYjweaCG/roIizm54PztxJiXT7XLC6dkluArvYbvp74xjRWxyzmg7u5/4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha384-C/LoS0Y+QiLvc/pkrxB48hGurivhosqjvaTeRH7YLTf2a6Ecg7yMdQqTD3bdFmMO" crossorigin="anonymous"></script>

<script>
  // Remover Exercicio da Tabela
  function deleteExercicio(element) {
    element.closest('tr').remove();
  }

  function adicionaDescricaoMetodo(nomeMetodo) {
    jQuery.getJSON("src/data/metodos.json", function(json) {
      descricaoMetodoAtual = jQuery('#descricaoMetodo').html();
      descricaoIncluir = json[nomeMetodo].descricao_metodo;
      if (descricaoMetodoAtual.indexOf(descricaoIncluir) === -1) {
        jQuery('#descricaoMetodo').html(descricaoMetodoAtual + "<b>" + nomeMetodo + ": </b>" + descricaoIncluir + "<br/>");
      }
    });
  }

  jQuery(function() {
    jQuery('tbody').sortable();
    // Limpar Treino
    jQuery('#limparTreino').click(function() {
      jQuery('#tabelaTreino tbody').empty();
      jQuery('#descricaoMetodo').empty();
    });

    // Adicionar exercicio ao Treino
    jQuery('#adicionarExercicio').click(function() {
      nomeMetodo = jQuery('select#metodo option:selected').val();

      // url_exercicio1 = jQuery('select#exercicio1 option:selected').data('url-video');
      // url_exercicio2 = jQuery('select#exercicio2 option:selected').data('url-video');
      // url_exercicio3 = jQuery('select#exercicio3 option:selected').data('url-video');
      // exercicio1 = jQuery('#exercicio1').val();
      // exercicio2 = jQuery('#exercicio2').val();
      // exercicio3 = jQuery('#exercicio3').val();
      // stringExercicio1 = '<a href="' + url_exercicio1 + '" target="_blank">' + exercicio1 + '</a>';
      // stringExercicio2 = '<a href="' + url_exercicio2 + '" target="_blank">' + exercicio2 + '</a>';
      // stringExercicio3 = '<a href="' + url_exercicio3 + '" target="_blank">' + exercicio3 + '</a>';

      total = jQuery('#metodo').find(":selected").data('qtd-exercicios');
      stringExercicio = "";
      for(i=1; i<=total; i++){
        if(i > 1){
          stringExercicio += ' + ';
        }
        stringExercicio += '<a href="' + jQuery('select#exercicio' + i + ' option:selected').data('url-video') + '" target="_blank">' + jQuery('#exercicio'+i).val() + '</a>';
      }
      // stringExercicio = stringExercicio1;

      // switch (total){
      //   case 2: {
      //     stringExercicio += ' + ' + stringExercicio2;
      //     break;
      //   }
      //   case 3:{
      //     stringExercicio += ' + ' + stringExercicio2 + ' + ' + stringExercicio3;
      //     break;
      //   }
      // }

      row = '<tr>' +
        '<td class="middle colExercicio">##stringExercicio##</td>' +
        // '<td class="middle colExercicio"><a href="##url-video##" target="_blank">##exercicio##</a></td>' +
        //'<td class="middle colSeries" >##series##</td>' +
        '<td class="middle colMetodo" >##metodo##</td>' +
        '<td class="middle colRepeticoes" >##repeticoes##</td>' +
        '<td class="middle colCadencia" >##cadencia##</td>' +
        '<td class="middle colDescanso" >##descanso##</td>' +
        '<td class="text-right colBotaoRemover"><button class="btn" onclick="deleteExercicio(jQuery(this))"><i class="fa fa-trash fa-sm"></i></button></td>' +
        '</tr>';

      // replaces
      // row = row.replace('##url-video##', jQuery('select#exercicio1 option:selected').data('url-video'));
      row = row.replace('##stringExercicio##', stringExercicio);
      // row = row.replace('##series##', jQuery('#series').val());
      row = row.replace('##metodo##', nomeMetodo);
      row = row.replace('##repeticoes##', jQuery('#repeticoes').val());
      row = row.replace('##cadencia##', jQuery('#cadencia').val());
      row = row.replace('##descanso##', jQuery('#descanso').val());

      jQuery('#tabelaTreino > tbody:last-child').append(row);
      adicionaDescricaoMetodo(nomeMetodo);
    });

    // Exibição de exercicios condicionados ao método escolhido
    jQuery('#metodo').on('change', function() {
      // var opcao = jQuery(this).find(":selected").val();
      var total = jQuery(this).find(":selected").data('qtd-exercicios');
      jQuery('#selectExercicio2').hide();
      jQuery('#selectExercicio3').hide();
      switch(total){
        case 2: {
          jQuery('#selectExercicio2').show(); 
          break;
        }
        case 3: {
          jQuery('#selectExercicio2').show(); 
          jQuery('#selectExercicio3').show();
          break;
        }
        default:{
          jQuery('#selectExercicio2').hide();
          jQuery('#selectExercicio3').hide();
          break;
        }
      }
    });

  });
</script>