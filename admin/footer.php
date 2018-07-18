<?php

date_default_timezone_set('Africa/Lagos');

?>

<hr>

 <!-- *** COPYRIGHT ***

 _________________________________________________________ -->

        <div id="copyright">

            <div class="container">

                <div class="col-md-6">

                    <p class="pull-left">© <strong><?php echo date("Y"); ?> Artefact.</strong> All Rights Reserved </p>



                </div>

                <div class="col-md-6">

                    <p class="pull-right">Design by <a href="http://mapannoir.alwaysdata.net/">Steal Bass</a>

                    </p>

                </div>

            </div>

        </div>

        <!-- *** COPYRIGHT END *** -->

<script src="js/jquery.js" type="text/javascript"></script>

<script src="js/bootstrap.js" type="text/javascript"></script>

<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>

<script type="text/javascript" src="CLEditor/jquery.cleditor.min.js"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="js/dataTables.responsive.js"></script>

<script src="js/script.js"></script>

    <!-- /#page-wrapper -->
<script type="text/javascript">

$(document).ready(function()

{

	$(".country").change(function()

	{

		var id=$(this).val();

		var dataString = 'id='+ id;

	

		$.ajax

		({

			type: "POST",

			url: "get_state.php",

			data: dataString,

			cache: false,

			success: function(html)

			{

				$(".state").html(html);

			} 

		});

	});

	

	

	$(".state").change(function()

	{

		var id=$(this).val();

		var dataString = 'id='+ id;

	

		$.ajax

		({

			type: "POST",

			url: "get_city.php",

			data: dataString,

			cache: false,

			success: function(html)

			{

				$(".city").html(html);

			} 

		});

	});

	

});

</script>





<script>

    $(document).ready(function() {

        $('#dataTables-example').DataTable({

            responsive: true

        });

    });

</script>

  <script language="javascript">

    function Clickheretoprint()

    { 

      var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 

      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 

      var content_vlue = document.getElementById("content").innerHTML; 



      var docprint=window.open("","",disp_setting); 

      docprint.document.open(); 

      docprint.document.write('</head><body onLoad="self.print()" style="width: 1000px; height:400; font-size: 20px; font-family: arial;">');          

      docprint.document.write(content_vlue); 

      docprint.document.close(); 

      docprint.focus(); 

  }

</script>









<script type="text/javascript">

    $(document).ready(function() {

        $("#content").cleditor({

                controls: // controls to add to the toolbar

                    "bold italic underline strikethrough subscript superscript | font size " +

                    "style | color highlight removeformat | bullets numbering | outdent " +

                    "indent | alignleft center alignright justify | undo redo | " +

                    "rule image link unlink | cut copy paste pastetext | print source",

                colors: // colors in the color popup

                    "FFF FCC FC9 FF9 FFC 9F9 9FF CFF CCF FCF " +

                    "CCC F66 F96 FF6 FF3 6F9 3FF 6FF 99F F9F " +

                    "BBB F00 F90 FC6 FF0 3F3 6CC 3CF 66C C6C " +

                    "999 C00 F60 FC3 FC0 3C0 0CC 36F 63F C3C " +

                    "666 900 C60 C93 990 090 399 33F 60C 939 " +

                    "333 600 930 963 660 060 366 009 339 636 " +

                    "000 300 630 633 330 030 033 006 309 303",

                fonts: // font names in the font popup

                    "Arial,Arial Black,Comic Sans MS,Courier New,Narrow,Garamond," +

                    "Georgia,Impact,Sans Serif,Serif,Tahoma,Trebuchet MS,Verdana",

                sizes: // sizes in the font size popup

                    "1,2,3,4,5,6,7",

                styles: // styles in the style popup

                    [["Paragraph", "<p>"], ["Header 1", "<h1>"], ["Header 2", "<h2>"],

                    ["Header 3", "<h3>"],  ["Header 4","<h4>"],  ["Header 5","<h5>"],

                    ["Header 6","<h6>"]],

                useCSS: false, // use CSS to style HTML when possible (not supported in ie)

                docType: // Document type contained within the editor

                    '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',

                docCSSFile: // CSS file used to style the document contained within the editor

                    "",

                bodyStyle: // style to assign to document body contained within the editor

                    "margin:4px; font:10pt Arial,Verdana; cursor:text"

            });

    });

</script>

		



</body>



</html>