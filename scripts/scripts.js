window.addEventListener('load', function(){
  new Glider(document.querySelector('.glider'), {
    slidesToShow: 1,
    dots: '#dots',
    draggable: true,
    arrows: {
      prev: '.glider-prev',
      next: '.glider-next'
      }
    })
});

if(window.SimpleForm) {
  new SimpleForm({
    form: ".formphp", // form selector
    button: "#send", // button selector
    error: "<div id='form-error'><h2>Error sending</h2><p>An error has occurred.</p></div>", // error message
    success: "<div id='form-success'><h2>Successfully submitted form</h2><p>Soon we will contact you.</p></div>", // success message
  });
}