<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Prícipe - Maqiável</title>

    <?php $this->load->view('comp/css'); ?>
</head>


<body>

    <?php $this->load->view('comp/navbar'); ?>


    <section class="mt-8">
        <div class="grid xl:grid-cols-6 grid-cols-1 xl:ml-24 xl:mr-24">
            <div class="xl:col-span-2 col-span-1 ">
                <center>
                    <img style="width: 100%;height: 450px;min-height: 450px;max-height:450px;object-fit:cover" class="ebook-image" src="<?= base_url() ?><?= $ebook['ebook_image'] ?>" alt="">
                </center>
            </div>
            <div class="xl:col-span-4 col-span-1 xl:m-1 m-3">
                <div class="xl:mb-8 xl:mt-0 mt-3 mb-5">
                    <h1 class="ebook-title line-clamp-1 text-uppercase"><?= $ebook['ebook_title'] ?></h1>
                </div>
                <div class="mb-8">
                    <p><?= $ebook['ebook_description'] ?></p>
                </div>
                <div class="grid grid-cols-2 ebook-info space-y-3 mt-5">
                    <div class="flex ">
                        <div class="">
                            <img class="ebook-icon" style="width: 50px;height:50px;object-fit:contain" src="<?= base_url() ?>assets/img/icons/time_icon.png" alt="">
                        </div>
                        <div class="ml-3">
                            <p class="text-black font-semibold uppercase">Tempo de Duração</p>
                            <p class="text-greenDefault font-semibold uppercase"><?= $this->ebook_model->getHours($ebook['ebook_duration']) ?></p>
                        </div>
                    </div>
                    <div class="flex ">
                        <div>
                            <img class="ebook-icon" style="width: 50px;height:50px;object-fit:contain" src="<?= base_url() ?>assets/img/icons/person_icon.png" alt="">
                        </div>
                        <div class="ml-3">
                            <p class="text-black font-semibold uppercase">Autor</p>
                            <p class="text-greenDefault font-semibold uppercase"><?= $ebook['ebook_author'] ?></p>
                        </div>
                    </div>
                    <div class="flex  ">
                        <div>
                            <img class="ebook-icon" style="width: 50px;height:50px;object-fit:contain" src="<?= base_url() ?>assets/img/icons/book_icon.png" alt="">
                        </div>
                        <div class="ml-3">
                            <p class="text-black font-semibold uppercase">Capítulos</p>
                            <p class="text-greenDefault font-semibold uppercase"><?= $ebook['ebook_chapter'] ?></p>
                        </div>
                    </div>
                    <div class="flex ">
                        <div>
                            <img class="ebook-icon" style="width: 50px;height:50px;object-fit:contain" src="<?= base_url() ?>assets/img/icons/copyright_icon.png" alt="">
                        </div>
                        <div class="ml-3">
                            <p class="text-black font-semibold uppercase">Editora</p>
                            <p class="text-greenDefault font-semibold uppercase">Ubk Publish</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8 grid place-items-center">
                    <button class="ebook-btn ebook-add-biblioteca  p-2 px-5">
                        <i class="fa fa-plus"></i>
                        <span class="text-black">ADICIONAR NA BIBLIOTECA</span>
                    </button>
                </div>
                <div class="mt-3 grid place-items-center">
                    <a href="<?= base_url() ?>play/<?= $ebook['id'] ?>">
                        <button class="ebook-btn border bg-greenDefault p-2 px-12 flex">
                            <img width="30" height="30" src="<?= base_url() ?>assets/img/icons/play-circle.png" alt="">
                            <span class="text-white ml-2">COMEÇAR A OUVIR</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>



    <?php if (count($this->ebook_model->getEbooksByRelated($ebook['id'], $ebook['ebook_category'])) > 0) { ?>

        <section class="xl:mt-12 xl:m-0 m-3 mt-8 xl:pt-8  xl:mb-12">
            <div class=" xl:ml-24 xl:mr-24">
                <h4 class="ebook-title ">VOCÊ TAMBÉM VAI GOSTAR</h4>

                <div class="owl-carousel mt-8 carousel">

                    <?php foreach ($this->ebook_model->getEbooksByRelated($ebook['id'], $ebook['ebook_category']) as $f) { ?>
                        <div>
                            <a href="<?= base_url() ?>ebook/detalhes/<?= $f->id ?>">
                                <img style="width: 100%;height: 300px;min-height: 300px;max-height:300px;object-fit:cover" src="<?= base_url() ?><?= $f->ebook_image ?>" alt="">
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

    <?php } else { ?>
    <?php  } ?>



    <?php $this->load->view('comp/js'); ?>


    <script>
        $('.ebook-add-biblioteca').on('click', function(e) {
            swal('Adicionado na sua biblioteca.')
        })
    </script>


</body>

</html>