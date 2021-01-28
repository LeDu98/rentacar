<div class="form-group">
 <label>Model:</label>
</div>
<div class="form-group">
    <label id="model"><i>Test</i></label>
</div>  
<div class="form-group">
 <label>Registracija:</label>
</div>
<div class="form-group">
    <label id="registracija"><i>Test</i></label>
</div>
<div class="form-group">
 <label>Godina:</label>
</div>
<div class="form-group">
    <label id="godina"><i>Test</i></label>
</div>


<script>
 $(document).ready(function () {

  document.getElementById('model').innerHTML =localStorage.getItem('model');
  document.getElementById('registracija').innerHTML =localStorage.getItem('registracija');
  document.getElementById('godina').innerHTML =localStorage.getItem('godina');


 });
</script>