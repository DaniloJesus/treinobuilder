<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/css/bootstrap-select.min.css" integrity="sha384-BJPGVhka8+B49CO2MFRKLZ0fD0v142Ssd+px+a64YvT+EoCupeZSxIxPvxafQ4cJ" crossorigin="anonymous">

  <title>Felipe de Paulo - Treino Builder</title>
</head>

<body>
  <?php include('includes/menu.html');
  $contents = json_decode(file_get_contents("src/data/videos.json"));
  ?>
  <div class="container mt-3">
    <form>
      <div class="form-group">
        <label for="titulo">Título do Treino:</label>
        <input id="titulo" class="form-control" type="text" placeholder="Treino A (Segunda e Quinta)">
      </div>
      <div class="row">
        <div class="form-group col-6">
          <label for="exercicio">Escolha o exercício:</label>
          <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="exercicio">
            <?php foreach ($contents as $tipo => $exercicio) : ?>
              <optgroup label="<?php echo ucwords($tipo); ?>">
                <?php foreach ($exercicio as $data) : ?>
                  <option id="<?php echo $data->nome; ?>" value="<?php echo $data->nome; ?>" data-tokens="<?php echo $data->nome; ?>"><?php echo $data->nome; ?></option>
                <?php endforeach; ?>
              </optgroup>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group col">
          <label for="series">Quantidade de séries:</label>
          <input id="series" class="form-control" type="text" placeholder="2x, 3x...">
        </div>
        <div class="form-group col">
          <label for="metodo">Método: <small><u>(pegar via JSON)</u></small></label>
          <input id="metodo" class="form-control" type="text" placeholder="Bi-set, Máximas...">
        </div>
      </div>

      <div class="row">
        <div class="form-group col">
          <label for="repeticoes">Repetições:</label>
          <input id="repeticoes" class="form-control" type="text" placeholder="9 a 11, 12 a 15...">
        </div>
        <div class="form-group col">
          <label for="cadencia">Cadência:</label>
          <input id="cadencia" class="form-control" type="text" placeholder="2020, 3030...">
        </div>
        <div class="form-group col-6">
          <label for="descanso">Tempo de descanso:</label>
          <input id="descanso" class="form-control" type="text" placeholder="45 segundos, 60 segundos...">
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
      <div>
        <table id="tabelaTreino" class="table table-striped table-dark mt-4">
          <thead>
            <td>Exercício</td>
            <td>Séries</td>
            <td>Método</td>
            <td>Repetições</td>
            <td>Cadência</td>
            <td>Descanso</td>
          </thead>
          <tbody></tbody>

        </table>
      </div>
    </form>
  </div>
</body>

</html>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstraps JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.min.js" integrity="sha384-ykzduUaBYjweaCG/roIizm54PztxJiXT7XLC6dkluArvYbvp74xjRWxyzmg7u5/4" crossorigin="anonymous"></script>

<script>
  // Remover Exercicio da Tabela
  function deleteExercicio(element) {
    element.closest('tr').remove();
  }

  jQuery(function() {
    // Adicionar exercicio ao Treino
    jQuery('#adicionarExercicio').click(function() {
      row = '<tr onclick="deleteExercicio(jQuery(this))"><td>##exercicio##</td><td>##series##</td><td>##metodo##</td><td>##repeticoes##</td><td>##cadencia##</td><td>##descanso##</td></tr>'
      row = row.replace('##exercicio##', jQuery('#exercicio').val());
      row = row.replace('##series##', jQuery('#series').val());
      row = row.replace('##metodo##', jQuery('#metodo').val());
      row = row.replace('##repeticoes##', jQuery('#repeticoes').val());
      row = row.replace('##cadencia##', jQuery('#cadencia').val());
      row = row.replace('##descanso##', jQuery('#descanso').val());

      jQuery('#tabelaTreino > tbody:last-child').append(row);
    });

    // Limpar Treino
    jQuery('#limparTreino').click(function() {
      jQuery('#tabelaTreino tbody').empty();
    });
  });
</script>