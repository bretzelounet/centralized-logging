<footer class="page-footer orange">
    <div style="text-align:right;"><a href="https://github.com/jeanwisser/centralized_logging" target="_blank"><img src="<?php echo base_url("assets/img/git.png"); ?>"></a></div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/materialize.js"); ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    var path = location.pathname.split('/')[2];
    if( path == "yarn" | path == "job"){
        $('#nav-links #yarn_link').addClass('active');
    }
    else if(path == "settings"){
        $('#nav-links #settings_link').addClass('active');
    }
    else if(path == "oozie"){
         $('#nav-links #oozie_link').addClass('active');
    }
    else if(path == "impala"){
         $('#nav-links #impala_link').addClass('active');
    }
    else if(path == "spark" | path == "spark_app"){
         $('#nav-links #spark_link').addClass('active');
    }
    if(location.pathname.split('/')[4]=="true"){
        Materialize.toast('Settings updated successfully !', 4000);
    }
});
</script>
</body>
</html>