
    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5995aabece46330012f5f6f2&product=inline-share-buttons"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script><script type="text/javascript">

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