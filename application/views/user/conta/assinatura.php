<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta - Assinatura</title>

    <?php $this->load->view('comp/css'); ?>
</head>


<body>

    <?php $this->load->view('comp/navbar'); ?>

    <main style="display: none;">
        <section class="">
            <div class=" grid xl:grid-cols-3 grid-cols-1">
                <div class="xl:col-span-1 ">


                    <div class="xl:col-span-2 catalogo-right grid place-items-center xl:block hidden">


                        <ul class="grid xl:col-span-1 pt-5 xl:pt-12 xl:grid submenu_mobile">
                            <a href="<?= base_url() ?>conta/perfil">
                                <li style="height:50px;font-size:20px;padding-top:7px;font-weight:normal;border:1px solid #ddd;border-radius:0px;padding-left:18px" class="submenu_mobile_item xl:ml-12">
                                    PERFIL
                                </li>
                            </a>
                            <a href="<?= base_url() ?>conta/seguranca">
                                <li style="height:50px;font-size:20px;padding-top:7px;font-weight:normal;border:1px solid #ddd;border-radius:0px;padding-left:18px" class="submenu_mobile_item xl:ml-12 ">
                                    SEGURANÇA
                                </li>
                            </a>
                            <a href="<?= base_url() ?>conta/assinatura">
                                <li style="height:50px;font-size:20px;padding-top:7px;font-weight:normal;border:1px solid #ddd;border-radius:0px;padding-left:18px" class="submenu_mobile_item xl:ml-12 catalogo-active">
                                    ASSINATURA
                                </li>
                            </a>
                            <a href="<?= base_url() ?>sair">
                                <li style="height:50px;font-size:20px;padding-top:7px;font-weight:normal;border:1px solid #ddd;border-radius:0px;padding-left:18px" class="submenu_mobile_item xl:ml-12 ">
                                    SAIR
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="xl:col-span-2 conta-perfil xl:mr-48 xl:ml-48 m-5">

                    <div class="xl:mt-12 mt-5">
                        <h1 style="font-size:25px;" class="ebook-title">MEU PLANO</h1>
                    </div>
                    <div class="mb-8">
                        <p class="font-semibold">INICIO: 19/10/2022</p>
                        <p class="font-semibold">VENCIMENTO: 19/11/2022</p>

                    </div>

                    <div class=" grid xl:grid-cols-2 grid-cols-1">
                        <div class="xl:col-span-1 xl:pr-3">
                            <div class="conta-perfil-btn  mb-12">
                                <button class="bg-greenDefault text-white font-semibol px-5">ALTERAR PLANO</button>
                            </div>
                        </div>
                        <div class="xl:col-span-1">
                            <div class="conta-perfil-btn  mb-12">
                                <button class="bg-red-400 text-white font-semibol px-5">CANCELAR ASSINATURA</button>
                            </div>
                        </div>
                    </div>

                    <div class="xl:mt-12 mt-5">
                        <h1 style="font-size:25px;" class="ebook-title">HISTÓRICO DE PAGAMENTOS</h1>

                        <div class="grid pla-items-center">
                            <p>NENHUM HISTÓRICO REGISTRADO.</p>
                        </div>
                    </div>

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