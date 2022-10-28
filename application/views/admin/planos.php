<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Planos</title>
    <?php $this->load->view('comp/admin/header') ?>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"></script> -->


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

                    </div>

                    <div class="row">

                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body d-flex flex-column">
                                    <div class="wrapper">
                                        <h5 style="font-weight: 600;" class="text-semibold mb-0">ADICIONAR NOVO PLANO</h5>


                                        <form action="" id="form-add-plan" class="mt-5">
                                            <label for="">NOME DO PLANO <small class="text-danger">*</small></label>
                                            <input type="text" required class="form-control" name="plan_name">
                                            <br><BR>
                                            <label for="">DESCRIÇÃO </label>
                                            <textarea name="plan_description" maxlength="200" class="form-control"></textarea>
                                            <br><BR>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">PREÇO (R$) <small class="text-danger">*</small></label>
                                                    <input type="text" required class="form-control" name="plan_price">
                                                    <br><BR>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">INTERVALO <small class="text-danger">*</small></label>
                                                    <select class="form-control" name="plan_type" required id="">
                                                        <option default value="">SELECIONAR</option>

                                                        <option value="1">MENSAL</option>
                                                        <option value="2">TRIMESTRAL</option>
                                                        <option value="3">SEMESTRAL</option>
                                                        <option value="4">ANUAL</option>
                                                    </select>
                                                    <br><BR>
                                                </div>
                                            </div>
                                            <hr>
                                            <h5>LIMITES</h5>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label title="Max. de adiobooks salvos na biblioteca ao mesmo tempo " for=""> BIBLIOTECA <small class="text-danger">*</small></label>
                                                    <input type="number" required class="form-control" name="plan_limit_library">
                                                    <br><BR>
                                                </div>
                                                <div class="col-md-6">
                                                    <label title="Max. audiobooks lidos por mes" for=""> AUDIO <small class="text-danger">*</small></label>
                                                    <input type="number" required class="form-control" name="plan_limit_quantity">

                                                    <br><BR>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label title="Se poderá ouvir audiobooks gratuitos" for=""> FREE <small class="text-danger">*</small></label>
                                                    <select name="plan_limit_free" class="form-control" id="">
                                                        <option default value="">SELECIONAR</option>
                                                        <option value="1">SIM</option>
                                                        <option value="0">NÃO</option>
                                                    </select>
                                                    <br><BR>
                                                </div>
                                                <div class="col-md-6">
                                                    <label title="Se poderá ouvir audiobooks premium" for=""> PREMIUM <small class="text-danger">*</small></label>
                                                    <select name="plan_limit_premium" class="form-control" id="">
                                                        <option default value="">SELECIONAR</option>
                                                        <option value="1">SIM</option>
                                                        <option value="0">NÃO</option>
                                                    </select>
                                                    <br><BR>
                                                </div>
                                            </div>

                                            <hr>
                                            <h5>GATEWAY</h5>
                                            <br>
                                            <label for="">PLANO TOKEN <small class="text-danger">*</small></label>
                                            <input type="text" required class="form-control" id="" name="plan_gateway_id">
                                            <br><BR>


                                            <button type="submit" class="btn py-3 btn-block btn-primary">ADICIONAR</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card">

                                <div class="card-body">
                                    <h5 style="font-weight: 600;" class="text-semibold mb-0">LISTA DE PLANOS</h5>
                                    <br><br>

                                    <?php if (count($planos) > 0) { ?>
                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>NOME</th>
                                                    <th>VALOR</th>
                                                    <th>TIPO</th>
                                                    <th>AÇÕES</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <button data-toggle="modal" style="display:none" id="btn-modal-open" data-target="#modal-open-plan"></button>



                                                <?php foreach ($planos as $c) { ?>

                                                    <tr>
                                                        <td><?= $c->id ?></td>
                                                        <td>
                                                            <?php if (strlen($c->plan_name) > 35) {
                                                                echo substr($c->plan_name, 0, 35) . "...";
                                                            } else {
                                                                echo $c->plan_name;
                                                            } ?>
                                                        </td>
                                                        <td> R$<?= $c->plan_price ?></td>
                                                        <td>
                                                            <?php

                                                            if ($c->plan_type == 1) {
                                                                $type = "MENSAL";
                                                            } else if ($c->plan_type == 2) {
                                                                $type = "TRIMESTRAL";
                                                            } else if ($c->plan_type == 3) {
                                                                $type = "SEMESTRAL";
                                                            } else if ($c->plan_type == 4) {
                                                                $type = "ANUAL";
                                                            }

                                                            if (strlen($type) > 35) {
                                                                echo substr($type, 0, 35) . "...";
                                                            } else {
                                                                echo $type;
                                                            }

                                                            ?>

                                                        </td>
                                                        <td>
                                                            <div class="d-flex">

                                                                <i style="font-size:25px;cursor:pointer" class="btn-modal-add mdi mdi-pencil" data-id="<?= $c->id ?>" data-name="<?= $c->plan_name ?>" data-description="<?= $c->plan_description ?>" data-price="<?= $c->plan_price ?>" data-type="<?= $c->plan_type ?>" data-limitlibrary="<?= $c->plan_limit_library ?>" data-limitquantity="<?= $c->plan_limit_quantity ?>" data-limitfree="<?= $c->plan_limit_free ?>" data-limitpremium="<?= $c->plan_limit_premium ?>" data-limitgatewayid="<?= $c->plan_gateway_id ?>"></i>
                                                                <i style="font-size:25px;cursor:pointer" onclick="deletePlan(this.id)" id="<?= $c->id ?>" class="btn-category-delete mdi  ml-3 text-danger mdi-delete"></i>
                                                            </div>

                                                        </td>
                                                    </tr>

                                                <?php } ?>




                                            </tbody>

                                        </table>
                                    <?php } else { ?>

                                        <div>
                                            <p class="text-center">NENHUMA CATEGORIA CRIADA.</p>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>




                    </div>
                    <br><br>
                </div>
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
    <!-- <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content"> -->


    <div class="modal fade bd-example-modal-lg" id="modal-open-plan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ATUALIZAR PLANO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" id="form-update-plan" class="mt-2">
                        <div class="row">

                            <div class="col-md-6">
                                <label for="">NOME DO PLANO <small class="text-danger">*</small></label>
                                <input type="text" required class="form-control" id="update_plan_name" name="plan_name">
                                <br><BR>
                                <label for="">DESCRIÇÃO </label>
                                <textarea id="update_plan_description" name="plan_description" maxlength="200" class="form-control"></textarea>
                                <br><BR>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">PREÇO (R$) <small class="text-danger">*</small></label>
                                        <input type="text" required class="form-control" id="update_plan_price" name="plan_price">
                                        <br><BR>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">RECORRÊNCIA <small class="text-danger">*</small></label>
                                        <select class="form-control" id="update_plan_type" name="plan_type" required id="">
                                            <option default value="">SELECIONAR</option>

                                            <option value="1">MENSAL</option>
                                            <option value="2">TRIMESTRAL</option>
                                            <option value="3">SEMESTRAL</option>
                                            <option value="4">ANUAL</option>
                                        </select>
                                        <br><BR>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>LIMITES</h5>
                                <br>
                                <div class="row">

                                <input type="hidden" required class="form-control" id="update_plan_id" name="plan_id">

                                    <div class="col-md-6">
                                        <label title="Max. de adiobooks salvos na biblioteca ao mesmo tempo " for=""> USO BIBLIOTECA <small class="text-danger">*</small></label>
                                        <input type="number" required class="form-control" id="update_limit_library" name="plan_limit_library">
                                        <br><BR>
                                    </div>
                                    <div class="col-md-6">
                                        <label title="Max. audiobooks lidos por mes" for="">USO AUDIO <small class="text-danger">*</small></label>
                                        <input type="number" required class="form-control" id="update_limit_quantity" name="plan_limit_quantity">

                                        <br><BR>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label title="Se poderá ouvir audiobooks gratuitos" for=""> USO FREE <small class="text-danger">*</small></label>
                                        <select id="update_limit_free" required name="plan_limit_free" class="form-control" id="">
                                            <option default value="">SELECIONAR</option>
                                            <option value="1">SIM</option>
                                            <option value="0">NÃO</option>
                                        </select>
                                        <br><BR>
                                    </div>
                                    <div class="col-md-6">
                                        <label title="Se poderá ouvir audiobooks premium" for="">USO PREMIUM <small class="text-danger">*</small></label>
                                        <select id="update_limit_premium" required name="plan_limit_premium" class="form-control" id="">
                                            <option default value="">SELECIONAR</option>
                                            <option value="1">SIM</option>
                                            <option value="0">NÃO</option>
                                        </select>
                                        <br><BR>
                                    </div>
                                </div>

                                <hr>
                                <h5>GATEWAY</h5>
                                <br>
                                <label for="">PLANO TOKEN <small class="text-danger">*</small></label>
                                <input type="text" required class="form-control" id="update_plan_gateway_id" name="plan_gateway_id">
                                <br><BR>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary py-3" data-dismiss="modal">CANCELAR</button>
                                    <button type="submit" class="btn btn-primary py-3">ATUALIZAR</button>
                                </div>



                            </div>

                        </div>
                    </form>

                </div>





            </div>
        </div>
    </div>
    <!-- Modal Add Capitulo -->

    <?php $this->load->view('comp/admin/script') ?>

    <script>
        // $('#btn-category').on('click', function(e) {
        //     $('#input_ebook_image').click();
        // })



        $('.btn-modal-add').on('click', function(e) {


            var plan_id = $(this).data('id');
            var plan_name = $(this).data('name');
            var plan_description = $(this).data('description');
            var plan_price = $(this).data('price');
            var plan_type = $(this).data('type');

            var plan_limit_library = $(this).data('limitlibrary');
            var plan_limit_quantity = $(this).data('limitquantity');
            var plan_limit_free = $(this).data('limitfree');
            var plan_limit_premium = $(this).data('limitpremium');

            var plan_gateway_id = $(this).data('limitgatewayid');





            $('#update_plan_name').val(plan_name)
            $('#update_plan_description').val(plan_description)
            $('#update_plan_price').val(plan_price)
            $('#update_plan_type').val(plan_type)

            $('#update_limit_library').val(plan_limit_library)
            $('#update_limit_quantity').val(plan_limit_quantity)
            $('#update_limit_free').val(plan_limit_free)
            $('#update_limit_premium').val(plan_limit_premium)

            $('#update_plan_gateway_id').val(plan_gateway_id)


            $('#update_plan_id').val(plan_id)



            $('#btn-modal-open').click()
        })


        $('#form-update-plan').on('submit', function(e) {

            e.preventDefault()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>painel/updatePlan',
                data: $(this).serialize(),
                success: function(data) {

                    var resp = JSON.parse(data)

                    if (resp.status == "true") {
                        location.reload()
                    } else {
                        swal(resp.message);
                    }
                },
                error: function(data) {
                    swal('Ocorreu um erro temporário. ');
                },

            });

        })

        $('#form-add-plan').on('submit', function(e) {

            e.preventDefault()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>painel/addPlan',
                data: $(this).serialize(),
                success: function(data) {

                    var resp = JSON.parse(data)

                    if (resp.status == "true") {
                        location.reload()
                    } else {
                        swal(resp.message);
                    }
                },
                error: function(data) {
                    swal('Ocorreu um erro temporário. ');
                },

            });

        })



        function deletePlan(plan_id) {

            swal({
                title: "Atenção!",
                text: 'Tem certeza que deseja excluir?',
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
                        url: '<?= base_url() ?>painel/deletePlan',
                        data: {
                            plan_id: plan_id
                        },
                        success: function(data) {

                            var resp = JSON.parse(data)

                            if (resp.status == "true") {
                                location.reload()
                            } else {
                                swal(resp.message);

                            }

                        },
                        error: function(data) {
                            swal('Ocorreu um erro temporário. ');
                        },

                    });
                }


            });

        }
    </script>



    <script>
        // $(document).ready(function() {
        //     $('#example').DataTable();
        // });
    </script>
</body>

</html>