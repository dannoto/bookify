<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
/* 
| ------------------------------------------------------------------- 
|  Stripe API Configuration 
| ------------------------------------------------------------------- 
| 
| You will get the API keys from Developers panel of the Stripe account 
| Login to Stripe account (https://dashboard.stripe.com/) 
| and navigate to the Developers » API keys page 
| Remember to switch to your live publishable and secret key in production! 
| 
|  stripe_api_key            string   Your Stripe API Secret key. 
|  stripe_publishable_key    string   Your Stripe API Publishable key. 
|  stripe_currency           string   Currency code. 
*/ 
$config['stripe_api_key']         = 'sk_test_51HZAuDEXl0RLeMWbBwB7y76y6z1x1KD8VM4XADtcgYgb1qVGkgiQO2CQX4O9BpA2kBtdg3DZjciZEa2CIM8HgAK200YBLjEZgB'; 
$config['stripe_publishable_key'] = 'pk_test_51HZAuDEXl0RLeMWbpyb8qQFIrEtAlBItIbzU4rbh3V6fUH1ekzap8SHlN5FaRebgV9hgJLxlwm2hCVTlhcn5TnMe00uT6s0zQN'; 
$config['stripe_currency']        = 'brl';