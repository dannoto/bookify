<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta - Segurança</title>

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
                                <li style="height:50px;font-size:20px;padding-top:7px;font-weight:normal;border:1px solid #ddd;border-radius:0px;padding-left:18px" class="submenu_mobile_item xl:ml-12 catalogo-active">
                                    SEGURANÇA
                                </li>
                            </a>
                            <a href="<?= base_url() ?>conta/assinatura">
                                <li style="height:50px;font-size:20px;padding-top:7px;font-weight:normal;border:1px solid #ddd;border-radius:0px;padding-left:18px" class="submenu_mobile_item xl:ml-12 ">
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
                    <h1 class="font-semibold xl:mt-20" style="font-size: 18px;">SEGURANÇA</h1>

                    <form action="" id="form-update-password">
                        <div class=" xl:mt-5 mt-5">
                            <input value="" name="old_password" required minlength="6" placeholder="SENHA ATUAL" type="password">
                        </div>


                        <div class=" grid xl:grid-cols-2 grid-cols-1">
                            <div class="xl:col-span-1 xl:pr-3">
                                <input name="new_password" required minlength="6" placeholder="NOVA SENHA" type="password">
                            </div>
                            <div class="xl:col-span-1">
                                <input name="new_password_confirm" required minlength="6" placeholder="CONF. NOVA SENHA" type="password">
                            </div>
                        </div>

                        <div class="conta-perfil-btn mt-3 mb-12">
                            <button class="bg-greenDefault text-white font-semibol px-5">ATUALIZAR SENHA</button>
                        </div>
                    </form>
                </div>

            </div>

        </section>

    </main>
    <div id="loadingMask" class="grid place-items-center" style="width: 100%; height: 100%; position: fixed;">
        <img src="<?= base_url() ?>assets/img/design/loading.gif" alt="">
    </div>


    <?php $this->load->view('comp/js'); ?>

    <!-- 
    <script>

        $('.ebook-add-biblioteca').on('click', function(e){
            swal('Adicionado na sua biblioteca.')
        })
    </script>
    <script>
        var faq = document.getElementsByClassName("faq-page");
        var i;

        for (i = 0; i < faq.length; i++) {
            faq[i].addEventListener("click", function () {
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
    </script> -->

    <script>
        $('#form-update-password').submit(function(e) {

            e.preventDefault()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>conta/actupdatepassword',
                data: $(this).serialize(),
                success: function(data) {
                    var resp = JSON.parse(data)

                    if (resp.status == "true") {
                        swal(resp.message)
                    } else {
                        swal(resp.message)
                    }
                },
                error: function(data) {
                    swal('Ocorreu um erro temporário.');
                },
            });
        })
    </script>

</body>

</html>