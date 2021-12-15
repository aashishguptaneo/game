<!DOCTYPE html>
<html>
   <head>
      <title>Transaction Success </title>
      <!-- Latest CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <style>
         /* Absolute Center Spinner */
         .loading {
         position: fixed;
         z-index: 999;
         height: 2em;
         width: 2em;
         overflow: show;
         margin: auto;
         top: 0;
         left: 0;
         bottom: 0;
         right: 0;
         }
         /* Transparent Overlay */
         .loading:before {
         content: '';
         display: block;
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));
         background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
         }
         /* :not(:required) hides these rules from IE9 and below */
         .loading:not(:required) {
         /* hide "loading..." text */
         font: 0/0 a;
         color: transparent;
         text-shadow: none;
         background-color: transparent;
         border: 0;
         }
         .loading:not(:required):after {
         content: '';
         display: block;
         font-size: 10px;
         width: 1em;
         height: 1em;
         margin-top: -0.5em;
         -webkit-animation: spinner 150ms infinite linear;
         -moz-animation: spinner 150ms infinite linear;
         -ms-animation: spinner 150ms infinite linear;
         -o-animation: spinner 150ms infinite linear;
         animation: spinner 150ms infinite linear;
         border-radius: 0.5em;
         -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
         box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
         }
         /* Animation */
         @-webkit-keyframes spinner {
         0% {
         -webkit-transform: rotate(0deg);
         -moz-transform: rotate(0deg);
         -ms-transform: rotate(0deg);
         -o-transform: rotate(0deg);
         transform: rotate(0deg);
         }
         100% {
         -webkit-transform: rotate(360deg);
         -moz-transform: rotate(360deg);
         -ms-transform: rotate(360deg);
         -o-transform: rotate(360deg);
         transform: rotate(360deg);
         }
         }
         @-moz-keyframes spinner {
         0% {
         -webkit-transform: rotate(0deg);
         -moz-transform: rotate(0deg);
         -ms-transform: rotate(0deg);
         -o-transform: rotate(0deg);
         transform: rotate(0deg);
         }
         100% {
         -webkit-transform: rotate(360deg);
         -moz-transform: rotate(360deg);
         -ms-transform: rotate(360deg);
         -o-transform: rotate(360deg);
         transform: rotate(360deg);
         }
         }
         @-o-keyframes spinner {
         0% {
         -webkit-transform: rotate(0deg);
         -moz-transform: rotate(0deg);
         -ms-transform: rotate(0deg);
         -o-transform: rotate(0deg);
         transform: rotate(0deg);
         }
         100% {
         -webkit-transform: rotate(360deg);
         -moz-transform: rotate(360deg);
         -ms-transform: rotate(360deg);
         -o-transform: rotate(360deg);
         transform: rotate(360deg);
         }
         }
         @keyframes spinner {
         0% {
         -webkit-transform: rotate(0deg);
         -moz-transform: rotate(0deg);
         -ms-transform: rotate(0deg);
         -o-transform: rotate(0deg);
         transform: rotate(0deg);
         }
         100% {
         -webkit-transform: rotate(360deg);
         -moz-transform: rotate(360deg);
         -ms-transform: rotate(360deg);
         -o-transform: rotate(360deg);
         transform: rotate(360deg);
         }
         }
      </style>
   </head>
   <body>
     <div class="loading">Loading&#8230;</div>

      <div class="container">
         <h2 class="mt-3 mb-3">Transaction Detalis</h2>
         <div class="row">
            <span>Your payment was successful done, thank you for purchase.</span><br/>
            <span>Item Number :
            <strong><?php //echo $item_number; ?></strong>
            </span><br/>
            <span>TXN ID :
            <strong><?php //echo $txn_id; ?></strong>
            </span><br/>
            <span>Amount Paid :
            <strong>$<?php //echo $payment_amt.' '.$currency_code; ?></strong>
            </span><br/>
            <span>Payment Status :
            <strong><?php //echo $status; ?></strong>
            </span><br/>
         </div>
      </div>
      <script>
      var id  = '<?=$order_id?>';
      var base_url = '<?=base_url();?>';
      var addURL = base_url+'processOrder'

      function Process(id) {
        $.ajax({
            url:addURL,
            data:{id:id},
            type:'post',
            dataType : 'json',
            success: function(response) {
              if(response.code == 201 || response.code == 202){
                setTimeout(function(){
                  Process(id);
                }, 2000);
              }else{
                if(response.code == 100){
                  alert(response.msg);
                  window.location.href = base_url+'order';
                }else{
                  alert(response.msg);
                  window.location.href = base_url+'order';
                }
              }
            },
          })
      }
      Process(id)
      </script>
   </body>
</html>
