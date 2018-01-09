   <link rel="stylesheet" href="a/jquery-ui.css"> 
    <script src="a/jquery-1.9.1.js"></script> 
    <script src="a/jquery-ui.js"></script>

<!-- ----------------------------------------------yang ada di member --------------------------------------------------------------------   -->
  <script>
    $(function() {
            $( "#tgl" ).datepicker({
                    altFormat :"dd MM yy",
                    changeMonth : true,
                    changeYear : true

    });
              $("#tgl").change(function(){
        $("#tgl").datepicker("option","dateFormat","yy-mm-dd");
     });
    });
     
    </script>
      <script>
    $(function() {
            $( "#tgld" ).datepicker({
                    altFormat :"dd MM yy",
                    changeMonth : true,
                    changeYear : true

    });
              $("#tgld").change(function(){
        $("#tgld").datepicker("option","dateFormat","yy-mm-dd");
     });
    });
     
    </script>

        <script>
    $(function() {
            $( "#tglp" ).datepicker({
                    altFormat :"dd MM yy",
                    changeMonth : true,
                    changeYear : true

    });
              $("#tglp").change(function(){
        $("#tglp").datepicker("option","dateFormat","yy-mm-dd");
     });
    });
     
    </script>
    
<!-- ---------------------------------------------------------------------------------------------------------------------- -->