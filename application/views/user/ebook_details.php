<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $ebook['ebook_title'] ?></title>

    <?php $this->load->view('comp/css'); ?>
</head>


<body>

    <?php $this->load->view('comp/navbar'); ?>

    <main style="display:none;">

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
                                <p class="text-greenDefault font-semibold uppercase"><?php echo count($this->chapter_model->getChaptersByEbook($ebook['id'])); ?></p>
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
                    <?php if (isset($this->session->userdata('session_user')['id'])) { ?>

                        <?php if ($this->library_model->isLibrary($ebook['id'], $this->session->userdata('session_user')['id'])) { ?>
                            <div class="mt-8 grid place-items-center">
                                <button class="ebook-btn ebook-remove-biblioteca  p-2 px-5">
                                    <i class="fa fa-close"></i>
                                    <span class="text-black">REMOVER DA BIBLIOTECA</span>
                                </button>
                            </div>
                        <?php } else { ?>
                            <div class="mt-8 grid place-items-center">
                                <button class="ebook-btn ebook-add-biblioteca  p-2 px-5">
                                    <i class="fa fa-plus"></i>
                                    <span class="text-black">ADICIONAR NA BIBLIOTECA</span>
                                </button>
                            </div>
                        <?php } ?>
                        <div class="mt-3 grid place-items-center">
                            <a href="<?= base_url() ?>play/u/<?= $ebook['id'] ?>">

                                <?php if ($this->audio_model->getProgressCurrent($ebook['id']) > 0) { ?>
                                    <button class="ebook-btn border bg-greenDefault p-2 px-8 flex justify-content-center">

                                        <img width="30" class="ml-10" height="30" src="<?= base_url() ?>assets/img/icons/play-circle.png" alt="">
                                        <span class="text-white ml-3">CONTINUAR </span>
                                    </button>

                                <?php } else { ?>
                                    <button class="ebook-btn border bg-greenDefault p-2 px-12 flex">
                                        <img width="30" height="30" src="<?= base_url() ?>assets/img/icons/play-circle.png" alt="">
                                        <span class="text-white ml-2">COMEÇAR A OUVIR</span>
                                    </button>
                                <?php } ?>

                            </a>
                        </div>
                    <?php } else { ?>

                        <div class="mt-8 grid place-items-center">
                            <a href="<?= base_url() ?>login">
                                <button class="ebook-btn ebook-add-biblioteca  p-2 px-5">
                                    <i class="fa fa-plus"></i>
                                    <span class="text-black">ADICIONAR NA BIBLIOTECA</span>
                                </button>
                            </a>
                        </div>
                        <div class="mt-3 grid place-items-center">
                            <a href="<?= base_url() ?>login">

                                <button class="ebook-btn border bg-greenDefault p-2 px-12 flex">
                                    <img width="30" height="30" src="<?= base_url() ?>assets/img/icons/play-circle.png" alt="">
                                    <span class="text-white ml-2">COMEÇAR A OUVIR</span>
                                </button>
                            </a>

                        </div>


                    <?php } ?>


                </div>
            </div>
        </section>



        <?php if (count($this->ebook_model->getEbooksByRelated($ebook['id'], $ebook['ebook_category'])) > 0) { ?>

            <section class="xl:mt-12 xl:m-0 m-3 mt-8 xl:pt-8  xl:mb-12">
                <div class=" xl:ml-24 xl:mr-24">
                    <h4 class="ebook-title " style="font-size:25px;">VOCÊ TAMBÉM VAI GOSTAR</h4>

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


    </main>
    <div id="loadingMask" class="grid place-items-center" style="width: 100%; height: 100%; position: fixed;">
        <img src="<?= base_url() ?>assets/img/design/loading.gif" alt="">
    </div>

    <?php $this->load->view('comp/js'); ?>


    <script>
        $('.ebook-add-biblioteca').on('click', function(e) {

            var library_id = null
            var ebook_id = "<?= $ebook['id'] ?>"
            var ebook_user = "<?= $this->session->userdata('session_user')['id']; ?>"

            // swal('Adicionado na sua biblioteca.')

            $.ajax({

                method: 'POST',
                url: '<?= base_url() ?>biblioteca/actaddlibrary',
                data: {
                    ebook_id: ebook_id,
                    ebook_user: ebook_user
                },
                success: function(data) {

                    var resp = JSON.parse(data)

                    if (resp.status == "true") {

                        swal({
                            title: "Feito!",
                            text: resp.message,
                            icon: "success",

                        }).then(function(isConfirm) {

                            if (isConfirm) {
                                location.reload()
                            } else {
                                location.reload()
                            }


                        });

                    } else if (resp.status == "upgrade") {

                        swal({
                            title: "Opss!",
                            text: resp.message,
                            icon: "warning",
                            buttons: [
                                'SAIR',
                                'FAZER UPGRADE !'
                            ],
                            dangerMode: true,

                        }).then(function(isConfirm) {

                            if (isConfirm) {
                                window.location.href = "<?= base_url() ?>planos?action=upgrade&type=library"
                            } else {
                                // window.location.href = "<?= base_url() ?>planos"
                            }


                        });

                    } else if (resp.status == "false") {

                        swal({
                            title: "Ops!",
                            text: resp.message,
                            icon: "warning",

                        }).then(function(isConfirm) {



                        });

                    } else {
                        swal('Ocorreu um erro temporário. ');

                    }


                },
                error: function(data) {
                    swal('Ocorreu um erro temporário. ');
                },

            });
        })

        $('.ebook-remove-biblioteca').on('click', function(e) {

            var library_id = null
            var ebook_id = "<?= $ebook['id'] ?>"
            var ebook_user = "<?= $this->session->userdata('session_user')['id']; ?>"

            // swal('Adicionado na sua biblioteca.')

            $.ajax({

                method: 'POST',
                url: '<?= base_url() ?>biblioteca/actremovelibrary',
                data: {
                    ebook_id: ebook_id,
                    ebook_user: ebook_user
                },
                success: function(data) {

                    var resp = JSON.parse(data)

                    if (resp.status == "true") {

                        swal({
                            title: "Feito!",
                            text: resp.message,
                            icon: "success",

                        }).then(function(isConfirm) {

                            if (isConfirm) {
                                location.reload()
                            } else {
                                location.reload()
                            }


                        });

                    } else if (resp.status == "upgrade") {

                        swal({
                            title: "Opss!",
                            text: resp.message,
                            icon: "warning",
                            buttons: [
                                'SAIR',
                                'FAZER UPGRADE !'
                            ],
                            dangerMode: true,

                        }).then(function(isConfirm) {

                            if (isConfirm) {
                                window.location.href = "<?= base_url() ?>planos?action=upgrade&type=library"
                            } else {
                                // window.location.href = "<?= base_url() ?>planos"
                            }


                        });

                    } else if (resp.status == "false") {

                        swal({
                            title: "Ops!",
                            text: resp.message,
                            icon: "warning",

                        }).then(function(isConfirm) {



                        });

                    } else {
                        swal('Ocorreu um erro temporário. ');

                    }


                },
                error: function(data) {
                    swal('Ocorreu um erro temporário. ');
                },

            });
        })
    </script>


</body>

</html>