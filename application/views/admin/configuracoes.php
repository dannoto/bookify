<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Configurações</title>
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


                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <H5 class="m-3" >CHAVES DO GATEWAY</H5 >

                                <div class="card-body">
                                    <form action="" id="form-add-gateway">
                                        <label for="">CHAVE PÚBLICA <span class="text-danger">*</span></label><br>
                                        <input type="text" name="gateway_public" required value="<?=$gateway['gateway_public']?>" required class="mb-2 form-control">

                                        <label for="">CHAVE PRIVADA <span class="text-danger">*</span></label><br>
                                        <input type="text" name="gateway_secret"  required value="<?=$gateway['gateway_secret']?>" required class="mb-2 form-control">

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary py-3">ADICIONAR</button>
                                </div>
                                </form>



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



        $('#form-add-gateway').on('submit', function(e) {

            e.preventDefault()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>painel/updateGateway',
                data: $(this).serialize(),
                success: function(data) {

                    var resp = JSON.parse(data)

                    if (resp.status == "true") {
                        swal(resp.message);
                    } else {
                        swal(resp.message);
                    }
                },
                error: function(data) {
                    swal('Ocorreu um erro temporário. ');
                },

            });

        })

      



    </script>



    <script>
        // $(document).ready(function() {
        //     $('#example').DataTable();
        // });
    </script>
</body>

</html>