const picker = document.getElementById('date1');
picker.addEventListener('input', function(e){
  var day = new Date(this.value).getUTCDay();
  if([7,0].includes(day)){
    e.preventDefault();
    this.value = '';
    alert('Nous ne travaillons pas le dimanche');
  }
});