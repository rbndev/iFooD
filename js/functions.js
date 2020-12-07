var card = {
    "pizza": {qto: 0, valor: 20},
    "coxinha": {qto: 0, valor: 4},
    "pastel": {qto: 0, valor: 4},
    "refri": {qto: 0, valor: 6},
    "suco": {qto: 0, valor: 3},
    "agua": {qto: 0, valor: 2},
    "total": {valor: 0}
}


// Estrutura
var nome = document.getElementById("nome");
const pedir = document.getElementById("pedir");
let valor = document.getElementById("cardvalor");

pedir.addEventListener("click", fazerpedido, true);

function fazerpedido(){
    $.ajax({
        url: "pedido.php",
        type: 'POST',
        data: `nome=${nome.value}
        &pizza=${card.pizza.qto}
        &coxinha=${card.coxinha.qto}
        &pastel=${card.pastel.qto}
        &refri=${card.refri.qto}
        &suco=${card.suco.qto}
        &agua=${card.agua.qto}
        &total=${card.total.valor}`,
        success: function(data) {
            if(card.total.valor == 0 || nome.value == ""){
                Swal.fire(
                    'Sorry!',
                    'Aconteceu um erro com o seu Pedido!',
                    'error'
                  )
            }else{
                Swal.fire(
                    'WoooW!',
                    'Pedido Realizado com Sucesso!',
                    'success'
                  )
                document.getElementById("nome").value = "";
                valor.innerHTML = "<b>Total:</b> R$ 0,00";
                card.pizza.qto = 0;
                card.coxinha.qto = 0;
                card.pastel.qto = 0;
                card.refri.qto = 0;
                card.suco.qto = 0;
                card.agua.qto = 0;
                card.total.valor = 0;

                qtoPizza.innerHTML = card.pizza.qto;
                qtoCoxinha.innerHTML = card.coxinha.qto;
                qtoPastel.innerHTML = card.pastel.qto;
                qtoRefri.innerHTML = card.refri.qto;
                qtoSuco.innerHTML = card.suco.qto;
                qtoAgua.innerHTML = card.agua.qto;
            }
        }
      });
    
}


// Pizza
let qtoPizza = document.getElementById("qtopizza");
let addPizza = document.getElementById("addpizza");
let delPizza = document.getElementById("delpizza");

addPizza.addEventListener("click", addpizza, true);
delPizza.addEventListener("click", delpizza, true);


function addpizza(){
    card.pizza.qto++;
    qtoPizza.innerHTML = card.pizza.qto;
    card.total.valor = card.total.valor + card.pizza.valor;
    valor.innerHTML = "<b>Total:</b> R$ " + card.total.valor + ",00";
}

function delpizza(){
    if(card.pizza.qto > 0){
        card.pizza.qto--;
        qtoPizza.innerHTML = card.pizza.qto;
        card.total.valor = card.total.valor - card.pizza.valor;
        valor.innerHTML = "<b>Total:</b> R$ " + card.total.valor + ",00";
    }else{
        return 0;
    }
}

// Coxinha

let qtoCoxinha = document.getElementById("qtocoxinha");
let addCoxinha = document.getElementById("addcoxinha");
let delCoxinha = document.getElementById("delcoxinha");

addCoxinha.addEventListener("click", addcoxinha, true);
delCoxinha.addEventListener("click", delcoxinha, true);

function addcoxinha(){
    card.coxinha.qto++;
    console.log(card.coxinha.qto)
    qtoCoxinha.innerHTML = card.coxinha.qto;
    card.total.valor = card.total.valor + card.coxinha.valor;
    valor.innerHTML = "<b>Total:</b> R$ " + card.total.valor + ",00";
}

function delcoxinha(){
    if(card.coxinha.qto > 0){
        card.coxinha.qto--;
        qtoCoxinha.innerHTML = card.coxinha.qto;
        card.total.valor = card.total.valor - card.coxinha.valor;
        valor.innerHTML = "<b>Total:</b> R$ " + card.total.valor + ",00";
    }else{
        return 0;
    }
}

// Pastel

let qtoPastel = document.getElementById("qtopastel");
let addPastel = document.getElementById("addpastel");
let delPastel = document.getElementById("delpastel");

addPastel.addEventListener("click", addpastel, true);
delPastel.addEventListener("click", delpastel, true);

function addpastel(){
    card.pastel.qto++;
    qtoPastel.innerHTML = card.pastel.qto;
    card.total.valor = card.total.valor + card.pastel.valor;
    valor.innerHTML = "<b>Total:</b> R$ " + card.total.valor + ",00";
}

function delpastel(){
    if(card.pastel.qto > 0){
        card.pastel.qto--;
        qtoPastel.innerHTML = card.pastel.qto;
        card.total.valor = card.total.valor - card.pastel.valor;
        valor.innerHTML = "<b>Total:</b> R$ " + card.total.valor + ",00";
    }else{
        return 0;
    }
}

// Refri

let qtoRefri = document.getElementById("qtorefri");
let addRefri = document.getElementById("addrefri");
let delRefri = document.getElementById("delrefri");

addRefri.addEventListener("click", addrefri, true);
delRefri.addEventListener("click", delrefri, true);

function addrefri(){
    card.refri.qto++;
    qtoRefri.innerHTML = card.refri.qto;
    card.total.valor = card.total.valor + card.refri.valor;
    valor.innerHTML = "<b>Total:</b> R$ " + card.total.valor + ",00";
}

function delrefri(){
    if(card.refri.qto > 0){
        card.refri.qto--;
        qtoRefri.innerHTML = card.refri.qto;
        card.total.valor = card.total.valor - card.refri.valor;
        valor.innerHTML = "<b>Total:</b> R$ " + card.total.valor + ",00";
    }else{
        return 0;
    }
}

// Suco

let qtoSuco = document.getElementById("qtosuco");
let addSuco = document.getElementById("addsuco");
let delSuco = document.getElementById("delsuco");

addSuco.addEventListener("click", addsuco, true);
delSuco.addEventListener("click", delsuco, true);

function addsuco(){
    card.suco.qto++;
    qtoSuco.innerHTML = card.suco.qto;
    card.total.valor = card.total.valor + card.suco.valor;
    valor.innerHTML = "<b>Total:</b> R$ " + card.total.valor + ",00";
}

function delsuco(){
    if(card.suco.qto > 0){
        card.suco.qto--;
        qtoSuco.innerHTML = card.suco.qto;
        card.total.valor = card.total.valor - card.suco.valor;
        valor.innerHTML = "<b>Total:</b> R$ " + card.total.valor + ",00";
    }else{
        return 0;
    }
}

// Agua

let qtoAgua = document.getElementById("qtoagua");
let addAgua = document.getElementById("addagua");
let delAgua = document.getElementById("delagua");

addAgua.addEventListener("click", addagua, true);
delAgua.addEventListener("click", delagua, true);

function addagua(){
    card.agua.qto++;
    qtoAgua.innerHTML = card.agua.qto;
    card.total.valor = card.total.valor + card.agua.valor;
    valor.innerHTML = "<b>Total:</b> R$ " + card.total.valor + ",00";
}

function delagua(){
    if(card.agua.qto > 0){
        card.agua.qto--;
        qtoAgua.innerHTML = card.agua.qto;
        card.total.valor = card.total.valor - card.agua.valor;
        valor.innerHTML = "<b>Total:</b> R$ " + card.total.valor + ",00";
    }else{
        return 0;
    }
}