var campoFiltro = document.querySelector("#filtrar-tabela");

campoFiltro.addEventListener("input", function () {
    var produtos = document.querySelectorAll(".produto");

    if (this.value.length > 0) {
        for (var i = 0; i < produtos.length; i++) {
            var produto = produtos[i];
            var tdNome = produto.querySelector(".prod_nome");
            var nome = tdNome.textContent;
            var expressao = new RegExp(this.value, "i");

            if (!expressao.test(nome)) {
                produto.style.display = "none";
                //produto.classList.add("invisivel");
            } else {
                produto.style.display = "";
                //produto.classList.remove("invisivel");
            }
        }
    } else {
        for (var u = 0; u < produtos.length; u++) {
            var produto1 = produtos[u];
            produto1.style.display = "";
            //produto1.classList.remove("invisivel");
        }
    }
});
