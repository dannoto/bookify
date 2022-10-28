<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Lista de Usuários</title>
  <?php $this->load->view('comp/admin/header') ?>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">


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

          <div class="row">
            <?php if (count($usuarios) > 0) { ?>




              <div class="col-md-12 grid-margin stretch-card" style="    padding-left: 24px;    padding-right: 24px;">
                <div class="card">
                  <div class="card-body">
                    <h4>LISTA DE USUÁRIOS</h4>
                    <br>
                    <table id="table_id" class="display">
                      <thead>
                        <tr>
                          <th>IMAGEM</th>
                          <th>NOME</th>
                          <th>E-MAIL</th>
                          <th>PLANO</th>
                          <th>REGISTRO</th>
                          <th>STATUS</th>

                          <th>AÇÕES</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($usuarios as $c) { ?>
                          <tr>
                            <td>
                              <center>
                                <img src="<?= base_url() ?>assets/img/avatar/<?= $c->user_image ?>" style="width:50px;max-width:50px;height:50px;max-height:50px;object-fit:cover" alt="">
                              </center>
                            </td>
                            <td><?= $c->user_name ?> <?= $c->user_surname ?></td>
                            <td><?= $c->user_email ?></td>
                            <td><?= $c->user_plan ?></td>
                            <td><?= $c->user_date ?></td>
                            <td><?php if ($c->user_status == 0) {
                                  echo "BANIDO";
                                } else {
                                  echo "ATIVO";
                                } ?></td>
                            <td>
                              <a href="<?= base_url() ?>painel/usuarios_editar/<?= $c->id ?>">
                                <button title="Editar Informações" class="btn btn-primary py-2 px-2"><i class="mdi mb-2 mdi-pencil" style="font-size:25px ;"></i> </button>
                              </a>
                            </td>

                          </tr>
                        <?php }  ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


            <?php } else { ?>
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="text-center">NENHUM AUDIOBOOK ENCONTRADO.</p>

                  </div>
                </div>
              </div>
            <?php }  ?>


            <!-- </form> -->




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

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


  <script>
    $(document).ready(function() {
      $('#table_id').DataTable();
    });
  </script>

</body>

</html>