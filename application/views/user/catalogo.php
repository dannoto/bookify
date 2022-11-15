<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>

    <?php $this->load->view('comp/css'); ?>
</head>



<body>

    <?php $this->load->view('comp/navbar'); ?>


    <main style="display:none;">

        <section class=" xl:ml-24 xl:mr-24 ml-3 mr-3 ">
            <div class="grid xl:grid-cols-3 place-items-between">
                <div class="xl:col-span-1 catalogo-left">

                    <?php if ($this->session->userdata('session_user')) { ?>
                        <h1 class="font-semibold mt-5">Olá <?= $this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_name'] ?>!</h1>

                    <?php } else { ?>
                        <h1 class="font-semibold mt-5">Olá, Bem-vindo!</h1>
                    <?php } ?>

                    <p>Explore nosso catálogo.</p>
                </div>
                <div class="xl:col-span-2 catalogo-right grid place-items-center">
                    <ul class="flex xl:pt-12 xl:flex hidden" style="width: 100%;overflow-x:scroll">
                        <li class=" xl:ml-12 <?php if (!$this->input->get('destaque')) {
                                                    echo " catalogo-active";
                                                } ?>">
                            <a style="font-size:20px ;" class="text-center text-uppercase" href="<?= base_url() ?>catalogo?destaque=0">
                                Todos
                            </a>
                        </li>

                        <?php foreach ($features as $f) { ?>
                            <li class=" xl:ml-12 <?php if ($this->input->get('destaque') == "<?=$f->id?>") {
                                                        echo " catalogo-active";
                                                    } ?>">
                                <a style="font-size:20px ;" class="text-center text-uppercase" style="font-size: 20px;" href="<?= base_url() ?>catalogo/d/<?= $f->featured_slug ?>">
                                    <?= $f->featured_name ?>
                                </a>
                            </li>
                        <?php } ?>


                    </ul>


                </div>
            </div>
        </section>

        <?php if ($this->input->get('destaque') == "0" ||  !$this->input->get('destaque')) { ?>

            <?php foreach ($features as $f) { ?>
                <?php if (count($this->ebook_model->getEbooksByFeatures($f->id)) > 0) { ?>

                    <section class="xl:mt-3 xl:m-0 m-3 mt-5 xl:pt-5  xl:mb-5">
                        <div class=" xl:ml-24 xl:mr-24">
                            <div class="flex justify-between">
                                <div>
                                    <h1 class="ebook-title "><?= $f->featured_name ?></h1>
                                </div>
                                <div>
                                    <a href="<?= base_url() ?>catalogo/d/<?= $f->featured_slug ?>">
                                        <small class="text-greenDefault">VER TODOS</small>
                                    </a>
                                </div>
                            </div>

                            <div class="owl-carousel mt-8 carousel">
                                <?php foreach ($this->ebook_model->getEbooksByFeatures($f->id) as $f) { ?>
                                    <div>
                                        <a href="<?= base_url() ?>ebook/detalhes/<?= $f->id ?>">
                                            <img style="width: 100%;height: 300px;min-height: 300px;max-height:300px;object-fit:cover" src="<?= base_url() ?><?= $f->ebook_image ?>" alt="">
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </section>
                <?php } ?>

            <?php } ?>

            <?php foreach ($categorias as $f) { ?>
                <?php if (count($this->ebook_model->getEbooksByCategory($f->id)) > 0) { ?>

                    <section class="xl:mt-3 xl:m-0 m-3 mt-5 xl:pt-5  xl:mb-5">
                        <div class=" xl:ml-24 xl:mr-24">
                            <div class="flex justify-between">
                                <div>
                                    <h1 class="ebook-title "><?= $f->category_name ?></h1>
                                </div>
                                <div>
                                    <a href="<?= base_url() ?>catalogo/c/<?= $f->category_slug ?>">
                                        <small class="text-greenDefault">VER TODOS</small>
                                    </a>
                                </div>
                            </div>

                            <div class="owl-carousel mt-8 carousel">
                                <?php foreach ($this->ebook_model->getEbooksByCategory($f->id) as $f) { ?>
                                    <div>
                                        <a href="<?= base_url() ?>ebook/detalhes/<?= $f->id ?>">
                                            <img style="width: 100%;height: 300px;min-height: 300px;max-height:300px;object-fit:cover" src="<?= base_url() ?><?= $f->ebook_image ?>" alt="">
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </section>
                <?php } ?>

            <?php } ?>



        <?php } else { ?>

            <section class="xl:mt-5 xl:m-0 m-3 mt-8 xl:pt-5  xl:mb-5">
                <div class=" xl:ml-24 xl:mr-24">
                    <div class="flex justify-between">
                        <div>
                            <?php if ($this->input->get('classificacao') == "podcast") { ?>
                                <h1 class="ebook-title ">Podcasts</h1>
                            <?php } else if ($this->input->get('classificacao') == "lancamentos") { ?>
                                <h1 class="ebook-title ">Lançamentos</h1>
                            <?php } else if ($this->input->get('classificacao') == "bestsellers") { ?>
                                <h1 class="ebook-title ">BestSellers</h1>
                            <?php } else if ($this->input->get('classificacao') == "alta") { ?>
                                <h1 class="ebook-title ">Em Alta</h1>

                            <?php } else if ($this->input->get('classificacao') == "gratuitos") { ?>
                                <h1 class="ebook-title ">Gratuitos</h1>



                            <?php } ?>


                        </div>
                        <div>
                            <!-- <a href="<?= base_url() ?>/catalogo?classificacao=alta">
                            <small class="text-greenDefault">VER TODOS</small>
                        </a> -->
                        </div>
                    </div>

                    <div class="grid xl:grid-cols-5 grid-cols-2 mt-8 ">
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 4.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 6.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 8.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 10.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 15.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 6.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 8.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 10.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 15.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 6.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 6.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 8.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 10.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 15.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 6.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 6.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 8.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 10.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 15.png" alt="">
                            </a>
                        </div>
                        <div class="xl:col-span-1 mt-5 m-3">
                            <a href="<?= base_url() ?>ebook/detalhes/123">
                                <img src="<?= base_url() ?>assets/img/ebooks/Imagem 6.png" alt="">
                            </a>
                        </div>

                    </div>
                </div>

                <div class="mt-12 grid place-items-center">
                    <div class="flex pagination">
                        <div class="pagination-item">ANTERIOR</div>
                        <div class="pagination-item pagination-item-active">1</div>
                        <div class="pagination-item">2</div>
                        <div class="pagination-item">3</div>
                        <div class="pagination-item">PRÓXIMO</div>
                    </div>
                </div>
            </section>

        <?php  } ?>


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