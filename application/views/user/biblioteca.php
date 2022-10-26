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
                <h1 class="font-semibold ebook-title mt-5">Minha Biblioteca</h1>
                <p>Seu lugar preferido.</p>
            </div>
            <div class="xl:col-span-2 catalogo-right grid place-items-center">
                <ul class="flex xl:pt-12 xl:flex hidden">
                    <li class=" xl:ml-12 <?php if ($this->input->get('classificacao') == "todos" || !$this->input->get('classificacao')) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>biblioteca?classificacao=todos">
                            TODOS
                        </a>
                    </li>
                    <li class=" xl:ml-12 <?php if ($this->input->get('classificacao') == "concluidos" ) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>biblioteca?classificacao=concluidos">
                            CONCLUÍDOS
                        </a>
                    </li>
                    <li class=" xl:ml-12 <?php if ($this->input->get('classificacao') == "andamento" ) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>biblioteca?classificacao=andamento">
                            EM ANDAMENTO
                        </a>
                    </li>
                 
                </ul>

                <ul class="grid xl:col-span-1 pt-5 xl:pt-12 xl:hidden submenu_mobile">
                    <li class=" submenu_mobile_item  xl:ml-12 <?php if ($this->input->get('classificacao') == "todos" || !$this->input->get('classificacao')) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>biblioteca?classificacao=todos">
                            TODOS
                        </a>
                    </li>
                    <li class=" submenu_mobile_item xl:ml-12 <?php if ($this->input->get('classificacao') == "concluidos" ) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>biblioteca?classificacao=concluidos">
                            CONCLUÍDOS
                        </a>
                    </li>
                    <li class=" submenu_mobile_item xl:ml-12 <?php if ($this->input->get('classificacao') == "andamnto" ) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>biblioteca?classificacao=andamento">
                            EM ANDAMENTO
                        </a>
                    </li>
                 
                </ul>
            </div>
        </div>
    </section>

        <section class="xl:mt-5 xl:m-0 m-3 mt-8 xl:pt-5  xl:mb-5">

            <div class=" xl:ml-3 xl:mr-32 grid mt-5 xl:grid-cols-3 grid-cols-3 biblioteca">
                <div class="col-span-1 grid xl:place-items-center">
                    <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 4.png" alt="">
                        </a>
                </div>
                <div class="col-span-2  ">
                    <h1 class="xl:mt-0 xl:mt-5 xl:text-left ">O PROCESSO - FRANZ KAFKA </h1>
                    <p class="line-clamp-3">Neste clássico romance de Franz Kafka, o protagonista, Josef K,. funcionário exemplar de um banco, no dia em que completa 30 anos, é acordado em seu quarto de pensão por dois guardas que o informam que ele está detido e sendo processado, sem revelar o motivo.</p>
                    <div class="mt-8">
                        <button class=" border bg-greenDefault p-2 xl:px-12 flex justify-center">
                            <img  class="biblioteca-icon-img"  src="<?=base_url()?>assets/img/icons/play-circle.png" alt="">
                            <span class="text-white ml-5 pt-1 xl:pt-0">CONTINUAR</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class=" xl:ml-3 xl:mr-32 grid mt-5 xl:grid-cols-3 grid-cols-3 biblioteca">
                <div class="col-span-1 grid xl:place-items-center">
                    <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 6.png" alt="">
                        </a>
                </div>
                <div class="col-span-2  ">
                    <h1 class="xl:mt-0 xl:mt-5 xl:text-left ">O PROCESSO - FRANZ KAFKA </h1>
                    <p class="line-clamp-3">Neste clássico romance de Franz Kafka, o protagonista, Josef K,. funcionário exemplar de um banco, no dia em que completa 30 anos, é acordado em seu quarto de pensão por dois guardas que o informam que ele está detido e sendo processado, sem revelar o motivo.</p>
                    <div class="mt-8">
                        <button class=" border bg-greenDefault p-2 xl:px-12 flex justify-center">
                            <img  class="biblioteca-icon-img"  src="<?=base_url()?>assets/img/icons/play-circle.png" alt="">
                            <span class="text-white ml-5 pt-1 xl:pt-0">CONTINUAR</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class=" xl:ml-3 xl:mr-32 grid mt-5 xl:grid-cols-3 grid-cols-3 biblioteca">
                <div class="col-span-1 grid xl:place-items-center">
                    <a href="<?=base_url()?>ebook/detalhes/123">
                            <img src="<?=base_url()?>assets/img/ebooks/Imagem 8.png" alt="">
                        </a>
                </div>
                <div class="col-span-2  ">
                    <h1 class="xl:mt-0 xl:mt-5 xl:text-left ">O PROCESSO - FRANZ KAFKA </h1>
                    <p class="line-clamp-3">Neste clássico romance de Franz Kafka, o protagonista, Josef K,. funcionário exemplar de um banco, no dia em que completa 30 anos, é acordado em seu quarto de pensão por dois guardas que o informam que ele está detido e sendo processado, sem revelar o motivo.</p>
                    <div class="mt-8">
                        <button class=" border bg-greenDefault p-2 xl:px-12 flex justify-center">
                            <img  class="biblioteca-icon-img"  src="<?=base_url()?>assets/img/icons/play-circle.png" alt="">
                            <span class="text-white ml-5 pt-1 xl:pt-0">CONTINUAR</span>
                        </button>
                    </div>
                </div>
            </div>
           
        </section>

        <div class="mt-12 grid place-items-center">
                <div class="flex pagination">
                    <div class="pagination-item" >ANTERIOR</div>
                    <div class="pagination-item pagination-item-active" >1</div>
                    <div class="pagination-item" >2</div>
                    <div class="pagination-item" >3</div>
                    <div class="pagination-item" >PRÓXIMO</div>
                </div>
            </div>




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