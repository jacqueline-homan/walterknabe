
    </div><!-- #main -->
    
    <?php
    
    // action hook for placing content above the footer
    thematic_abovefooter();
    
    ?>    

	<div id="footer">
    
        <?php
        
        // action hook creating the footer 
        //thematic_footer();
        
        ?>
		<p style="text-align: center; font-size: 10pt;">Contact ModernMasters Fine Art & Brkg about these or other works of fine art by Walter Knabe at  
<a href="mailto:info@modernmastersfab.com">info@modernmastersfab.com</a> or at 866.370.1601</p>
		<p style="text-align: center; font-size: 8pt;">microsite by <a href="http://www.silversquareinc.com">Silver Square</a></p>
        
	</div><!-- #footer -->
	
    <?php
    
    // actio hook for placing content below the footer
    thematic_belowfooter();
    
    ?>  

</div><!-- #wrapper .hfeed -->

<?php 

// calling WordPress' footer action hook
wp_footer();

// action hook for placing content before closing the BODY tag
thematic_after(); 

?>

</body>
</html>