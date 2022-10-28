<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Publique um destauqe</title>
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
                                        <h5 style="font-weight: 600;" class="text-semibold mb-0">ADICIONAR NOVO DESTAQUE</h5>


                                        <form action="" id="form-add-features" class="mt-5">
                                            <label for="">NOME DO DESTAQUE <small class="text-danger">*</small></label>
                                            <input type="text" required class="form-control" name="featured_name">
                                            <br><br>
                                            <label for="">DESCRIÇÃO DO DESTAQUE</label>
                                            <textarea name="featured_description" maxlength="200" class="form-control"></textarea>

                                            <br><br>
                                            <button class="btn py-3 btn-block btn-primary">ADICIONAR</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card">

                                <div class="card-body">
                                    <h5 style="font-weight: 600;" class="text-semibold mb-0">LISTA DE DESTAQUES</h5>
                                    <br><br>
                                    
                                    <?php if (count($features) > 0) { ?>
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NOME</th>
                                                <th>DESCRIÇÃO</th>
                                                <th>AÇÕES</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <button data-toggle="modal" style="display:none" id="btn-modal-open" data-target="#modal-open-features"></button>



                                                <?php foreach ($features as $c) { ?>

                                                    <tr>
                                                        <td><?= $c->id ?></td>
                                                        <td><?php if (strlen($c->featured_name) > 10) {
                                                                echo substr($c->featured_name, 0, 10) . "...";
                                                            } else {
                                                                echo $c->featured_name;
                                                            } ?></td>
                                                        <td><?php if (strlen($c->featured_description) > 35) {
                                                                echo substr($c->featured_description, 0, 35) . "...";
                                                            } else {
                                                                echo $c->featured_description;
                                                            } ?></td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <i style="font-size:25px;cursor:pointer" data-name="<?=$c->featured_name?>" data-id="<?=$c->id?>" data-description="<?=$c->featured_description?>"  class="btn-modal-add mdi mdi-pencil"></i>
                                                                <i style="font-size:25px;cursor:pointer" onclick="deleteFeatured(this.id)" id="<?= $c->id ?>" class="btn-category-delete mdi  ml-3 text-danger mdi-delete"></i>
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
    <div class="modal fade" id="modal-open-features" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">NOVA CATEGORIA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="form-update-features">
                        <label for="">NOME DA CATEGORIA <span class="text-danger">*</span></label><br>
                        <input type="hidden" name="featured_id" id="update_featured_id" required class="mb-2 form-control">

                        <input type="text" name="featured_name" id="update_featured_name" required class="mb-2 form-control">

                        <label for="">DESCRIÇÃO</label><br>
                        <textarea type="text" name="featured_description" id="update_featured_description" maxlength="200" class="mb-2 form-control"></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                    <button type="submit" class="btn btn-primary">ATUALIZAR</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Add Capitulo -->

    <?php $this->load->view('comp/admin/script') ?>

    <script>
        // $('#btn-category').on('click', function(e) {
        //     $('#input_ebook_image').click();
        // })

        
        
        $('.btn-modal-add').on('click', function(e){


            var featured_id =  $(this).data('id');
            var featured_name = $(this).data('name');
            var featured_description = $(this).data('description');

            console.log(featured_name)


            $('#update_featured_name').val(featured_name)
            $('#update_featured_description').val(featured_description)
            $('#update_featured_id').val(featured_id)
            


            $('#btn-modal-open').click()
        })


        $('#form-update-features').on('submit', function(e) {

            e.preventDefault()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>painel/updateFeatures',
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

        $('#form-add-features').on('submit', function(e) {

            e.preventDefault()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>painel/addFeatures',
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



        function deleteFeatured(featured_id) {

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
                        url: '<?= base_url() ?>painel/deleteFeatures',
                        data: {
                            featured_id: featured_id
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