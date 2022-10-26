<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Prícipe - Maqiável</title>
   
    <?php $this->load->view('comp/css');?>
</head>


<body>

<?php $this->load->view('comp/navbar');?>


    <section class="mt-8">
        <div class="grid xl:grid-cols-6 grid-cols-1 xl:ml-24 xl:mr-24">
            <div class="xl:col-span-2 col-span-1 grid place-items-center">
                <img class="ebook-image" src="<?=base_url()?>assets/img/ebooks/imagem 15.png" alt="">
            </div>
            <div class="xl:col-span-4 col-span-1 xl:m-1 m-3">
                <div class="xl:mb-8 xl:mt-0 mt-3 mb-5">
                    <h1 class="ebook-title line-clamp-1">O PRÍNCIPE - MAQUIÁVEL</h1>
                </div>
                <div class="mb-8">
                    <p>O Príncipe, escrito por Nicolau Maquiavel em 1513, tornou-se um dos livros mais lidos da história da humanidade. Descrevendo estratégias que um príncipe deveria adotar para conquistar e manter o poder, foi um marco da ciência política na modernidade. As lições de ...</p>
                </div>
                <div class="grid grid-cols-2 ebook-info space-y-3 mt-5">
                    <div class="flex">
                        <div class="">
                            <img class="ebook-icon" src="<?=base_url()?>assets/img/icons/time_icon.png" alt="">
                        </div>
                        <div class="ml-3">
                            <p class="text-black font-semibold uppercase">Tempo de Duração</p>
                            <p class="text-greenDefault font-semibold uppercase">3:24:23</p>
                        </div>
                    </div>
                    <div class="flex">
                        <div>
                            <img class="ebook-icon" src="<?=base_url()?>assets/img/icons/person_icon.png" alt="">
                        </div>
                        <div  class="ml-3">
                            <p class="text-black font-semibold uppercase">Autor</p>
                            <p class="text-greenDefault font-semibold uppercase">Jason Lauritsen</p>
                        </div>
                    </div>
                    <div class="flex">
                        <div>
                            <img class="ebook-icon" src="<?=base_url()?>assets/img/icons/book_icon.png" alt="">
                        </div>
                        <div  class="ml-3">
                            <p class="text-black font-semibold uppercase">Capítulos</p>
                            <p class="text-greenDefault font-semibold uppercase">35</p>
                        </div>
                    </div>
                    <div class="flex">
                        <div >
                            <img class="ebook-icon" src="<?=base_url()?>assets/img/icons/copyright_icon.png" alt="">
                        </div>
                        <div  class="ml-3">
                            <p class="text-black font-semibold uppercase">Editora</p>
                            <p class="text-greenDefault font-semibold uppercase">Ubk Publish</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8 grid place-items-center">
                    <button  class="ebook-btn ebook-add-biblioteca  p-2 px-5">
                        <i class="fa fa-plus"></i>
                        <span class="text-black">ADICIONAR NA BIBLIOTECA</span>
                    </button>
                </div>
                <div class="mt-3 grid place-items-center">
                    <button class="ebook-btn border bg-greenDefault p-2 px-12 flex">
                        <img width="30" height="30" src="<?=base_url()?>assets/img/icons/play-circle.png" alt="">
                        <span class="text-white ml-2">COMEÇAR A OUVIR</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="xl:mt-12 xl:m-0 m-3 mt-8 xl:pt-12  xl:mb-12">
        <div class=" xl:ml-24 xl:mr-24">
            <h1 class="ebook-title " >VOCÊ TAMBÉM VAI GOSTAR</h1>

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
            
            </div>
        </div>
    </section>


    <?php $this->load->view('comp/js');?>


    <script>

        $('.ebook-add-biblioteca').on('click', function(e){
            swal('Adicionado na sua biblioteca.')
        })
    </script>

    
</body>
</html>