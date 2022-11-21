function addServico(id, nome, valor) {
    //fechar modal
    bootstrap.Modal.getOrCreateInstance(document.getElementById('modalOS')).hide();
    alert(nome);
    const tcorpo = document.getElementById('itemOS');
    const linha = document.createElement('tr');
    var inputID= '<td><input name="idServ[]" value = "'+id+'" readonly size="5" class="form-control-plaintext"></td>';
    var inputNome= '<td>'+nome+'</td>';
    
    var inputValor= '<td><input name="valorServ[]" value = "'+valor+'" size="5" class="form-control"></td>';
    //var inputQtde= '<td><input name="qtde[]" value = "1" readonly></td>';
    linha.innerHTML = inputID+inputNome;
    tcorpo.appendChild(linha);
}
