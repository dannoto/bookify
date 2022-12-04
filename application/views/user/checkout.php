


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        font-family: 'Poppins', sans-serif;
    }

    body {
        margin: 0px;
        padding: 0px;
        background-color: #D4E157;
    }

    hr {
        border: 0;
        height: 1px;
        background-image: -webkit-linear-gradient(left, #464748, #8c8b8b, #464748);
        background-image: -moz-linear-gradient(left, #464748, #8c8b8b, #464748);
        background-image: -ms-linear-gradient(left, #464748, #8c8b8b, #464748);
        background-image: -o-linear-gradient(left, #464748, #8c8b8b, #464748);
    }

    /* Product page
        ----------------------------*/
    .product_wrap {
        width: 100%;
        position: relative;
        overflow: hidden;
        padding-left: 8px;
    }

    .product_arrow {
        position: absolute;
        left: 157px;
        bottom: 37px;
    }

    .triangle-left {
        width: 0;
        height: 0;
        border-top: 10px solid transparent;
        border-right: 15px solid #464748;
        border-bottom: 10px solid transparent;
    }

    .product_main {
        position: relative;
        width: 100%;
    }

    .product_main img {
        width: 100%;
    }

    .product_title {
        padding-bottom: 10px;
        margin: 0px;
        font-size: 1.1em;
        font-weight: 400;
        color: #464748;
    }

    .product_desc {
        margin: 0px;
        color: #717375;
        font-size: 12px;
    }

    .product_price {
        
        color: #464748;
    }


    /* Checkout section
        ----------------------------*/
    .checkout {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .checkout_wrap {
        width: 500px;
        height: 300px;
        background-color: #F7E4AA;
        border-radius: 5px;
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.3);
        position: relative;
        oveflow: hidden;
    }

    .checkout_details {
        height: auto;
        padding: 10px;
        border-radius: 0px 5px 5px 0px;
        background-color: #464748;
        position: absolute;
        height: 100%;
        box-sizing: border-box;
    }

    .checkout_title {
        margin: 0px;
        padding: 10px 0px;
        font-size: 1.1em;
        font-weight: 400;
        color: #fff;
    }

    .checkout_form {
        width: 100%;
        position: relative;
        overflow: hidden;
        padding: 10px 0px;
    }

    .checkout_form input {
        width: 100%;
        height: auto;
        padding: 8px 10px;
        margin: 8px 0px;
        font-size: 14px;
        border: none;
        border-bottom: 1px solid #717375;
        background-color: transparent;
        color: #F7E4AA;
        box-sizing: border-box;
        box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.020);
        font-family: 'Poppins', sans-serif;
    }

    .checkout_form input:focus {
        outline-width: 0;
    }

    ::-webkit-input-placeholder {
        /* Chrome/Opera/Safari */
        color: #9e9e9e;
    }

    ::-moz-placeholder {
        /* Firefox 19+ */
        color: #717375;
    }

    :-ms-input-placeholder {
        /* IE 10+ */
        color: #717375;
    }

    :-moz-placeholder {
        /* Firefox 18- */
        color: #717375;
    }

    .checkout_pay {
        width: 100%;
        height: auto;
        padding: 8px 10px;
        margin: 8px 0px;
        border: none;
        background-color: #F7E4AA;
        color: #2a2a2a;
        border-radius: 3px;
        font-weight: 400;
        font-family: 'Poppins', sans-serif;
        box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
    }
</style>
<body>
<?php $this->load->view('comp/navbar')?>

<div class="checkout">
    <div class="checkout_wrap">
        <div class="row">

            <div class="col-xs-4">
                <!--PRODUCT-->
                <div class="product_wrap">
                    <div class="product_main">
                        <img src="https://cdn.shopify.com/s/files/1/1383/5663/products/nUfktRxAtd3kdSy26835S772JrFPTf-right_large.png?v=1480349616">
                    </div>
                    <h1 class="product_title">Mug Life</h1>
                    <small class="product_desc">Designer mug with metalic finish</small>
                    <h3 class="product_price">$14.99</h3>
                </div>
            </div>

            <div class="col-xs-8">
                <!--CHECKOUT-->
                <div class="product_arrow">
                    <div class="triangle-left"></div>
                </div>
                <div class="checkout_details">
                    <div class="col-xs-12">
                        <h1 class="checkout_title">Credit Card Detail</h1>
                        <form class="checkout_form">
                            <input type="name" placeholder="Customer Full Name">
                            <input class="cc-number" type="text" placeholder="Card Number" maxlength="20">
                            <div class="row">
                                <div class="col-xs-6">
                                    <input class="cc-exp" type="name" placeholder="Card Expiry">
                                </div>
                                <div class="col-xs-6">
                                    <input class="cc-cvc" type="name" placeholder="CVV">
                                </div>
                            </div>
                            <button class="checkout_pay" type="button" value="submit">Pay &raquo;</button>
                        </form>
                    </div>
                </div>
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
    $('.cc-number').payment('formatCardNumber');
    $('.cc-exp').payment('formatCardExpiry');
    $('.cc-cvc').payment('formatCardCVC');
    $('.checkout_pay').hide();

    $(document).on('keyup', '.cc-number, .cc-cvc, .cc-exp', function() {
        var cname = $('.cc-number').val();
        var ccvc = $('.cc-cvc').val();
        var cexp = $('.cc-exp').val();

        if (cname != "" && ccvc != "" && cexp != "") {
            $('.checkout_pay').fadeIn(300);
        }

    });
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
            color: '#555',
            backgroundColor: '#fff',
            '::placeholder': {
                color: '#888',
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