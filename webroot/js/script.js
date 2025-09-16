String.prototype.format = function (format) {
    var string = this.toString()
    var clean = string.replace(/[\D]/g, '')
    for (var i = 0; i < clean.length; i++)
        format = format.replace(/#/, clean[i])
    return clean.length > 0 ? format.replace(/([\D])#|#/g, '') : ''
}

phone = input => {
    var clean = input.value.replace(/[^\d]/g, '')
    if (clean.length === 13)
        return input.value = clean.format('+## ## #####-####')
    if (clean.length === 12)
        return input.value = clean.format('+## ## ####-####')
    if (clean.length === 11)
        return input.value = clean.format('## #####-####')
    if (clean.length === 10)
        return input.value = clean.format('## ####-####')
    return input.value = clean
}

function valida_cpf(value) {
    cpf = typeof value == "string" ? value : value.value;
    if (typeof value !== "string" && value.required == false && cpf == "") {
        document.getElementById("errocpf").style.display = "none";
        return true;
    }
    cpf = cpf.replace(/[^\d]+/g, "");
    var numeros, digitos, soma, i, resultado, digitos_iguais;
    digitos_iguais = 1;
    if (cpf.length < 11) {
        document.getElementById("errocpf").style.display = "block";
        document.getElementById('cpf').focus();
        return false;
    }

    for (i = 0; i < cpf.length - 1; i++)
        if (cpf.charAt(i) != cpf.charAt(i + 1)) {
            digitos_iguais = 0;
            break;
        }
    if (!digitos_iguais) {
        numeros = cpf.substring(0, 9);
        digitos = cpf.substring(9);
        soma = 0;
        for (i = 10; i > 1; i--) soma += numeros.charAt(10 - i) * i;
        resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);
        if (resultado != digitos.charAt(0)) {
            document.getElementById("errocpf").style.display = "block";
            document.getElementById('cpf').focus();
            return false;
        }
        numeros = cpf.substring(0, 10);
        soma = 0;
        for (i = 11; i > 1; i--) soma += numeros.charAt(11 - i) * i;
        resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);
        if (resultado != digitos.charAt(1)) {
            document.getElementById("errocpf").style.display = "block";
            document.getElementById('cpf').focus();
            return false;
        }
        document.getElementById("errocpf").style.display = "none";
        return true;
    } else {
        document.getElementById("errocpf").style.display = "block";
        document.getElementById('cpf').focus();
        return false;
    }
}

function validar_checkbox() {

    var ver_ck = document.querySelectorAll('[type=checkbox]')

    var check_return = false

    for (var checkbox of ver_ck) {
        if (checkbox.checked == true) {
            check_return = true
        }
    }
    if (check_return == true) {
        return true
    } else if (check_return == false) {
        alert('Deve ser escolhida ao menos um ano escolar.')
        return false
    }

}

function seleciona_ano(el) {

    // console.log(document.getElementsByClassName("btn_inf")[0].checked)
    // console.log(document.querySelectorAll(".opt_inf"))

    const nodeListInf = document.querySelectorAll(".opt_inf");
    const nodeListFund1 = document.querySelectorAll(".opt_fund1");
    const nodeListFund2 = document.querySelectorAll(".opt_fund2");
    const nodeListMed = document.querySelectorAll(".opt_med");

    var elem = el.value;

    console.log(elem);
    console.log(el);

    if (elem == 1) {

        for (let i = 0; i < nodeListInf.length; i++) {
            if (nodeListInf[i].checked == true) {
                nodeListInf[i].checked = false;
            } else {
                nodeListInf[i].checked = true;
            }
            // document.getElementById('lbl_inf').style.active = false;

            // for (var i = 0; i < 2; i++) {
            //     if (document.getElementsByClassName("btn_inf")[0].checked == true) {

            //         document.getElementsByClassName("inf")[i].checked = false
            //     } else {
            //         document.getElementsByClassName("inf")[i].checked = true
            //     }

        }
    }

    if (elem == 2) {
        for (let i = 0; i < nodeListFund1.length; i++) {
            if (nodeListFund1[i].checked == true) {
                nodeListFund1[i].checked = false;
            } else {
                nodeListFund1[i].checked = true;
            }
            // for (var i = 0; i < 4; i++) {
            //     if (document.getElementsByClassName("fund1")[i].checked == true) {
            //         document.getElementsByClassName("fund1")[i].checked = false
            //     } else {
            //         document.getElementsByClassName("fund1")[i].checked = true
            //     }
        }

    }

    if (elem == 3) {
        for (let i = 0; i < nodeListFund2.length; i++) {
            if (nodeListFund2[i].checked == true) {
                nodeListFund2[i].checked = false;
            } else {
                nodeListFund2[i].checked = true;
            }
            // for (var i=0; i <5; i++){
            //     if (document.getElementsByClassName("fund2")[i].checked == true){
            //         document.getElementsByClassName("fund2")[i].checked = false
            //     } else {
            //         document.getElementsByClassName("fund2")[i].checked = true
            //     }
        }
    }

    if (elem == 4) {
        for (let i = 0; i < nodeListMed.length; i++) {
            if (nodeListMed[i].checked == true) {
                nodeListMed[i].checked = false;
            } else {
                nodeListMed[i].checked = true;
            }
            // for (var i=0; i<3; i++){
            //     if (document.getElementsByClassName("medio")[i].checked == true){
            //         document.getElementsByClassName("medio")[i].checked = false
            //     } else {
            //         document.getElementsByClassName("medio")[i].checked = true
            //     }
        }
    }

}
function modal_exclusao(button) {
    var idname = button.parentNode.parentNode.querySelector("input[name*='id']");
    const node = document.getElementById("compfam");
    window.compfam = window.compfam || node.cloneNode(true);
    window.compfamcontainer = window.compfamcontainer || window.compfam.parentNode;

    if (idname.value !== "") {
        $("#alertaExcluirCompFam").modal("show");
    } else {

        window.compfam = window.compfam || node.cloneNode(true);

        button.parentNode.parentNode.parentNode.removeChild(
            button.parentNode.parentNode
        );
    }

    var namecomp = button.parentNode.parentNode.querySelector(
        "input[name*='nm_comp_fam']"
    );
    var nameparentesco = button.parentNode.parentNode.querySelector(
        "input[name*='nm_parentesco']"
    );

    // console.log(idname, namecomp, nameparentesco);

    var inputid = document.querySelector(
        "#alertaExcluirCompFam input[name*='id']"
    );
    var nmcompfam = document.querySelector(
        "#alertaExcluirCompFam .nomeCompFam"
    );
    nmcompfam.innerText = namecomp.value + " - " + nameparentesco.value;
    inputid.value = idname.value;
}

function verificaContato() {
    var telefone = document.getElementById("tel").value;
    var celular = document.getElementById("cel").value;

    if ((telefone == "" || telefone.length < 14) && (celular == "" || celular.length < 15)) {
        alert("Deve colocar ao menos um número de telefone!");
        document.getElementById("tel").focus();
    }

    // if (telefone == "" && celular == "") {
    //     alert("Deve colocar ao menos um número de telefone!");
    //     document.getElementById("tel").focus();
    // } else {
    //     alert(telefone.length);
    //     alert(celular.length);

        
    // }
}


/**
 * @function adicionarCampos Função que adiciona campos na Composição Familiar no Template add_cand e na view_cand
 * @param {String} campos - id da div dos campos
 */
function adicionarCampos(campos) {
    
    campos = campos || "compfamdiv";
    const node = window[campos] || document.querySelector("#containerfam div");
    window[campos + "container"] = window[campos + "container"] || node.parentNode;
    
    window[campos] = window[campos] || node.cloneNode(true);
    const clone = window[campos].cloneNode(true);
    // console.log(campos + "container", campos, node, window[campos]);
    for (let input of clone.querySelectorAll("input, select")) {
        input.name = input.name.replace(
            "0",
            window[campos + "container"].childElementCount
        );
        var erromessage = input.parentNode.parentNode.querySelector(".error-message");
        if (erromessage) erromessage.style.display = "none";
        input.value = null;
    }

    if (window[campos + "container"].lastElementChild) var invalid = true;
    if (window[campos + "container"].lastElementChild)
    for (let input of window[campos + "container"].lastElementChild.querySelectorAll("input, select")) {
        invalid = input.required && !input.value;
        var erromessage = input.parentNode.parentNode.querySelector(".error-message");
        if (erromessage) erromessage.style.display = invalid ? "block" : "none";

        // console.log(input.value, invalid, input.required);
        console.log(document.querySelector("#containerfam div").children[0]);
    }
    if (!invalid) window[campos + "container"].appendChild(clone);
    
    // document.getElementById('comperro').style.display = "block";
    $(".money").mask("#.##0,00", {
        reverse: true,
    });
}

function teste (campos) {

    const listar = document.querySelector('.fam');

    console.log(listar);

    const filhos = listar.children[0];

    const clonar = filhos.cloneNode(true);

    const adicionar = listar.appendChild(clonar)

    console.log(adicionar);
}

