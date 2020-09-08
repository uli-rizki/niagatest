/* Fungsi formatRupiah */
function formatRupiah(angka, prefix, lineThrough){
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	sisa     		= split[0].length % 3,
  rupiah     		= split[0].substr(0, sisa),
  ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

  rupiah = lineThrough == undefined ? "<span class='price--strong'>" + split[0].substr(0, sisa) + "</span>" : rupiah
 
	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
 
	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
}

// $(function(){
//   var packagePrice = $(".price").text()
//   var priceStrike = $(".price--strike").text()

//   var changeFormat = formatRupiah(packagePrice, 'Rp')
//   var changeFormatStrike = formatRupiah(priceStrike, 'Rp', true)
  
//   $(".price").html(changeFormat)
//   $(".price--strike").html(changeFormatStrike)
// })