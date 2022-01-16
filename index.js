paypal.Buttons({
    style:{
        color:'blue',
        position:'center',
        shape:'pill'
    },
    createOrder:function(data, actions){
        return actions.order.create({
            purchase_units: [{
                amount: {
                  value: '45.00'
                }
              }]
        })
    },

    onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
        return actions.order.capture().then(function(details) {
          // This function shows a transaction success message to your buyer.
          var d1 =details.id;
          var d2 = details.status;
          var d3 = details.payer.payer_id;
          var d4 = details.create_time;
          var d5 = details.payer.name.given_name;
          var d6 = details.payer.email_address;
          var d7 = details.payer.address.country_code;
          
          window.location = 'http://amazonbet.herokuapp.com/success.php?token=keypass&d1=' + d1 + '&d2=' + d2 + '&d3=' + d3 + '&d4=' + d4 + '&d5=' + d5 + '&d6=' + d6 + '&d7=' + d7 ;
          


        });
      },
      onCancel:function(data){
          window.location.replace("http://amazonbet.herokuapp.com/payment-cancelled.php")
      }


}).render('#paypal-payment-button');