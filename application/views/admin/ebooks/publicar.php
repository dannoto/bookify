<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Publique um Audiobook</title>
  <?php $this->load->view('comp/admin/header') ?>


</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php $this->load->view('comp/admin/navbar') ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php $this->load->view('comp/admin/sidebar') ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <!-- Page Title Header Starts-->
          <div class="row page-title-header">
            <!-- <div class="col-12">
              <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
                <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                  <ul class="quick-links">
                    <li><a href="#">ICE Market data</a></li>
                    <li><a href="#">Own analysis</a></li>
                    <li><a href="#">Historic market data</a></li>
                  </ul>
                  <ul class="quick-links ml-auto">
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Analytics</a></li>
                    <li><a href="#">Watchlist</a></li>
                  </ul>
                </div>
              </div>
            </div> -->

          </div>
          <form action="" id="form-add-audiobook">

            <div class="row">

              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body d-flex flex-column">
                    <div class="wrapper">
                      <h4 class="card-title mb-0">ADICIONE UMA IMAGEM <small class="text-danger">*</small></h4>

                      <input type="file"  accept="image/jpg, image/png, image/jpeg" name="ebook_image" id="input_ebook_image" class="form-control " style="display: none;">
                      <img class="mt-3" id="btn-ebook-image" style="max-width:100%;width:100%;height:450px;max-height:450px;object-fit:contain;cursor:pointer" src="<?= base_url() ?>assets/img/default.png" alt="">

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">


                    <h4 class="card-title mb-1">TÍTULO DO AUDIOEBOOK <small class="text-danger">*</small></h4>
                    <input type="text" name="ebook_title" id="ebook_title" maxlength="200" required class="form-control">
                    <br><br>
                    <h4 class="card-title mb-1">DESCRIÇÃO <small class="text-danger">*</small></h4>
                    <!-- <input type="text" name="ebook_title" class="form-control"> -->
                    <textarea name="ebook_description" id="ebook_description" required class="form-control"></textarea>


                    <div class="row mt-3">
                      <div class="col-md-6">
                        <h4 class="card-title mb-1">STATUS <small class="text-danger">*</small></h4>
                        <select name="ebook_status" id="ebook_status" required class="form-control">
                          <option default value="">SELECIONE UMA OPÇÃO</option>
                          <option value="1">ATIVO</option>
                          <option value="0">ARQUIVADO</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <h4 class="card-title mb-1">PECIFICAÇÃO <small class="text-danger">*</small></h4>
                        <select name="ebook_precificacao" id="ebook_precificacao" required class="form-control">
                          <option default value="">SELECIONE UMA OPÇÃO</option>
                          <option value="0">GRÁTIS</option>
                          <option value="1">PREEMIUM</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mt-3">
                      <div class="col-md-6">
                        <h4 class="card-title mb-1">CATEGORIA <small class="text-danger">*</small></h4>
                        <select name="ebook_category" id="ebook_category" required class="form-control text-uppercase">
                          <option default value="">SELECIONE UMA OPÇÃO</option>

                          <?php foreach ($categorias as $c) { ?>
                            <?php echo '<option  class="text-uppercase" value="' . $c->id . '">' . $c->category_name . '</option>'; ?>
                          <?php } ?>

                        </select>
                      </div>
                      <div class="col-md-6">
                        <h4 class="card-title mb-1">DESTAQUE </h4>
                        <select name="ebook_featured" id="ebook_featured" class="form-control text-uppercase">
                          <option default value="">SELECIONE UMA OPÇÃO</option>

                          <?php foreach ($features as $f) { ?>
                            <?php echo '<option class="text-uppercase" value="' . $f->id . '">' . $f->featured_name . '</option>'; ?>
                          <?php } ?>

                        </select>
                      </div>

                    </div>

                    <div class="row mt-3">
                      <div class="col-md-6">
                        <h4 class="card-title mb-1">EDITORA <small class="text-danger">*</small></h4>
                        <input type="text" name="ebook_publisher" id="ebook_publisher" required maxlength="200" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <h4 class="card-title mb-1">AUTOR <small class="text-danger">*</small></h4>
                        <input type="text" name="ebook_author" id="ebook_author" required maxlength="200" class="form-control">
                      </div>

                    </div>

                    <h4 class="card-title mb-0 mt-3">TAGS RELACIONADAS </h4>
                    <small>USE VIRGULAS PARA SEPARAR</small>
                    <input type="text" name="ebook_tags" id="ebook_tags" class="form-control">

                  </div>
                </div>
              </div>
              <div class="col-md-12  d-flex justify-content-end align-items-end">
                <div class="">
                  <button type="submit" class="btn btn-block btn-primary toolbar-item py-3">PUBLICAR AUDIOBOOK</button>
                </div>
              </div>



            </div>
            <br><br>
        </div>
        </form>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        <?php // $this->load->view('comp/admin/footer') 
        ?>

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>


  <!-- Modal Add Capitulo -->
  <div class="modal fade" id="modal-add-capitulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">NOVO CAPÍTULO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="form-add-capitulo">
            <label for="">NOME DO CAPÍTULO <span class="text-danger">*</span></label><br>
            <input type="text" name="chapter_title" required class="mb-2 form-control">

            <label for="">DESCRIÇÃO</label><br>
            <textarea type="text" name="chapter_description" class="mb-2 form-control"></textarea>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
          <button type="submit" class="btn btn-primary">ADICIONAR</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Add Capitulo -->

  <?php $this->load->view('comp/admin/script') ?>

  <script>
    $('#btn-ebook-image').on('click', function(e) {
      $('#input_ebook_image').click();
    })


    $('#input_ebook_image').on('change', function(ent) {


      var extPermitidas = ['jpg', 'png', 'jpeg', 'JPEG', 'JPG', 'PNG'];
      var extArquivo = $('input[type=file]').val().split('.').pop();

      //1. validacao do tamanho
      if (this.files[0].size > 5000000) {

        swal('Arquivo muito grande, máximo permitido 5MB.')

      } else {

        //Validando Extensão
        if (typeof extPermitidas.find(function(ext) {
            return extArquivo == ext;
          }) == 'undefined') {

          swal('O arquivo precisa ser uma imagem. Formatos permitidos [PNG, JPG E JPEG]')

        } else {

          const [file] = this.files
          if (file) {
            $('#btn-ebook-image').attr('src', URL.createObjectURL(file))
          }

        }

      }

    })
  </script>


  <script>
    $('#form-add-audiobook').submit(function(e) {

      e.preventDefault()


      var extPermitidas = ['jpg', 'png', 'jpeg', 'JPEG', 'JPG', 'PNG'];
      var extArquivo = $('input[type=file]').val().split('.').pop();
      var file = $('#input_ebook_image').prop('files')[0];

      //1. validacao do tamanho
      if (file) {
        
        if (file.size > 5000000) {
  
          swal('Arquivo muito grande, máximo permitido 5MB.')
  
        } else {
  
          //Validando Extensão
          if (typeof extPermitidas.find(function(ext) {
              return extArquivo == ext;
            }) == 'undefined') {
  
            swal('O arquivo precisa ser uma imagem. Formatos permitidos [PNG, JPG E JPEG]')
  
          } else {
  
  
            var formdata = new FormData();
  
            formdata.append("ebook_title", $('#ebook_title').val());
            formdata.append("ebook_description", $('#ebook_description').val());
            formdata.append("ebook_image", file);
            formdata.append("ebook_tags", $('#ebook_tags').val());
            formdata.append("ebook_status", $('#ebook_status').val());
            formdata.append("ebook_precificacao", $('#ebook_precificacao').val());
            formdata.append("ebook_category", $('#ebook_category').val());
            formdata.append("ebook_featured", $('#ebook_featured').val());
            formdata.append("ebook_publisher", $('#ebook_publisher').val());
            formdata.append("ebook_author", $('#ebook_author').val());
  
  
            $.ajax({
              method: 'POST',
              url: '<?= base_url() ?>painel/actAddEbook',
              data: formdata,
              cache:false,
              contentType: false,
              processData: false,
              success: function(data) {
  
                var resp = JSON.parse(data)
  
                swal({
                  title: "Parabéns!",
                  text: resp.message,
                  icon: "success",
  
                }).then(function(isConfirm) {
  
                  window.location.href = "<?= base_url() ?>painel/ebooks_editar/" + resp.ebook_id
  
                });
  
              },
              error: function(data) {
                swal('Ocorreu um erro temporário. ');
              },
  
            });
          }
        }
      } else {
        swal("Adicione uma imagem.");
      }

    })
  </script>


</body>

</html>