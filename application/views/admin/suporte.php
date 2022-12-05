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
                                <H5 class="m-3" >SUPORTE</H5 >

                                <div class="card-body">
                                    <form action="" id="form-add-suporte">
                                        <label for="">SCRIPT DO CHAT <span class="text-danger">*</span></label><br>
                                        <textarea style="width:100% ;" name="support_code" ><?=$this->admin_model->getSupport()?></textarea>

                 
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary py-3">ATUALIZAR</button>
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




    <?php $this->load->view('comp/admin/script') ?>

    <script>



        $('#form-add-suporte').on('submit', function(e) {

            e.preventDefault()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>painel/actUpdateSuporte',
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