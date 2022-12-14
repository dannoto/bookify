<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Publique uma Categoria</title>
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
                                        <h5 style="font-weight: 600;" class="text-semibold mb-0">ADICIONAR NOVA CATEGORIA</h5>


                                        <form action="" id="form-add-category" class="mt-5">
                                            <label for="">NOME DA CATEGORIA <small class="text-danger">*</small></label>
                                            <input type="text" required class="form-control" name="category_name">
                                            <br><br>
                                            <label for="">DESCRIÇÃO DA CATEGORIA</label>
                                            <textarea name="category_description" maxlength="200" class="form-control"></textarea>

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
                                    <h5 style="font-weight: 600;" class="text-semibold mb-0">LISTA DE CATEGORIAS</h5>
                                    <br><br>
                                    
                                    <?php if (count($categorias) > 0) { ?>
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
                                        <button data-toggle="modal" style="display:none" id="btn-modal-open" data-target="#modal-open-category"></button>



                                                <?php foreach ($categorias as $c) { ?>

                                                    <tr>
                                                        <td><?= $c->id ?></td>
                                                        <td><?php if (strlen($c->category_name) > 10) {
                                                                echo substr($c->category_name, 0, 10) . "...";
                                                            } else {
                                                                echo $c->category_name;
                                                            } ?></td>
                                                        <td><?php if (strlen($c->category_description) > 35) {
                                                                echo substr($c->category_description, 0, 35) . "...";
                                                            } else {
                                                                echo $c->category_description;
                                                            } ?></td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <i style="font-size:25px;cursor:pointer" data-name="<?=$c->category_name?>" data-id="<?=$c->id?>" data-description="<?=$c->category_description?>"  class="btn-modal-add mdi mdi-pencil"></i>
                                                                <i style="font-size:25px;cursor:pointer" onclick="deleteCategory(this.id)" id="<?= $c->id ?>" class="btn-category-delete mdi  ml-3 text-danger mdi-delete"></i>
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
    <div class="modal fade" id="modal-open-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">NOVA CATEGORIA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="form-update-categoria">
                        <label for="">NOME DA CATEGORIA <span class="text-danger">*</span></label><br>
                        <input type="hidden" name="category_id" id="update_category_id" required class="mb-2 form-control">

                        <input type="text" name="category_name" id="update_category_name" required class="mb-2 form-control">

                        <label for="">DESCRIÇÃO</label><br>
                        <textarea type="text" name="category_description" id="update_category_description" maxlength="200" class="mb-2 form-control"></textarea>

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


            var category_id =  $(this).data('id');
            var category_name = $(this).data('name');
            var category_description = $(this).data('description');

            console.log(category_name)


            $('#update_category_name').val(category_name)
            $('#update_category_description').val(category_description)
            $('#update_category_id').val(category_id)
            


            $('#btn-modal-open').click()
        })


        $('#form-update-categoria').on('submit', function(e) {

            e.preventDefault()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>painel/updateCategory',
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

        $('#form-add-category').on('submit', function(e) {

            e.preventDefault()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>painel/addCategory',
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



        function deleteCategory(category_id) {

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
                        url: '<?= base_url() ?>painel/deleteCategory',
                        data: {
                            category_id: category_id
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