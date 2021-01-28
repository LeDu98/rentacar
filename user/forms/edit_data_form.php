<div class="form-group">
 <label>Unesi ime klijenta</label>
 <input type="text" name="firstName" id="firstName" class="form-control" />
</div>
<div class="form-group">
 <label>Unesi prezime klijenta</label>
 <input type="text" name="lastName" id="lastName" class="form-control" />
</div>


<script>
 $(document).ready(function () {

  var firstName = localStorage.getItem('firstName');
  var lastName = localStorage.getItem('lastName');

  $('#firstName').val(firstName);
  $('#lastName').val(lastName);


 });
</script>
