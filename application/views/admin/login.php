<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Login</title>
    <?php $this->load->view('comp/css'); ?>
</head>

<body class="bg-dark">
    <main style="display:none;">
        <section>
            <div class="grid xl:grid-cols-2 grid-cols-1">
                <div style="height:100vh" class="xl:col-span-1  col-span-1">


                    <div class="  login ">
                        <div class="m-3">
                            <img style="width:150px;height:50px;object-fit:cover" src="<?= base_url() ?>assets/img/design/logo.png" alt="">
                        </div>
                        <div class="grid place-items-center">
                            <div class=" ">
                                <form action="" class="mt-20" id="form-login">
                                    <div>
                                        <h2 style="font-size:30px" class="text-black text-xl font-semibold">Login Administrativo</h2>
                                        <p class="text-black text-md mt-2 mb-2 font-norma">Faça login e explore esse mundo de conhecimento.</p>
                                    </div>

                                    <input style="border:1px solid #DFDFDF" maxlength="200" type="email" name="user_email" class="p-2" required placeholder="SEU E-MAIL">
                                    <input style="border:1px solid #DFDFDF" maxlength="200" type="password" name="user_password" class="p-2" required placeholder="SUA SENHA">
                                    <div class="flex justify-items-end">
                                        <div>
                                            <p class="text-greenDefault text-left mt-5 mb-2"><a href="<?= base_url() ?>recuperacao"><span class=" font-normal">Esqueci minha senha </span></a></p>

                                        </div>
                                    </div>
                                    <button class="bg-greenDefault text-white font-semibold">ENTRAR</button>

                                    <div class=" ">
                                        <p style="font-size:17px" class="text-black text-md  mt-5 text-base mb-5">Não tem uma conta?<a href="<?= base_url() ?>registro"><span class="text-greenDefault font-semibold"> Registrar </span></a></p>
                                    </div>


                                </form>
                            </div>
                        </div>

                    </div>

                </div>
                <div style="height:100vh" class="xl:col-span-1 hidden xl:block col-span-1 bg-greenDefault">

                </div>
            </div>

        </section>
    </main>
    <div id="loadingMask" class="grid place-items-center" style="width: 100%; height: 100%; position: fixed;">
        <img src="<?= base_url() ?>assets/img/design/loading.gif" alt="">
    </div>

    <!-- Footer -->
    <?php $this->load->view('comp/js'); ?>

    <script>
        $('#form-login').submit(function(e) {

            e.preventDefault()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>painel/auth',
                data: $(this).serialize(),
                success: function(data) {
                    var resp = JSON.parse(data)

                    if (resp.status == "true") {
                        window.location.href = '<?= base_url() ?>catalogo'
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