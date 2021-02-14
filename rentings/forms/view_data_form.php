<div class="form-group">
 <label>Vozilo ID:</label>
</div>
<div class="form-group">
    <label id="book"><i>Test</i></label>
</div>  
<div class="form-group">
 <label>Klijent ID:</label>
</div>
<div class="form-group">
    <label id="user"><i>Test</i></label>
</div>
<div class="form-group">
 <label>Datum iznajmljivanja:</label>
</div>
<div class="form-group">
    <label id="rented"><i>Test</i></label>
</div>
<div class="form-group">
 <label>Datum vraćanja:</label>
</div>
<div class="form-group">
    <label id="returningDate"><i>Test</i></label>
</div>
<div class="form-group">
 <label>Vraćeno:</label>
</div>
<div class="form-group">
    <label id="returned"><i>Test</i></label>
</div>


<script>
 $(document).ready(function () {

  document.getElementById('book').innerHTML =localStorage.getItem('book');
  document.getElementById('user').innerHTML =localStorage.getItem('user');
  document.getElementById('rented').innerHTML =localStorage.getItem('rented');
  document.getElementById('returningDate').innerHTML =localStorage.getItem('returningDate');
  document.getElementById('returned').innerHTML =localStorage.getItem('returned');

 });
</script>