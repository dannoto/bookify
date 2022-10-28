<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar Usuário</title>
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
                    <form action="" id="form-add-user">

                        <div class="row">

                            <div class="col-md-4 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body d-flex flex-column">
                                        <div class="wrapper">
                                            <h4 class="card-title mb-0">ADICIONE UMA IMAGEM <small class="text-danger">*</small></h4>

                                            <input type="file" accept="image/jpg, image/png, image/jpeg" name="ebook_image" id="input_user_image" class="form-control " style="display: none;">
                                            <img class="mt-3" id="btn-user-image" style="max-width:100%;width:100%;height:450px;max-height:450px;object-fit:contain;cursor:pointer" src="<?= base_url() ?>assets/img/avatar/<?= $usuario['user_image'] ?>" alt="">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
 
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <h4 class="card-title mb-1">NOME <small class="text-danger">*</small></h4>
                                                <input type="text" value="<?= $usuario['user_name'] ?>" name="user_name" id="user_name" maxlength="200" required class="form-control">
                                                <br><br>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="card-title mb-1">SOBRENOME <small class="text-danger">*</small></h4>
                                                <input type="text" value="<?= $usuario['user_surname'] ?>" name="user_surname" id="user_surname" maxlength="200" required class="form-control">
                                                <br><br>
                                            </div>
                                        </div>

                                        <h4 class="card-title mb-1">E-MAIL <small class="text-danger">*</small></h4>
                                        <input type="email" name="user_email" value="<?= $usuario['user_email'] ?>" id="user_email" maxlength="200" required class="form-control">
                                        <br><br>

                                        <input type="hidden" id="user_id" value="<?=$usuario['id']?>">

                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <h4 class="card-title mb-1">PLANO <small class="text-danger">*</small></h4>
                                                <select name="user_plan" id="user_plan" required class="form-control">
                                                    <option default value="">SELECIONE UMA OPÇÃO</option>
                                                    <?php foreach ($planos as $f) { ?>
                                                        <?php if ($f->id == $usuario['user_plan']) { ?>
                                                            <?php echo '<option class="text-uppercase" selected value="' . $f->id . '">' . $f->plan_name . '</option>'; ?>
                                                        <?php } else { ?>
                                                            <?php echo '<option class="text-uppercase" value="' . $f->id . '">' . $f->plan_name . '</option>'; ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select> <br><br>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="card-title mb-1">STATUS <small class="text-danger">*</small></h4>
                                                <select name="user_status" id="user_status" required class="form-control">
                                                    <?php if ($usuario['user_status'] == "1") { ?>
                                                        <option default value="">SELECIONE UMA OPÇÃO</option>
                                                        <option selected value="1">ATIVO</option>
                                                        <option value="0">BANIDO</option>
                                                    <?php } else if ($usuario['user_status'] == "0") { ?>
                                                        <option default value="">SELECIONE UMA OPÇÃO</option>
                                                        <option value="1">ATIVO</option>
                                                        <option selected value="0">BANIDO</option>
                                                    <?php } ?>
                                                </select> <br><br>
                                            </div>
                                        </div>



                                        <h4 class="card-title mb-0 mt-3">RUA </h4>
                                        <input type="text" name="user_street" id="user_street" value="<?= $usuario['user_street'] ?>" class="form-control">


                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <h4 class="card-title mb-1">ESTADO <small class="text-danger">*</small></h4>
                                                <input type="text" name="user_state" value="<?= $usuario['user_state'] ?>" id="user_state" maxlength="200" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="card-title mb-1">CIDADE <small class="text-danger">*</small></h4>
                                                <input type="text" name="user_city" value="<?= $usuario['user_city'] ?>" id="user_city" maxlength="200" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <h4 class="card-title mb-1">BAIRRO <small class="text-danger">*</small></h4>
                                                <input type="text" name="user_district" value="<?= $usuario['user_district'] ?>" id="user_district" maxlength="200" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="card-title mb-1">CEP <small class="text-danger">*</small></h4>
                                                <input type="text" name="user_cep" id="user_cep" value="<?= $usuario['user_cep'] ?>" reuired maxlength="200" class="form-control">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12  d-flex justify-content-end align-items-end">
                                <div class="">
                                    <button type="submit" class="btn btn-block btn-primary toolbar-item py-3">SALVAR ALTERAÇÕES</button>
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
        $('#btn-user-image').on('click', function(e) {
            $('#input_user_image').click();
        })


        $('#input_user_image').on('change', function(ent) {


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
                        $('#btn-user-image').attr('src', URL.createObjectURL(file))
                    }

                }

            }

        })
    </script>


    <script>
        $('#form-add-user').submit(function(e) {

            e.preventDefault()


            //1. validacao do tamanho
            // var extPermitidas = ['jpg', 'png', 'jpeg', 'JPEG', 'JPG', 'PNG'];
            // var extArquivo = $('input[type=file]').val().split('.').pop();
            var file = $('#input_user_image').prop('files')[0];


            var formdata = new FormData();

            formdata.append("user_id", $('#user_id').val());
            formdata.append("user_name", $('#user_name').val());
            formdata.append("user_surname", $('#user_surname').val());
            formdata.append("user_email", $('#user_email').val());



            if (file) {
                formdata.append("user_image", file);
            } else {
                formdata.append("user_image", "");
            }

            formdata.append("user_plan", $('#user_plan').val());
            formdata.append("user_status", $('#user_status').val());
            formdata.append("user_street", $('#user_street').val());
            formdata.append("user_city", $('#user_city').val());
            formdata.append("user_state", $('#user_state').val());
            formdata.append("user_district", $('#user_district').val());
            formdata.append("user_cep", $('#user_cep').val());


            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>painel/actUpdateUser',
                data: formdata,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {

                    var resp = JSON.parse(data)

                    if (resp.status = "true") {

                        swal({
                            title: "Parabéns!",
                            text: resp.message,
                            icon: "success",

                        })
                    } else {
                        swal('Ocorreu um erro temporário. ');

                    }


                },
                error: function(data) {
                    swal('Ocorreu um erro temporário. ');
                },

            });



        })
    </script>


</body>

</html>