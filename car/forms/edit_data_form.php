<div class="form-group">
 <label>Unesi model vozila</label>
 <input type="text" name="model" id="model" class="form-control" />
</div>
<div class="form-group">
 <label>Unesi registraciju vozila</label>
 <input type="text" name="registracija" id="registracija" class="form-control" />
</div>
<div class="form-group">
 <label>Unesi godinu proizvodnje</label>
 <input type="text" name="godina" id="godina" class="form-control" />
</div>


<script>
 $(document).ready(function () {

  var model = localStorage.getItem('model');
  var registracija = localStorage.getItem('registracija');
  var godina = localStorage.getItem('godina');

  $('#model').val(model);
  $('#registracija').val(registracija);
  $('#godina').val(godina);


 });
</script>
