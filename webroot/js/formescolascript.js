$(document).ready(function () {
  $("#escola").on("change", function () {
    // $("#tipos").empty();
    var escola = $("#escola").val();
    // alert(escola);
    document.querySelector("[name='idescola']").value = escola;
    var urlEnviada = document.getElementById("urltipo").value;

    alert (urlEnviada);

    $.ajax({
      url: urlEnviada,
      method: "get",
      data: {
        id: escola,
      },
      success: function (resposta) {
        // console.log($("#xx select"));
        $("#xx select").html(resposta);
      },
    });


    $("#tipos").on("change", function () {
      //   $("#ano").empty();
      var tipo = $("#tipos").val();
      //   var idescola = $("#escola").val();
      // alert(tipo);
      //   // alert(idescola);

      var urlTipoEnviada = document.getElementById("urlano").value;
      // alert(urlTipoEnviada);

      $.ajax({
        url: urlTipoEnviada,
        method: "get",
        data: {
          id: tipo,
          //       idescola: idescola,
        },
        success: function (resposta) {
          $("#anoid").html(resposta);
        },
      });
    });


    // $("#anoid").on("change", function () {
    //   var tipo = $("#tipos");
    //   var ano = $("#ano");

    //   window.localStorage.setItem("nmescola", escola.val());
    //   window.localStorage.setItem("nmtipo", tipo.val());
    //   window.localStorage.setItem("nmano", ano.val());
    // });

    console.log(escola);

    // Código para limpar o localStorage as informações da escola escolhida
    // if (!escola.length) {
    //   localStorage.removeItem("nmescola");
    //   localStorage.removeItem("nmtipo");
    //   localStorage.removeItem("nmano");
    // }


    // if ($("#formescola")) {
    //   var escolaid =
    //     $("#escola").val() || window.localStorage.getItem("nmescola");
    //   var urlEnviada = document.getElementById("urltipo").value;

    //   console.log(escolaid);
    //   $.ajax({
    //     url: urlEnviada,
    //     method: "get",
    //     data: {
    //       id: escolaid,
    //     },
    //     success: function (resposta) {
    //       var tipoid = $("#tipos").val() || window.localStorage.getItem("nmtipo");
    //       var anoid = $("#ano").val() || window.localStorage.getItem("nmano");
    //       var urlEnviada = document.getElementById("urlano").value;

    //       $("#xx select").html(resposta);

    //       console.log(tipoid, anoid);

    //       $.ajax({
    //         url: urlEnviada,
    //         method: "get",
    //         data: {
    //           idescola: escolaid,
    //           id: tipoid,
    //         },

    //         success: function (resposta) {
    //           $("#anoid").html(resposta);
    //           $("#escola").val(escolaid);
    //           $("#tipos").val(tipoid);
    //           $("#ano").val(anoid);
    //         },
    //       });
    //     },
    //   });

    //   console.log(escolaid);
    // }



  });



  // var escola = $("#escola");
  // var tipo = $("#tipos");
  // var ano = $("#ano");






  $("input[type=text]").on("focusout", function (event) {
    apenasLetras(event.target);
  });
});
function apenasLetras(element) {
  var input = document.querySelector('input[type="text"]');
  element.value = element.value.replace(/(^ {1,}| {2,}| {1,}$)/g, " ").trim();

  // console.log(element.value.trim());
}
