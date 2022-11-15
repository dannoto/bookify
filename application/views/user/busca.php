<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca.</title>

    <?php $this->load->view('comp/css'); ?>
</head>

<style>
    input {
        width: 90%;
    }

    select {
        width: 90%;
    }

    @media(max-width:900px) {
        input {
            width: 100%;
            padding-bottom: 15px;
        }


        select {
            width: 100%;
        }

    }
</style>

<body>

    <?php $this->load->view('comp/navbar'); ?>


    <main style="display: none;">
        <section class=" xl:ml-24 xl:mr-24 ml-3 mr-3 ">
            <div class="">
                <form action="" method="GET">
                    <div class="xl:col-span-1 catalogo-left">
                        <h1 class="ebook-title">Busca</h1>
                        <p class="mt-1 xl:mb-1 mb-3">Faça uma busca completa em nosso catálogo.</p>
                        <br>
                        <div class="xl:col-span-1 mt-2 grid xl:grid-cols-12">

                            <div class="xl:col-span-5">
                                <label class=" mt-2">TERMO</label><br>
                                <input type="text" name="ebook_title" value="" class="border mt-3 border-gray-200 p-2" placeholder="O que está procurando?">
                            </div>
                            <div class="xl:col-span-3">

                                <label class=" mt-2">CATEGORIAS</label><br>
                                <select class="form-control mt-3 border border-gray-200 p-2 text-uppercase" style="text-transform:uppercase" name="ebook_category">
                                    <option value="">TODAS</option>
                                    <?php foreach ($categorias as $c) { ?>
                                        <?php if ($c->id == $this->input->get('ebook_category')) { ?>
                                            <?php echo '<option  class="text-uppercase" style="text-transform:uppercase"  selected value="' . $c->id . '">' . $c->category_name . '</option>'; ?>
                                        <?php } else { ?>
                                            <?php echo '<option  class="text-uppercase" style="text-tran sform:uppercase" value="' . $c->id . '">' . $c->category_name . '</option>'; ?>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="xl:col-span-3">
                                <label class=" mt-2">PRECIFICAÇÃO</label><br>
                                <select class="form-control mt-3 border border-gray-200 p-2" name="ebook_precificacao">
                                    <?php if ($this->input->get('ebook_precificacao') == "1") { ?>

                                        <option value="">TODAS</option>
                                        <option value="0">GRÁTIS</option>
                                        <option selected value="1">PREEMIUM</option>

                                    <?php } else if ($this->input->get('precificacao') == "0") { ?>

                                        <option value="">TODAS</option>
                                        <option selected value="0">GRÁTIS</option>
                                        <option value="1">PREEMIUM</option>
                                    <?php } else { ?>

                                        <option value="">TODAS</option>
                                        <option value="0">GRÁTIS</option>
                                        <option value="1">PREEMIUM</option>

                                    <?php } ?>
                                </select>

                            </div>
                            <div class="xl:col-span-1">
                                <label class=" mt-2"></label><br>

                                <button class="bg-greenDefault form-control text-white px-2 mt-3" style="width: 100%;height:42px">
                                    <i class="fa fa-search ml-3 mr-3"></i>
                                </button>
                            </div>




                        </div>
                </form>
            </div>


        </section>
        <section class="xl:mt-5 xl:m-0 m-3 mt-8 xl:pt-5  xl:mb-5">

            <?php if (count($ebooks) > 0) { ?>

                <div class=" xl:ml-24 xl:mr-24">
                    <?php if ($this->input->get('ebook_title')) { ?>
                        <div>
                            <h1 class="font-semibold ebook-title mt-5">Resultados para <span class="text-greenDefault font-semibold">"<?= htmlspecialchars($this->input->get('ebook_title')) ?>"</span></h1>

                        </div>
                    <?php } ?>
                    <div class="grid xl:grid-cols-5 grid-cols-2 mt-3 ">

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

                        <div class="mb-5">
                            <h1 class="font-semibold ebook-title mt-5">Resultados para <span class="text-greenDefault font-semibold">"<?= htmlspecialchars($this->input->get('ebook_title')) ?>"</span></h1>
                        </div>

                        <div style="border:1px solid #00b467;color:#00b467">
                            <br><br>
                            <h3 class="text-center   " style="color:00b467;font-size:20px">NENHUM RESULTADO ENCONTRADO.</h3>
                            <br><br>
                        </div>
                    </div>
                <?php } ?>


                </div>
        </section>
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

                        <a href="<?= base_url() ?>busca/?i=<?php if (strlen($this->input->get('ebook_precificacao')) > 0) {
                                                                echo "&ebook_precificacao=" . $this->input->get('ebook_precificacao');
                                                            } ?><?php if (strlen($this->input->get('ebook_title')) > 0) {
                                                                echo "&ebook_title=" . $this->input->get('ebook_title');
                                                            } ?><?php if (strlen($this->input->get('ebook_category')) > 0) {
                                                                                                                                                                                                            echo "&ebook_category=" . $this->input->get('ebook_category');
                                                                                                                                                                                                        } ?> ">
                            <div class="pagination-item">INÍCIO</div>
                        </a>
                    <?php } ?>
                    <?php if ($atual > 1) {  ?>
                        <a href="<?= base_url() ?>busca/?p=<?= $anterior ?><?php if (strlen($this->input->get('ebook_precificacao')) > 0) {
                                                                                echo "&ebook_precificacao=" . $this->input->get('ebook_precificacao');
                                                                            } ?><?php if (strlen($this->input->get('ebook_title')) > 0) {
                                                                                echo "&ebook_title=" . $this->input->get('ebook_title');
                                                                            } ?><?php if (strlen($this->input->get('ebook_category')) > 0) {
                                                                                                                                                                                                                            echo "&ebook_category=" . $this->input->get('ebook_category');
                                                                                                                                                                                                                        } ?>">
                            <div class="pagination-item">ANTERIOR</div>
                        </a>
                    <?php } ?>

                    <?php if ($atual > 1) {  ?>
                        <a href="<?= base_url() ?>busca/?p=<?= $anterior ?><?php if (strlen($this->input->get('ebook_precificacao')) > 0) {
                                                                                echo "&ebook_precificacao=" . $this->input->get('ebook_precificacao');
                                                                            } ?><?php if (strlen($this->input->get('ebook_title')) > 0) {
                                                                                echo "&ebook_title=" . $this->input->get('ebook_title');
                                                                            } ?><?php if (strlen($this->input->get('ebook_category')) > 0) {
                                                                                                                                                                                                                            echo "&ebook_category=" . $this->input->get('ebook_category');
                                                                                                                                                                                                                        } ?>">
                            <div class="pagination-item "><?= $anterior ?></div>
                        </a>
                    <?php } ?>


                    <a href="<?= base_url() ?>busca/?p=<?= $atual ?><?php if (strlen($this->input->get('ebook_precificacao')) > 0) {
                                                                        echo "&ebook_precificacao=" . $this->input->get('ebook_precificacao');
                                                                    } ?><?php if (strlen($this->input->get('ebook_title')) > 0) {
                                                                        echo "&ebook_title=" . $this->input->get('ebook_title');
                                                                    } ?><?php if (strlen($this->input->get('ebook_category')) > 0) {
                                                                                                                                                                                                                    echo "&ebook_category=" . $this->input->get('ebook_category');
                                                                                                                                                                                                                } ?>">
                        <div class="pagination-item pagination-item-active"><?= $atual ?></div>
                    </a>

                    <?php if ($atual < $total_pages) {  ?>

                        <a href="<?= base_url() ?>busca/?p=<?= $proxima ?><?php if (strlen($this->input->get('ebook_precificacao')) > 0) {
                                                                                echo "&ebook_precificacao=" . $this->input->get('ebook_precificacao');
                                                                            } ?><?php if (strlen($this->input->get('ebook_title')) > 0) {
                                                                                echo "&ebook_title=" . $this->input->get('ebook_title');
                                                                            } ?><?php if (strlen($this->input->get('ebook_category')) > 0) {
                                                                                                                                                                                                                            echo "&ebook_category=" . $this->input->get('ebook_category');
                                                                                                                                                                                                                        } ?>">
                            <div class="pagination-item"><?= $proxima ?></div>
                        </a>
                    <?php } ?>

                    <?php if ($atual < $total_pages) {  ?>
                        <?php if ($atual >= 1) {  ?>
                            <a href="<?= base_url() ?>busca/?p=<?= $proxima ?><?php if (strlen($this->input->get('ebook_precificacao')) > 0) {
                                                                                    echo "&ebook_precificacao=" . $this->input->get('ebook_precificacao');
                                                                                } ?><?php if (strlen($this->input->get('ebook_title')) > 0) {
                                                                                    echo "&ebook_title=" . $this->input->get('ebook_title');
                                                                                } ?><?php if (strlen($this->input->get('ebook_category')) > 0) {
                                                                                                                                                                                                                                echo "&ebook_category=" . $this->input->get('ebook_category');
                                                                                                                                                                                                                            } ?>">
                                <div class="pagination-item">PRÓXIMO</div>
                            </a>
                        <?php } ?>
                    <?php } ?>

                    <?php if ($atual != $total_pages) {  ?>

                        <a href="<?= base_url() ?>busca/?p=<?= $total_pages ?><?php if (strlen($this->input->get('ebook_precificacao')) > 0) {
                                                                                    echo "&ebook_precificacao=" . $this->input->get('ebook_precificacao');
                                                                                } ?><?php if (strlen($this->input->get('ebook_title')) > 0) {
                                                                                    echo "&ebook_title=" . $this->input->get('ebook_title');
                                                                                } ?><?php if (strlen($this->input->get('ebook_category')) > 0) {
                                                                                                                                                                                                                                echo "&ebook_category=" . $this->input->get('ebook_category');
                                                                                                                                                                                                                            } ?>">
                            <div class="pagination-item">ÚLTIMA</div>
                        </a>
                    <?php } ?>


                </div>
            </div>
        <?php } ?>
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