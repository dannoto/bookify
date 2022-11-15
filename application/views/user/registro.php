<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Registre-se</title>
    <?php $this->load->view('comp/css'); ?>
</head>

<body  class="bg-dark">



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
                                <form action="" method="POST" class="xl:pt-14 pt-8 xl:m-0 m-8" id="form-register">
                                    <div>
                                        <h2 style="font-size:30px" class="text-black text-xl font-semibold">Crie uma Conta</h2>
                                        <p class="text-black text-md mt-2 mb-2 font-norma">Faça parte da nossa plataforma e expanda seu conhecimento..</p>
                                    </div>
                                    <div class="grid xl:grid-cols-2 grid-cols-1 xl:space-x-3">
                                        <div class="col-span-1">
                                            <input style="border:1px solid #DFDFDF" maxlength="200" type="text" name="user_name" class="p-2  " required placeholder="SEU NOME">
                                        </div>
                                        <div class="col-span-1">
                                            <input style="border:1px solid #DFDFDF" maxlength="200" type="text" name="user_surname" class="p-2 " required placeholder="SEU SOBRENOME">
                                        </div>
                                    </div>

                                    <input style="border:1px solid #DFDFDF" maxlength="200" type="email" name="user_email" class="p-2" value="<?php if ($this->input->get('user_email')) {
                                                                                                                                                    echo $this->input->get('user_email');
                                                                                                                                                } ?>" required placeholder="SEU E-MAIL">
                                    <input style="border:1px solid #DFDFDF" maxlength="200" minlength="6" type="password" name="user_password" class="p-2" required placeholder="SUA SENHA">
                                    <div class="flex justify-items-end">
                                        <div>
                                            <p class="text-black text-left mt-5 mb-2">Ao registrar você concorda com os<a href="<?= base_url() ?>termos"><span class="text-greenDefault font-normal"> Termos e Condições </span>.</a></p>

                                        </div>
                                    </div>

                                    <input style="border:1px solid #DFDFDF" maxlength="200" type="hidden" name="user_origin" class="p-2" value="<?php if (isset($_COOKIE['ref'])) {
                                                                                                                                                    echo $_COOKIE['ref'];
                                                                                                                                                } ?>" required>

                                    <button type="submit" class="bg-greenDefault text-white font-semibold">ENTRAR</button>

                                    <div class=" ">
                                        <p style="font-size:17px" class="text-black text-md  mt-5 text-base mb-5">Já tem uma conta?<a href="<?= base_url() ?>login"><span class="text-greenDefault font-semibold"> Entrar </span></a></p>
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
        $('#form-register').submit(function(e) {

            e.preventDefault()

            $.ajax({
                method: 'POST',
                url: '<?= base_url() ?>registro/add_user',
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
                    swal('Ocorreu um erro temporário. Tente novamente!');
                    console.log(data);
                },
            });

        })
    </script>
</body>

</html>