function addServico(id, nome, valor){
    //fechar modal
    bootstrap.Modal.getOrCreateInstance(document.getElementById('modalOS')).hide();
    alert(nome);
    const tcorpo= document.getElementById('itemOS');
    const linha = document.createElement('tr');

   linha.innerHTML="<td>"+id+"</td>"+nome+"<td></td><td></td>";
   tcorpo.appendChild(linha);
}
