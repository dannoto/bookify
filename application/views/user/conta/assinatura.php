<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta - Assinatura</title>

    <?php $this->load->view('comp/css'); ?>
</head>


<body>

    <?php $this->load->view('comp/navbar'); ?>

    <main style="display: none;">
        <section class="">
            <div class=" grid xl:grid-cols-3 grid-cols-1">
                <div class="xl:col-span-1 ">


                    <div class="xl:col-span-2 catalogo-right grid place-items-center xl:block hidden">


                        <ul class="grid xl:col-span-1 pt-5 xl:pt-12 xl:grid submenu_mobile">
                            <a href="<?= base_url() ?>conta/perfil">
                                <li style="height:50px;font-size:20px;padding-top:7px;font-weight:normal;border:1px solid #ddd;border-radius:0px;padding-left:18px" class="submenu_mobile_item xl:ml-12">
                                    PERFIL
                                </li>
                            </a>
                            <a href="<?= base_url() ?>conta/seguranca">
                                <li style="height:50px;font-size:20px;padding-top:7px;font-weight:normal;border:1px solid #ddd;border-radius:0px;padding-left:18px" class="submenu_mobile_item xl:ml-12 ">
                                    SEGURANÇA
                                </li>
                            </a>
                            <a href="<?= base_url() ?>conta/assinatura">
                                <li style="height:50px;font-size:20px;padding-top:7px;font-weight:normal;border:1px solid #ddd;border-radius:0px;padding-left:18px" class="submenu_mobile_item xl:ml-12 catalogo-active">
                                    ASSINATURA
                                </li>
                            </a>
                            <a href="<?= base_url() ?>sair">
                                <li style="height:50px;font-size:20px;padding-top:7px;font-weight:normal;border:1px solid #ddd;border-radius:0px;padding-left:18px" class="submenu_mobile_item xl:ml-12 ">
                                    SAIR
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="xl:col-span-2 conta-perfil xl:mr-48 xl:ml-48 m-5">

                    <div class="xl:mt-12 mt-5">
                        <h1 style="font-size:25px;" class="ebook-title text-green-500"><?= $plan['plan_name'] ?></h1>
                        <!-- <h3 class="text-uppercase text-green-500 font-semibold"></h3> -->
                        <p>R$ <?= $plan['plan_price'] ?> / <?php if ($plan['plan_type'] == 1) {
                                                                $plan['plan_type'] = "Mês";
                                                            } else if ($plan['plan_type'] == 4) {
                                                                $plan['plan_type'] = "Ano";
                                                            } else {
                                                                $plan['plan_type'] = "Mês";
                                                            }

                                                            echo $plan['plan_type'] ?></p>
                    </div>
                    <div class="mb-8">
                        <p > <span class="font-semibold">INÍCIO:</span> <?= date('d-m-Y H:i:s', strtotime($subs['plan_period_start']))  ?> </p>
                        <p > <span class="font-semibold">VENCIMENTO:</span> <?php if ($subs['plan_period_end'] == "-") {
                                                                    echo "-";
                                                                } else {
                                                                    echo date('d-m-Y H:i:s', strtotime($subs['plan_period_end']));
                                                                }  ?></p>
                        <p><span class="font-semibold">STATUS:</span> <?php if ($subs['status'] == "active") {echo "<span class='text-green-500'>ATIVA</span>"; } else if ($subs['status'] == "canceled") {echo "<span class='text-red-500'>CANCELADA</span>";} ?></p>

                    </div>

                    <?php if ($subs['status'] == 'canceled') { ?>
                        <div class=" grid xl:grid-cols-2 grid-cols-1">
                        <div class="xl:col-span-1 xl:pr-3">
                            <div class="conta-perfil-btn  mb-12">
                                <a href="<?= base_url('planos') ?>">
                                    <button class="bg-greenDefault text-white font-semibol px-5">RENOVAR ASSINATURA</button>

                                </a>
                            </div>
                        </div>
                       
                    </div>
                    <?php } else if ($subs['status'] == 'active') { ?>
                        <div class=" grid xl:grid-cols-2 grid-cols-1">
                            <div class="xl:col-span-1 xl:pr-3">
                                <div class="conta-perfil-btn  mb-12">
                                    <a href="<?= base_url('planos') ?>">
                                        <button class="bg-greenDefault text-white font-semibol px-5">ALTERAR PLANO</button>

                                    </a>
                                </div>
                            </div>
                            <div class="xl:col-span-1">
                                <div onclick="cancelSubscription(this.id)" id="<?=$subs['stripe_subscription_id']?>" class="conta-perfil-btn  mb-12">
                                    <button class="bg-red-400 text-white font-semibol px-5">CANCELAR ASSINATURA</button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                  

                    <div class="xl:mt-12 mt-5">
                        <h1 style="font-size:25px;" class="ebook-title">HISTÓRICO DE PAGAMENTOS</h1>

                        <?php if (count($this->payments_model->getUserPayments($this->session->userdata('session_user')['id'])) > 0) { ?>

                            <div class="grid pla-items-center mt-3">
                                <table class="" style="width:100% ;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">GATEWAY</th>
                                            <th class="text-center">VALOR</th>
                                            <th class="text-center">PLANO</th>
                                            <th class="text-center">DATA</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($this->payments_model->getUserPayments($this->session->userdata('session_user')['id']) as $p) { ?>
                                            <tr>
                                                <td><small class="text-center"># <?= $p->id ?></small:< /td>
                                                <td class="uppercase"><small class="text-center"><?= $p->payment_method ?></small:< /td>
                                                <td class="uppercase"><small class="text-center">R$ <?= $p->plan_amount ?></small:< /td>
                                                <td><small class="text-center"><?= $this->plan_model->getPlan($p->plan_id)['plan_name'] ?></small:< /td>
                                                <td><small class="text-center"><?= date('d-m-Y H:i:s', strtotime($p->created))  ?></small:< /td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>

                            </div>

                        <?php } else { ?>

                            <div class="grid pla-items-center">
                                <p>NENHUM HISTÓRICO REGISTRADO.</p>
                            </div>

                        <?php } ?>

                    </div>

                </div>

            </div>
        </section>



    </main>
    <div id="loadingMask" class="grid place-items-center" style="width: 100%; height: 100%; position: fixed;">
        <img src="<?= base_url() ?>assets/img/design/loading.gif" alt="">
    </div>


    <?php $this->load->view('comp/js'); ?>


    <script>
        $('.ebook-add-biblioteca').on('click', function(e) {
            swal('Adicionado na sua biblioteca.')
        })
    </script>
    <script>
        var faq = document.getElementsByClassName("faq-page");
        var i;

        for (i = 0; i < faq.length; i++) {
            faq[i].addEventListener("click", function() {
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

    <script>
        function cancelSubscription(subscription_id) {


            subscription_id = subscription_id

            swal({
                title: "Atenção!",
                text: 'Tem certeza que deseja cancelar sua assinatura?',
                icon: "warning",
                buttons: [
                    'Não',
                    'Sim, quero cancelar!'
                ],
                dangerMode: true,

            }).then(function(isConfirm) {

                if (isConfirm) {
                    $.ajax({
                        method: 'POST',
                        url: '<?= base_url() ?>planos/cancelar',
                        data: {
                            subscription_id: subscription_id
                        },
                        success: function(data) {

                            var resp = JSON.parse(data)

                            if (resp.status == "true") {
                                swal(resp.message).then(function(e){
                                    location.reload()
                                });
                            } else {
                                swal(resp.message).then(function(e){
                                    location.reload()
                                });

                            }

                        },
                        error: function(data) {
                            swal('Ocorreu um erro temporário. ');
                        },

                    });
                }


            });

        }
    </script>

</body>

</html>