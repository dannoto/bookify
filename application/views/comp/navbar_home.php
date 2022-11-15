    <div class="navbar nav_home">

        <!-- Desktop -->
        <div class="xl:block hidden">

            <nav class="grid xl:grid-cols-6 justify-content-between mt-2 mb-2 p-3">
                <div class="grid xl:col-span-1 manu_logo ">
                    <a href="<?= base_url() ?>">
                        <img class="xl:ml-12" src="<?= base_url() ?>assets/img/design/<?= $config['design_logo_short'] ?>" alt="">

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

            <nav class="p-3">
                <div class="grid grid-cols-5" style="width: 100%;">
                    <div class="col-span-4  ">
                        <a href="<?= base_url() ?>">
                            <img style="height: 40px;max-height: 40px;width:150px;max-width:150px;object-fit:contain" src="<?= base_url() ?>assets/img/design/logo.png" alt="">

                        </a>
                    </div>
                    <div class="col-span-1">
                        <i id="btn-navbar" class="ml-12 mt-1 fa fa-bars"></i>
                    </div>
                </div>

                <div id="div-navbar" style="display:none">
                    <ul class="block bg-greenDefault text-white space-y-3 mt-5">
                        <li class="menu_li pt-3 ">
                            <a href="<?= base_url() ?>login">
                                <span>Entrar</span>
                            </a>
                        </li>
                        <li class="menu_li">
                            <a href="<?= base_url() ?>registro">
                                <span>Criar Conta</span>
                            </a>
                        </li>
                        <li class="menu_li">
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
                            <a href="<?= base_url() ?>busca">
                                <span>Buscar</span>
                            </a>
                        </li>
                        <li class="menu_li">
                            <a href="<?= base_url() ?>planos">
                                <span>Planos</span>
                            </a>
                        </li>
                        <li class="menu_li pb-3">
                            <a href="<?= base_url() ?>ajuda">
                                <span>Ajuda</span>
                            </a>
                        </li>

                    </ul>
                </div>


            </nav>
        </div>
        <!-- Mobile -->

    </div>