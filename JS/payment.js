// const paymentForm = document.getElementById('paymentForm');
// paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();
  console.log(document.getElementById("amount").value * 100)
  let handler = PaystackPop.setup({
    key: 'pk_live_bd5356607a881f3a0d6843b75d3172b74b9675cd', // Replace with your public key
    email:   'eric.gadzi@ashesi.edu.gh', //document.getElementById("email-address").value,
    amount: parseInt(document.getElementById("amount").value * 100),
    currency: 'GHS',
    ref: ''+Math.floor(Math.random() * 100000000  + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
      let message = "Payment complete! Reference:" + response.reference;
      alert(message);
      $.ajax({
        url: '../Actions/Paymentprocess.php/verify_transaction?reference='+ response.reference,
        method: 'get',
        success: function (response) {
          // the transaction status is in response.data.status
          alert(response);
        }
      });
    }
  });

  handler.openIframe();
}