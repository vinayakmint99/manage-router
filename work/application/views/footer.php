<!-- Script -->
<script type="text/javascript">
    $(document).ready(function(){

        $("#success-alert").hide();
        // On text click
        $('.edit').click(function(){

          // Hide input element
          $('.txtedit').hide();

          // Show next input element
          $(this).next('.txtedit').show().focus();

          // Hide clicked element
          $(this).hide();
        });

        // Focus out from a textbox
        $('.txtedit').focusout(function(){
            // Get edit id, field name and value
            var edit_id = $(this).data('id');
            var fieldname = $(this).data('field');
            var value = $(this).val();

            // Hide Input element
            $(this).hide();

            // Update viewing value and display it
            $(this).prev('.edit').show();
            $(this).prev('.edit').text(value);

            // Send AJAX request
            $.ajax({
              url: '<?= base_url() ?>index.php/users/updateuser',
              type: 'post',
              data: { field:fieldname, value:value, id:edit_id },
              success:function(response){
                console.log(response);
                let is_validate =   Validate();                
                if(is_validate) {           
                $(':input[type="submit"]').prop('disabled', false);
                } else {
                $(':input[type="submit"]').prop('disabled', true);
                }
                
              }
            });
        });

         // Submit form
         $('#btnSubmit').click(function(){
            // Send AJAX request
            $.ajax({
              url: '<?= base_url() ?>index.php/users/submitform',
              type: 'post',              
              success:function(response){
                //console.log(response);
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(500);
                location.href = "<?= base_url() ?>index.php/users";
                });
                
                                
              }
            });
        });

        $('.txtdel').click(function(){
            // Get edit id, field name and value
            
            if (confirm("Are you sure you want to delete!")) {

                var del_id = $(this).data('id');
                var del_val = $(this).data('val');
                
                // Send AJAX request
                $.ajax({
                url: '<?= base_url() ?>index.php/users/deleteuser',
                type: 'post',
                data: {value:del_val,id:del_id },
                success:function(response){
                    console.log(response); 
                    $('#rowid_'+del_id).remove(); 
                    var numItems = $('.group_'+del_val).length;
                    //numItems=numItems-1;
                    if (numItems==1) {
                        $('.group_'+del_val).removeClass("duplicate");
                    } 
                    let is_validate =   Validate();
                    
                    if(is_validate) {           
                        $(':input[type="submit"]').prop('disabled', false);
                    } else {
                        $(':input[type="submit"]').prop('disabled', true);
                    }        
                }
            });

            } else {
            //txt = "You pressed Cancel!";
            }

            
        });

        let is_validate =   Validate();
        if(is_validate) {           
            $(':input[type="submit"]').prop('disabled', false);
        } else {
            $(':input[type="submit"]').prop('disabled', true);
        }
    });


    function Validate() {
        
        var valid = true;
        $('.txtedit').each(function() {

        var fieldname = $(this).data('field');
        var value = $(this).val();
        var dataid = $(this).data('id');
        
        if(fieldname=='sapid') {
            if(value.length > 18 || value.length < 3) {
                valid = false;                
                $('#sapidspan_'+dataid).addClass('red-border');               
            } else {               
                $('#sapidspan_'+dataid).removeClass('red-border');
            }
        }

        if(fieldname=='hostname') {
            if(value.length > 14 || value.length < 3) {
                valid = false;                
                $('#hostspan_'+dataid).addClass('red-border');               
            } else {
                $('#hostspan_'+dataid).removeClass('red-border');                
            }
        }

        if(fieldname=='loopback') {
            if(value.length > 100 || value.length < 3) {
                valid = false;                
                $('#loopbackspan_'+dataid).addClass('red-border');                
            } else {
                $('#loopbackspan_'+dataid).removeClass('red-border');               
            }
        }

        if(fieldname=='mac_address') {
            if(value.length > 50 || value.length < 3) {
                valid = false;              
                $('#macaddress_'+dataid).addClass('red-border');                
            } else {
                $('#macaddress_'+dataid).removeClass('red-border');                
            }
        }

        if(fieldname=='creation_date') {
            var regEx = /^\d{4}-\d{2}-\d{2}$/;
            var ret_val =   value.match(regEx) != null;           
            if(ret_val) {               
                $('#creationdate_'+dataid).removeClass('red-border');               
            } else {                             
                valid = false;              
                $('#creationdate_'+dataid).addClass('red-border');             
            }
        }
    });

    let numItems = $('.duplicate').length;

    if(numItems > 0) {
        valid = false;  
    }

     return valid;

    }

    </script>
   
</body>
</html>