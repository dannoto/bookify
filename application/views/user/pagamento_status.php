<?php if(!empty($subscription)){ ?>
    <?php if($subscription['status'] == 'active'){ ?>
    <h1 class="success">Your Subscription Payment has been Successful!</h1>
    <?php }else{ ?>
    <h1 class="error">Subscription activation failed!</h1>
    <?php } ?>

    <h4>Payment Information</h4>
    <p><b>Reference Number:</b> <?php echo $subscription['id']; ?></p>
    <p><b>Transaction ID:</b> <?php echo $subscription['stripe_subscription_id']; ?></p>
    <p><b>Amount:</b> <?php echo $subscription['plan_amount'].' '.$subscription['plan_amount_currency']; ?></p>
    
    <h4>Subscription Information</h4>
    <p><b>Plan Name:</b> <?php echo $subscription['plan_name']; ?></p>
    <p><b>Amount:</b> <?php echo $subscription['plan_price'].' '.$subscription['plan_price_currency']; ?></p>
    <p><b>Plan Interval:</b> <?php echo $subscription['plan_interval']; ?></p>
    <p><b>Period Start:</b> <?php echo $subscription['plan_period_start']; ?></p>
    <p><b>Period End:</b> <?php echo $subscription['plan_period_end']; ?></p>
    <p><b>Status:</b> <?php echo $subscription['status']; ?></p>
<?php }else{ ?>
    <h1 class="error">The transaction has been failed!</h1>
<?php } ?>