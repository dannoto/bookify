<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $ebook['ebook_title'] ?></title>

    <?php $this->load->view('comp/css'); ?>
</head>
<style>
    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content/Box */
    /* .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
    } */

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }



    /* Modal Header */
    .modal-header {
        padding: 15px 16px;
        /* background-color: #5cb85c; */
        color: #171717;
        font-weight: bold;
        font-size: 18px;
    }

    @media(max-width:900px) {
        .modal-header {
            padding: 15px 16px;
            /* background-color: #5cb85c; */
            color: #171717;
            font-weight: bold;
            font-size: 18px;
        }
    }


    /* Modal Body */
    .modal-body {
        padding: 2px 16px;
    }

    /* Modal Footer */
    .modal-footer {
        padding: 2px 16px;
        background-color: #5cb85c;
        color: white;
    }

    /* Modal Content */


    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 40% !important;
        margin: 5% auto;

        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    @media(max-width:900px) {
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 90% !important;
            margin: 5% auto;

            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            animation-name: animatetop;
            animation-duration: 0.4s
        }
    }


    /* Add Animation */
    @keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }
</style>

<style>
    .time {
        font-size: 20px;
    }

    p,
    h3 {

        color: #FFFF;
    }

    h3 {
        font-size: 28px;
    }


    button::before {
        content: attr(data-title);
        position: absolute;
        display: none;
        right: 0;
        top: -50px;
        background-color: orange;
        color: #fff;
        font-weight: bold;
        padding: 4px 6px;
        word-break: keep-all;
        white-space: pre;
    }

    button:hover::before {
        display: inline-block;
    }
</style>

<body>

    <?php $this->load->view('comp/navbar'); ?>

    <main style="display:none;">
        <section class=" " style="background-color: #171717;height:auto;">

            <div class="grid grid-cols-3 xl:hidden block">
                <div class="col-span-1 xl:col-span-1  xl:hidden block">
                    <center>
                        <a href="<?= base_url() ?>ebook/detalhes/<?= $ebook['id'] ?>">
                            <button data-toggle="modal" class="mt-8 flex" data-target="#exampleModal">
                                <i style="font-size:18px;color:#FFF;margin-right:15px" class="fa pt-1 fa-chevron-left"></i>
                                <p style="font-size:18px;">VOLTAR</p>
                            </button>
                        </a>
                    </center>
                </div>
                <div class="col-span-2 xl:col-span-1  xl:hidden block">
                    <center>
                        <button class="flex mt-8 myBtn">
                            <i style="font-size:18px;color:#FFF;margin-right:15px" class="fa pt-1 fa-bars"></i>
                            <p style="font-size:18px;">LISTA DE CAPÍTULOS</p>
                        </button>
                    </center>
                </div>
            </div>
            <div class="grid xl:grid-cols-4  grid-cols-1">
                <div class="col-span-1 xl:col-span-1 xl:block hidden ">
                    <center>
                        <a href="<?= base_url() ?>ebook/detalhes/<?= $ebook['id'] ?>">
                            <button data-toggle="modal" class="mt-8 flex" data-target="#exampleModal">
                                <i style="font-size:18px;color:#FFF;margin-right:15px" class="fa pt-1 fa-chevron-left"></i>
                                <p style="font-size:18px;">VOLTAR</p>
                            </button>
                        </a>
                    </center>
                </div>
                <div class="col-span-1 xl:col-span-2 xl:m-1 m-3 ">

                    <center>
                        <h3 style="font-size: 20px;font-weight:bold" class="font-center mt-8 line-clamp-1" title="<?= $ebook['ebook_title'] ?>"> <?= $ebook['ebook_title'] ?></h3>
                        <p class="line-clamp-1 mb-3 " title="<?= $chapter['chapter_title'] ?> - <?= $audio['audio_title'] ?>"><?= $chapter['chapter_title'] ?> - <?= $audio['audio_title'] ?></p>
                    </center>

                    <?php if (count($this->audio_model->getAudioImages($audio['id'])) == 0) { ?>

                        <div class="xl:m-8">
                            <!-- <img src="http://localhost/bookify//assets/img/ebooks/6ea9ab1baa0efb9e19094440c317e21b/default.png" alt=""> -->
                            <img style="width: 80%;height: 300px;min-height: 300px;max-height:300px;object-fit:contain;margin-left:10%;margin-right:10%" src="<?= base_url() ?><?= $ebook['ebook_image'] ?>" alt="">

                        </div>

                    <?php } else { ?>

                        <div class="owl-carousel  carousel">
                            <?php foreach ($this->audio_model->getAudioImages($audio['id']) as $f) { ?>
                                <div>
                                    <img style="width: 80%;height: 300px;min-height: 300px;max-height:300px;object-fit:contain;margin-left:10%;margin-right:10%" src="<?= base_url() ?><?= $f->image_file ?>" alt="">

                                </div>
                            <?php } ?>
                        </div>

                    <?php } ?>

                    <div class="grid xl:grid-cols-1 place-items-end mt-5" style="width: 80%;margin-left:10%;margin-right:10%">
                        <div class="time">
                            <time id="time-elapsed" class="text-white">00:00</time>
                            <span style="color:#FFF"> / </span>
                            <time id="duration" class="text-white">00:00</time>
                        </div>
                    </div>
                    <div class="video-progress mt-3" style="width: 80%;margin-left:10%;margin-right:10%">
                        <progress id="progress-bar" style="width: 100%;color:#FFF;background-color:#FFF" value="0" min="0"></progress>
                        <input class="seek" style="display:none ;" id="seek" value="0" min="0" type="range" step="1">
                        <div class="seek-tooltip" style="display:none ;" id="seek-tooltip">00:00</div>
                    </div>

                    <div class="grid place-items-center mt-5" style="margin-bottom:100px">
                        <div class="flex space-x-5">
                            <?php if ($previous != "-1") { ?>
                                <a href="<?= base_url() ?>play/u/<?= $ebook['id'] ?>?s=<?= $previous ?>">
                                    <button>
                                        <img src="<?=basE_url()?>assets/img/icons/btn-previous.png" width="30" height="30" alt="">
                                    </button>
                                </a>
                            <?php } ?>

                            <button data-title="Play (k)" id="play">
                                <!-- <svg class="playback-icons">
                            <use href="#play-icon"></use>
                            <use class="hidden" href="#pause"></use>
                        </svg> -->
                                <div class="playback-icon">
                                    <use id="button-play">
                                        <!-- <i style="font-size:25px;color:#FFF;" class="fa fa-pause"></i> -->
                                        <img src="<?=basE_url()?>assets/img/icons/btn-pause.png" width="30" height="30" alt="">

                                    </use>
                                    <use id="button-pause" style="display:none ;">
                                        <!-- <i style="font-size:25px;color:#FFF;" class="fa fa-play"></i> -->
                                        <img src="<?=basE_url()?>assets/img/icons/btn-play.png" width="30" height="30" alt="">

                                    </use>
                                </div>

                            </button>
                            <?php if ($next != "-1") { ?>
                                <a href="<?= base_url() ?>play/u/<?= $ebook['id'] ?>?s=<?= $next ?>">
                                    <button>
                                    <img src="<?=basE_url()?>assets/img/icons/btn-next.png" width="30" height="30" alt="">
                                    </button>
                                </a>
                            <?php } ?>
                        </div>
                    </div>





                    <div class="mt-5">
                        <video controls autoplay class="video" id="video" preload="metadata" poster="poster.jpg">
                            <source src="<?= base_url() ?><?= $audio['audio_file'] ?>" type="video/mp4">
                            </source>
                        </video>
                    </div>

                </div>
                <div class="col-span-1 xl:col-span-1 xl:block hidden ">
                    <center>
                        <button class="flex mt-8 myBtn">
                            <i style="font-size:18px;color:#FFF;margin-right:15px" class="fa pt-1 fa-bars"></i>
                            <p style="font-size:18px;">LISTA DE CAPÍTULOS</p>
                        </button>
                    </center>
                </div>
            </div>

            <div class="row"></div>


        </section>
    </main>
    <div id="loadingMask" class="grid place-items-center" style="width: 100%; height: 100%; position: fixed;">
        <img src="<?= base_url() ?>assets/img/design/loading.gif" alt="">
    </div>


    <div id="myModal" class="modal">

        <!-- Modal content -->
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>LISTA DE CAPÍTULOS</h2>
            </div>
            <div class="modal-body">
                <?php if (count($this->chapter_model->getChaptersByEbook($ebook['id'])) > 0) { ?>

                    <?php $count = 0 ?>
                    <?php foreach ($this->chapter_model->getChaptersByEbook($ebook['id']) as $e) { ?>
                        <?php $count++ ?>

                        <div class="mt-1 chapter" id="<?= $e->id ?>" <?php if ($e->id == $chapter['id']) {
                                                                            echo "style='cursor: pointer;'";
                                                                        } else {
                                                                            echo "style='cursor: pointer;'";
                                                                        } ?>>
                            <div class="border border-primary   row">
                                <div class="col-md-9">
                                    <div class="d-block align-items-left p-2 ">
                                        <small style="font-size: 10px"><?= $count ?> CAPÍTULO </small>
                                        <h5 title="<?= ucfirst($e->chapter_title) ?>" class="line-clamp-1"><?= ucfirst($e->chapter_title) ?></h5>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="audio-<?= $e->id ?> " <?php if ($e->id == $chapter['id']) {
                                                                echo "block";
                                                            } else {
                                                                echo "hidden";
                                                            } ?>>
                            <?php foreach ($this->audio_model->getAudiosByChapters($e->id) as $f) { ?>
                                <div class="mt-3 ml-5" <?php if ($f->id == $audio['id']) {
                                                            echo "style='cursor: pointer;border:1px solid green'";
                                                        } else {
                                                            echo "style='cursor: pointer;'";
                                                        } ?>>
                                    <div class="border border-primary row">
                                        <a href="<?= base_url() ?>play/u/<?= $ebook['id'] ?>?s=<?= $f->id ?>">
                                            <div class="col-md-8 flex">
                                                <!-- <div class="d-block align-items-left p-2 ">
                                                <i class="fa fa-play pt-5"></i>
                                            </div> -->
                                                <div class="d-block align-items-left p-2 ">
                                                    <small style="font-size: 10px"> AÚDIO - <?= $this->chapter_model->convertMinutes(round($f->audio_duration, 2)) ?> minutos</small>
                                                    <h5 title="<?= ucfirst($f->audio_title) ?>" class="line-clamp-1"><?= ucfirst($f->audio_title) ?></h5>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    <?php } ?>

                <?php } else {  ?>

                    <div class="mt-3">
                        <div class="border border-primary  bg-yellow-500 row">
                            <div class="col-md-12">
                                <p class="text-center center mt-3">NENHUM CAPÍTULO CRIADO.</p>

                            </div>
                        </div>
                    </div>


                <?php } ?>
                <br>
            </div>
            <!-- <div class="modal-footer">
                <h3>Modal Footer</h3>
            </div> -->
        </div>

    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.maskMoney.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>

    <script>
  $(document).ready( function() {

    $('main').css('display','block')
    // $('loading').css('display','none')

    // $('#loadingMask').fadeOut();
});
</script>
    <!-- Modal -->
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        // var btn = $('.myBtn')


        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        // btn.onclick = function() {
        // }
        $('.myBtn').on('click', function(e) {
            modal.style.display = "block";
        })

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script>
        $(document).ready(function(e) {
            const video = document.getElementById('video');

            // video.play()

        })
    </script>
    <!-- <script>
    $(".tickets-quantity").on('click','li',function (){
                    alert($(this).text());
    });


  


    function toggleNav() {
        const nav = document.getElementById("sideNav")
        if (nav.style.width == "0px") {
          nav.style.width = "90%"
          nav.style.display = "block"
        } else {
          nav.style.width = "0px"
          nav.style.display = "none"
        }
    }

</script> -->
    <script>
        // Select elements here
        const video = document.getElementById('video');
        const videoControls = document.getElementById('video-controls');

        const videoWorks = !!document.createElement('video').canPlayType;
        if (videoWorks) {
            video.controls = false;
            video.classList.add('hidden');
        }
    </script>

    <script>
        const playButton = document.getElementById('play');
        // Add functions here

        // togglePlay toggles the playback state of the video.
        // If the video playback is paused or ended, the video is played
        // otherwise, the video is paused
        function togglePlay() {
            if (video.paused || video.ended) {
                video.play();

                $('#button-pause').css('display', 'none');
                $('#button-play').css('display', 'block');

            } else {
                video.pause();

                $('#button-pause').css('display', 'block');
                $('#button-play').css('display', 'none');
            }
        }
        // Add eventlisteners here
        playButton.addEventListener('click', togglePlay);
    </script>
    <script>
        $(document).ready(function() {


            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                loop: false,
                navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],


                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
        });
    </script>

    <script>
        const playbackIcons = document.querySelectorAll('.playback-icons use');
        // updatePlayButton updates the playback icon and tooltip
        // depending on the playback state
        function updatePlayButton() {
            playbackIcons.forEach(icon => icon.classList.toggle('hidden'));
        }
        video.addEventListener('play', updatePlayButton);
        video.addEventListener('pause', updatePlayButton);

        function updatePlayButton() {
            playbackIcons.forEach(icon => icon.classList.toggle('hidden'));

            if (video.paused) {
                playButton.setAttribute('data-title', 'Play (k)')
            } else {
                playButton.setAttribute('data-title', 'Pause (k)')
            }
        }
    </script>

    <script>
        const timeElapsed = document.getElementById('time-elapsed');
        const duration = document.getElementById('duration');

        // formatTime takes a time length in seconds and returns the time in
        // minutes and seconds
        function formatTime(timeInSeconds) {
            const result = new Date(timeInSeconds * 1000).toISOString().substr(11, 8);

            return {
                minutes: result.substr(3, 2),
                seconds: result.substr(6, 2),
            };
        };


        // initializeVideo sets the video duration, and maximum value of the
        // progressBar
        function initializeVideo() {
            const videoDuration = Math.round(video.duration);
            seek.setAttribute('max', videoDuration);
            progressBar.setAttribute('max', videoDuration);
            const time = formatTime(videoDuration);
            duration.innerText = `${time.minutes}:${time.seconds}`;
            duration.setAttribute('datetime', `${time.minutes}m ${time.seconds}s`)
        }

        video.addEventListener('loadedmetadata', initializeVideo);

        // updateTimeElapsed indicates how far through the video
        // the current playback is
        function updateTimeElapsed() {
            const time = formatTime(Math.round(video.currentTime));
            timeElapsed.innerText = `${time.minutes}:${time.seconds}`;
            timeElapsed.setAttribute('datetime', `${time.minutes}m ${time.seconds}s`)

            var progress = (video.currentTime / video.duration) * 100

            if (progress > 80) {

                $.ajax({

                    method: 'POST',
                    url: '<?= base_url() ?>play/addProgress',
                    data: {
                        progress_ebook: "<?= $ebook['id'] ?>",
                        progress_chapter: "<?= $chapter['id'] ?>",
                        progress_audio: "<?= $audio['id'] ?>",
                        progress_user: "<?=$this->session->userdata('session_user')['id']?>"
                    },
                    success: function(data) {
                        console.log(data)
                    }
                })

                if (progress == '100') {
                    var next = "<?= $next ?>";

                    if (next == "-1") {
                        // alert('acabou')
                    } else {
                        window.location.href = "<?= base_url() ?>play/u/<?= $ebook['id'] ?>?s=<?= $next ?>";
                    }
                }


            } else {
                console.log(progress)
            }
        }

        // updateProgress indicates how far through the video
        // the current playback is by updating the progress bar
        function updateProgress() {
            seek.value = Math.floor(video.currentTime);
            progressBar.value = Math.floor(video.currentTime);
        }

        video.addEventListener('timeupdate', updateTimeElapsed);
        video.addEventListener('timeupdate', updateProgress);

        const progressBar = document.getElementById('progress-bar');
        const seek = document.getElementById('seek');
    </script>
    <!-- <script>
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
                                window.location.href = "<?= base_url() ?>planos"
                            } else {
                                // window.location.href = "<?= base_url() ?>planos"
                            }


                        });

                    } else if (resp.status == "false") {

                        swal({
                            title: "Ops!",
                            text: resp.message,
                            icon: "success",

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
    </script> -->

    <!-- SCript Ahead -->
    <script>
        const seekTooltip = document.getElementById('seek-tooltip');
        // updateSeekTooltip uses the position of the mouse on the progress bar to
        // roughly work out what point in the video the user will skip to if
        // the progress bar is clicked at that point
        function updateSeekTooltip(event) {
            const skipTo = Math.round((event.offsetX / event.target.clientWidth) * parseInt(event.target.getAttribute('max'), 10));
            seek.setAttribute('data-seek', skipTo)
            const t = formatTime(skipTo);
            seekTooltip.textContent = `${t.minutes}:${t.seconds}`;
            const rect = video.getBoundingClientRect();
            seekTooltip.style.left = `${event.pageX - rect.left}px`;
        }
        seek.addEventListener('mousemove', updateSeekTooltip);

        // skipAhead jumps to a different point in the video when
        // the progress bar is clicked
        function skipAhead(event) {
            const skipTo = event.target.dataset.seek ? event.target.dataset.seek : event.target.value;
            video.currentTime = skipTo;
            progressBar.value = skipTo;
            seek.value = skipTo;
        }

        seek.addEventListener('input', skipAhead);
    </script>

    <script>
        $('.chapter').on('click', function(e) {
            var audio = $(this).attr('id')
            var state = $('.audio-' + audio).css('display');

            if (state == "none") {
                $('.audio-' + audio).css('display', 'block');
            } else {
                $('.audio-' + audio).css('display', 'none');
            }
        })
    </script>
</body>

</html>