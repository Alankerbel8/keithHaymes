<?php

/*
Plugin Name: Custom Plugin Custom Quicktags
Description: Adds quicktags
Author: Alan Kerbel
Version: 1.0
*/


function custom_quicktag() 
{
    if(wp_script_is("quicktags"))
    {
        ?>
            <script type="text/javascript">
                
                //function obtained for test
                function getSel()
                {
                    var txtarea = document.getElementById("content");
                    var start = txtarea.selectionStart;
                    var finish = txtarea.selectionEnd;
                    return txtarea.value.substring(start, finish);
                }

                QTags.addButton("date_quicktag", "Today", get_date);

                function get_date()
                {
                    var selected_text = getSel();
                    QTags.insertContent('Hello!');
                }
            </script>
        <?php
    }
}
/* No current quicktags added */
add_action("admin_print_footer_scripts", "custom_quicktag");