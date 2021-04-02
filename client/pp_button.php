<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>
<body>

<script
    src="https://www.paypal.com/sdk/js?client-id=Ab9dEGu1ooKBfPqw4v3HPmyf1qWZHuSO7vLOM1qhG7WktnB3t_dpRBSAtYhruNyBe9Xmqg7Rckw18Q0r"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
  </script>

  <div id="paypal-button-container"></div>

<script src="https://www.paypal.com/sdk/js?client-id=test"></script>


<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '<?php
                  echo 
                  $price;     
            ?>'
          }
        }]
      });
    }
  }).render('#paypal-button-container');
</script>
</body>