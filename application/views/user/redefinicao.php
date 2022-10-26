<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Redefinição</title>
    <?php $this->load->view('comp/css');?>
</head>    
<body class="bg-dark">
    <!-- Navbar -->
    <?php $this->load->view('comp/navbar');?>
    <!-- Navbar -->
    <?php $this->load->view('comp/sidebar');?>

    
   

    <section>
        <div class="grid xl:grid-cols-2 grid-cols-1">
            <div style="height:100vh" class="xl:col-span-1  col-span-1">


                <div class="  login ">
                    <div class="m-3"> 
                        <img style="width:150px;height:50px;object-fit:cover" src="<?=base_url()?>assets/img/logo_green.png" alt="">
                    </div>
                    <div class="grid place-items-center">
                        <div class=" ">
                            <form action="" autocomplete="off" class="mt-20" id="form-recovery" >
                                <div>
                                    <h2 style="font-size:30px" class="text-black text-xl font-semibold">Redefina sua senha</h2>
                                    <p class="text-black text-md mt-2 mb-2 font-norma">Escolha sempre uma senha segura para sua proteção.</p>
                                </div>
                                <input type="hidden" value="<?=$user_token?>" name="user_token">

                                <input style="border:1px solid #DFDFDF" minlength="6" type="password" name="user_password" id="user_password" class="p-2" required placeholder="NOVA SENHA">
                                <input style="border:1px solid #DFDFDF" minlength="6" type="password" name="user_password_confirm" id="user_password_confirm" class="p-2"  required placeholder="CONFIRMAÇÃO DA SENHA">
                                <div class="flex justify-items-end">
                                    <div>
                                    <!-- <p class="text-greenDefault text-left mt-5 mb-2"><a href="<?=base_url()?>recuperacao"><span class=" font-normal">Esqueci minha senha </span></a></p> -->
        
                                    </div>
                                </div>
                                <button class="bg-greenDefault text-white font-semibold">ATUALIZAR</button>
        
                          
                            </form>
                        </div>
                    </div>
                
                </div> 

            </div>
            <div style="height:100vh" class="xl:col-span-1 hidden xl:block col-span-1 bg-greenDefault">

            </div>
        </div>
       
    </section>


    <!-- Footer -->
    <?php $this->load->view('comp/js');?>

        <script>

    $('#form-recovery').submit(function(e) {

        e.preventDefault()

        var user_password = $('#user_password').val()
        var user_password_confirm = $('#user_password_confirm').val()


        if (user_password !== user_password_confirm) {

            swal("Suas senhas não combinam.")

        } else {

            $.ajax({
                 method: 'POST',
                 url: '<?=base_url() ?>redefinicao/updatePassword',
                 data: $(this).serialize(),
                 success: function (data) {
                     var resp = JSON.parse(data)
    
                     if (resp.status == "true") {


                        swal({
                            title: "Tudo certo!",
                            text: resp.message,
                            icon: "success",
                         
                        }).then(function(isConfirm) {

                            window.location.href = "<?=base_url() ?>login"


                        });

                        // swal(resp.message)

                     } else {
                       swal(resp.message)
                     }
                 },
                 error: function (data) {
                    swal('Ocorreu um erro temporário.');
                     console.log(data);
                 },
            });


        }
    

           
        

    })


        
    </script>

    <!-- Footer -->
</body>
</html>