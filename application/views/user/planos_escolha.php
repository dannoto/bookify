<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planos</title>

    <?php $this->load->view('comp/css'); ?>
</head>


<body>

    <?php $this->load->view('comp/navbar'); ?>

    <main style="display:none;">
        <section class="mt-12">
            <div class="grid place-items-center mb-12">
                <h1 class="ebook-title" style="font-size:25px">ESCOLHA UM PLANO</h1>
                <p>Antes de começar a aproveitar o Bookify. Escolha um plano.</p>
            </div>
            <div class="grid xl:grid-cols-3 grid-cols-1 home-plano">

                <?php foreach ($planos as $p) { ?>
                    <?php
                    if ($p->plan_type == "1") {
                        $type = "MENSAL";
                    } else if ($p->plan_type == "2") {
                        $type = "TRIMESTRAL";
                    } else if ($p->plan_type == "3") {
                        $type = "SEMESTRAL";
                    } else if ($p->plan_type == "4") {
                        $type = "ANUAL";
                    }
                    ?>
                    <div class="xl:col-span-1 col-span-1 grid place-items-center xl:mt-0 mt-5 m-3">
                        <div class="home-plano-div">
                            <div>
                                <div class="bg-yellowDefault home-plano-breadcumb grid place-items-center">
                                    <p style="font-size:17px;text-transform:uppercase" class="text-uppercase"><?= $p->plan_name ?></p>
                                </div>
                                <p class="line-clamp-3 home-plano-description"><?= $p->plan_description ?></p>
                                <div class="grid place-items-center">
                                    <ul class="mt-3 mb-3">
                                        <li><i style="font-size:15px" class="text-greenDefault fa fa-plus"></i><small> Items na biblioteca - <?php if ($p->plan_limit_library == "-1") {
                                                                                                                                                    echo "<span class='text-greenDefault font-semibold'>ILIMITADO</span>";
                                                                                                                                                } else {
                                                                                                                                                    echo "<span class='text-greenDefault font-semibold'>" . $p->plan_limit_library . "</span>";
                                                                                                                                                } ?> </small></li>
                                        <li><i style="font-size:15px" class="text-greenDefault fa fa-plus"></i><small> Leituras por mês - <?php if ($p->plan_limit_quantity == "-1") {
                                                                                                                                                echo "<span class='text-greenDefault font-semibold'>ILIMITADO</span>";
                                                                                                                                            } else {
                                                                                                                                                echo "<span class='text-greenDefault font-semibold'>" . $p->plan_limit_quantity . "</span>";
                                                                                                                                            } ?></small></small></li>
                                        <li><i style="font-size:15px" class="text-greenDefault fa fa-plus"></i><small> Audiobooks Gratuitos - <?php if ($p->plan_limit_free == "1") {
                                                                                                                                                    echo "<i  class='fa fa-check text-greenDefault'></i>";
                                                                                                                                                } else {
                                                                                                                                                    echo "<i style='color:red' class='fa fa-close'></i>";
                                                                                                                                                } ?></small></li>
                                        <li><i style="font-size:15px" class="text-greenDefault fa fa-plus"></i><small> Audiobooks Pagos - <?php if ($p->plan_limit_premium == "1") {
                                                                                                                                                echo "<i  class='fa fa-check text-greenDefault'></i>";
                                                                                                                                            } else {
                                                                                                                                                echo "<i style='color:red' class='fa fa-close'></i>";
                                                                                                                                            } ?></small></li>

                                    </ul>
                                </div>
                                <div class="grid place-items-center mb-5">
                                    <span class="home-plano-currency">R$ <span class="home-plano-preco"><?= str_replace(".", ",", $p->plan_price) ?></span><span class="home-plano-currency">/ <?= $type ?></span></span>
                                </div>
                            </div>
                            <div class="home-plano-assinar-btn">
                                <a href="<?= base_url() ?>checkout/<?= $p->id ?>">
                                    <button class="bg-greenDefault ">ASSINAR <i class="fa ml-1 fa-arrow-right"></i></button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>


            </div>
        </section>


        <section class="mt-12 mb-12">
            <div class="grid place-items-center mb-5">
                <h1 class="ebook-title " style="font-size:25px">AINDA COM DÚVIDAS?</h1>
            </div>

            <?php foreach ($this->faq_model->getFaqsCategory() as $g) { ?>

                <div class=" xl:ml-56 ml-5 mr-5 mt-5 xl:mr-56">
                    <h1 class="faq-title bmb-5 line-clamp-1" title="<?= $g->faq_category_title ?>" style="font-size:20px !important"><?= $g->faq_category_title ?></h1>
                    <div class="faq-container">

                        <?php foreach ($this->faq_model->getFaqsContentByCategory($g->id) as $f) { ?>

                            <div class="faq-one">
                                <!-- faq question -->
                                <h1 class="faq-page text-white font-normal uppercase line-clamp-1"><?= $f->faq_title ?></h1>
                                <!-- faq answer -->
                                <div class="faq-body">
                                    <p><?= $f->faq_description ?></p>
                                </div>
                            </div>
                            <hr class="hr-line">
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