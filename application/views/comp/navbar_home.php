    <div class="navbar nav_home">
        <!-- Desktop -->
        <div class="xl:block hidden">

            <nav class="grid xl:grid-cols-6 justify-content-between mt-2 mb-2 p-3">
                <div class="grid xl:col-span-1 manu_logo ">
                    <a href="<?= base_url() ?>">
                        <img class="xl:ml-12" src="<?= base_url() ?>assets/img/design/<?=$config['design_logo_short']?>" alt="">

                    </a>
                </div>

                <div class="flex xl:col-span-3 ">
                    <ul class="flex space-x-12">
                        <li class="menu_li menu_li_active">
                            <a href="<?= base_url() ?>home">
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="menu_li">
                            <a href="<?= base_url() ?>catalogo">
                                <span>Catálogo</span>
                            </a>
                        </li>
                        <li class="menu_li">
                            <a href="<?= base_url() ?>planos">
                                <span>Planos</span>
                            </a>
                        </li>
                        <li class="menu_li">
                            <a href="<?= base_url() ?>ajuda">
                                <span>Ajuda</span>
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="grid xl:col-span-2 place-items-end ">
                    <div>
                        <a href="<?= base_url() ?>registro">
                            <button class="px-5">CRIAR CONTA</button>
                        </a>

                        <a href="<?= base_url() ?>login">
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
                    <img class="xl:ml-12" src="<?= base_url() ?>assets/img/icons/logo_simbolo.png" alt="">
                </div>

                <!-- <div class="flex xl:col-span-3 ">
        <ul  class="flex space-x-12">
            <li  class="menu_li menu_li_active">
                <a href="<?= base_url() ?>home">
                    <span>Home</span>
                </a>
            </li>
            <li  class="menu_li">
                <a href="<?= base_url() ?>catelogo">
                    <span>Catálogo</span>
                </a>
            </li>
            <li  class="menu_li">
                <a href="<?= base_url() ?>planos">
                    <span>Planos</span>
                </a>
            </li>
            <li  class="menu_li">
                <a href="<?= base_url() ?>ajuda">
                    <span>Ajuda</span>
                </a>
            </li>

        </ul>
    </div> -->

                <div class="grid xl:col-span-2 place-items-end ">
                    <div>
                        <a href="<?= base_url() ?>registro">
                            <button class="px-5">CRIAR CONTA</button>
                        </a>

                        <a href="<?= base_url() ?>login">
                            <button class="px-5 ml-8 mr-8">ENTRAR</button>
                        </a>
                    </div>
                </div>

            </nav>
        </div>
        <!-- Mobile -->
    </div>

