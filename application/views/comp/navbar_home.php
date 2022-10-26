<?php if (!$this->session->userdata('session_user')) { ?>
<div class="navbar nav_home">
        <!-- Desktop -->
        <div class="xl:block hidden">

            <nav class="grid xl:grid-cols-6 justify-content-between p-3">
                <div class="grid xl:col-span-1 manu_logo ">
                    <a href="<?=base_url()?>">
                    <img class="xl:ml-12" src="<?=base_url()?>assets/img/icons/logo_simbolo.png" alt="">

                    </a>
                </div>

                <div class="flex xl:col-span-3 ">
                    <ul  class="flex space-x-12">
                        <li  class="menu_li menu_li_active">
                            <a href="<?=base_url()?>home">
                                <span>Home</span>
                            </a>
                        </li>
                        <li  class="menu_li">
                            <a href="<?=base_url()?>catalogo">
                                <span>Catálogo</span>
                            </a>
                        </li>
                        <li  class="menu_li">
                            <a href="<?=base_url()?>planos">
                                <span>Planos</span>
                            </a>
                        </li>
                        <li  class="menu_li">
                            <a href="<?=base_url()?>ajuda">
                                <span>Ajuda</span>
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="grid xl:col-span-2 place-items-end ">
                    <div>
                    <a href="<?=base_url()?>cadastro">
                        <button class="px-5">CRIAR CONTA</button>
                    </a>

                        <a href="<?=base_url()?>login">
                            <button class="px-5 ml-8 mr-8">ENTRAR</button>
                        </a>
                    </div>
                </div>
           
            </nav>
        </div>
        <!-- Desktop -->


        <!-- Mobile -->
        <div class="xl:hidden block">

<nav class="grid xl:grid-cols-6 justify-content-between p-3">
    <div class="grid xl:col-span-1 manu_logo ">
        <img class="xl:ml-12" src="<?=base_url()?>assets/img/icons/logo_simbolo.png" alt="">
    </div>

    <!-- <div class="flex xl:col-span-3 ">
        <ul  class="flex space-x-12">
            <li  class="menu_li menu_li_active">
                <a href="<?=base_url()?>home">
                    <span>Home</span>
                </a>
            </li>
            <li  class="menu_li">
                <a href="<?=base_url()?>catelogo">
                    <span>Catálogo</span>
                </a>
            </li>
            <li  class="menu_li">
                <a href="<?=base_url()?>planos">
                    <span>Planos</span>
                </a>
            </li>
            <li  class="menu_li">
                <a href="<?=base_url()?>ajuda">
                    <span>Ajuda</span>
                </a>
            </li>

        </ul>
    </div> -->

    <div class="grid xl:col-span-2 place-items-end ">
        <div>
        <a href="<?=base_url()?>cadastro">
            <button class="px-5">CRIAR CONTA</button>
        </a>

            <a href="<?=base_url()?>login">
                <button class="px-5 ml-8 mr-8">ENTRAR</button>
            </a>
        </div>
    </div>

</nav>
</div>
        <!-- Mobile -->
    </div>

<?php } else {?>

    <div class="navbar">
        <!-- Desktop -->
        <div class="xl:block hidden">

            <div class="m-5 grid xl:grid-cols-5 mt-5 ">
            
                <div class="xl:col-span-3">
                    <a href="<?=base_url()?>">
                        <img src="<?=base_url()?>assets/img/logo.png" class="navbar-logo" alt="">
                    </a>
                </div>
            
                <div class="xl:col-span-2 flex">
                    <div class="ml-5">
                        <a href="<?=base_url()?>vencedores">
                            <p class="text-white font-bold text-xl">Vencedores</p>
                        </a>
                    </div>
                    <div class="ml-8">
                        <a href="<?=base_url()?>login">
                            <p class="text-white font-bold text-xl">Login</p>
                        </a>
                    </div>
                    <div class="ml-16 -mt-2" style="cursor:pointer">
                        <a href="<?=base_url()?>registro">
                            <button class="text-white px-5 font-semibold py-3 bg-orange" style="border-radius:33px ;">Registrar-se</button>
                        </a>
                    </div>
                 

                </div>
            </div>
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
                                <img src="<?=base_url()?>assets/img/logo.png" class="navbar-logo" style="object-fit:cover" alt="">
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