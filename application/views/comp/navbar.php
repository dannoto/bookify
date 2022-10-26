<?php if (!$this->session->userdata('session_user')) { ?>
    <div class="navbar">
      
        </div>

<?php } else {?>

    <div class="navbar">
        <!-- Desktop -->
        <div class="xl:block hidden">

            <nav class="grid xl:grid-cols-3  justify-content-between p-3">

            <form action="<?=base_url()?>busca" method="GET">
		
				<div class="xl:col-span-1  flex" style="
    width: 90%;
">
                    <input style="margin-right:0px;width:80%" type="text" name="q"  required  value="" class="border border-gray-200 p-2" placeholder="O que está procurando?">
                    <button class="bg-greenDefault text-white px-2 " >
                        <i style="font-size:20px" class="fa fa-search ml-2 mr-2"></i>
                    </button>
                </div>
			</form>
            <div class="flex xl:col-span-1">
                <ul  class="flex space-x-5">
                    <li>
                        <a href="<?=base_url()?>catalogo">
                            <span>Catálogo</span>
                        </a>
                    </li>
                    <li >
                        <a class="ml-5" href="<?=base_url()?>biblioteca">
                            <span>Minha Biblioteca</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="grid xl:col-span-1 grid-cols-3">
                <div class="col-span-1"></div>
                <div class="flex col-span-2 space-x-4">
                    <div>
                        <a href="<?=base_url()?>conta/perfil">
                            <span><?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_name']?> <?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_surname']?></span>
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>conta/perfil">
                            <img style="height: 45px;width:45px;border-radius :100px;object-fit:cover" src="<?=base_url()?>assets/img/avatar/<?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_image']?>" alt="">
                        </a>
                    </div>
                    <div class="col-span-1">
                        <a href="<?=base_url()?>sair">
                            <i style="font-size: 35px;" title="Sair" class="fa fa-sign-out ml-3 text-black"></i>
                        </a>
                    </div>
                </div>
                

            </div>


            

            </nav>
        </div>
        <!-- Desktop -->


        <!-- Mobile -->
       <div class="xl:hidden block">
          
                
        
                
                <div class="grid grid-cols-5  flex justify-items-center m-3">
                    
                    <div class="col-span-1" style="cursor:pointer">
                        <a href="<?=base_url()?>carrinho">
                            <i class="text-white fal fa-shopping-cart"></i>
                        </a>
                    </div>
                    <div class="col-span-3">
                            <a href="<?=base_url()?>">
                                <img style="height: 40px;width:40px;border-radius :100px;object-fit:cover" src="<?=base_url()?>assets/img/logo.png" class="navbar-logo" style="object-fit:cover" alt="">
                            </a>
                    </div>
                    <div class="col-span-1" style="cursor:pointer" onclick="toggleNav()" >
                        <i class="text-white text-orange fal fa-user-circle "></i>
                    </div>

                </div>
          
       </div>
        <!-- Mobile -->
    </div>
<?php } ?>