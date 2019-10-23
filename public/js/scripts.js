$('#Modaldeletebtn').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var modal = $(this)
    var action = window.location.href + '/' + id;
        
    modal.find('.modal-title').text('Tem certeza que deseja deletar esse registro? ');
    $(".formDelete").attr('action', action);
  })



  /*
  Swal.fire({
    title: 'Error!',
    text: 'Do you want to continue',
    type: 'error',
    confirmButtonText: 'Cool'
  })




  Swal.fire({
    title: 'Sucesso!',
    text: 'Cadastrado com sucesso!',
    type: 'success',
    confirmButtonText: 'Cool'
  })
  */