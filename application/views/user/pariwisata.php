<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.4/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript">
          $(document).ready(function(){
            $('#provinsi').change(function(){
              var provinsi_id = $('#provinsi').val();
              $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>user/home/kota",
                data: "provinsi_id=" + provinsi_id,
                success: function(data){
                  $('#kota').html(data);
                }

              });
            });
          });
      </script>
    </head>

    <body>
        PRovinsi
        <select name="provinsi_id" id="provinsi">
        <option value="">Pilih</option>
          <?php foreach($prov as $p){
            echo "<option value='$p[id_prov]'>$p[nm_prov]</option>";
            }  ?>
        </select>
        KOTA
        <select name="kota_id" id="kota">
          <option value="">piluh kota</option>
        </select>
      <!--Import jQuery before materialize.js-->
    
    </body>
       <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
  </html>
        