function openNav() {
    if ((document.getElementById("menuLateral").style.width == 0) || (document.getElementById("menuLateral").style.width == "0px")){
        document.getElementById("menuLateral").style.width = "250px";
    } else{
        document.getElementById("menuLateral").style.width = "0";  
    }
}

function logar() {
    
    if (document.getElementById('EmailLogin').value == 'bixo@joguinho.com') {
        if ((document.getElementById('SenhaLogin').value == 'admin')){
            window.location.href = "mapa.html";
        } else{
            document.getElementById('corpo').innerHTML= '<div class="alert alert-danger"  role="alert">Senha incorreta </div>';
        }
    } else{
        document.getElementById('corpo').innerHTML= '<div class="alert alert-danger"  role="alert">Email incorreto </div>';
    }
}


$(function() {

    $(document).on('change', ':file', function() {
      var input = $(this),
          numFiles = input.get(0).files ? input.get(0).files.length : 1,
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [numFiles, label]);
    });

    $(document).ready( function() {
        $(':file').on('fileselect', function(event, numFiles, label) {
  
            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;
  
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
  
        });
    });
    
  });