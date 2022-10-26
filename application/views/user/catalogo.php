<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo Bookify - Encontre seu audiobook preferido.</title>
   
    <?php $this->load->view('comp/css');?>
</head>


<body>

<?php $this->load->view('comp/navbar');?>


    
    <section class=" xl:ml-24 xl:mr-24 ml-3 mr-3 ">
        <div class="grid xl:grid-cols-3 place-items-between">
            <div class="xl:col-span-1 catalogo-left">
               <?php if ($this->session->userdata('session_user')) { ?>
                    <h1 class="font-semibold mt-5">Olá <?=$this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_name']?>!</h1>

                <?php } else { ?>
                    <h1 class="font-semibold mt-5">Olá, Bem-vindo!</h1>
                <?php } ?>
                <p>Explore nosso catálogo.</p>
            </div>
            <div class="xl:col-span-2 catalogo-right grid place-items-center">
                <ul class="flex xl:pt-12 xl:flex hidden">
                    <li class=" xl:ml-12 <?php if ($this->input->get('classificacao') == "todos" || !$this->input->get('classificacao')) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>catalogo?classificacao=todos">
                            TODOS
                        </a>
                    </li>
                    <li class=" xl:ml-12 <?php if ($this->input->get('classificacao') == "podcast" ) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>catalogo?classificacao=podcast">
                            PODCAST
                        </a>
                    </li>
                    <li class=" xl:ml-12 <?php if ($this->input->get('classificacao') == "lancamentos" ) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>catalogo?classificacao=lancamentos">
                            LANÇAMENTOS
                        </a>
                    </li>
                    <li class=" xl:ml-12 <?php if ($this->input->get('classificacao') == "bestsellers" ) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>catalogo?classificacao=bestsellers">
                            BEST-SELLERS
                        </a>
                    </li>
                </ul>

                <ul class="grid xl:col-span-1 pt-5 xl:pt-12 xl:hidden submenu_mobile">
                    <li class=" submenu_mobile_item  xl:ml-12 <?php if ($this->input->get('classificacao') == "todos" || !$this->input->get('classificacao')) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>catalogo?classificacao=todos">
                            TODOS
                        </a>
                    </li>
                    <li class=" submenu_mobile_item xl:ml-12 <?php if ($this->input->get('classificacao') == "podcast" ) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>catalogo?classificacao=podcast">
                            PODCAST
                        </a>
                    </li>
                    <li class=" submenu_mobile_item xl:ml-12 <?php if ($this->input->get('classificacao') == "lancamentos" ) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>catalogo?classificacao=lancamentos">
                            LANÇAMENTOS
                        </a>
                    </li>
                    <li class=" submenu_mobile_item xl:ml-12 <?php if ($this->input->get('classificacao') == "bestsellers" ) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>catalogo?classificacao=bestsellers">
                            BEST-SELLERS
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <?php if ($this->input->get('classificacao') == "todos" ||  !$this->input->get('classificacao'))  { ?>
        <section class="xl:mt-5 xl:m-0 m-3 mt-8 xl:pt-5  xl:mb-5">
            <div class=" xl:ml-24 xl:mr-24">
                <div class="flex justify-between">
                    <div>
                        <h1 class="ebook-title " >Em Alta</h1>
                    </div>
                    <div>
                        <a href="<?=base_url()?>/catalogo?classificacao=alta">
                            <small class="text-greenDefault">VER TODOS</small>
                        </a>
                    </div>
                </div>

                <div class="owl-carousel mt-8 carousel">
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 4.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 6.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 8.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 10.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 15.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 6.png" alt="">
                        </a>
                    </div>
                
                </div>
            </div>
        </section>

        <section class="xl:mt-3 xl:m-0 m-3 mt-8 xl:pt-3  xl:mb-5">
            <div class=" xl:ml-24 xl:mr-24">
                <div class="flex justify-between">
                    <div>
                        <h1 class="ebook-title " >Lançamentos</h1>
                    </div>
                    <div>
                        <a href="<?=base_url()?>/catalogo?classificacao=alta">
                            <small class="text-greenDefault">VER TODOS</small>
                        </a>
                    </div>
                </div>

                <div class="owl-carousel mt-8 carousel">
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 4.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 6.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 8.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 10.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 15.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 6.png" alt="">
                        </a>
                    </div>
                
                </div>
            </div>
        </section>

        <section class="xl:mt-3 xl:m-0 m-3 mt-8 xl:pt-3  xl:mb-5">
            <div class=" xl:ml-24 xl:mr-24">
            <div class="flex justify-between">
                    <div>
                        <h1 class="ebook-title " >Podcasts</h1>
                    </div>
                    <div>
                        <a href="<?=base_url()?>/catalogo?classificacao=gratuitos">
                            <small class="text-greenDefault">VER TODOS</small>
                        </a>
                    </div>
                </div>

                <div class="owl-carousel mt-8 carousel">
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 4.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 6.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 8.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 10.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 15.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 6.png" alt="">
                        </a>
                    </div>
                
                </div>
            </div>
        </section>
        
        <section class="xl:mt-3 xl:m-0 m-3 mt-8 xl:pt-3  xl:mb-5">
            <div class=" xl:ml-24 xl:mr-24">
            <div class="flex justify-between">
                    <div>
                        <h1 class="ebook-title " >Gratuitos</h1>
                    </div>
                    <div>
                        <a href="<?=base_url()?>/catalogo?classificacao=gratuitos">
                            <small class="text-greenDefault">VER TODOS</small>
                        </a>
                    </div>
                </div>

                <div class="owl-carousel mt-8 carousel">
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 4.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 6.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 8.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 10.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 15.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 6.png" alt="">
                        </a>
                    </div>
                
                </div>
            </div>
        </section>
    <?php } else { ?>

        <section class="xl:mt-5 xl:m-0 m-3 mt-8 xl:pt-5  xl:mb-5">
            <div class=" xl:ml-24 xl:mr-24">
                <div class="flex justify-between">
                    <div>
                    <?php if ($this->input->get('classificacao') == "podcast" )  { ?>
                        <h1 class="ebook-title " >Podcasts</h1>
                    <?php } else if ($this->input->get('classificacao') == "lancamentos") { ?>
                        <h1 class="ebook-title " >Lançamentos</h1>
                    <?php } else if ($this->input->get('classificacao') == "bestsellers") { ?>
                        <h1 class="ebook-title " >BestSellers</h1>
                    <?php } else if ($this->input->get('classificacao') == "alta") { ?>
                        <h1 class="ebook-title " >Em Alta</h1>

                    <?php } else if ($this->input->get('classificacao') == "gratuitos") { ?>
                        <h1 class="ebook-title " >Gratuitos</h1>



                    <?php } ?>


                    </div>
                    <div>
                        <!-- <a href="<?=base_url()?>/catalogo?classificacao=alta">
                            <small class="text-greenDefault">VER TODOS</small>
                        </a> -->
                    </div>
                </div>

                <div class="grid xl:grid-cols-5 grid-cols-2 mt-8 ">
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 4.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 6.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 8.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 10.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 15.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 6.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 8.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 10.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 15.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 6.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 6.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 8.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 10.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 15.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 6.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 6.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 8.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 10.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 15.png" alt="">
                        </a>
                    </div>
                    <div class="xl:col-span-1 mt-5 m-3" >
                        <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 6.png" alt="">
                        </a>
                    </div>
                
                </div>
            </div>

            <div class="mt-12 grid place-items-center">
                <div class="flex pagination">
                    <div class="pagination-item" >ANTERIOR</div>
                    <div class="pagination-item pagination-item-active" >1</div>
                    <div class="pagination-item" >2</div>
                    <div class="pagination-item" >3</div>
                    <div class="pagination-item" >PRÓXIMO</div>
                </div>
            </div>
        </section>

    <?php  } ?>




    <?php $this->load->view('comp/js');?>


    <script>

        $('.ebook-add-biblioteca').on('click', function(e){
            swal('Adicionado na sua biblioteca.')
        })
    </script>
    <script>
        var faq = document.getElementsByClassName("faq-page");
        var i;

        for (i = 0; i < faq.length; i++) {
            faq[i].addEventListener("click", function () {
                /* Toggle between adding and removing the "active" class,
                to highlight the button that controls the panel */
                this.classList.toggle("active");

                /* Toggle between hiding and showing the active panel */
                var body = this.nextElementSibling;
                if (body.style.display === "block") {
                    body.style.display = "none";
                } else {
                    body.style.display = "block";
                }
            });
        }
    </script>
    
</body>
</html>