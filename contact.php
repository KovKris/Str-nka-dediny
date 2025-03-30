<?php
    include('partials/header.php');
?>

<div id="templatemo_main">

	<div class="content_box">
    
        <h1>Contact Information</h1>
        <p><em>In ac libero urna. Suspendisse sed odio ut mi auctor blandit. Duis luctus nulla metus, a vulputate mauris.</em> Integer sed nisi sapien, ut gravida mauris. Nam et tellus libero. Cras purus libero, dapibus nec rutrum in, dapibus nec risus. Ut interdum mi sit amet magna feugiat auctor. Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow"><strong>XHTML</strong></a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow"><strong>CSS</strong></a>.</p>
            
        <div class="cleaner"></div>
	</div>
    
    <div class="last_content_box">
    	<div class="col_w460">
        	<div id="contact_form">
                <h4><strong> Send Us a Message Now!</strong></h4>
                
           	  <form method="POST" name="contact" action="thankyou.php">

                <label for="author">Name:</label> <input type="text" class="required input_field" id ="meno" name="meno" />
                <div class="cleaner h10"></div>
                        
                <label for="email">Email:</label> <input type="text" class="validate-email required input_field" name="email" id="email" />
                <div class="cleaner h10"></div>
                
		<label for="subject">Subject:</label> <input type="text" class="validate-subject required input_field" name="subject" id="subject"/>				               
                <div class="cleaner h10"></div>

                <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                <div class="cleaner h20"></div>                   
					
               	<input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />
               	<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />
                    
              </form>
                    
                   
            </div>
        </div>
        <div class="col_w460 last_col">
	
		<h4><strong>Location One</strong></h4>
    
           	<div class="cleaner h20"></div>   
            
            120-260 Vitae urna blandit est egestas,<br />
            Pulvinar sit amet convallis eget, 18800<br />
            Lorem ipsum dolor<br /><br />
            
            Tel: 040-070-3300<br />
            Fax: 040-070-4400<br />
            
          	<div class="cleaner h60"></div>
                        
            <h4><strong>Location Two</strong></h4>
            
			<div class="cleaner h20"></div>   
            
          	380-420 Suspendisse sed odio ut mi auctor,<br />
            Morbi dui nulla, tristique viverra, 12440<br />
            Cras purus libero<br /><br />
            
            Tel: 020-080-4400<br />
            Fax: 020-080-6600<br />

      	</div>
        <div class="cleaner"></div>
	</div>

</div>

<?php
    include('partials/footer.php');
?>