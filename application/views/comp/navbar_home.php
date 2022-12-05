  <?php if ($this->session->userdata('session_user')) { ?>

      <div class="navbar">
          <!-- Desktop -->
          <div class="xl:block hidden">

              <nav class="grid xl:grid-cols-3  justify-content-between p-3">

                  <form action="<?= base_url() ?>busca" method="GET">

                      <div class="xl:col-span-1  flex" style="
        width: 90%;
    ">
                          <input style="margin-right:0px;width:80%" type="text" name="ebook_title" required value="" class="border border-gray-200 p-2" placeholder="O que está procurando?">
                          <button class="bg-greenDefault text-white px-2 ">
                              <i style="font-size:20px" class="fa fa-search ml-2 mr-2"></i>
                          </button>
                      </div>
                  </form>
                  <div class="flex xl:col-span-1">
                      <ul class="flex space-x-5">
                          <li>
                              <a href="<?= base_url() ?>catalogo">
                                  <span>Catálogo</span>
                              </a>
                          </li>
                          <li>
                              <a class="ml-5" href="<?= base_url() ?>biblioteca">
                                  <span>Minha Biblioteca</span>
                              </a>
                          </li>

                      </ul>
                  </div>

                  <div class="grid xl:col-span-1 grid-cols-3">
                      <div class="col-span-1"></div>
                      <div class="flex col-span-2 space-x-4" style="
        margin-left: 90px;
    ">
                          <div>
                              <a href="<?= base_url() ?>conta/perfil">
                                  <span><?= $this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_name'] ?> <?= $this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_surname'] ?></span>
                              </a>
                          </div>
                          <div>
                              <a href="<?= base_url() ?>conta/perfil">
                                  <img style="height: 45px;width:45px;border-radius :100px;object-fit:cover" src="<?= base_url() ?>assets/img/avatar/<?= $this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_image'] ?>" alt="">
                              </a>
                          </div>
                          <!-- <div class="col-span-1">
                            <a href="<?= base_url() ?>sair">
                                <i style="font-size: 35px;" title="Sair" class="fa fa-sign-out ml-3 text-black"></i>
                            </a>
                        </div> -->
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
                          <img style="height: 40px;max-height: 40px;width:150px;max-width:150px;object-fit:contain" src="<?= base_url() ?>assets/img/design/logo.png" alt="">
                      </div>
                      <div class="col-span-1">
                          <i id="btn-navbar" class="ml-12 mt-1 fa fa-bars"></i>
                      </div>
                  </div>

                  <div id="div-navbar" style="display:none">
                      <ul class="block bg-greenDefault text-white space-y-3">
                          <li class="menu_li pt-3">
                              <a href="<?= base_url() ?>catalogo">
                                  <span>Catálogo</span>
                              </a>
                          </li>
                          <li class="menu_li">
                              <a href="<?= base_url() ?>biblioteca">
                                  <span>Biblioteca</span>
                              </a>
                          </li>
                          <li class="menu_li">
                              <a href="<?= base_url() ?>busca">
                                  <span>Buscar</span>
                              </a>
                          </li>
                          <hr>
                          <li class="menu_li">
                              <a href="<?= base_url() ?>conta/perfil">
                                  <span>Perfil</span>
                              </a>
                          </li>
                          <li class="menu_li">
                              <a href="<?= base_url() ?>conta/seguranca">
                                  <span>Segurança</span>
                              </a>
                          </li>
                          <li class="menu_li pb-3">
                              <a href="<?= base_url() ?>conta/assinatura">
                                  <span>Assinaturas</span>
                              </a>
                          </li>
                          <hr>
                          <li class="menu_li pb-3">
                              <a href="<?= base_url() ?>sair">
                                  <span>Sair</span>
                              </a>
                          </li>

                      </ul>
                  </div>


              </nav>
          </div>
          <!-- Mobile -->
      </div>
  <?php } else { ?>

      <div class="navbar nav_home">

          <!-- Desktop -->
          <div class="xl:block hidden">

              <nav class="grid xl:grid-cols-6 justify-content-between mt-2 mb-2 p-3">
                  <div class="grid xl:col-span-1 manu_logo ">
                      <a href="<?= base_url() ?>">
                          <img class="xl:ml-12" src="<?= base_url() ?>assets/img/design/<?= $config['design_logo_short'] ?>" alt="">

                      </a>
                  </div>

                  <?php $actual_link = $_SERVER['REQUEST_URI'] ?>
                  <div class="flex xl:col-span-3 ">
                      <ul class="flex space-x-12">
                          <li class="menu_li  <?php if (strpos($actual_link, '/home') !== false) {
                                                    echo "menu_li_active";
                                                } ?>">
                              <a href="<?= base_url() ?>home">
                                  <span>Home</span>
                              </a>
                          </li>
                          <li class="menu_li <?php if (strpos($actual_link, '/catalogo') !== false) {
                                                    echo "menu_li_active";
                                                } ?>">
                              <a href="<?= base_url() ?>catalogo">
                                  <span>Catálogo</span>
                              </a>
                          </li>
                          <li class="menu_li <?php if (strpos($actual_link, '/planos') !== false) {
                                                    echo "menu_li_active";
                                                } ?>">
                              <a href="<?= base_url() ?>planos">
                                  <span>Planos</span>
                              </a>
                          </li>
                          <li class="menu_li <?php if (strpos($actual_link, '/ajuda') !== false) {
                                                    echo "menu_li_active";
                                                } ?>">
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
                          <i id="btn-navbar" class="ml-8 mt-1 fa fa-bars"></i>
                      </div>
                  </div>

                  <div id="div-navbar"  class="mt-3" style="display:none">
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
  <?php } ?>