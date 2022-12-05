<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuda</title>

    <?php $this->load->view('comp/css'); ?>
</head>


<body>

    <?php $this->load->view('comp/navbar_home'); ?>

    <main style="display:none;">

        <section class="mt-12 mb-12">
            <div class="grid place-items-center mb-5">
                <h1 class="ebook-title ">AJUDA E SUPORTE</h1>
            </div>
            <!-- <div class=" xl:ml-48 ml-5 mr-5 xl:mr-48 header ">
                <p class="text-center">Encontre uma resposta ou contate-nos pelo chat de suporte.</p>
                <form action="">
                    <div class="flex xl:mt-5 xl:mb-5 mt-8">

                        <input style="width: 100%" type="text" type="text" required name="user_email" placeholder="Busque por um termo...">
                        <button type="submit"> <i class="fa fa-search"></i></button>

                    </div>
                </form>
            </div> -->
            <?php foreach ($this->faq_model->getFaqsCategory() as $g) { ?>

                <div class=" xl:ml-48 ml-5 mr-5 mt-5 xl:mr-48">
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