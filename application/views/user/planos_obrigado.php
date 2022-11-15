<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obrigado, <?= $this->session->userdata('session_user')['user_name']; ?>!</title>

    <?php $this->load->view('comp/css'); ?>
</head>


<body >

    <?php $this->load->view('comp/navbar'); ?>

    <main style="display:none;">

        <section class="mt-12">
            <div class="grid place-items-center mb-12 xl:m-0 m-3">
                <h1 class="ebook-title uppercase" style="font-size:25px">PARABÉNS, <?= $this->session->userdata('session_user')['user_name']; ?>!</h1>
                <p style="font-size: 20px;" class="xl:mt-0 xl:font-base mt-3">Você escolheu o plano <span class="text-greenDefault font-semibold">
                        <?=
                        $this->plan_model->getPlan(
                            $this->user_model->getUserById(
                                $this->session->userdata('session_user')['id']
                            )['user_plan']
                        )['plan_name']; ?>
                    </span> é hora de começar a aproveitar o Bookify!</p>
            </div>
            <div class="grid xl:grid-cols-1 grid-cols-1 home-plano place-items-center">

                <div class="home-plano-assinar-btn xl:mt-5  xl:w-1/3 w-full">
                    <a href="<?= base_url() ?>catalogo">
                        <button class="bg-greenDefault ">COMEÇAR <i class="fa ml-1 fa-arrow-right"></i></button>
                    </a>
                </div>


            </div>
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