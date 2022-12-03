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
            <br><br>
            <div class="grid place-items-center mb-12 xl:m-0 m-3">
                <h1 class="ebook-title uppercase" style="font-size:25px">OPSS, <?= $this->session->userdata('session_user')['user_name']; ?>!</h1>
                <p style="font-size: 20px;" class="xl:mt-0 xl:font-base mt-3">Ocorreu um erro durante o pagamento do seu plano. Vamos tentar novamente?</p>
                <small><?=$message?></small>
            </div>
            <br><br>
            <div class="grid xl:grid-cols-1 grid-cols-1 home-plano place-items-center">

                <div class="home-plano-assinar-btn xl:mt-5  xl:w-1/3 w-full">
                    <a href="<?= base_url() ?>planos">
                        <button class="bg-greenDefault ">TENTAR NOVAMENTE <i class="fa ml-1 fa-arrow-right"></i></button>
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