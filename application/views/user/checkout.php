<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php $this->load->view('comp/css'); ?>

</head>
<style>
    @import url(https://fonts.googleapis.com/css?family=Lato:400,300,700);

    body,
    html {
        height: 100%;
        margin: 0;
        font-family: lato;
    }

    h2 {
        margin-bottom: 0px;
        margin-top: 25px;
        text-align: center;
        font-weight: 200;
        font-size: 19px;
        font-size: 1.2rem;

    }

    .container {
        height: 100%;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        background: #f8f8f8dd;
        width: 100%;
    }

    .dropdown-select.visible {
        display: block;
    }

    .dropdown {
        position: relative;
    }

    ul {
        margin: 0;
        padding: 0;
    }

    ul li {
        list-style: none;
        padding-left: 10px;
        cursor: pointer;
    }

    ul li:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    .dropdown-select {
        position: absolute;
        background: #77aaee;
        text-align: left;
        box-shadow: 0px 3px 5px 0px rgba(0, 0, 0, 0.1);
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
        width: 90%;
        left: 2px;
        line-height: 2em;
        margin-top: 2px;
        box-sizing: border-box;
    }

    .thin {
        font-weight: 400;
    }

    .small {
        font-size: 12px;
        font-size: .8rem;
    }

    .half-input-table {
        border-collapse: collapse;
        width: 100%;
    }

    .half-input-table td:first-of-type {
        border-right: 10px solid #22a877;
        width: 50%;
    }

    .window {
        height: 540px;
        width: 800px;
        background: #fff;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        box-shadow: 0px 15px 50px 10px rgba(0, 0, 0, 0.2);
        /* border-radius: 30px; */
        z-index: 10;
    }

    .order-info {
        height: 100%;
        width: 50%;
        padding-left: 25px;
        padding-right: 25px;
        box-sizing: border-box;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        position: relative;
    }

    .price {
        bottom: 0px;
        position: absolute;
        right: 0px;
        color: #4488dd;
    }

    .order-table td:first-of-type {
        width: 25%;
    }

    .order-table {
        position: relative;
    }

    .line {
        height: 1px;
        width: 100%;
        margin-top: 10px;
        margin-bottom: 10px;
        background: #ddd;
    }

    .order-table td:last-of-type {
        vertical-align: top;
        padding-left: 25px;
    }

    .order-info-content {
        table-layout: fixed;

    }

    .full-width {
        width: 100%;
    }

    .pay-btn {
        border: none;
        background: #fff;
        line-height: 2em;
        /* border-radius: 10px; */
        font-size: 19px;
        font-size: 1.2rem;
        color: #000;
        cursor: pointer;
        position: absolute;
        bottom: 25px;
        width: calc(100% - 50px);
        -webkit-transition: all .2s ease;
        transition: all .2s ease;
    }

    .pay-btn:hover {
        background: #fff;
        color: #000;
        -webkit-transition: all .2s ease;
        transition: all .2s ease;
    }

    .total {
        margin-top: 25px;
        font-size: 20px;
        font-size: 1.3rem;
        position: absolute;
        bottom: 30px;
        right: 27px;
        left: 35px;
    }

    .dense {
        line-height: 1.2em;
        font-size: 16px;
        font-size: 1rem;
    }

    .input-field {
        background: rgba(255, 255, 255, 0.1);
        margin-bottom: 10px;
        margin-top: 3px;
        line-height: 1.5em;
        font-size: 20px;
        font-size: 1.3rem;
        border: none;
        padding: 5px 10px 5px 10px;
        color: #fff;
        box-sizing: border-box;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        height: 40px !important;
    }

    .credit-info {
        background: #22a877;
        height: 100%;
        width: 50%;
        color: #eee;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        font-size: 14px;
        font-size: .9rem;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        box-sizing: border-box;
        padding-left: 25px;
        padding-right: 25px;
   
        position: relative;
    }

    .dropdown-btn {
        background: rgba(255, 255, 255, 0.1);
        width: 100%;
        border-radius: 5px;
        text-align: center;
        line-height: 1.5em;
        cursor: pointer;
        position: relative;
        -webkit-transition: background .2s ease;
        transition: background .2s ease;
    }

    .dropdown-btn:after {
        content: '\25BE';
        right: 8px;
        position: absolute;
    }

    .dropdown-btn:hover {
        background: rgba(255, 255, 255, 0.2);
        -webkit-transition: background .2s ease;
        transition: background .2s ease;
    }

    .dropdown-select {
        display: none;
    }

    .credit-card-image {
        display: block;
        max-height: 80px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 35px;
        margin-bottom: 15px;
    }

    .credit-info-content {
        margin-top: 25px;
        -webkit-flex-flow: column;
        -ms-flex-flow: column;
        flex-flow: column;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        width: 100%;
    }

    @media (max-width: 600px) {
        .window {
            width: 100%;
            height: 100%;
            display: block;
            border-radius: 0px;
        }

        .order-info {
            width: 100%;
            height: auto;
            padding-bottom: 100px;
            border-radius: 0px;
        }

        .credit-info {
            width: 100%;
            height: auto;
            padding-bottom: 100px;
            border-radius: 0px;
        }

        .pay-btn {
            border-radius: 0px;
        }
    }
</style>

<body>
    <?php $this->load->view('comp/navbar') ?>

    <div class='container'>
        <div class='window'>
            <div class='order-info'>
                <div class='order-info-content'>
                    <h2 class="uppercase"><?= $plan['plan_name'] ?></h2>
                    <div class='line'></div>
                    <table class='order-table'>
                        <tbody>
                            <tr>

                                <td>
                                    <small class="font-semibold">DESCRIÇÃO</small>
                                    <br> <?= $plan['plan_description'] ?><br><br></span>
                                </td>

                            </tr>

                        </tbody>

                    </table>
                    <!-- <table class='order-table'>
                        <tbody>
                            <tr>
                                <td><img src='https://dl.dropboxusercontent.com/s/qbj9tsbvthqq72c/Vintage-20L-Backpack-by-Fj%C3%A4llr%C3%A4ven.jpg' class='full-width'></img>
                                </td>
                                <td>
                                    <br> <span class='thin'>Fjällräven</span>
                                    <br>Vintage Backpack<br> <span class='thin small'> Color: Olive, Size: 20L</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class='price'>$235.95</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class='line'></div>
                    <table class='order-table'>
                        <tbody>
                            <tr>
                                <td><img src='https://dl.dropboxusercontent.com/s/nbr4koso8dpoggs/6136C1p5FjL._SL1500_.jpg' class='full-width'></img>
                                </td>
                                <td>
                                    <br> <span class='thin'>Monobento</span>
                                    <br>Double Lunchbox<br> <span class='thin small'> Color: Pink, Size: Medium</span>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class='price'>$25.95</div>
                                </td>
                            </tr>
                        </tbody>
                    </table> -->
                    <div class='line'></div>
                    <div class='total'>
                        <span style='float:left;'>
                            <div class='thin dense'><small>RECORRENCIA</small><?php if ($plan['plan_type'] == 1) {
                                                                    $plan['plan_type'] = "Mês";
                                                                } else if ($plan['plan_type'] == 4) {
                                                                    $plan['plan_type'] = "Ano";
                                                                } else {
                                                                    $plan['plan_type'] = "Mês";
                                                                }

                                                                    echo $plan['plan_type']; 
                                                                ?> </div>
                            <div class='thin dense'>Delivery</div>
                            TOTAL
                        </span>
                        <span style='float:right; text-align:right;'>
                            <div class='thin dense'>$68.75</div>
                            <div class='thin dense'>$4.95</div>
                            R$ <?= $plan['plan_price'] ?> / 
                        </span>
                    </div>
                </div>
            </div>
            <div class='credit-info'>
                <div class='credit-info-content'>
                  
                    <img src='https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png' height='80' class='credit-card-image' id='credit-card-image'></img>
                    <form action="" method="POST" id="paymentFrm">
                        <input type="hidden" name="subscr_plan" value="<?php echo $plan['id']; ?>" id="subscr_plan">
                        NOME DO TITULAR
                        <input type="text" name="name" id="name" class='input-field' placeholder="Enter name" required="" autofocus="">
                        E-EMAIL
                        <input type="email" name="email" id="email" class='input-field' placeholder="Enter email" required="">
                        NÚMERO DO CARTÃO
                        <div class='input-field' style='height: 2.4em; padding-top: .7em;' id="card_number"></div>
                        <div id="paymentResponse" class="text-red-500"></div>

                        <table class='half-input-table'>
                            <tr>
                                <td> EXPIRAÇÃO
                                    <div class='input-field' id="card_expiry"></div>
                                </td>
                                <td>CVC
                                    <div class='input-field' id="card_cvc"></div>
                                </td>
                            </tr>
                        </table>

                        <input class="hidden" type="text" id="stripeToken" class="field">

                        <button type="submit" class='pay-btn'>ASSINAR <i class="fa fa-arrow-right"></i></button>
                    </form>

                </div>

            </div>
        </div>
    </div>


</body>

</html>


<!-- <div class="panel">
    <form action="" method="POST" id="paymentFrm">
        <div class="panel-heading">
            Plan Info
            <?  // print_r($plan)
            ?>
            <p>
                <input type="text" name="subscr_plan"  value="<?  // echo $plan['id']; 
                                                                ?>" id="subscr_plan">

                <h2>PLANO</h2>

                
                <?  // if ($plan['plan_type'] == 1) {
                //     $plan['plan_type'] = "Mês";
                // } else if ($plan['plan_type'] == 4) {
                //     $plan['plan_type'] = "Ano";
                // } else {
                //     $plan['plan_type'] = "Mês";
                // } 

                ?>
                
                
                <p><?  // echo $plan['plan_name'].' R$ '.$plan['plan_price'].' / '.$plan['plan_type']; 
                    ?></p>
               
            </p>
        </div>
        <div class="panel-body">
            Display errors returned by createToken
            <div id="paymentResponse" style="color:red"></div>
			
            Payment form
            <div class="form-group">
                <label>NAME</label>
                <input type="text" name="name" id="name" class="field" placeholder="Enter name" required="" autofocus="">
            </div>
            <div class="form-group">
                <label>EMAIL</label>
                <input type="email" name="email" id="email" class="field" placeholder="Enter email" required="">
            </div>
            <div class="form-group">
                <label>CARD NUMBER</label>
                <div id="card_number" class="field"></div>
            </div>
            <div class="row">
                <div class="left">
                    <div class="form-group">
                        <label>EXPIRY DATE</label>
                        <div id="card_expiry" class="field"></div>
                    </div>
                </div>
                <div class="right">
                    <div class="form-group">
                        <label>CVC CODE</label>
                        <div id="card_cvc" class="field"></div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" id="payBtn">Submit Payment</button>
        </div>
    </form>
</div> -->
<?php $this->load->view('comp/js') ?>
<script src="https://js.stripe.com/v3/"></script>
<script>
    var cardDrop = document.getElementById('card-dropdown');
    var activeDropdown;
    cardDrop.addEventListener('click', function() {
        var node;
        for (var i = 0; i < this.childNodes.length - 1; i++)
            node = this.childNodes[i];
        if (node.className === 'dropdown-select') {
            node.classList.add('visible');
            activeDropdown = node;
        };
    })

    window.onclick = function(e) {
        console.log(e.target.tagName)
        console.log('dropdown');
        console.log(activeDropdown)
        if (e.target.tagName === 'LI' && activeDropdown) {
            if (e.target.innerHTML === 'Master Card') {
                document.getElementById('credit-card-image').src = 'https://dl.dropboxusercontent.com/s/2vbqk5lcpi7hjoc/MasterCard_Logo.svg.png';
                activeDropdown.classList.remove('visible');
                activeDropdown = null;
                e.target.innerHTML = document.getElementById('current-card').innerHTML;
                document.getElementById('current-card').innerHTML = 'Master Card';
            } else if (e.target.innerHTML === 'American Express') {
                document.getElementById('credit-card-image').src = 'https://dl.dropboxusercontent.com/s/f5hyn6u05ktql8d/amex-icon-6902.png';
                activeDropdown.classList.remove('visible');
                activeDropdown = null;
                e.target.innerHTML = document.getElementById('current-card').innerHTML;
                document.getElementById('current-card').innerHTML = 'American Express';
            } else if (e.target.innerHTML === 'Visa') {
                document.getElementById('credit-card-image').src = 'https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png';
                activeDropdown.classList.remove('visible');
                activeDropdown = null;
                e.target.innerHTML = document.getElementById('current-card').innerHTML;
                document.getElementById('current-card').innerHTML = 'Visa';
            }
        } else if (e.target.className !== 'dropdown-btn' && activeDropdown) {
            activeDropdown.classList.remove('visible');
            activeDropdown = null;
        }
    }
</script>
<script>
    var stripe = Stripe('<?php echo $this->config->item('stripe_publishable_key'); ?>');

    var elements = stripe.elements();

    var style = {
        base: {
            fontWeight: 400,
            fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
            fontSize: '16px',
            lineHeight: '1.4',
            color: '#000',
            height: '1.8',
            backgroundColor: '#FFF',
            '::placeholder': {
                color: '#ddd',
            },
        },
        invalid: {
            color: '#eb1c26',
        }
    };

    var cardElement = elements.create('cardNumber', {
        style: style
    });
    cardElement.mount('#card_number');

    var exp = elements.create('cardExpiry', {
        'style': style
    });
    exp.mount('#card_expiry');

    var cvc = elements.create('cardCvc', {
        'style': style
    });
    cvc.mount('#card_cvc');

    // Validate input of the card elements
    var resultContainer = document.getElementById('paymentResponse');
    cardElement.addEventListener('change', function(event) {
        if (event.error) {
            resultContainer.innerHTML = '<p>' + event.error.message + '</p>';
        } else {
            resultContainer.innerHTML = '';
        }
    });

    // Get payment form element
    var form = document.getElementById('paymentFrm');

    // Create a token when the form is submitted.
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        createToken();
    });

    // Create single-use token to charge the user
    function createToken() {
        stripe.createToken(cardElement).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error
                resultContainer.innerHTML = '<p>' + result.error.message + '</p>';
            } else {
                // Send the token to your server
                stripeTokenHandler(result.token);
            }
        });
    }

    // Callback to handle the response from stripe
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'block');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>