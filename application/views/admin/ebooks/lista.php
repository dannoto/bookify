<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Audiobooks</title>
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
                    <form action="" id="form-update-ebook">
                        <div class="col-md-12 mb-2  d-flex justify-content-end align-items-end">
                            <div class="">
                                <button type="submit" class="btn btn-block btn-primary toolbar-item py-3">SALVAR
                                    ALTERAÇÕES</button>
                            </div>
                        </div>
                        <div class="row">
                            <?php if (count($ebooks) > 0) { ?>
                            <?php foreach ($ebooks as $c) { ?>
                            <a href="<?= $c->id ?>"></a>
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <img class="mt-3" id="btn-ebook-image"
                                                    style="max-width:100%;width:100%;height:250px;max-height:250px;object-fit:contain;cursor:pointer"
                                                    src="<?= base_url() ?><?= $c->ebook_image ?>" alt="">
                                            </div>
                                            <div class="col-md-8">
                                                <input type="hidden" name="ebook_id" id="ebook_id" value="" required
                                                    class="form-control">
                                                <h2 class=" mb-1 line-clamp-1 mt-3">
                                                    <?= $c->ebook_title ?>
                                                </h2>

                                                <div class="h-12 mb-2">
                                                    <p class=" mb-1 line-clamp-5">>
                                                        <?= $c->ebook_description ?>
                                                    </p>
                                                </div>
                                                <div>
                                                    <a id="<?=$c->id?>" href="<?= base_url() ?>painel/ebooks_editar/<?= $c->id ?>">
                                                        <span class="btn py-3 btn-primary"><i class="fa fa-edit"></i>
                                                            EDITAR INFORMAÇÕES</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }  ?>
                            <?php } else { ?>
                            <p>CONVERSA</p>
                            <?php }  ?>


                    </form>




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
    <div class="modal fade" id="modal-add-capitulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
      

        function redirect(e) {
            // e.preventDefault()
            // window.location.href = "<?=base_url()?>painel/ebooks_editar/"+e
        }
    </script>

</body>

</html>