<style>
    /* $primary: #e67e22;
    $font: 'Lato', */
    sans-serif;

    *:focus {
        outline: none;
    }

    .left {
        width: 70%;
        float: left;
        clear: both;
    }

    .right {
        width: 30%;
        float: right;
        margin-bottom: 25px;
    }

    body {
        background: -moz-linear-gradient(-45deg, #e67e22 0%, #f39c12 100%);
        /* FF3.6-15 */
        background: -webkit-linear-gradient(-45deg, #e67e22 0%, #f39c12 100%);
        /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(135deg, #e67e22 0%, #f39c12 100%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        height: auto;
        min-height: calc(100vh);
        font-family: $font;
        font-weight: 500;

        #wrapper {
            height: 100vh;

            display: flex;
            display: -webkit-flex;
            -webkit-align-items: center;
            align-items: center;
            -webkit-justify-content: center;
            justify-content: center;

            #container {
                background: white;
                height: 440px;
                min-width: 600px;
                width: 600px;
                z-index: 1;
                -webkit-box-shadow: 0px 3px 15px -1px rgba(0, 0, 0, 0.2);
                -moz-box-shadow: 0px 3px 15px -1px rgba(0, 0, 0, 0.2);
                box-shadow: 0px 3px 15px -1px rgba(0, 0, 0, 0.2);

                #left-col {
                    width: 40%;
                    min-width: 240px;
                    height: 100%;
                    float: left;
                    background: #34495e;

                    #left-col-cont {
                        margin: 20px 25px;
                        color: white;

                        h2 {
                            margin: 25px 0 0 0;
                        }

                        div.item {
                            margin: 30px 0;
                            clear: both;

                            .img-col {
                                width: 30%;
                                float: left;

                                img {
                                    width: 100%;
                                    max-height: 100px;
                                }
                            }

                            .meta-col {
                                width: 70%;
                                float: right;

                                h3 {
                                    font-size: 0.7em;
                                    margin: 10px 0 0 5px;
                                }

                                p {
                                    font-size: 0.9em;
                                    margin: 5px 0 0 5px;
                                    opacity: .5;
                                }
                            }
                        }

                        p#total {
                            text-transform: uppercase;
                            text-align: left;
                            font-size: 0.7em;
                            opacity: .5;
                            margin: 115px 0 5px 0;
                        }

                        h4#total-price {
                            text-align: left;
                            font-size: 2em;
                            margin: 0;

                            span {
                                color: #1c2834;
                            }
                        }
                    }
                }

                #right-col {
                    width: calc(60% - 50px);
                    min-width: 310px;
                    height: 100%;
                    margin: 20px 25px;
                    float: right;

                    h2 {
                        float: left;
                        margin: 6px 0 0 0;
                    }

                    div#logotype {
                        float: right;
                        margin: 4px 0 0 0;

                        img {
                            width: 60px;
                            height: auto;

                            &#visa {
                                margin-top: -10px;
                            }
                        }
                    }
                }

                form {
                    margin: 80px auto 0;
                    width: 100%;

                    #cardnumber {
                        background: white;
                        width: calc(100% - 14px);
                        padding: 4px 6px;
                        border-radius: 3px;
                        border: 1px solid lightgrey;

                        input {
                            display: inline-block;
                            font-family: $font;
                            width: calc(25% - 23px);
                            padding: 4px 6px;
                            letter-spacing: 6px;
                            font-size: 0.9em;
                            border: none;
                            background: none;

                            &::-webkit-input-placeholder {
                                opacity: .5;
                            }

                            &::-moz-placeholder {
                                opacity: .5;
                            }

                            &[type=number]::-webkit-inner-spin-button,
                            [type=number]::-webkit-outer-spin-button {
                                -webkit-appearance: none;
                                margin: 0;
                            }
                        }

                        span.divider {
                            color: rgba(0, 0, 0, .3);
                        }
                    }

                    label {
                        display: block;
                        font-family: $font;
                        font-size: 0.7em;
                        font-weight: 600;
                        text-transform: uppercase;
                        margin: 14px 0 4px;

                        &#cvc-label {
                            i {
                                cursor: pointer;
                                margin-left: 3px;
                            }
                        }
                    }

                    input {
                        display: block;
                        padding: 6px 8px;
                        border: 1px solid lightgrey;
                        border-radius: 2px;
                        font-size: 0.9em;

                        &:focus {
                            border-color: $primary;
                        }

                        &::-webkit-input-placeholder {
                            opacity: .5;
                        }

                        &::-moz-placeholder {
                            opacity: .5;
                        }

                        &#cardholder {
                            width: calc(100% - 18px);
                        }

                        &#cvc {
                            width: calc(100% - 18px);
                        }
                    }

                    select {
                        border: 1px solid lightgrey;
                        border-radius: 2px;
                        background: none;
                        width: 90px;
                        font-weight: 500;
                        font-size: 0.9em;
                        padding: 6px 8px;
                        color: rgba(0, 0, 0, .2);
                        -webkit-appearance: none;
                        -moz-appearance: none;
                        appearance: none;
                    }

                    button {
                        display: block;
                        width: 100%;
                        border: none;
                        border-radius: 2px;
                        padding: 8px 0;
                        font-size: 0.8em;

                        &#purchase {
                            background: $primary;
                            color: white;
                            margin: 0 0 8px;
                            font-size: 0.9em;
                        }

                        &#paypal {
                            background: none;
                            border: 1px solid lightgrey;

                            &:hover {
                                background: #003087;
                                border-color: #003087;
                                color: white;

                                i {
                                    color: #009cde;
                                }
                            }

                            i {
                                color: #003087;
                            }
                        }
                    }

                    p#support {
                        font-size: 0.7em;
                        text-align: center;
                        color: rgba(0, 0, 0, .5);

                        a {
                            text-decoration: none;
                            color: inherit;
                            padding: 0 1px 2px 1px;
                            border-bottom: 1px solid rgba(0, 0, 0, .5);

                            &:hover {
                                padding-bottom: 3px;
                            }
                        }
                    }
                }
            }
        }

        #dailyui {
            position: fixed;
            font-size: 15em;
            font-weight: 700;
            margin: 0 0 -55px 0;
            padding: 0;
            right: 0;
            bottom: 0;
            color: rgba(0, 0, 0, .3);
            z-index: 0;
            text-align: right;
            font-family: 'proxima-nova', 'Lato', sans-serif;
        }
    }
</style>
<div id="wrapper">
    <div id="container">
        <div id="left-col">
            <div id="left-col-cont">
                <h2>Summary</h2>
                <div class="item">
                    <div class="img-col">
                        <img src="http://emilcarlsson.se/assets/shirt.png" alt="" />
                    </div>
                    <div class="meta-col">
                        <h3>Blue Ocean Shirt</h3>
                        <p class="price">$60</p>
                    </div>
                </div>
                <div class="item">
                    <div class="img-col">
                        <img src="http://emilcarlsson.se/assets/green-shirt.png" alt="" />
                    </div>
                    <div class="meta-col">
                        <h3>Green Pine Shirt</h3>
                        <p class="price">$55</p>
                    </div>
                </div>
                <div class="item">
                    <div class="img-col">
                        <img src="http://emilcarlsson.se/assets/belt.png" alt="" />
                    </div>
                    <div class="meta-col">
                        <h3>Cow Skin Belt</h3>
                        <p class="price">$32</p>
                    </div>
                </div>
                <div class="item">
                    <div class="img-col">
                        <img src="http://emilcarlsson.se/assets/watch1.png" alt="" />
                    </div>
                    <div class="meta-col">
                        <h3>Festina Quartz Watch</h3>
                        <p class="price">$299</p>
                    </div>
                </div>
                <p id="total">Total</p>
                <h4 id="total-price"><span>$</span> 446</h4>
            </div>
        </div>
        <div id="right-col">
            <h2>Payment</h2>
            <div id="logotype">
                <img id="mastercard" src="http://emilcarlsson.se/assets/MasterCard_Logo.png" alt="" />
            </div>

            <form action="">
                <label for="">Cardnumber</label>
                <div id="cardnumber">
                    <input type="number" max="4" max-length="4" min="4" placeholder="0123" /> <span class="divider">-</span>
                    <input type="number" max="4" max-length="4" min="4" placeholder="4567" /> <span class="divider">-</span>
                    <input type="number" max="4" max-length="4" min="4" placeholder="8901" /> <span class="divider">-</span>
                    <input type="number" max="4" max-length="4" min="4" placeholder="2345" />
                </div>

                <label for="">Cardholder</label>
                <input id="cardholder" type="text" placeholder="John Doe" />
                <div class="left">
                    <label for="">Expiration Date</label>
                    <select name="month" id="month" onchange="" size="1">
                        <option value="00">Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <select name="year" id="year" onchange="" size="1">
                        <option value="00">Year</option>
                        <option value="01">2016</option>
                        <option value="02">2017</option>
                        <option value="03">2018</option>
                        <option value="04">2019</option>
                        <option value="05">2020</option>
                        <option value="06">2021</option>
                        <option value="07">2022</option>
                        <option value="08">2023</option>
                        <option value="09">2024</option>
                        <option value="10">2025</option>
                    </select>
                </div>

                <div class="right">
                    <label id="cvc-label" for="">CVC <i class="fa fa-question-circle-o" aria-hidden="true"></i></label>
                    <input id="cvc" type="text" placeholder="123" maxlength="3" />
                </div>
                <button id="purchase">Purchase</button>
                <button id="paypal"><i class="fa fa-paypal" aria-hidden="true"></i> Pay with PayPal</button>
                <p id="support">Having problem with checkout? <a href="#">Contact our support</a>.</p>
            </form>
        </div>
    </div>
</div>
<h1 id="dailyui">002</h1>


<!-- <div class="panel">
    <form action="" method="POST" id="paymentFrm">
        <div class="panel-heading">
            Plan Info
            <? php // print_r($plan)
            ?>
            <p>
                <input type="text" name="subscr_plan"  value="<? php // echo $plan['id']; 
                                                                ?>" id="subscr_plan">

                <h2>PLANO</h2>

                
                <? php // if ($plan['plan_type'] == 1) {
                //     $plan['plan_type'] = "Mês";
                // } else if ($plan['plan_type'] == 4) {
                //     $plan['plan_type'] = "Ano";
                // } else {
                //     $plan['plan_type'] = "Mês";
                // } 

                ?>
                
                
                <p><? php // echo $plan['plan_name'].' R$ '.$plan['plan_price'].' / '.$plan['plan_type']; 
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
<script src="https://js.stripe.com/v3/"></script>
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