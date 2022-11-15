<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>

    <?php $this->load->view('comp/css'); ?>
</head>


<body>

    <?php $this->load->view('comp/navbar'); ?>



    <main style="display: none;">
        <section class=" xl:ml-24 xl:mr-24 ml-3 mr-3 ">
            <div class="grid xl:grid-cols-5 place-items-between">
                <div class="xl:col-span-3 catalogo-left">
                    <h1 class="font-semibold ebook-title mt-5">Minha Biblioteca</h1>
                    <p>Seu lugar preferido.</p>
                </div>
                <div class="xl:col-span-2 catalogo-right grid place-items-center">
                    <ul class="flex xl:pt-12 xl:flex hidden">
                        <li style="padding-top: 6px;" class="  xl:ml-12 <?php if ($this->input->get('classificacao') == "todos" || !$this->input->get('classificacao')) {
                                                                            echo " catalogo-active";
                                                                        } ?>">
                            <a style="font-size:17px ;" href="<?= base_url() ?>biblioteca?classificacao=todos">
                                TODOS
                            </a>
                        </li>
                        <li style="padding-top: 6px;" class="  xl:ml-12 <?php if ($this->input->get('classificacao') == "concluidos") {
                                                                            echo " catalogo-active";
                                                                        } ?>">
                            <a style="font-size:17px ;" href="<?= base_url() ?>biblioteca?classificacao=concluidos">
                                CONCLUÍDOS
                            </a>
                        </li>
                        <li style="padding-top: 6px;" class="  xl:ml-12 <?php if ($this->input->get('classificacao') == "andamento") {
                                                                            echo " catalogo-active";
                                                                        } ?>">
                            <a style="font-size:17px ;" href="<?= base_url() ?>biblioteca?classificacao=andamento">
                                ANDAMENTO
                            </a>
                        </li>

                    </ul>

                    <ul class="grid xl:col-span-1 pt-5 xl:pt-12 xl:hidden submenu_mobile">
                        <li style="padding-top: 6px;" class="  submenu_mobile_item  xl:ml-12 <?php if ($this->input->get('classificacao') == "todos" || !$this->input->get('classificacao')) {
                                                                                                    echo " catalogo-active";
                                                                                                } ?>">
                            <a href="<?= base_url() ?>biblioteca?classificacao=todos">
                                TODOS
                            </a>
                        </li>
                        <li style="padding-top: 6px;" class="  submenu_mobile_item xl:ml-12 <?php if ($this->input->get('classificacao') == "concluidos") {
                                                                                                echo " catalogo-active";
                                                                                            } ?>">
                            <a href="<?= base_url() ?>biblioteca?classificacao=concluidos">
                                CONCLUÍDOS
                            </a>
                        </li>
                        <li style="padding-top: 6px;" class="  submenu_mobile_item xl:ml-12 <?php if ($this->input->get('classificacao') == "andamnto") {
                                                                                                echo " catalogo-active";
                                                                                            } ?>">
                            <a href="<?= base_url() ?>biblioteca?classificacao=andamento">
                                EM ANDAMENTO
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </section>

        <?php if (count($library) > 0) { ?>
            <section class="xl:mt-5 xl:m-0 m-3 mt-8 xl:pt-5  xl:mb-5">

                <?php foreach ($library as $l) { ?>

                    <?php $ebook = $this->ebook_model->getEbook($l->library_ebook_id); ?>

                    <div class=" xl:ml-3 xl:mr-32 grid mt-5 xl:grid-cols-3 grid-cols-1 biblioteca">
                        <div class="col-span-1 grid xl:place-items-center">
                            <a href="<?= base_url() ?>ebook/detalhes/<?= $ebook['id'] ?>">
                                <img class="xl:m-auto" style="width: 100%;height: 300px;min-height: 300px;max-height:300px;object-fit:cover" src="<?= base_url() ?><?= $ebook['ebook_image'] ?>" alt="">
                            </a>
                        </div>
                        <div class="col-span-2  ">

                            <a href="<?= base_url() ?>ebook/detalhes/<?= $ebook['id'] ?>">
                                <h1 class="xl:mt-0 mt-5 xl:mt-5 xl:text-left text-uppercase"><?= $ebook['ebook_title'] ?> </h1>

                            </a>
                            <p class="line-clamp-3"><?= $ebook['ebook_description'] ?></p>
                            <div class="mt-8">
                                <a href="<?= base_url() ?>play/u/<?= $ebook['id'] ?>">
                                    <button class=" border bg-greenDefault p-2 xl:px-12 flex justify-center">
                                        <img class="biblioteca-icon-img" style="width:27px;height:27px;" src="<?= base_url() ?>assets/img/icons/play-circle.png" alt="">
                                        <span class="text-white ml-3 " style="font-size: 17px;margin-top:0px;">CONTINUAR</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php } ?>


            </section>

        <?php } else { ?>
            <div class=" xl:ml-24 mt-10 xl:mr-24">
                <div style="border:1px solid #00b467;color:#00b467">
                    <br><br>
                    <h3 class="text-center   " style="color:00b467;font-size:20px">SUA BIBLIOTECA ESTÁ VAZIA.</h3>
                    <br><br>
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