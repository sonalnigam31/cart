$(document).ready(function() {
             //alert('hello sonal ');
             /* Data Table */
             $('#example').DataTable();
             $('#example2').DataTable();
             /* Add Product In Cart */
             $(".CartButton").click(function(e) {
             	e.preventDefault();
               	var selector = $(this).data('selector');	
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               $.ajax({
                  url: "/myproduct/ajaxCart",
                  method: 'post',
                  data: {
                     productid: selector
                  },
                  success: function(result){
                     $("#cartCount").text(result);
                     $("#cartCount1").text(result);
                     $("#showmsg").css('display','block');
                     
                  }});
			});
             /* Apply Coupon */
             

              $(".ApplyCoupon").click(function(e) {
             	e.preventDefault();
               	var coupon = $('#Coupon').val();	
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               $.ajax({
                  url: "/ApplyCoupon/mycoupon",
                  method: 'post',
                  data: {
                     coupon: coupon
                  },
                  success: function(result){
                  	alert(result);
                  	if($.isNumeric( result ))
                  	{
                     $("#payable").text(result);
                     $("#couponerror").text("Coupon Applied Successfully !");
                 	}
                 	else
                 	{
                     $("#couponerror").text(result);
                 	}
                     
                  }});
			});
 });
       