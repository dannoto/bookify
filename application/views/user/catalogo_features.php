<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $features['featured_name'] ?></title>

    <?php $this->load->view('comp/css'); ?>
</head>


<body>

    <?php $this->load->view('comp/navbar'); ?>

    <main style="display: none;">

        <section class=" xl:ml-24 xl:mr-24 ml-3 mr-3 ">
            <div class="grid xl:grid-cols-5 place-items-between">

                <div class="xl:col-span-3 pt-8 catalogo-left">
                    <h1 class="ebook-title"> <?= $features['featured_name'] ?></h1>
                    <p> <?= $features['featured_description'] ?></p>
                </div>
                <div class="xl:col-span-2 catalogo-right grid place-items-end">
                    <ul class="flex xl:pt-12 xl:flex hidden">
                        <li class=" xl:ml-12 <?php if (strlen($this->input->get('precificacao')) == 0) {
                                                    echo " catalogo-active";
                                                } ?>">
                            <a style="font-size:20px ;" href="<?= base_url() ?>catalogo/d/<?= $features['featured_slug'] ?>">
                                Todos
                            </a>
                        </li>
                        <li class=" xl:ml-12 <?php if ($this->input->get('precificacao') == "1") {
                                                    echo " catalogo-active";
                                                } ?>">
                            <a style="font-size:20px ;" href="<?= base_url() ?>catalogo/d/<?= $features['featured_slug'] ?>?precificacao=1">
                                Pagos
                            </a>
                        </li>
                        <li class=" xl:ml-12 <?php if ($this->input->get('precificacao') == "0") {
                                                    echo " catalogo-active";
                                                } ?>">
                            <a style="font-size:20px ;" href="<?= base_url() ?>catalogo/d/<?= $features['featured_slug'] ?>?precificacao=0">
                                Gratuitos
                            </a>
                        </li>

                    </ul>

                    <ul class="grid xl:col-span-1 pt-5 xl:pt-12 xl:hidden submenu_mobile">
                        <li class=" submenu_mobile_item  xl:ml-12 <?php if ($this->input->get('classificacao') == "todos" || !$this->input->get('classificacao')) {
                                                                        echo " catalogo-active";
                                                                    } ?>">
                            <a href="<?= base_url() ?>catalogo/d/<?= $features['featured_slug'] ?>">
                                TODOS
                            </a>
                        </li>
                        <li class=" submenu_mobile_item xl:ml-12 <?php if ($this->input->get('pagos') == "pagos") {
                                                                        echo " catalogo-active";
                                                                    } ?>">
                            <a href="<?= base_url() ?>catalogo/d/<?= $features['featured_slug'] ?>?precificacao=1">
                                PAGOS
                            </a>
                        </li>
                        <li class=" submenu_mobile_item xl:ml-12 <?php if ($this->input->get('classificacao') == "gratuitos") {
                                                                        echo " catalogo-active";
                                                                    } ?>">
                            <a href="<?= base_url() ?>catalogo/d/<?= $features['featured_slug'] ?>?precificacao=0">
                                GRATUITOS
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </section>
        <section class="xl:mt-3 xl:m-0 m-3 mt-5 xl:pt-5  xl:mb-5">

            <div class=" xl:ml-24 xl:mr-24">
                <?php if (count($ebooks) > 0) { ?>

                    <div class="grid xl:grid-cols-5 grid-cols-2 mt-8 ">
                        <?php foreach ($ebooks as $e) { ?>
                            <div class="xl:col-span-1 mt-5 m-3">
                                <a href="<?= base_url() ?>ebook/detalhes/<?= $e->id ?>">
                                    <img style="width: 100%;height: 300px;min-height: 300px;max-height:300px;object-fit:cover" src="<?= base_url() ?><?= $e->ebook_image ?>" alt="">
                                </a>
                            </div>
                        <?php } ?>


                    </div>

                <?php } else { ?>

                    <div class=" xl:ml-24 xl:mr-24">
                        <div style="border:1px solid #00b467;color:#00b467">
                            <br><br>
                            <h3 class="text-center   " style="color:00b467;font-size:20px">NENHUM RESULTADO ENCONTRADO.</h3>
                            <br><br>
                        </div>
                    </div>

                <?php } ?>




            </div>

            <?php if (count($ebooks) > 0) { ?>

                <div class="mt-12 grid place-items-center">
                    <div class="flex pagination">

                        <?php
                        $pagina = intval($this->input->get('p'));

                        $anterior = ($pagina - 1);
                        if ($anterior <= 0 || $anterior == "") {
                            $anterior = null;
                            $pagina = 1;
                        }
                        $atual =  $pagina;
                        $proxima = ($pagina + 1);

                        ?>

                        <?php if ($atual > 1) {  ?>

                            <a href="<?= base_url() ?>catalogo/d/<?= $features['featured_slug'] ?><?php if (strlen($this->input->get('precificacao')) > 0) {
                                                                                                        echo "?precificacao=" . $this->input->get('precificacao');
                                                                                                    } else {
                                                                                                    } ?>     ">
                                <div class="pagination-item">INÍCIO</div>
                            </a>
                        <?php } ?>
                        <?php if ($atual > 1) {  ?>
                            <a href="<?= base_url() ?>catalogo/d/<?= $features['featured_slug'] ?>?p=<?= $anterior ?><?php if (strlen($this->input->get('precificacao')) > 0) {
                                                                                                                            echo "&precificacao=" . $this->input->get('precificacao');
                                                                                                                        } else {
                                                                                                                        } ?>">
                                <div class="pagination-item">ANTERIOR</div>
                            </a>
                        <?php } ?>

                        <?php if ($atual > 1) {  ?>
                            <a href="<?= base_url() ?>catalogo/d/<?= $features['featured_slug'] ?>?p=<?= $anterior ?><?php if (strlen($this->input->get('precificacao')) > 0) {
                                                                                                                            echo "&precificacao=" . $this->input->get('precificacao');
                                                                                                                        } else {
                                                                                                                        } ?>">
                                <div class="pagination-item "><?= $anterior ?></div>
                            </a>
                        <?php } ?>



                        <a href="<?= base_url() ?>catalogo/d/<?= $features['featured_slug'] ?>?p=<?= $atual ?><?php if (strlen($this->input->get('precificacao')) > 0) {
                                                                                                                    echo "&precificacao=" . $this->input->get('precificacao');
                                                                                                                } else {
                                                                                                                } ?> ">
                            <div class="pagination-item pagination-item-active"><?= $atual ?></div>
                        </a>

                        <?php if ($atual < $total_pages) {  ?>

                            <a href="<?= base_url() ?>catalogo/d/<?= $features['featured_slug'] ?>?p=<?= $proxima ?><?php if (strlen($this->input->get('precificacao')) > 0) {
                                                                                                                        echo "&precificacao=" . $this->input->get('precificacao');
                                                                                                                    } else {
                                                                                                                    } ?>">
                                <div class="pagination-item"><?= $proxima ?></div>
                            </a>
                        <?php } ?>

                        <?php if ($atual < $total_pages) {  ?>
                            <?php if ($atual >= 1) {  ?>
                                <a href="<?= base_url() ?>catalogo/d/<?= $features['featured_slug'] ?>?p=<?= $proxima ?><?php if (strlen($this->input->get('precificacao')) > 0) {
                                                                                                                            echo "&precificacao=" . $this->input->get('precificacao');
                                                                                                                        } else {
                                                                                                                        } ?>">
                                    <div class="pagination-item">PRÓXIMO</div>
                                </a>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($atual != $total_pages) {  ?>

                            <a href="<?= base_url() ?>catalogo/d/<?= $features['featured_slug'] ?>?p=<?= $total_pages ?><?php if (strlen($this->input->get('precificacao')) > 0) {
                                                                                                                            echo "&precificacao=" . $this->input->get('precificacao');
                                                                                                                        } else {
                                                                                                                        } ?> ">
                                <div class="pagination-item">ÚLTIMA</div>
                            </a>
                        <?php } ?>


                    </div>
                </div>
            <?php } ?>

        </section>

    </main>
    <div id="loadingMask" class="grid place-items-center" style="width: 100%; height: 100%; position: fixed;">
        <img src="<?= base_url() ?>assets/img/design/loading.gif" alt="">
    </div>





    <?php $this->load->view('comp/js'); ?>


    <script>
        $('.ebook-add-biblioteca').on('click', function(e) {
            swal('Adicionado na sua biblioteca.')
        })
    </script>
    <script>
        var faq = document.getElementsByClassName("faq-page");
        var i;

        for (i = 0; i < faq.length; i++) {
            faq[i].addEventListener("click", function() {
                /* Toggle between adding and removing the "active" class,
                to highlight the button that controls the panel */
                this.classList.toggle("active");

                /* Toggle between hiding and showing the active panel */
                var body = this.nextElementSibling;
                if (body.style.display === "block") {
                    body.style.display = "none";
                } else {
                    body.style.display = "block";
                }
            });
        }
    </script>

</body>

</html>