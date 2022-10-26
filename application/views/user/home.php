<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookify - Expanda seu conhecimento.</title>
   
    <?php $this->load->view('comp/css');?>
</head>


<body>

<?php $this->load->view('comp/navbar_home');?>


    
    <section>
        <div class="grid xl:grid-cols-2 grid-cols-1 header  xl:place-items-center">
            <div class="xl:col-span-1 col-span-1 xl:ml-12 xl:mr-12 ml-5 mr-5 header-right ">
                <!-- <div class="grid place-items-center"> -->
                    <img style="width:240px;height:80px;object-fit:cover" class="xl:mt-20 mt-8 xl:mb-5" src="<?=base_url()?>assets/img/logo_green.png" alt="">
                <!-- </div> -->
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's .</p>
                <form action="<?=base_url()?>registro" method="GET">
                <div class="flex xl:mt-5 xl:mb-5 mt-8">
                   
                    <input type="email" type="email" required name="user_email" placeholder="Seu e-mail">
                    <button type="submit"> <i class="fa fa-arrow-right"></i></button>
                    
                </div>
                </form>
                <div class="grid xl:grid-cols-2 mt-12 grid-cols-2 xl:mr-16 xl:ml-16 header-lojas">
                    <div  class="xl:col-span-1 col-span-1">
                        <img style="object-fit:cover ;" src="<?=base_url()?>assets/img/icons/apple-icon.png" alt="">
                    </div>
                    <div  class="xl:col-span-1 col-span-1">
                        <img style="object-fit:cover ;" src="<?=base_url()?>assets/img/icons/playstore-icon.png" alt="">
                    </div>
                </div>
            </div>
            <div class="xl:col-span-1 bg-blackgroundDefault col-span-1 header-left hidden xl:block">
                <img style="background-attachment:fixed"  src="<?=base_url()?>assets/img/icons/background.png" alt="">
            </div>
        </div>
    </section>

    <section class="xl:mt-12 xl:m-0 m-3 mt-8 xl:pt-12  xl:mb-8">
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

    <section class="xl:mt-3 xl:m-0 m-3 mt-8 xl:pt-3  xl:mb-12">
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



    <section class="mt-12">
        <div class="grid place-items-center mb-12">
            <h1 class="ebook-title " >CONHEÇA NOSSOS PLANOS</h1>
            
        </div>
        <div class="grid xl:grid-cols-3 grid-cols-1 home-plano">
            <div class="xl:col-span-1 col-span-1 grid place-items-center  xl:mt-0 mt-5 m-3">
                <div class="home-plano-div">
                    <div>
                        <div class="bg-yellowDefault home-plano-breadcumb grid place-items-center">
                            <p>PLANO MENSAL</p>
                        </div>
                        <p class="line-clamp-3 home-plano-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <div class="grid place-items-center">
                            <ul class="mt-3 mb-3">
                                <li><i class="text-greenDefault fa fa-plus"></i> ITEM 1</li>
                                <li><i class="text-greenDefault fa fa-plus"></i> ITEM 2</li>
                                <li><i class="text-greenDefault fa fa-plus"></i> ITEM 3</li>
                            </ul>
                        </div>
                        <div class="grid place-items-center mb-5">
                            <span class="home-plano-currency">R$<span class="home-plano-preco">39,90</span></span>
                        </div>
                    </div>
                    <div class="home-plano-assinar-btn">
                        <button class="bg-greenDefault ">ASSINAR</button>
                    </div>
                </div>
            </div>
            <div class="xl:col-span-1 col-span-1 grid place-items-center  m-3">
                <div class="home-plano-div home-plano-best ">
                    <div>
                        <div class="bg-yellowDefault home-plano-breadcumb grid place-items-center">
                            <p>PLANO TRIMESTRAL</p>
                        </div>
                        <p class="line-clamp-3 home-plano-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <div class="grid place-items-center">
                            <ul class="mt-3 mb-3">
                                <li><i class="text-greenDefault fa fa-plus"></i> ITEM 1</li>
                                <li><i class="text-greenDefault fa fa-plus"></i> ITEM 2</li>
                                <li><i class="text-greenDefault fa fa-plus"></i> ITEM 3</li>
                            </ul>
                        </div>
                        <div class="grid place-items-center mb-5">
                            <span class="home-plano-currency">R$<span class="home-plano-preco">19,90</span></span>
                        </div>
                    </div>
                    <div class="home-plano-assinar-btn">
                        <button class="bg-greenDefault ">ASSINAR</button>
                    </div>
                </div>
            </div>
            <div class="xl:col-span-1 col-span-1 grid place-items-center xl:mt-0 mt-5 m-3">
                <div class="home-plano-div">
                    <div>
                        <div class="bg-yellowDefault home-plano-breadcumb grid place-items-center">
                            <p>PLANO ANUAL</p>
                        </div>
                        <p class="line-clamp-3 home-plano-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <div class="grid place-items-center">
                            <ul class="mt-3 mb-3">
                                <li><i class="text-greenDefault fa fa-plus"></i> ITEM 1</li>
                                <li><i class="text-greenDefault fa fa-plus"></i> ITEM 2</li>
                                <li><i class="text-greenDefault fa fa-plus"></i> ITEM 3</li>
                            </ul>
                        </div>
                        <div class="grid place-items-center mb-5">
                            <span class="home-plano-currency">R$<span class="home-plano-preco">9,90</span></span>
                        </div>
                    </div>
                    <div class="home-plano-assinar-btn">
                        <button class="bg-greenDefault ">ASSINAR</button>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <section class="mt-12 mb-12">
        <div class="grid place-items-center mb-5">
            <h1 class="ebook-title " >AINDA COM DÚVIDAS?</h1>
        </div>
        <div class=" xl:ml-48 ml-5 mr-5 xl:mr-48">
            <h1 class="faq-title bmb-5 " >Assinaturas</h1>
            <div class="faq-container">
                <div class="faq-one">
                    <!-- faq question -->
                    <h1 class="faq-page text-white font-normal uppercase line-clamp-1">What is an FAQ Page?</h1>
                    <!-- faq answer -->
                    <div class="faq-body">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                            necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                            aperiam.
                            Perspiciatis, porro!</p>
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-one">
                    <!-- faq question -->
                    <h1 class="faq-page text-white font-normal uppercase line-clamp-1">What is an FAQ Page?</h1>
                    <!-- faq answer -->
                    <div class="faq-body">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                            necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                            aperiam.
                            Perspiciatis, porro!</p>
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-one">
                    <!-- faq question -->
                    <h1 class="faq-page text-white font-normal uppercase line-clamp-1">What is an FAQ Page?</h1>
                    <!-- faq answer -->
                    <div class="faq-body">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                            necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                            aperiam.
                            Perspiciatis, porro!</p>
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-one">
                    <!-- faq question -->
                    <h1 class="faq-page text-white font-normal uppercase">What is an FAQ Page?</h1>
                    <!-- faq answer -->
                    <div class="faq-body">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                            necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                            aperiam.
                            Perspiciatis, porro!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class=" xl:ml-48 ml-5 mr-5 xl:mr-48">
            <h1 class="faq-title mb-5 " >Pagamentos</h1>
            <div class="faq-container">
                <div class="faq-one">
                    <!-- faq question -->
                    <h1 class="faq-page text-white font-normal uppercase line-clamp-1">What is an FAQ Page?</h1>
                    <!-- faq answer -->
                    <div class="faq-body">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                            necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                            aperiam.
                            Perspiciatis, porro!</p>
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-one">
                    <!-- faq question -->
                    <h1 class="faq-page text-white font-normal uppercase line-clamp-1">What is an FAQ Page?</h1>
                    <!-- faq answer -->
                    <div class="faq-body">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                            necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                            aperiam.
                            Perspiciatis, porro!</p>
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-one">
                    <!-- faq question -->
                    <h1 class="faq-page text-white font-normal uppercase line-clamp-1">What is an FAQ Page?</h1>
                    <!-- faq answer -->
                    <div class="faq-body">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                            necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                            aperiam.
                            Perspiciatis, porro!</p>
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-one">
                    <!-- faq question -->
                    <h1 class="faq-page text-white font-normal uppercase">What is an FAQ Page?</h1>
                    <!-- faq answer -->
                    <div class="faq-body">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                            necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                            aperiam.
                            Perspiciatis, porro!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class=" xl:ml-48 ml-5 mr-5 xl:mr-48">
            <h1 class="faq-title mb-5" >Usabilidade</h1>
            <div class="faq-container">
                <div class="faq-one">
                    <!-- faq question -->
                    <h1 class="faq-page text-white font-normal uppercase line-clamp-1">What is an FAQ Page?</h1>
                    <!-- faq answer -->
                    <div class="faq-body">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                            necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                            aperiam.
                            Perspiciatis, porro!</p>
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-one">
                    <!-- faq question -->
                    <h1 class="faq-page text-white font-normal uppercase line-clamp-1">What is an FAQ Page?</h1>
                    <!-- faq answer -->
                    <div class="faq-body">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                            necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                            aperiam.
                            Perspiciatis, porro!</p>
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-one">
                    <!-- faq question -->
                    <h1 class="faq-page text-white font-normal uppercase line-clamp-1">What is an FAQ Page?</h1>
                    <!-- faq answer -->
                    <div class="faq-body">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                            necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                            aperiam.
                            Perspiciatis, porro!</p>
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-one">
                    <!-- faq question -->
                    <h1 class="faq-page text-white font-normal uppercase">What is an FAQ Page?</h1>
                    <!-- faq answer -->
                    <div class="faq-body">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                            necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                            aperiam.
                            Perspiciatis, porro!</p>
                    </div>
                </div>
            </div>
        </div>

        
    </section>


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