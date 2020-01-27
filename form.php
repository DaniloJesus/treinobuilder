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
          <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="metodo" required>
            <option value="" selected disabled style="display: none;">Selecione um método</option>
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

        <div id="selectExercicio3" class="mt-2">
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
                <label for="txtComplementoTreino" class="col-form-label">Complemento do Treino:</label>
                <textarea class="form-control" id="txtComplementoTreino"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modalBotaoFechar">Fechar</button>
              <button type="button" class="btn btn-primary" id="modalConcluirTreino">Concluir Treino</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->

      <div id="tabelaTrienoContainer" class="mt-4">
        <table id="tabelaTreino" class="table table-sm table-hover table-striped table-light mt-1">
          <h5 class="text-center" id="tituloTreino"></h5>
          <thead class="thead-dark">
            <tr>
              <th class="colExercicio" width="35%">Exercício</th>
              <!-- <th class="colSeries">Séries</th> -->
              <th class="colMetodo" width="10%">Método</th>
              <th class="colRepeticoes" width="20%">Repetições</th>
              <th class="colCadencia" width="12%">Cadência</th>
              <th class="colDescanso">Descanso</th>
              <th class="colBotaoRemover"></th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
      <div id="comentarioTreino"></div>
      <div id="rodapeTreino">
        <div id="descricaoMetodo" class="mt-2"></div>
        <div id="botoesFinalizaTreino" class="mt-4">
          <button type="button" class="btn btn-primary" id="btnFinalizaTreino" disabled>Finalizar Treino</button>
        </div>
      </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script src="https://unpkg.com/jspdf-autotable@3.2.11/dist/jspdf.plugin.autotable.js" integrity="sha384-cUiRXD07a38Fh7In5F/mVODXKG9epiTB7BjwpJVni5uTFTEKg0CqaoPuJpXWSD2Q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.1/html2pdf.bundle.min.js" integrity="sha384-Ho2Qx5q7Y92BZSxEZtDh2+hUqcudf/uXp77PK0XXawmB+tmreY4nUttlKWXnUWtn" crossorigin="anonymous"></script>

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

  function exportacao1() {
    var doc = new jsPDF()
    // Esse não tem links
    doc.autoTable({
      html: '#tabelaTreino'
    })
    doc.save('table.pdf')
  }

  function exportacao2() {
    var pdfFileName = 'file.pdf';
    var element = document.getElementById('tabelaTreino');
    const options = {
      margin: 1,
      filename: pdfFileName,
      image: {
        type: 'png',
        quality: 1
      },
      html2canvas: {
        dpi: 192,
        letterRendering: false
      },
      // jsPDF: {
      //   unit: 'in',
      //   format: 'a4',
      //   orientation: 'portrait'
      // }
    }
    html2pdf(element, options);
  }

  function exportacao3() {
    var doc = new jsPDF('p', 'pt');
    var res = doc.autoTableHtmlToJson(document.getElementById("tabelaTreino"));
    doc.autoTable(res.columns, res.data, {
      margin: {
        top: 80
      }
    });
    
    // Se for usar header e options
    // var header = function(data) {
    //   doc.setFontSize(18);
    //   doc.setTextColor(40);
    //   doc.setFontStyle('normal');
    //   doc.addImage(headerImgData, 'JPEG', data.settings.margin.left, 20, 50, 50);
    //   doc.text("Testing Report", data.settings.margin.left, 50);
    // };
    // var options = {
    //   didDrawPage: header,
    //   startY: doc.previousAutoTable.finalY + 20
    // };
    // doc.autoTable(res.columns, res.data, options);
    doc.save("table.pdf");
  }

  jQuery(function() {
    // Implementando drag n drop
    jQuery('tbody').sortable();

    // Limpar Treino
    jQuery('#limparTreino').click(function() {
      jQuery('#tabelaTreino tbody').empty();
      jQuery('#descricaoMetodo').empty();
      jQuery("#btnFinalizaTreino").attr("disabled", true);
      // jQuery("select#metodo option").prop("disabled", false);
      jQuery("#metodo").val("").change();
      jQuery("select#metodo option").prop("disabled", true);
    });

    // Adicionar exercicio ao Treino
    jQuery('#adicionarExercicio').click(function() {
      jQuery('#tituloTreino').html(jQuery('#titulo').val());
      nomeMetodo = jQuery('select#metodo option:selected').val();
      if (nomeMetodo == "") {
        alert('Por favor, escolha um método antes de escolher o exercício');
        return false;
      }

      total = jQuery('#metodo').find(":selected").data('qtd-exercicios');
      stringExercicio = "";
      for (i = 1; i <= total; i++) {
        if (i > 1) {
          stringExercicio += ' + ';
        }
        stringExercicio += '<a href="' + jQuery('select#exercicio' + i + ' option:selected').data('url-video') + '" target="_blank">' + jQuery('#exercicio' + i).val() + '</a>';
      }

      row = '<tr>' +
        '<td class="middle colExercicio">##stringExercicio##</td>' +
        '<td class="middle colMetodo" >##metodo##</td>' +
        '<td class="middle colRepeticoes" >##repeticoes##</td>' +
        '<td class="middle colCadencia" >##cadencia##</td>' +
        '<td class="middle colDescanso" >##descanso##</td>' +
        '<td class="text-right colBotaoRemover"><button class="btn" onclick="deleteExercicio(jQuery(this))"><i class="fa fa-trash fa-sm"></i></button></td>' +
        '</tr>';

      // replaces
      row = row.replace('##stringExercicio##', stringExercicio);
      row = row.replace('##metodo##', nomeMetodo);
      row = row.replace('##repeticoes##', jQuery('#repeticoes').val());
      row = row.replace('##cadencia##', jQuery('#cadencia').val());
      row = row.replace('##descanso##', jQuery('#descanso').val());

      jQuery('#tabelaTreino > tbody:last-child').append(row);
      adicionaDescricaoMetodo(nomeMetodo);
      jQuery("#btnFinalizaTreino").attr("disabled", false);


    });

    // Exibição de exercicios condicionados ao método escolhido
    jQuery('#metodo').on('change', function() {
      // var opcao = jQuery(this).find(":selected").val();
      var total = jQuery(this).find(":selected").data('qtd-exercicios');
      jQuery('#selectExercicio2').hide();
      jQuery('#selectExercicio3').hide();
      switch (total) {
        case 2: {
          jQuery('#selectExercicio2').show();
          break;
        }
        case 3: {
          jQuery('#selectExercicio2').show();
          jQuery('#selectExercicio3').show();
          break;
        }
        default: {
          jQuery('#selectExercicio2').hide();
          jQuery('#selectExercicio3').hide();
          break;
        }
      }
    });

    jQuery('#modalConcluirTreino').click(function() {
      jQuery('#comentarioTreino').html(jQuery('#txtComplementoTreino').val());
      jQuery('#modalBotaoFechar').trigger('click');
    });

    jQuery('#concluirTreino').click(function() {
      if (jQuery('#titulo').val() == "") {
        alert('O campo Título do treino parece estar vazio. Por favor, verifique!');
        return false;
      }
    });

    jQuery('#btnFinalizaTreino').click(function() {
      // VERSÃO TESTE 1 - jsPDF
      // exportacao1();

      // VERSÃO TESTE 2 (links ok) - Html2pdf
      // exportacao2();

      // VERSÃO TESTE 3 - jsPDF
      exportacao3();

    });




  });
</script>