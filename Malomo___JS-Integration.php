
<?php 

?>
<!--   //   Malomo  API Integration For order tracking   -->
  <script>
    var script = document.createElement('script');
    script.src = "https://js.gomalomo.com/v2/";
    document.head.appendChild(script);
    $("#malomo_submit").on("click", function(e) {
      e.preventDefault();
      $('#malomo_tracking_json-renderer').html("");
      
      var temp_ord_no = $("#malomo_order_number").val();
      temp_ord_no = temp_ord_no.replace("#", '');
      var temp_email_against_ord_no = $("#malomo_email").val();
      var temp_trackingNo_against_ord_no = $("#malomo_tracking").val();

      var malomo = Malomo('*******************************');
      if (temp_ord_no != "" && temp_email_against_ord_no != "") {
        malomo.retrieveOrder({
          number: temp_ord_no,
          customer_email: temp_email_against_ord_no
        })
        .then(
          function(response) {
            // console.log(response);
            var out = response.body;
            $('#malomo_tracking_json-renderer').jsonViewer( out, {
              collapsed: true
            });
          }
        );
      }
      if (temp_trackingNo_against_ord_no != "") {
        malomo.retrieveOrder({
          tracking_code: temp_trackingNo_against_ord_no
        })
        .then(
          function(response) {
            // console.log(response);
            
            var out = response.body;
            $('#malomo_tracking_json-renderer').jsonViewer( out, {
              collapsed: false,
              rootCollapsable:false
            });

          }
        );
      }
    });
  </script>
  <!--   //   Malomo  API Integration For order tracking   -->
