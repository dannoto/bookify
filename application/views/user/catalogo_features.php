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
            <form action="" method="GET">
			<div class="xl:col-span-1 catalogo-left">
                <p class="mt-5 xl:mb-1 mb-3">Busque por um termo</p>
				<div class="xl:col-span-1  flex">
                <input type="text" name="q"  required style="width: 100%;" value="" class="border border-gray-200 p-2" placeholder="O que está procurando?">
				<button class="bg-greenDefault text-white px-2" >
					<i class="fa fa-search ml-3 mr-3"></i>
				</button>
			</div>
			</form>
            </div>
            <div class="xl:col-span-2 catalogo-right grid place-items-center">
                <ul class="flex xl:pt-12 xl:flex hidden">
                    <li class=" xl:ml-12 <?php if ($this->input->get('classificacao') == "todos" || !$this->input->get('classificacao')) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>busca?classificacao=todos">
                            TODOS
                        </a>
                    </li>
                    <li class=" xl:ml-12 <?php if ($this->input->get('classificacao') == "pagos"){ echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>busca?classificacao=pagos">
                            PAGOS
                        </a>
                    </li>
                    <li class=" xl:ml-12 <?php if ($this->input->get('classificacao') == "gratuitos" ) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>busca?classificacao=gratuitos">
                            GRATUITOS
                        </a>
                    </li>
                 
                </ul>

                <ul class="grid xl:col-span-1 pt-5 xl:pt-12 xl:hidden submenu_mobile">
                    <li class=" submenu_mobile_item  xl:ml-12 <?php if ($this->input->get('classificacao') == "todos" || !$this->input->get('classificacao')) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>busca?classificacao=todos">
                            TODOS
                        </a>
                    </li>
                    <li class=" submenu_mobile_item xl:ml-12 <?php if ($this->input->get('pagos') == "pagos" ) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>busca?classificacao=pagos">
                            PAGOS
                        </a>
                    </li>
                    <li class=" submenu_mobile_item xl:ml-12 <?php if ($this->input->get('classificacao') == "gratuitos" ) { echo " catalogo-active" ; } ?>">
                        <a href="<?=base_url()?>busca?classificacao=gratuitos">
							GRATUITOS
                        </a>
                    </li>
                 
                </ul>
            </div>
        </div>
    </section>
	<section class="xl:mt-5 xl:m-0 m-3 mt-8 xl:pt-5  xl:mb-5">
		
		<div class=" xl:ml-24 xl:mr-24">
		<?php if ($this->input->get('q')) { ?>
		<div>
		<h1 class="font-semibold ebook-title mt-5">Resultados para <span class="text-greenDefault font-semibold">"<?=$this->input->get('q')?>"</span></h1>

		</div>
		<?php } ?>
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