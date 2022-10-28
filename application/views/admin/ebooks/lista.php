<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Audiobooks</title>
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
                    <!-- Page Title Header Starts-->
                    <!-- <form action="" id="form-update-ebook"> -->
                    <!-- 
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <form action="">

                                <div class="card-body">
                                    <div class="row space-x-3">

                                        <div class="col-md-4">
                                            <label for="">TÍTULO </label>
                                            <input class="form-control" name="ebook_title" maxlength="200" type="text">
                                        </div>

                                        <div class="col-md-2">
                                            <label for="">CATEGORIA </label>

                                            <select name="ebooks_category" class=" text-black form-control py-3" id="">
                                                <option default value="">SELECIONE UMA OPÇÃO</option>

                                                <?php foreach ($categorias as $c) { ?>
                                                    <?php if ($C->id == $this->input->get('category')) { ?>
                                                        <option value="" style=color:#000><?= $c->category_name ?></option>
                                                    <?php } else { ?>
                                                        <option value="" style=color:#000><?= $c->category_name ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">DESTAQUE </label>

                                            <select name="ebooks_features" class=" text-black form-control py-3" id="">
                                                <option default value="">SELECIONE UMA OPÇÃO</option>

                                                <?php foreach ($features as $c) { ?>
                                                    <?php if ($C->id == $this->input->get('features')) { ?>
                                                        <option value="" style=color:#000><?= $c->featured_name ?></option>
                                                    <?php } else { ?>
                                                        <option value="" style=color:#000><?= $c->featured_name ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">PRECIFICAÇÃO </label>

                                            <select name="ebooks_precificacao" class=" text-black form-control py-3" id="">
                                                <option class="text-primary" default value="">SELECIONE UMA OPÇÃO</option>
                                                <option value="0">GRÁTIS</option>
                                                <option value="1">PREMIUM</option>

                                            </select>
                                        </div>




                                        <div class="col-md-2">
                                            <label for=""> </label>

                                            <button class="btn mt-3 px-3 py-3 btn-primary">BUSCAR</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> -->
                    <div class="row">
                        <?php if (count($ebooks) > 0) { ?>

                            <!-- <a href="<?= $c->id ?>"></a> -->
                            <!-- <div class="col-md-12 grid-margin stretch-card" style="    padding-left: 24px;    padding-right: 24px;">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img class="mt-3" id="btn-ebook-image" style="max-width:100%;width:100%;height:250px;max-height:250px;object-fit:contain;cursor:pointer" src="<?= base_url() ?><?= $c->ebook_image ?>" alt="">
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="hidden" name="ebook_id" id="ebook_id" value="" required class="form-control">
                                                    <h2 class=" mb-1 line-clamp-1 mt-3">
                                                        <?= $c->ebook_title ?>
                                                    </h2>

                                                    <div class="h-12 mb-3">
                                                        <p class=" mb-1 line-clamp-5">>
                                                            <?= substr($c->ebook_description, 0, 200) ?>
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <a id="<?= $c->id ?>" href="<?= base_url() ?>painel/ebooks_editar/<?= $c->id ?>">
                                                            <span class="btn py-3 btn-primary"><i class="fa fa-edit"></i>
                                                                EDITAR INFORMAÇÕES</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                            <div class="col-md-12 grid-margin stretch-card" style="    padding-left: 24px;    padding-right: 24px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>LISTA DE AUDIOBOOKS</h4>
                                        <br>
                                        <table id="table_id" class="display">
                                            <thead>
                                                <tr>
                                                    <th>IMAGEM</th>
                                                    <th>TÍTULO</th>
                                                    <th>CATEGORIA</th>
                                                    <th>DESTAQUE</th>
                                                    <th>PRECIFICAÇÃO</th>
                                                    <th>AÇÕES</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ebooks as $c) { ?>
                                                    <tr>
                                                        <td>
                                                            <center>
                                                                <img src="<?= base_url() ?><?= $c->ebook_image ?>" style="width:50px;max-width:50px;height:50px;max-height:50px;object-fit:cover" alt="">
                                                            </center>
                                                        </td>
                                                        <td><?= $c->ebook_title ?></td>
                                                        <td><?= $this->category_model->getCategory($c->ebook_category)['category_name'] ?></td>
                                                        <td><?= $this->category_model->getFeature($c->ebook_featured)['featured_name'] ?></td>
                                                        <td><?php if ($c->ebook_precificacao == 0) { echo "Grátis";} else { echo "Premium";}?></td>
                                                        <td>
                                                            <a href="<?= base_url() ?>painel/ebooks_editar/<?= $c->id ?>">
                                                                <button title="Editar Informações" class="btn btn-primary py-2 px-2"><i class="mdi mb-2 mdi-pencil" style="font-size:25px ;"></i>  </button>
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