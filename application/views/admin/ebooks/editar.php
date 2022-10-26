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

          <div class="col-md-12 mb-2  d-flex justify-content-end align-items-end">
            <div class="mr-3">
              <button type="button" id="btn-delete-audiobook" class="btn btn-block  btn-danger toolbar-item py-3">EXCLUIR</button>
            </div>
            <form action="" id="form-update-ebook">
              <div class="">
                <button type="submit" class="btn btn-block btn-primary toolbar-item py-3">SALVAR ALTERAÇÕES</button>
              </div>
          </div>


          <div class="row">

            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body d-flex flex-column">
                  <div class="wrapper">
                    <h4 class="card-title mb-0">ADICIONE UMA IMAGEM <small class="text-danger">*</small></h4>

                    <input type="file" accept="image/jpg, image/png, image/jpeg" name="ebook_image" id="input_ebook_image" class="form-control " style="display: none;">
                    <img class="mt-3" id="btn-ebook-image" style="max-width:100%;width:100%;height:450px;max-height:450px;object-fit:contain;cursor:pointer" src="<?= base_url() ?><?= $ebook['ebook_image'] ?>" alt="">

                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <input type="hidden" name="ebook_id" id="ebook_id" value="<?= $ebook['id'] ?>" required class="form-control">

                  <h4 class="card-title mb-1">TÍTULO DO AUDIOEBOOK <small class="text-danger">*</small></h4>
                  <input type="text" name="ebook_title" id="ebook_title" value="<?= $ebook['ebook_title'] ?>" maxlength="200" required class="form-control">
                  <br><br>
                  <h4 class="card-title mb-1">DESCRIÇÃO <small class="text-danger">*</small></h4>
                  <!-- <input type="text" name="ebook_title" class="form-control"> -->
                  <textarea name="ebook_description" id="ebook_description" required class="form-control"><?= $ebook['ebook_description'] ?></textarea>


                  <div class="row mt-3">
                    <div class="col-md-6">
                      <h4 class="card-title mb-1">STATUS <small class="text-danger">*</small></h4>
                      <select name="ebook_status" id="ebook_status" required class="form-control">
                        <option default value="">SELECIONE UMA OPÇÃO</option>
                        <?php if ($ebook['ebook_status'] == "1") { ?>
                          <option selected value="1">ATIVO</option>
                          <option value="0">ARQUIVADO</option>
                        <?php } else if ($ebook['ebook_status'] == "0") { ?>
                          <option value="1">ATIVO</option>
                          <option selected value="0">ARQUIVADO</option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <h4 class="card-title mb-1">PECIFICAÇÃO <small class="text-danger">*</small></h4>
                      <select name="ebook_precificacao" id="ebook_precificacao" required class="form-control">
                        <option default value="">SELECIONE UMA OPÇÃO</option>

                        <?php if ($ebook['ebook_precificacao'] == "1") { ?>
                          <option value="0">GRÁTIS</option>
                          <option selected value="1">PREEMIUM</option>
                        <?php } else if ($ebook['ebook_precificacao'] == "0") { ?>
                          <option selected value="0">GRÁTIS</option>
                          <option value="1">PREEMIUM</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="row mt-3">
                    <div class="col-md-6">
                      <h4 class="card-title mb-1">CATEGORIA <small class="text-danger">*</small></h4>
                      <select name="ebook_category" id="ebook_category" required class="form-control text-uppercase">
                        <option default value="">SELECIONE UMA OPÇÃO</option>

                        <?php foreach ($categorias as $c) { ?>
                          <?php if ($c->id == $ebook['ebook_category']) { ?>
                            <?php echo '<option  class="text-uppercase" selected value="' . $c->id . '">' . $c->category_name . '</option>'; ?>
                          <?php } else { ?>
                            <?php echo '<option  class="text-uppercase" value="' . $c->id . '">' . $c->category_name . '</option>'; ?>
                          <?php } ?>
                        <?php } ?>

                      </select>
                    </div>
                    <div class="col-md-6">
                      <h4 class="card-title mb-1">DESTAQUE </h4>
                      <select name="ebook_featured" id="ebook_featured" class="form-control text-uppercase">
                        <option default value="">SELECIONE UMA OPÇÃO</option>

                        <?php foreach ($features as $f) { ?>
                          <?php if ($f->id == $ebook['ebook_featured']) { ?>
                            <?php echo '<option class="text-uppercase" selected value="' . $f->id . '">' . $f->featured_name . '</option>'; ?>
                          <?php } else { ?>
                            <?php echo '<option class="text-uppercase" value="' . $f->id . '">' . $f->featured_name . '</option>'; ?>
                          <?php } ?>
                        <?php } ?>

                      </select>
                    </div>

                  </div>

                  <div class="row mt-3">
                    <div class="col-md-6">
                      <h4 class="card-title mb-1">EDITORA <small class="text-danger">*</small></h4>
                      <input type="text" name="ebook_publisher" value="<?= $ebook['ebook_publisher'] ?>" id="ebook_publisher" required maxlength="200" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <h4 class="card-title mb-1">AUTOR <small class="text-danger">*</small></h4>
                      <input type="text" name="ebook_author" value="<?= $ebook['ebook_author'] ?>" id="ebook_author" required maxlength="200" class="form-control">
                    </div>

                  </div>

                  <h4 class="card-title mb-0 mt-3">TAGS RELACIONADAS </h4>
                  <small>USE VIRGULAS PARA SEPARAR</small>
                  <input type="text" name="ebook_tags" value="<?= $ebook['ebook_tags'] ?>" id="ebook_tags" class="form-control">

                </div>
              </div>
            </div>

            </form>




          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body pb-0">
                      <div class="d-block justify-content-between">
                        <h4 class="card-title mb-0">CRIE CAPÍTULOS</h4>
                        <button class="btn btn-primary mt-2 mb-3" id="btn-modal-add" data-toggle="modal" data-target="#modal-add-capitulo">
                          <i class="fa fa-plus"></i>
                          NOVO CAPÍTULO
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body pb-0">
                      <div class="d-block justify-content-between">
                        <h4 class="card-title mb-0">ADICIONE AÚDIOS</h4>
                        <button class="btn btn-primary mt-2 mb-3"><i class="icon icon-plus-circle-outline"></i>NOVO AÚDIO</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title mb-0">CONTEÚDO </h4>
                      <div class="d-flex align-items-center justify-content-between w-100">
                        <p class="mb-0">Adicione capítulos, audios e imagens ao seu conteúdo.</p>

                      </div>

                      <div class="mt-3">
                        <div class="d-flex align-items-center border border-primary ">
                          <div class="d-block align-items-left p-2 ">
                            <small>1 CAPÍTULO</small>
                            <h5 title="">INTRODUÇÃO DO LIVRO</h5>
                          </div>
                          <div class="d-flex ">
                            <i>EDITAR</i>
                            <i>EXCLUIR</i>
                          </div>
                        </div>
                      </div>
                      <div class="mt-2 ml-5">
                        <div class="d-flex align-items-center border border-primary ">
                          <div class="d-block align-items-left p-2 ">
                            <small>AÚDIO</small>
                            <h5 title="">INTRODUÇÃO DO LIVRO</h5>
                          </div>
                          <div class="d-block align-items-left p-2 ">
                            <p class="mt-3">16 MINUTOS</p>
                          </div>
                          <div class="d-flex ">
                            <i>EDITAR</i>
                            <i>EXCLUIR</i>
                          </div>

                        </div>
                      </div>
                      <div class="mt-2 ml-5">
                        <div class="d-flex align-items-center border border-primary ">
                          <div class="d-block align-items-left p-2 ">
                            <small>AÚDIO</small>
                            <h5 title="">INTRODUÇÃO DO LIVRO</h5>
                          </div>
                          <div class="d-block align-items-left p-2 ">
                            <p class="mt-3">16 MINUTOS</p>
                          </div>
                          <div class="d-flex ">
                            <i>EDITAR</i>
                            <i>EXCLUIR</i>
                          </div>

                        </div>
                      </div>
                      <div class="mt-3">
                        <div class="d-flex align-items-center border border-primary ">
                          <div class="d-block align-items-left p-2 ">
                            <small>1 CAPÍTULO</small>
                            <h5>INTRODUÇÃO DO LIVRO</h5>
                          </div>
                          <div class="d-flex ">
                            <i>EDITAR</i>
                            <i>EXCLUIR</i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h1 class="card-title mb-4">Website Audience Metrics</h1>
                      <div class="row">
                        <div class="col-5 col-md-5">
                          <div class="wrapper border-bottom mb-2 pb-2">
                            <h4 class="font-weight-semibold mb-0">523,200</h4>
                            <div class="d-flex align-items-center">
                              <p class="mb-0">Page Views</p>
                              <div class="dot-indicator bg-secondary ml-auto"></div>
                            </div>
                          </div>
                          <div class="wrapper">
                            <h4 class="font-weight-semibold mb-0">753,098</h4>
                            <div class="d-flex align-items-center">
                              <p class="mb-0">Bounce Rate</p>
                              <div class="dot-indicator bg-primary ml-auto"></div>
                            </div>
                          </div>
                        </div>
                        <div class="col-5 col-md-7 d-flex pl-4">
                          <div class="ml-auto">
                            <canvas height="100" id="realtime-statistics"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-5">
                        <div class="col-6">
                          <div class="d-flex align-items-center mb-2">
                            <div class="icon-holder bg-primary text-white py-1 px-3 rounded mr-2">
                              <i class="icon ion-logo-buffer icon-sm"></i>
                            </div>
                            <h2 class="font-weight-semibold mb-0">3,605</h2>
                          </div>
                          <p>Since last week</p>
                          <p><span class="font-weight-medium">0.51%</span> (30 days)</p>
                        </div>
                        <div class="col-6">
                          <div class="mt-n3 ml-auto" id="dashboard-guage-chart"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="col-md-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title mb-4">World sellings</h4>
                      <div id="dashboard-vmap" class="vector-map"></div>
                      <div class="wrapper">
                        <div class="d-flex w-100 pt-2 mt-4">
                          <p class="mb-0 font-weight-semibold">California</p>
                          <div class="wrapper ml-auto d-flex align-items-center">
                            <p class="font-weight-semibold mb-0">26,437</p>
                            <p class="ml-1 mb-0">26%</p>
                          </div>
                        </div>
                        <div class="d-flex w-100 pt-2">
                          <p class="mb-0 font-weight-semibold">Washington</p>
                          <div class="wrapper ml-auto d-flex align-items-center">
                            <p class="font-weight-semibold mb-0">3252</p>
                            <p class="ml-1 mb-0">64%</p>
                          </div>
                        </div>
                        <div class="d-flex w-100 pt-2">
                          <p class="mb-0 font-weight-semibold">Michigan</p>
                          <div class="wrapper ml-auto d-flex align-items-center">
                            <p class="font-weight-semibold mb-0">4,987</p>
                            <p class="ml-1 mb-0">30%</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title mb-0">Top Performer</h4>
                      <div class="d-flex mt-3 py-2 border-bottom">
                        <img class="img-sm rounded-circle" src="<?= base_url() ?>assets_admin/images/faces/face3.jpg" alt="profile image">
                        <div class="wrapper ml-2">
                          <p class="mb-n1 font-weight-semibold">Ray Douglas</p>
                          <small>162543</small>
                        </div>
                        <small class="text-muted ml-auto">1 Hours ago</small>
                      </div>
                      <div class="d-flex py-2 border-bottom">
                        <span class="img-sm rounded-circle bg-warning text-white text-avatar">OH</span>
                        <div class="wrapper ml-2">
                          <p class="mb-n1 font-weight-semibold">Ora Hill</p>
                          <small>162543</small>
                        </div>
                        <small class="text-muted ml-auto">4 Hours ago</small>
                      </div>
                      <div class="d-flex py-2 border-bottom">
                        <img class="img-sm rounded-circle" src="<?= base_url() ?>assets_admin/images/faces/face4.jpg" alt="profile image">
                        <div class="wrapper ml-2">
                          <p class="mb-n1 font-weight-semibold">Brian Dean</p>
                          <small>162543</small>
                        </div>
                        <small class="text-muted ml-auto">4 Hours ago</small>
                      </div>
                      <div class="d-flex pt-2">
                        <span class="img-sm rounded-circle bg-success text-white text-avatar">OB</span>
                        <div class="wrapper ml-2">
                          <p class="mb-n1 font-weight-semibold">Olive Bridges</p>
                          <small>162543</small>
                        </div>
                        <small class="text-muted ml-auto">7 Hours ago</small>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

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
    $('#btn-delete-audiobook').on('click', function(e) {


      swal({
        title: "Atenção!",
        text: "Tem certeza que deseja excluir?",
        icon: "warning",
        // buttons:[cancel, confirm]

      }).then(function(isConfirm) {

        if (isConfirm) {

          $.ajax({
            method: 'POST',
            url: '<?= base_url() ?>painel/deleteEbook',
            data: {ebook_id:<?=$ebook['id']?>},
            success: function(data) {

              window.location.href = "<?=base_url()?>painel/ebooks_lista"
            },
            error: function(data) {
              swal('Ocorreu um erro temporário. ');
            },

          });

        } else {

        }

      });



    })
  </script>

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
    $('#form-update-ebook').submit(function(e) {

      e.preventDefault()


      var extPermitidas = ['jpg', 'png', 'jpeg', 'JPEG', 'JPG', 'PNG'];
      var extArquivo = $('input[type=file]').val().split('.').pop();
      var file = $('#input_ebook_image').prop('files')[0];

      //1. validacao do tamanho



      var formdata = new FormData();

      formdata.append("ebook_title", $('#ebook_title').val());
      formdata.append("ebook_description", $('#ebook_description').val());

      if (file) {
        formdata.append("ebook_image", file);
      } else {
        formdata.append("ebook_image", "");
      }

      formdata.append("ebook_id", $('#ebook_id').val());
      formdata.append("ebook_tags", $('#ebook_tags').val());
      formdata.append("ebook_status", $('#ebook_status').val());
      formdata.append("ebook_precificacao", $('#ebook_precificacao').val());
      formdata.append("ebook_category", $('#ebook_category').val());
      formdata.append("ebook_featured", $('#ebook_featured').val());
      formdata.append("ebook_publisher", $('#ebook_publisher').val());
      formdata.append("ebook_author", $('#ebook_author').val());


      $.ajax({
        method: 'POST',
        url: '<?= base_url() ?>painel/actupdateEbook',
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {

          var resp = JSON.parse(data)

          swal({
            title: "Feito!",
            text: resp.message,
            icon: "success",

          }).then(function(isConfirm) {

            //

          });

        },
        error: function(data) {
          swal('Ocorreu um erro temporário. ');
        },

      });




    })
  </script>
</body>

</html>