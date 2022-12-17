<?php
if(!empty($_COOKIE['myjavascriptVar'])){
    echo $myphpVar = $_COOKIE['myjavascriptVar'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <!-- Replace "test" with your own sandbox Business account app client ID -->
  <script src="https://www.paypal.com/sdk/js?client-id=AeZIaJ8o4faEG3YvSX2is7Erdm_0I4N1rrNehgKM2Fkp6LpakZcbBTYQBLP6_bvaccWoIYv8rrgwtfbC&currency=GBP"></script>
  <!-- Set up a container element for the button -->
  <div id="paypal-button-container"></div>
  <script>
    function fnRedirect() {
	    window.location.href = "./booking.php";
    }
    paypal.Buttons({
      // Sets up the transaction when a payment button is clicked
      createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '0.44' // Can also reference a variable or function
            }
          }]
        });
      },
      // Finalize the transaction after payer approval
      onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
          // Successful capture! For dev/demo purposes:
          //console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          const transaction = orderData.purchase_units[0].payments.captures[0];
          //alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
          document.cookie = "myjavascriptVar = " + transaction.id;
          fnRedirect();
          //fnRedirect();
          // When ready to go live, remove the alert and show a success message within this page. For example:
          // const element = document.getElementById('paypal-button-container');
          // element.innerHTML = '<h3>Thank you for your payment!</h3>';
          // Or go to another URL:  actions.redirect('thank_you.html');
        });
      }
    }).render('#paypal-button-container');
    if(complete){
        fnRedirect();
    }
  </script>
</body>
</html>
