<!-- monitor the change in input box -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
   $(document).ready(function(){

      $("#getDate").on("input", function(){
         // Print entered value in a div box
         $("#setDate").text($(this).val());
         var customDate = $(this).val();
         var yyyy = customDate.substring(0, 4);
         var mm = customDate.substring(5, 7);
         var dd = customDate.substring(8, 10);
         $("#setDate").text(dd+"/"+mm+"/"+yyyy);

         document.cookie = "getDate = " + text($(this).val());

      });

      $("#getTime").on("input", function(){
         // Print entered value in a div box
         $("#setTime").text($(this).val());

         document.cookie = "getTime = " + text($(this).val());

      });

      $("#getPerson").on("input", function(){
         // get current subTotal, VAT, total_including_VAT from server
         var currentSubTotal = <?php echo $onload_subtotal?>;
         var currentVAT = <?php echo $onload_VAT?>;
         var currentTotal = <?php echo $onload_total_including_VAT?>;
         // convert string to int
         var currentSubTotal = parseFloat(currentSubTotal);
         var currentVAT = parseFloat(currentVAT);
         var currentTotal = parseFloat(currentTotal);
         // calculate the amount by the number of guests
         var numberOfPerson = $(this).val();
         var new_currentSubTotal = currentSubTotal * numberOfPerson;
         var new_currentVAT =  currentVAT * numberOfPerson;
         var new_currentTotal =  currentTotal * numberOfPerson;
         // Print entered value in a div box
         $("#setPerson").text(numberOfPerson);
         // handle NaN in case if the return variable is Not a Number
         new_currentSubTotal = new_currentSubTotal ? new_currentSubTotal : "0.00";
         new_currentVAT = new_currentVAT ? new_currentVAT : "0.00";
         new_currentTotal = new_currentTotal ? new_currentTotal : "0.00";
         $("#setSubTotal").text(new_currentSubTotal);
         $("#setVAT").text(new_currentVAT);
         $("#setTotal").text(new_currentTotal);

         document.cookie = "setPerson = " + numberOfPerson;
         document.cookie = "setSubTotal = " + new_currentSubTotal;
         document.cookie = "setVAT = " + new_currentVAT;
         document.cookie = "setTotal = " + new_currentTotal;

      });
   });
</script>
<!-- end monitor the change in input box -->