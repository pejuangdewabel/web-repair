<?php
	if( isset( $_GET['ref'] ) ){
		echo '<input type="hidden" id="ref" value="'.$_GET['ref'].'" />';
	} else echo '<input type="hidden" id="ref" value="" />';
	if( isset( $_GET['ref2'] ) ){
		echo '<input type="hidden" id="ref2" value="'.$_GET['ref2'].'" />';
	} else echo '<input type="hidden" id="ref2" value="" />';
	if( isset( $_GET['ref2from'] ) ){
		echo '<input type="hidden" id="ref2from" value="'.$_GET['ref2from'].'" />';
	} else echo '<input type="hidden" id="ref2from" value="" />';

	if( isset( $_GET['tipe'] ) ){
		echo '<input type="hidden" id="tipe" value="'.$_GET['tipe'].'" />';
	} else echo '<input type="hidden" id="tipe" />';

	if( isset( $_GET['cond1'] ) ){
		echo '<input type="hidden" id="cond1" value="'.$_GET['cond1'].'" />';
	} else echo '<input type="hidden" id="cond1" value="" />';

	if( isset( $_GET['cond2'] ) ){
		echo '<input type="hidden" id="cond2" value="'.$_GET['cond2'].'" />';
	} else echo '<input type="hidden" id="cond2" value="" />';

	if( isset( $_GET['cond3'] ) ){
		echo '<input type="hidden" id="cond3" value="'.$_GET['cond3'].'" />';
	} else echo '<input type="hidden" id="cond3" value="" />';

	if( isset( $_GET['cond4'] ) ){
		echo '<input type="hidden" id="cond4" value="'.$_GET['cond4'].'" />';
	} else echo '<input type="hidden" id="cond4" value="" />';

?>
<h2>Search Data</h2>
	<form class="form-horizontal">
<div><input type="text" id="key" title="Masukkan nilai untuk mencari data. Klik pada baris yang diinginkan untuk memasukkan nilai" /></div>
<div class="row">
	<div class="span12 tab-pane active listgrid" style="height:370px;width:950px" id="listgrid">
	<input type="hidden" id="baris-listgrid" name="baris-listgrid" value="0" />
		<div id="result"></div>
	</div>
</div>		
	</form>
<style type="text/css">
#listgrid{
overflow-x:auto;
}
#listgrid{
overflow-y:auto;
}
</style>
<style>
input{
text-transform:uppercase;
}
</style>

<div id="mask"></div>
<link href="<?php echo base_url('assets/css/mask.css'); ?>" rel="stylesheet">
<script src='<?php echo base_url('assets/js/unserialize.js'); ?>'></script>
<script src='<?php echo base_url('assets/js/utf8.decode.js'); ?>'></script>
<script src='<?php echo base_url('assets/js/script.js'); ?>'></script>
<script>
//Edit Function ini
$( document ).ready( function() {
// var hasil;
var xlebar="";
var xjudul="";
var xalign="";
var xfield="";
var xfunction_name="";


if  ($('#tipe').val()=='sal'){ // tampilan untuk ke data grid yang di cari f5 atau pada saat di browser
	xlebar="100px;250px;250px;50px;50px;100px;100px";
	xjudul="Kode sales;Nama sales;address;title;team;no_ktp;phone";
	xalign="";
	xfield="sales_code;nama_sales;address;title;team;no_ktp;phone";
	xfunction_name="db_sales";	
}
else{
	alert('Script Error. Refresh Page');
	parent.$.fancybox.close();
}

	var maxfield='1';
function loaddata(kode){
var pecahlebar=xlebar.split(';');
var pecahjudul=xjudul.split(';');
var pecahalign=xalign.split(';');
var pecahfield=xfield.split(';');
maxfield=Number(pecahfield.length)-1;
	$.post( '../'+ xfunction_name, { key: kode,cond1: $('#cond1').val(),cond2: $('#cond2').val(),cond3: $('#cond3').val(),cond4: $('#cond4').val() }, function( result ){
		var data = unserialize( result );
		// hasil=data;
		var tabel = '<table><thead><tr>'
		var ix=0;
		var i = 0;
		var lebar="";
		var align="";
		var judul="";
		$('#baris-listgrid').val(0);
		while( pecahfield[ ix ] ){
			if (pecahlebar[ix]){
				lebar="width:"+ pecahlebar[ix];
			}else {
				lebar="";
			}
			if (pecahalign[ix]){
				align="text-align:"+ pecahalign[ix];
			}else {
				align="text-align:left";
			}
			if (pecahjudul[ix]){
				judul= pecahjudul[ix];
			}else {
				judul=pecahfield[ ix ];
			}
			if (lebar==''){
				if (align==''){
					tabel+='<th class="listgrid-'+ix+' detail_list">'+ judul +'</th>';
				}else{
					tabel+='<th class="listgrid-'+ix+' detail_list" style="'+ align +'">'+ judul +'</th>';
				}
			}else{
				if (align==''){
					tabel+='<th class="listgrid-'+ix+' detail_list" style="'+ lebar +'">'+ judul +'</th>';
				}else{
					tabel+='<th class="listgrid-'+ix+' detail_list" style="'+ lebar +';'+ align +'">'+ judul +'</th>';
				}
			}
			ix++;
		}
		tabel+='</tr>';
		if( data[ 0 ] == null ){
			tabel += '<tr id=""><td colspan="'+ maxfield +'">Tidak ada data</td></tr>';
			tabel += '<tr class="result" id="" style="display:none">';
			ix=0;
			while( pecahfield[ ix ] ){
				tabel += '<td ><input style="width:'+ pecahlebar[ix] +';text-align:'+ pecahalign[ix] +'" type="text" readonly="readonly" name="listgrid['+i+']['+ix+']" id="listgrid-'+i+'-'+ix+'" class="listgrid-'+ix+' detail_list" value="" /></td>';
				ix++;
			}
			tabel += '</tr>';
			$('#key').focus();
		} else {
			while( data[ i ] ){
				tabel += '<tr class="result" id="'+escape( data[ i ][ pecahfield[0] ] )+'" pos="listgrid-'+i+'-">';
				ix=0;
				while( data[ i ][pecahfield[ ix ]] || ix <= maxfield ){
					if (data[ i ][ pecahfield[ ix ] ]==null){
						if (pecahalign[ix]=='right'){
							tabel += '<td ><input style="width:'+ pecahlebar[ix] +';text-align:'+ pecahalign[ix] +'" type="text" readonly="readonly" name="listgrid['+i+']['+ix+']" id="listgrid-'+i+'-'+ix+'" class="listgrid-'+ix+' detail_list" value="'+ FormatNumberBy3(0,'.',',') +'" /></td>';
						}else{
							tabel += '<td ><input style="width:'+ pecahlebar[ix] +';text-align:'+ pecahalign[ix] +'" type="text" readonly="readonly" name="listgrid['+i+']['+ix+']" id="listgrid-'+i+'-'+ix+'" class="listgrid-'+ix+' detail_list" value="" /></td>';
						}
					}else{
						if (pecahalign[ix]=='right'){
							tabel += '<td ><input style="width:'+ pecahlebar[ix] +';text-align:'+ pecahalign[ix] +'" type="text" readonly="readonly" name="listgrid['+i+']['+ix+']" id="listgrid-'+i+'-'+ix+'" class="listgrid-'+ix+' detail_list" value="'+ FormatNumberBy3(data[ i ][ pecahfield[ ix ] ],'.',',') +'" /></td>';
						}else{
							tabel += '<td ><input style="width:'+ pecahlebar[ix] +';text-align:'+ pecahalign[ix] +'" type="text" readonly="readonly" name="listgrid['+i+']['+ix+']" id="listgrid-'+i+'-'+ix+'" class="listgrid-'+ix+' detail_list" value="'+data[ i ][ pecahfield[ ix ] ].replace(/"/g,'&quot;')+'" /></td>';
						}
					}
				ix++;
				}
				tabel += '</tr>';
				i++;
				$('#baris-listgrid').val(Number($('#baris-listgrid').val())+1);
				// if (i==20){
				// break;
				// }
			}
		}
		tabel += '</tbody></table>';
		$( '#result' ).html( tabel ).fadeIn();
		$('#listgrid-0-0').focus();
		$('#listgrid-0-0').select();
	});
}	
loaddata('');
$('#listgrid-0-0').live("focus",function(){
	$( '#'+$( "#ref" ).val(), window.parent.document ).attr( 'oldvalue',"" );
});
$(".detail_list").live('keydown',function(e){
e.preventDefault();
	var pecah=$(this).attr('id').split('-');
	var xcol=pecah[2];
	var xrow=pecah[1];
	if (e.which===13){
		if ($( "#ref2" ).val()!==''){
			var pecahobj=$( "#ref2" ).val().split(',');
			var pecahpos=$( "#ref2from" ).val().split(',');
			var i=0;
			for (i=0;i<=pecahobj.length;i++)
			{
				$( '#'+pecahobj[i], window.parent.document ).val( $('#listgrid-'+ xrow +'-'+pecahpos[i]).val() );
			}
		}
		$( '#'+$( "#ref" ).val(), window.parent.document ).val( $('#listgrid-'+ xrow +'-0').val() );
		$( '#'+$( "#ref" ).val(), window.parent.document ).focus();
		$( '#'+$( "#ref" ).val(), window.parent.document ).attr( 'oldvalue',"" );
		$( '#'+$( "#ref" ).val(), window.parent.document ).attr( 'laststatus',"x" );
		parent.$.fancybox.close();
	}else if (e.which == 37 && e.ctrlKey && e.shiftKey) {
		e.preventDefault;
		$(this).width($(this).width()-10);
		var xwid=$(this).width();
		var ix=$(this).attr('id').split('-');
		var xclass="listgrid-"+ ix[2];
		$("."+ xclass).each( function(){
			$(this).width(xwid);
		});
		return false;
	}else if (e.which == 37 && e.ctrlKey) {
		e.preventDefault;
		$(this).width($(this).width()-2);
		var xwid=$(this).width();
		var ix=$(this).attr('id').split('-');
		var xclass="listgrid-"+ ix[2];
		$("."+ xclass).each( function(){
			$(this).width(xwid);
		});
		return false;
	}else if (e.which == 39 && e.ctrlKey && e.shiftKey) {
		e.preventDefault;
		$(this).width($(this).width()+10);
		var xwid=$(this).width();
		var ix=$(this).attr('id').split('-');
		var xclass="listgrid-"+ ix[2];
		$("."+ xclass).each( function(){
			$(this).width(xwid);
		});
		return false;
	}else if (e.which == 39 && e.ctrlKey) {
		e.preventDefault;
		$(this).width($(this).width()+2);
		var xwid=$(this).width();
		var ix=$(this).attr('id').split('-');
		var xclass="listgrid-"+ ix[2];
		$("."+ xclass).each( function(){
			$(this).width(xwid);
		});
		return false;
	}else if (e.which===37){
		if (xcol=='0'){
			setfocus2(Number(xrow),maxfield,'listgrid');
		}else{
			setfocus(Number(xrow),Number(xcol)-1,'listgrid');
		}
	}else if (e.which===38){
		setfocus2(Number(xrow),xcol,'listgrid');
	}else if (e.which===39){
		if (xcol==maxfield){
			setfocus(Number(xrow)+1,'0','listgrid');
		}else{
			setfocus(Number(xrow),(Number(xcol)+1)+'','listgrid');
		}
	}else if (e.which===40){
		setfocus(Number(xrow)+1,xcol,'listgrid');
	}else if (e.which===35){
		setfocus2(Number($('#baris-listgrid').val()),xcol,'listgrid');
	}else if (e.which===36){
		setfocus(0,xcol,'listgrid');
	}else if (e.which===33){
		if ((Number(xrow)-11)<0){
			setfocus(0,xcol,'listgrid');
		}else{
			setfocus2(Number(xrow)-11,xcol,'listgrid');
		}
	}else if (e.which===34){
		if ((Number(xrow)+11)>=Number($('#baris-listgrid').val())){
			setfocus2(Number($('#baris-listgrid').val()),xcol,'listgrid');
		}else{
			setfocus(Number(xrow)+11,xcol,'listgrid');
		}
	}else if (e.ctrlKey || e.shiftKey){		
	}else {
		$('#key').focus();
	}
	
});

	$( '#key' ).keyup( function( e ){
		if ( e.which === 13 ){
		e.preventDefault();
			loaddata($( '#key' ).val());
		} else if ( e.which === 27 ){
			parent.$.fancybox.close();
		}
	});

	$( '.result' ).live( 'dblclick', function(){
		if ($( "#ref2" ).val()!==''){
			var pecahobj=$( "#ref2" ).val().split(',');
			var pecahpos=$( "#ref2from" ).val().split(',');
			var i=0;
			for (i=0;i<=pecahobj.length;i++)
			{
				$( '#'+pecahobj[i], window.parent.document ).val( unescape( $( '#'+$( this ).attr( 'pos' )+pecahpos[i] ).val()) );
			}
		}
		$( '#'+$( "#ref" ).val(), window.parent.document ).val( unescape( $( this ).attr( 'id' ) ) );
		$( '#'+$( "#ref" ).val(), window.parent.document ).focus();
		$( '#'+$( "#ref" ).val(), window.parent.document ).attr( 'oldvalue',"" );
		$( '#'+$( "#ref" ).val(), window.parent.document ).attr( 'laststatus',"x" );
		parent.$.fancybox.close();
	});
});
</script>