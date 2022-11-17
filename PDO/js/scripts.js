function addServico(id, nome, valor) {
    //fechar modal
    bootstrap.Modal.getOrCreateInstance(document.getElementById('modalOS')).hide();
    alert(nome);
    const tcorpo = document.getElementById('itemOS');
    const linha = document.createElement('tr');
    var inputID= '<td><input name="id[]" value = "'+id+'" readonly></td>';
    var inputQtde= '<td><input name="qtde[]" value = "1" readonly></td>';
    linha.innerHTML = inputID+ "</td>" + nome + "<td>150</td>"+inputQtde;
    tcorpo.appendChild(linha);
}
