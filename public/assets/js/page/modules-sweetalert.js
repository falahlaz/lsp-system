"use strict";

$("#swal-1").click(function() {
	swal('Hello');
});

$("#swal-2").click(function() {
	swal('Good Job', 'You clicked the button!', 'success');
});

function deleteData(el) {
  let btnId   = $(el).data('btn-id');
  let formId  = $(el).parent().data('form-id');

  swal({
      title: 'Are you sure?',
      text: 'Once deleted, you will not be able to recover this data!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
      if (willDelete && (btnId === formId)) $(el).parent().submit();
  });
}