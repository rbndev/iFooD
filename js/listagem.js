var editar = document.querySelectorAll("i.editar");
var excluir = document.querySelectorAll("i.excluir");

for (var el of editar) {
    el.addEventListener('click', function(){
      Swal.fire({
        title: `Editar status ${this.id}.`,
        icon: 'warning',
        html: `<br><label for="status">Status:</label>

              <select name="status" id="status">
                <option value="aguardando">Aguardando Confirmação</option>
                <option value="preparando">Preparando Comida</option>
                <option value="saiuentrega">Saiu para Entrega</option>
                <option value="entregue">Pedido Entregue</option>
                <option value="cancelado">Cancelado</option>
              </select><br>`,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonColor: "rgb(69 130 44)",
            cancelButtonColor: "#000",
            confirmButtonText: "EDITAR STATUS",
            cancelButtonText: "CANCELAR",
            preConfirm: () => {
                
            }
    });
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