var editar = document.querySelectorAll("i.editar");
var excluir = document.querySelectorAll("i.excluir");

for (var el of editar) {
    el.addEventListener('click', function(){
      console.log(this.id);
    });
}

for(var el of excluir){
    el.addEventListener('click', function(){
        Swal.fire({
            title: 'Opss!!!',
            text: `Você Deseja mesmo remover o id ${this.id}?`,
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: 'green',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, Deletar!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "excluir.php",
                    type: 'POST',
                    data: `id=${this.id}`,
                    success: function(data) {
                      if (data != "erro") {
                        $(`[data-id="${data}"]`).remove();
                        Swal.fire(
                          'Deletado!',
                          `Pedido ${data} deletado com sucesso!`,
                          'success'
                        )
                      } else {
                        Swal.fire(
                          'Sorry!',
                          `Pedido ${data} não foi deletado!`,
                          'error'
                        )
                      }
                    }
                  });
            }
          })
    });
}