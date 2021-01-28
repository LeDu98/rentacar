
<html>
 <head>
  <title>Vozila</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script>
  <script type="text/javascript" src="editRecords.js"></script>
 

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="icon" type="image/png" href="img/favicon.png">
  <link rel="stylesheet" href="../styles.css">
 </head>
 <body>


<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="containerNavbar" colour="red">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href=".."><img src="../img/rentlogo.png" width="100px"></a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav pull-right">
        <li><a href="..">Početka stranica</a></li>
        <li><a href="../user/userPage.php">Klijenti</a></li>
        <li class="active"><a href="#">Vozila</a></li>
        <li><a href="../borrowings/borrowingsPage.php">Iznajmljivanja</a></li>
        <li><a href="#">O nama</a></li>
      </ul>
    </div>
  </div>
</nav>

    <!-- Table -->
  <div class="container-fluid padding">
    <div class="container">
    <br>
    <br>
    <br>
    <h1>Vozila</h1>
    <br>
    <div class="panel panel-default">
      <div class="panel-heading">
      <div class="row">
        <div class="col-md-6">
        <h3 class="panel-title">Podaci o vozilima</h3>
        </div>
        <div class="col-md-6" align="right">
        <button type="button" name="add_data" id="add_data" class="btn btn-success btn-xs">Dodaj</button>
        </div>
      </div>
      </div>
      <div class="panel-body">
      <div class="table-responsive">
        <span id="form_response"></span>
        <table id="user_data" class="table table-bordered table-striped">
        <thead>
          <tr>
          <td>Vozilo ID</td>
          <td>Model</td>
          <td>Registracija</td>
          <td>Godina</td>
          <td>Pregled</td>
          <td>Azuriraj</td>
          <td>Obrisi</td>
          </tr>
        </thead>
        </table>      
      </div>
      </div>
    </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>

    <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-md-6">
                <img src="../img/rentlogo.png" width="90px">
                <hr class="light">
                <p>telefon 011/2000-200</p>
                <p>support@rentacarmp.rs</p> 
                <p>Srecka Jovanovica 50, Mali Pozarevac</p>          
            </div>
            <div class="col-md-6">                   
                <hr class="light">
                <h5>Radno vreme</h5>
                <hr class="light">
                <p>Ponedeljak-Subota: 10-18 sati</p>
                <p>Nedelja: zatvoreno</p>
            </div>
        </div>
        <div class = 'row text-center'>
            <div class="col-12 ">
                <hr class="light-100" >
                <h5>&copy; Rent-a-carMP</h5>
            </div>
            
            
        </div>
    </div>

  </footer>


 </body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 var dataTable = $('#user_data').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"sql/fetch.php",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0,3,4,5],
    "orderable":false,
   },
  ],

 });

 $(document).on('click', '.view', function(){
    var id = $(this).attr('id');
  $.ajax({
   url:"sql/fetch_single_data.php",
   method:"POST",
   data:{id:id},
   dataType:'json',
   success:function(data)
   {
    localStorage.setItem('model', data['model']);
    localStorage.setItem('registracija', data['registracija']);
    localStorage.setItem('godina', data['godina']);
    var options = {
     ajaxPrefix:''
    };
    new Dialogify('forms/view_data_form.php', options)
     .title('Podaci o vozilu')
     .buttons([
      {
       text:'Zatvori',
       click:function(e){
        this.close();
       }
      }
     ]).showModal();
   }
  })
 });
 
 $('#add_data').click(function(){

  var options = {
   ajaxPrefix:''
  };
  new Dialogify('forms/add_data_form.php', options)
   .title('Dodaj novo vozilo')
   .buttons([
    {
     text:'Otkaži',
     click:function(e){
      this.close();
     }
    },
    {
     text:'Dodaj',
     type:Dialogify.BUTTON_PRIMARY,
     click:function(e)
     {
      var form_data = new FormData();
      if(!validate($('#model').val(),$('#registracija').val(),$('#godina').val())){
        alert("GRESKAAA!");
      }
      form_data.append('model', $('#model').val());
      form_data.append('registracija', $('#registracija').val());
      form_data.append('godina', $('#godina').val());
      $.ajax({
       method:"POST",
       url:'sql/insert_data.php',
       data:form_data,
       dataType:'json',
       contentType:false,
       cache:false,
       processData:false,
       success:function(data)
       {
        if(data.error != '')
        {
         $('#form_response').html('<div class="alert alert-danger">'+data.error+'</div>');
        }
        else
        {
         $('#form_response').html('<div class="alert alert-success">'+data.success+'</div>');
         dataTable.ajax.reload();
        }
       }
      });
     }
    }
   ]).showModal();
 });

 $(document).on('click', '.update', function(){
  var id = $(this).attr('id');
  $.ajax({
   url:"sql/fetch_single_data.php",
   method:"POST",
   data:{id:id},
   dataType:'json',
   success:function(data)
   {
    localStorage.setItem('model', data['model']);
    localStorage.setItem('registracija', data['registracija']);
    localStorage.setItem('godina', data['godina']);
    $('#form_response').html('<div class="alert alert-danger">'+id+'</div>');
    var options = {
     ajaxPrefix:''
    };
    new Dialogify('forms/edit_data_form.php', options)
     .title('Izmeni podatke o vozilu')
     .buttons([
      {
       text:'Otkaži',
       click:function(e){
        this.close();
       }
      },
      {
       text:'Izmeni',
       type:Dialogify.BUTTON_PRIMARY,
       click:function(e)
       {
        var form_data = new FormData();
        form_data.append('model', $('#model').val());
        form_data.append('registracija', $('#registracija').val());
        form_data.append('godina', $('#godina').val());
        form_data.append('id', id);
        $.ajax({
         method:"POST",
         url:'sql/update_data.php',
         data:form_data,
         dataType:'json',
         contentType:false,
         cache:false,
         processData:false,
         success:function(data)
         {
          if(data.error != '')
          {
           $('#form_response').html('<div class="alert alert-danger">'+data.error+'</div>');
          }
          else
          {
           $('#form_response').html('<div class="alert alert-success">'+data.success+'</div>');
           dataTable.ajax.reload();
          }
         }
        });
       }
      }
     ]).showModal();
   }
  })
 });

 $(document).on('click', '.delete', function(){
  var id = $(this).attr('id');
  Dialogify.confirm("<h3 class='text-danger'><b>Da li ste sigurni da želite da obrišete vozilo?</b></h3>", {
   ok:function(){
    $.ajax({
     url:"sql/delete_data.php",
     method:"POST",
     data:{id:id},
     success:function(data)
     {
      Dialogify.alert('<h3 class="text-success text-center"><b>Vozilo uspešno obrisano</b></h3>');
      dataTable.ajax.reload();
     }
    })
   },
   cancel:function(){
    this.close();
   }
  });
 });

 function validate(model, registracija, godina){

    if(model.len != '' && registracija != '' && godina != ''){
        if(yearCheck(godina)){
        return true;
        }
    }
    else{
      return false;
    }
  }

  function yearCheck(godina){
    if(isNaN(parseInt(godina))){
        //if(yearLength(year)){
        return false;
        //}
    }
    return true;
    }

  
  function yearLength(godina){
    if(godina.toString().length == 4){
        return true;
    }
    return false; 
    } 

});
</script>