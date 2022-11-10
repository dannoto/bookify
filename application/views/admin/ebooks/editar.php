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
                      <h4 class="card-title mb-1">PRECIFICAÇÃO <small class="text-danger">*</small></h4>
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
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body pb-0">
                      <div class="d-block justify-content-between">
                        <h4 class="card-title mb-0">CRIE CAPÍTULOS</h4>
                        <button class="btn btn-primary mt-2 mb-3 px-2" id="btn-modal-add" data-toggle="modal" data-target="#modal-add-capitulo">
                          <i class="fa fa-plus"></i>
                          NOVO CAPÍTULO
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body pb-0">
                      <div class="d-block justify-content-between">
                        <h4 class="card-title mb-0">ADICIONE AÚDIOS</h4>
                        <button class="btn btn-primary mt-2 mb-3 px-2" id="btn-novo-audio"><i class="icon icon-plus-circle-outline"></i>NOVO AÚDIO</button>
                      </div>
                    </div>
                  </div>
                </div> -->
                <div class="col-md-12 grid-margin">
                  <div class="card">
                    <div class="card-body">

                      <h4 class="card-title mb-0">CONTEÚDO </h4>
                      <div class="d-flex align-items-center justify-content-between w-100">
                        <p class="mb-0">Adicione capítulos, audios e imagens ao seu conteúdo.</p>

                      </div>

                      <?php if (count($this->chapter_model->getChaptersByEbook($ebook['id'])) > 0) { ?>

                        <?php $count = 0 ?>
                        <?php foreach ($this->chapter_model->getChaptersByEbook($ebook['id']) as $e) { ?>
                          <?php $count++ ?>

                          <div class="mt-3">
                            <div class="border border-primary  bg-yellow-500 row">
                              <div class="col-md-9">
                                <div class="d-block align-items-left p-2 ">
                                  <small style="font-size: 10px"><?= $count ?> CAPÍTULO - <?= round($e->chapter_duration, 2) ?> minutos</small>
                                  <h5 title="<?= ucfirst($e->chapter_title) ?>" class="line-clamp-1"><?= ucfirst($e->chapter_title) ?></h5>
                                </div>
                              </div>
                              <div class="col-md-3 align-items-center">
                                <div class="d-flex mt-3">
                                  <i title="ADICIONAR AUDIO" class="ml-3 mdi mdi-library-music add-audio" data-id="<?= $e->id ?>" style="color:#2196f3;font-size:25px;cursor:pointer"></i>
                                  <i title="EDITAR CAPÍTULO" class="ml-3 mdi  mdi-pencil update-chapter" data-id="<?= $e->id ?>" data-title="<?= $e->chapter_title ?>" data-description="<?= $e->chapter_description ?>" style="color:#222;font-size:25px;cursor:pointer"></i>
                                  <i title="EXCLUIR CAPÍTULO" class="ml-3 mdi mdi-delete delete-chapter" data-id="<?= $e->id ?>" style="color:#ff0017;font-size:25px;cursor:pointer"></i>
                                </div>
                              </div>
                            </div>
                          </div>

                          <?php foreach ($this->audio_model->getAudiosByChapters($e->id) as $e) { ?>
                            <div class="mt-3 ml-5">
                              <div class="border border-primary  bg-yellow-500 row">
                                <div class="col-md-8">
                                  <div class="d-block align-items-left p-2 ">
                                    <small style="font-size: 10px"> AÚDIO - <?= round($e->audio_duration, 2) ?> minutos</small>
                                    <h5 title="<?= ucfirst($e->audio_title) ?>" class="line-clamp-1"><?= ucfirst($e->audio_title) ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-3 align-items-center">
                                  <div class="d-flex mt-4">
                                    <a target="_blank" href="<?= base_url() ?><?= $e->audio_file ?>">
                                      <i title="OUVIR AUDIO" class="ml-3 mdi  mdi-play-circle-outline " style="color:green;font-size:25px;cursor:pointer"></i>
                                    </a>
                                    <i title="ADICIONAR IMAGENS" class="ml-3 mdi mdi-image-filter add-audio" data-id="<?= $e->id ?>" style="color:#2196f3;font-size:25px;cursor:pointer"></i>
                                    <i title="EDITAR AUDIO" class="ml-3 mdi  mdi-pencil update-audio" data-id="<?= $e->id ?>" data-title="<?= $e->audio_title ?>" data-description="<?= $e->audio_description ?>" data-chapter="<?= $e->audio_chapter ?>" data-duration="<?= $e->audio_duration ?>" data-file="<?= $e->audio_file ?>" style="color:#222;font-size:25px;cursor:pointer"></i>
                                    <i title="EXCLUIR AUDIO" class="ml-3 mdi mdi-delete delete-audio" data-id="<?= $e->id ?>" style="color:#ff0017;font-size:25px;cursor:pointer"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php } ?>

                        <?php } ?>

                      <?php } else {  ?>

                        <div class="mt-3">
                          <div class="border border-primary  bg-yellow-500 row">
                            <div class="col-md-12">
                              <p class="text-center center mt-3">NENHUM CAPÍTULO CRIADO.</p>

                            </div>
                          </div>
                        </div>


                      <?php } ?>

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
                      <h1 class="card-title mb-4">ESTATÍSTICAS GERAIS</h1>
                      <div class="row">
                        <div class="col-5 col-md-5">
                          <div class="wrapper border-bottom mb-2 pb-2">
                            <h4 class="font-weight-semibold mb-0"><?php if ($this->ebook_model->getEbook($ebook['id'])['ebook_duration'] == 0) {
                                                                    echo "0";
                                                                  } else {
                                                                    echo round(($this->ebook_model->getEbook($ebook['id'])['ebook_duration'] / 60), 2);
                                                                  } ?></h4>
                            <div class="d-flex align-items-center">
                              <p class="mb-0"><small>HORAS </small></p>
                              <div class="dot-indicator bg-secondary ml-auto"></div>
                            </div>
                          </div>
                          <div class="wrapper border-bottom mb-2 pb-2">
                            <h4 class="font-weight-semibold mb-0"><?php if ($this->ebook_model->getEbook($ebook['id'])['ebook_duration'] == 0) {
                                                                    echo "0";
                                                                  } else {
                                                                    echo round($this->ebook_model->getEbook($ebook['id'])['ebook_duration'], 2);
                                                                  } ?></h4>
                            <div class="d-flex align-items-center">
                              <p class="mb-0"><small>MINUTOS </small></p>
                              <div class="dot-indicator bg-secondary ml-auto"></div>
                            </div>
                          </div>
                          <div class="wrapper">
                            <h4 class="font-weight-semibold mb-0"><?php echo count($this->chapter_model->getChaptersByEbook($ebook['id'])); ?></h4>
                            <div class="d-flex align-items-center">
                              <p class="mb-0"><small>CAPÍTULOS</small></p>
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
                      <!-- <div class="row mt-5">
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
                      </div> -->
                    </div>
                  </div>
                </div>

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
            <input type="text" name="add_chapter_title" id="add_chapter_title" required class="mb-2 form-control">

            <label for="">DESCRIÇÃO</label><br>
            <textarea type="text" name="add_chapter_description" maxlength="200 " id="add_chapter_description" class="mb-2 form-control"></textarea>

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

  <button id="btn-open-modal-add-audio" data-toggle="modal" style="display:none ;" data-target="#modal-add-audio"></button>
  <!-- Modal Add Audio -->
  <div class="modal fade" id="modal-add-audio" tabindex="-1" role="dialog" aria-labelledby="modal-add-audio" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">NOVO AÚDIO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="form-add-audio">
            <label for="">NOME DO AÚDIO <span class="text-danger">*</span></label><br>
            <input type="hidden" name="audio_id" id="add_audio_id" required class="mb-2 form-control">

            <input type="text" name="audio_title" id="add_audio_title" required class="mb-2 form-control">

            <label for="">DESCRIÇÃO</label><br>
            <textarea type="text" name="audio_description" maxlength="200 " id="add_audio_description" class="mb-2 form-control"></textarea>

            <label for="">DURAÇÃO <span class="text-danger">*</span></label>
            <small>[minutos:segundos]</small><br>
            <input type="text" name="audio_duration" id="add_audio_duration" data-mask="99:99" required class="mb-2 form-control">

            <label for="">ARQUIVO DO AUDIO <span class="text-danger">*</span></label><br>
            <input type="file" name="audio_file" id="add_audio_file" accept="video/mp4" required class="mb-2 form-control">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
          <button type="submit" class="btn btn-primary">ADICIONAR</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Add Audio -->



  <button id="btn-open-update-chapter" data-toggle="modal" style="display:none ;" data-target="#modal-update-chapter"></button>
  <!-- Modal Update Capitulo -->
  <div class="modal fade" id="modal-update-chapter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">EDITAR CAPÍTULO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="form-update-capitulo">
            <label for="">NOME DO CAPÍTULO <span class="text-danger">*</span></label><br>
            <input type="hidden" name="chapter_id" id="update_chapter_id" required class="mb-2 form-control">

            <input type="text" name="chapter_title" id="update_chapter_title" required class="mb-2 form-control">

            <label for="">DESCRIÇÃO</label><br>
            <textarea type="text" name="chapter_description" maxlength="200 " id="update_chapter_description" class="mb-2 form-control"></textarea>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
          <button type="submit" class="btn btn-primary">ADICIONAR</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Update Capitulo -->


  <button id="btn-open-update-audio" data-toggle="modal" style="display:none ;" data-target="#modal-update-audio"></button>

  <!-- Modal Update Audio -->
  <div class="modal fade" id="modal-update-audio" tabindex="-1" role="dialog" aria-labelledby="modal-add-audio" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">EDITAR AÚDIO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="form-update-audio">
            <label for="">NOME DO AÚDIO <span class="text-danger">*</span></label><br>
            <input type="hidden" name="audio_id" id="update_audio_id" required class="mb-2 form-control">
            <input type="hidden" name="audio_chapter" id="update_audio_chapter" required class="mb-2 form-control">

            <input type="text" name="audio_title" id="update_audio_title" required class="mb-2 form-control">
            
            <label for="">DESCRIÇÃO</label><br>
            <textarea type="text" name="audio_description" maxlength="200 " id="update_audio_description" class="mb-2 form-control"></textarea>

            <label for="">DURAÇÃO <span class="text-danger">*</span></label>
            <small>[minutos:segundos]</small><br>
            <input type="text" name="audio_duration" id="update_audio_duration" data-mask="99:99" required class="mb-2 form-control">

            <label for="">ARQUIVO DO AUDIO </label><br>
            <input type="file" name="audio_file" id="update_audio_file" accept="video/mp4" class="mb-2 form-control">



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
          <button type="submit" class="btn btn-primary">ATUALIZAR</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Update Audio -->




  <?php $this->load->view('comp/admin/script') ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    //Get chapter DOM
    function getChaptersDOM() {

      location.reload()
      // $.ajax({
      //   method: 'POST',
      //   url: '<?= base_url() ?>painel/actGetChapterDOM',
      //   data: {
      //     chapter_ebook: chapter_ebook,
      //   },

      //   success: function(data) {

      //     //Append data

      //   },
      //   error: function(data) {
      //     swal('Ocorreu um erro temporário. ');
      //   },

      // });
    }

    function getChaptersDOMSelect() {

    }
  </script>
  <script>
    //Open Modal add audio
    $('.add-audio').on('click', function(e) {

      var audio_id = $(this).data('id')
      $('#add_audio_id').val(audio_id)
      $('#btn-open-modal-add-audio').click()

    })
  </script>

  <script>
    $('#btn-delete-audiobook').on('click', function(e) {


      swal({
        title: "Atenção!",
        text: "Tem certeza que deseja excluir?",
        icon: "warning",
        buttons: [
          'Não',
          'Sim, quero excluir'
        ],
        dangerMode: true,

      }).then(function(isConfirm) {

        if (isConfirm) {

          $.ajax({
            method: 'POST',
            url: '<?= base_url() ?>painel/deleteEbook',
            data: {
              ebook_id: <?= $ebook['id'] ?>
            },
            success: function(data) {

              window.location.href = "<?= base_url() ?>painel/ebooks_lista"
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


    $('.delete-audio').on('click', function(e) {

      var audio_id = $(this).data('id')

      swal({
        title: "Atenção!",
        text: "Tem certeza que deseja excluir este audio?",
        icon: "warning",
        buttons: [
          'Não',
          'Sim, quero excluir'
        ],
        dangerMode: true,

      }).then(function(isConfirm) {

        if (isConfirm) {

          $.ajax({
            method: 'POST',
            url: '<?= base_url() ?>painel/deleteAudio',
            data: {
              audio_id: audio_id
            },
            success: function(data) {

              var resp = JSON.parse(data)

              if (resp.status == "true") {
                getChaptersDOM()
              } else {
                swal(resp.message);
              }
            },
            error: function(data) {
              swal('Ocorreu um erro temporário. ');
            },

          });

        } else {

        }

      });



    })

    $('.delete-chapter').on('click', function(e) {

      var chapter_id = $(this).data('id')

      swal({
        title: "Atenção!",
        text: "Tem certeza que deseja excluir este capítulo?",
        icon: "warning",
        buttons: [
          'Não',
          'Sim, quero excluir'
        ],
        dangerMode: true,

      }).then(function(isConfirm) {

        if (isConfirm) {

          $.ajax({
            method: 'POST',
            url: '<?= base_url() ?>painel/deleteChapter',
            data: {
              chapter_id: chapter_id
            },
            success: function(data) {

              var resp = JSON.parse(data)

              if (resp.status == "true") {
                getChaptersDOM()
              } else {
                swal(resp.message);
              }
            },
            error: function(data) {
              swal('Ocorreu um erro temporário. ');
            },

          });

        } else {

        }

      });



    })

    $('.update-chapter').on('click', function(e) {

      var chapter_id = $(this).data('id')
      var chapter_title = $(this).data('title')
      var chapter_description = $(this).data('description')

      $('#update_chapter_id').val(chapter_id)
      $('#update_chapter_title').val(chapter_title)
      $('#update_chapter_description').val(chapter_description)

      $('#btn-open-update-chapter').click();


    })

    $('.update-audio').on('click', function(e) {


      var audio_id = $(this).data('id')
      var audio_title = $(this).data('title')
      var audio_description = $(this).data('description')
      var audio_duration = $(this).data('duration')
      var audio_file = $(this).data('file')
      var audio_chapter = $(this).data('chapter')

      $('#update_audio_id').val(audio_id)
      $('#update_audio_title').val(audio_title)
      $('#update_audio_description').val(audio_description)
      $('#update_audio_chapter').val(audio_chapter)


      var audio_duration = audio_duration.toString().split(".")
      var value = ((audio_duration[1] / 100) * 60)

      if (isNaN(value)) {
        $('#update_audio_duration').val(audio_duration[0] + ":00")
      } else {
        $('#update_audio_duration').val(audio_duration[0] + ":" + value.toFixed(0))

      }
      // $('#audio_file_link').attr("src", "<?= base_url() ?>"+audio_file)

      $('#btn-open-update-audio').click();


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
    //Add Capitulo
    $('#form-add-capitulo').submit(function(e) {

      e.preventDefault()

      var chapter_ebook = "<?= $ebook['id'] ?>"
      var chapter_title = $('#add_chapter_title').val()
      var chapter_description = $('#add_chapter_description').val()

      $.ajax({
        method: 'POST',
        url: '<?= base_url() ?>painel/addChaper',
        data: {
          chapter_ebook: chapter_ebook,
          chapter_title: chapter_title,
          chapter_description: chapter_description
        },

        success: function(data) {

          var resp = JSON.parse(data)

          //Close modal
          // $('.close').click()


          //Clean Form
          $('#add_chapter_title').value = ""
          $('#add_chapter_description').value = ""


          if (resp.status == "true") {

            getChaptersDOM();

          } else {
            swal(resp.message)
          }



        },
        error: function(data) {
          swal('Ocorreu um erro temporário. ');
        },

      });
    })

    $('#form-update-capitulo').submit(function(e) {

      e.preventDefault()


      $.ajax({
        method: 'POST',
        url: '<?= base_url() ?>painel/updateChapter',
        data: $(this).serialize(),

        success: function(data) {

          var resp = JSON.parse(data)

          if (resp.status == "true") {

            getChaptersDOM();

          } else {
            swal(resp.message)
          }

        },
        error: function(data) {
          swal('Ocorreu um erro temporário. ');
        },

      });
    })

    $('#form-update-audio').submit(function(e) {

      e.preventDefault()


        var extPermitidas = ['mp4', 'MP4', 'mp3', 'MP4'];
        var extArquivo = $('#update_audio_file').val().split('.').pop();
        var file = $('#update_audio_file').prop('files')[0];

        var formdata = new FormData();

        formdata.append("audio_id", $('#update_audio_id').val());
        formdata.append("audio_chapter", $('#update_audio_chapter').val());

        formdata.append("audio_ebook", <?= $ebook['id'] ?>);
        formdata.append("audio_title", $('#update_audio_title').val());
        formdata.append("audio_description", $('#update_audio_description').val());
        formdata.append("audio_duration", $('#update_audio_duration').val());

        if (file) {
          formdata.append("audio_file", file);
        } else {
          formdata.append("audio_file", "");
        }





      // if (typeof extPermitidas.find(function(ext) {
      //     return extArquivo == ext;
      //   }) == 'undefined') {
      //   swal('O arquivo precisa ser um audio. Formatos permitidos [MP3 E MP4]')

      // } else {


      //   if (file.size > 20000000) {
      //     swal('Arquivo muito grande, máximo permitido 20MB.')

      //   } else {

        console.log($('#update_audio_duration').val())

          if ($('#update_audio_duration').val().length == 5) {

            $.ajax({
              method: 'POST',
              url: '<?= base_url() ?>painel/updateAudio',
              data: formdata,
              cache: false,
              contentType: false,
              processData: false,
              success: function(data) {

                var resp = JSON.parse(data)

                if (resp.status == "true") {
                  getChaptersDOM()
                } else {
                  swal(resp.message);

                }

              },
              error: function(data) {
                swal('Ocorreu um erro temporário. ');
              },

            });


          } else {
            swal("Insira a duração corretamente [minutos:segundos] [00:00].")
          }

      //   }

      // }
    })



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

    $('#form-add-audio').submit(function(e) {

      e.preventDefault()


      var extPermitidas = ['mp4', 'MP4', 'mp3', 'MP4'];
      var extArquivo = $('#add_audio_file').val().split('.').pop();
      var file = $('#add_audio_file').prop('files')[0];

      var formdata = new FormData();

      formdata.append("audio_chapter", $('#add_audio_id').val());
      formdata.append("audio_ebook", <?= $ebook['id'] ?>);
      formdata.append("audio_title", $('#add_audio_title').val());
      formdata.append("audio_description", $('#add_audio_description').val());
      formdata.append("audio_duration", $('#add_audio_duration').val());

      if (file) {
        formdata.append("audio_file", file);
      } else {
        formdata.append("audio_file", "");
      }





      if (typeof extPermitidas.find(function(ext) {
          return extArquivo == ext;
        }) == 'undefined') {
        swal('O arquivo precisa ser um audio. Formatos permitidos [MP3 E MP4]')

      } else {


        if (file.size > 20000000) {
          swal('Arquivo muito grande, máximo permitido 20MB.')

        } else {

          if ($('#add_audio_duration').val().length == 5) {

            $.ajax({
              method: 'POST',
              url: '<?= base_url() ?>painel/addAudio',
              data: formdata,
              cache: false,
              contentType: false,
              processData: false,
              success: function(data) {

                var resp = JSON.parse(data)

                if (resp.status == "true") {
                  getChaptersDOM()
                } else {
                  swal(resp.message);

                }

              },
              error: function(data) {
                swal('Ocorreu um erro temporário. ');
              },

            });


          } else {
            swal("Insira a duração corretamente [minutos:segundos] [00:00].")
          }

        }

      }

    })
  </script>
</body>

</html>