<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Recuperação</title>
    <?php $this->load->view('comp/css');?>
</head>

<style>

.form-login {
            width:60% ;
        }

    @media(max-width:900px) {


        .form-login {
            width:80% !important;
        }

    } 

      
    
</style>
<body class="bg-dark">


    <section>
        <div class="grid xl:grid-cols-2 grid-cols-1">
            <div style="height:100vh" class="xl:col-span-1  col-span-1">


                <div class="  login ">
                    <div class="m-3"> 
                    <img style="width:150px;height:50px;object-fit:cover" src="<?=base_url()?>assets/img/design/logo.png" alt="">
                    </div>
                    <div class="grid place-items-center">
                        <div class="form-login">
                            <form action="" class="mt-20" id="form-recovery" >
                                <div>
                                    <h2 style="font-size:30px" class="text-black text-xl font-semibold">Recuperação</h2>
                                    <p class="text-black text-md mt-2 mb-2 font-norma">Insira seu e-mail para recuperar sua senha.</p>
                                </div>
                                <input style="border:1px solid #DFDFDF" maxlength="200" type="email" name="user_email" class="p-2" required placeholder="SEU E-MAIL">
                                <!-- <input style="border:1px solid #DFDFDF" maxlength="200" type="password" name="user_password" class="p-2 "  required placeholder="SUA SENHA"> -->
                                <div class="flex justify-items-end">
                               
                                </div>
                                <button class="bg-greenDefault text-white font-semibold">RECUPERAR</button>
        
                                <div class=" ">
                                    <p style="font-size:17px"  class="text-black text-md  mt-5 text-base mb-5">Voltar ao <a href="<?=base_url()?>login"><span class="text-greenDefault font-semibold"> Login </span></a></p>
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

        <?php $this->load->view('comp/js');?>
        <script>

    $('#form-recovery').submit(function(e) {

        e.preventDefault()
    

           
            $.ajax({
                 method: 'POST',
                 url: '<?=base_url() ?>recuperacao/sendRecoveryEmail',
                 data: $(this).serialize(),
                 success: function (data) {
                     var resp = JSON.parse(data)

                     if (resp.status == "true") {
                        swal(resp.message)
                     } else {
                       swal(resp.message)
                     }
                 },
                 error: function (data) {
                    swal('Ocorreu um erro temporário.');
                     console.log(data);
                 },
            });
        

    })


        
    </script>

    <!-- Footer -->
</body>
</html>