
<script>
    (function($){
      "use strict";
  
      $(document).ready(function(){

        $(document).on('keyup','#home_search',function(e){
            e.preventDefault();
            let search_text = $(this).val();
            let service_city_id = $('#service_city_id').val();
            if(search_text.length){
              $.ajax({
                  url:"{{ route('frontend.home.search') }}",
                  method:"get",
                  data:{
                    search_text:search_text,
                    service_city_id:service_city_id,
                  },
                  success:function(res){
                      if (res.status == 'success') {
                          $('#all_search_result').html(res.result);
                      }else{
                        $('#all_search_result').html(res.result);
                      }
                      $('#all_search_result').show();
                  }
              });
            }else{
              $('#all_search_result').hide();
            }
              
          })
          
      });
  })(jQuery);
  </script>
  
  