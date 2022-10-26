<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta - Perfil</title>
   
    <?php $this->load->view('comp/css');?>
</head>


<body>

<?php $this->load->view('comp/navbar');?>

    <section class="">

        <div class=" grid xl:grid-cols-3 grid-cols-1">
                <div class="xl:col-span-1 ">

                    <div class="m-3">
                        <h1 class="ebook-title">Configurações</h1>

                    </div>
                    <div class="xl:col-span-2 catalogo-right grid place-items-center">
                    

                        <ul class="grid xl:col-span-1 pt-5 xl:pt-12 xl:grid submenu_mobile">
                                <li class="submenu_mobile_item xl:ml-12 <?php if ($this->input->get('classificacao') == base_url()."conta/perfil" || !$this->input->get('classificacao')) { echo " catalogo-active" ; } ?>">
                                    <a href="<?=base_url()?>conta/perfil">
                                        PERFIL
                                    </a>
                                </li>
                                <li class="submenu_mobile_item xl:ml-12 <?php if ($this->input->get('classificacao') ==  base_url()."conta/seguranca" ) { echo " catalogo-active" ; } ?>">
                                    <a href="<?=base_url()?>conta/seguranca">
                                        SEGURANÇA
                                    </a>
                                </li>
                                <li class="submenu_mobile_item xl:ml-12 <?php if ($this->input->get('classificacao') ==  base_url()."conta/assinatura" ) { echo " catalogo-active" ; } ?>">
                                    <a href="<?=base_url()?>conta/assinatura">
                                        ASSINATURA
                                    </a>
                                </li>
                        </ul>
                    </div>
                </div>
                <div class="xl:col-span-2 conta-perfil xl:mr-48 xl:ml-48 m-5">
                <div class="grid place-items-center conta-perfil-imagem">
                <div>
                    <img style="height: 150px;width:150px;border-radius :100px;" src="<?=base_url()?>assets/img/avatar/<?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_image']?>" alt="">
                </div>
                <div>
                    <p class="font-semibold text-greenDefault mt-5 mb-5 pointer" id="btn-update-image" style="cursor:pointer;">ALTERAR FOTO</p>
                </div>
                </div>
                <form action="<?=base_url()?>conta/actupdateimage" method="POST" enctype="multipart/form-data" id="form-update-image">
                    <input type="file" class="hidden" accept="image/*" id="input-update-image" name="user_image">
                    <!-- <button type="submit">ENVIAR</button> -->
                </form>
                <form action="" id="form-update-perfil">

                <div class=" grid xl:grid-cols-2 grid-cols-1">
                    <div class="xl:col-span-1 xl:pr-3">
                        <input required  value="<?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_name']?>" name="user_name" type="text">
                    </div>
                    <div class="xl:col-span-1">
                        <input required value="<?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_surname']?>" name="user_surname" type="text">
                    </div>
                </div>

                <div>
                    <input required name="user_email" value="<?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_email']?>" type="email">
                </div>

                <div class="mt-5 mb-3">
                    <h1 class="font-semibold" style="font-size: 18px;">ENDEREÇO</h1>
                </div>
                <div>
                    <input  placeholder="Logradouro"  name="user_street" value="<?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_street']?>"  type="text">
                </div>

                <div class=" grid xl:grid-cols-2 grid-cols-1">
                    <div class="xl:col-span-1 xl:pr-3">
                        <input  placeholder="Estado" name="user_state" value="<?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_state']?>"  type="text">
                    </div>
                    <div class="xl:col-span-1">
                        <input placeholder="Cidade" name="user_city" value="<?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_city']?>"  type="text">
                    </div>
                </div>
                <div class=" grid xl:grid-cols-2 grid-cols-1">
                    <div class="xl:col-span-1 xl:pr-3">
                        <input placeholder="Bairro" name="user_district" value="<?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_district']?>" type="text">
                    </div>
                    <div class="xl:col-span-1">
                        <input placeholder="CEP" name="user_cep" value="<?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_cep']?>" type="text">
                    </div>
                </div>
                <div class="conta-perfil-btn mt-3 mb-12">
                    <button class="bg-greenDefault text-white font-semibol px-5">SALVAR</button>
                </div>
                </div>

        </div>
    

        </form>
    </section>

    <?php $this->load->view('comp/js');?>

    <script>
        $('#btn-update-image').on('click', function(e){
            $('#input-update-image').click();
        })
    </script>
     <script>
        $('#input-update-image').on('change', function(e){
            $("#form-update-image").submit();
            // $("#form-update-image").submit(function(e) {
            //     e.preventDefault();    
            //     var formData = $("#form-update-image").serialize()
            
            //     $.ajax({
            //         method: 'POST',
            //         url: '<?=base_url() ?>conta/actupdateimage',
            //         data: formData,
            //         success: function (data) {
            //             var resp = JSON.parse(data)

            //             if (resp.status == "true") {
            //                 swal(resp.message)
            //             } else {
            //                 swal(resp.message)
            //             }
            //         },
            //         error: function (data) {
            //             swal('Ocorreu um erro temporário.');
            //         },
            //         cache: false,
            //         contentType: false,
            //         processData: false
            //     });
            // })
        })
    </script>

    <script>
            $('#form-update-perfil').submit(function(e) {

                e.preventDefault()

                $.ajax({
                    method: 'POST',
                    url: '<?=base_url() ?>conta/actupdatePerfil',
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
                    },
                    
                });
            })

        </script>
</body>
</html>