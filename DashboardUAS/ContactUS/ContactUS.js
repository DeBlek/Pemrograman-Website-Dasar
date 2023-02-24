$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip()
})

function submit1(){
	var tes = confirm('Yakin akan dikirim?');
	if (tes == true){
		alert('Data berhasil disubmit')
	}else{
		alert('Data tidak berhasil disubmit')
	}
}
