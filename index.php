
<html> 
<head>
<title>Ejemplo sencillo de AJAX</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="/css/fingerprint.css">
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    function getRandValue(){
        $.ajax({
                url:   'Register.php',
                type:  'post',
                success:  function (response) {
                        $("#resultado").html(response);
                        $('#MoladGetID').modal('hide');
                }
        });
    }

$('#fomrLign').submit(function(e){
 e.preventDefault();
 $('#MoladGetID').modal('show');
 var data = $(this).serialize();
 console.log(data);
  getRandValue();
});

});
</script>
 
</head>
 
<body>
<div class="container">
    <br/><br/><br/><br/>
    <br/><br/><br/><br/>
    <section id="content">
        <form id="fomrLign" action="#openModal">
            <h1>Ingreso</h1>
            <div>
                <input type="text" placeholder="Usuario"  id="username" />
            </div>
            <div>
                <!--<input type="password" placeholder="Contrase&ntilde;a" required="" id="password" />-->
            </div>
            <div>
                <input type="hidden" name="com" value="L">
                <input type="submit" value="Ingresar" />
                <a href="#">Registrar Hulla Dactilar</a>
            </div>
        </form><!-- form -->
<style type="text/css">
.modal-body{
    background-image: url(/img/fingerico.gif) ;
     background-repeat: no-repeat;
     height: 299px;
}
</style>
 <div class="modal fade" id="MoladGetID" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:400px;">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      
      <div class="modal-body">
                <h2>Acceder</h2>
                <p>Color huella dactilar para poder accede al sitema </p>
                <p>Esperando ...</p>
                <span id="resultado"></span>
      </div>
    </div>
  </div>
</div>
 
</section><!-- content -->
</div><!-- container -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
 
</html>