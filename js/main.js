$(document).ready(function() {

	loadOrderFales();
	loadOrderTrue();
	loadAdminData();

	setInterval(loadOrderFales, 5*1000);
	setInterval(showNotification, 5*1000);
	setInterval(loadOrderTrue, 60*1000);
	setInterval(loadAdminData, 5*60*1000);

	function loadOrderFales () {
		var acceptFalse = 'false';
		$("#ordersFale #ordsFalse").load("php/load-order.php", {
			acceptFalse: acceptFalse
		});
	}

	function loadOrderTrue () {
		var acceptTrue = 'true';
		$("#ordersTrue #ordsTrue").load("php/load-order.php", {
			acceptTrue: acceptTrue
		});
	}

	function loadAdminData () {
		$("#adminData").load("templates/list-group.php", {

		});
	}

	function showNotification () {
		$("#notification").load("php/notification.php",{
			showNofi: true
		});
	}


 	// data picker ======================================================
	$('#clockactrue').clockpicker({
        autoclose: true
    });

    $('#clockacfalse').clockpicker({
        autoclose: false
    });

	getDate();

	function getDate() {

		var curDate = new Date();
		var curHour = curDate.getHours();
		var curMin  = curDate.getMinutes();

		if (curHour<10) curHour='0'+curHour;
		if (curMin<10) curMin='0'+curMin;

		$('#formSetAdminData').find('input[name="deadline"]').val(curHour+':'+curMin);
		$('#formSetAdminData').find('input[name="deadline"]').attr({"min" : curHour+':'+curMin});
	}


	// Dodawanie zamowiena przez uztkownika ======================================================
	// $('#formOrderUser #submitOrderUser').off().on("click", function(e) {
	// 	e.preventDefault();

	// 	var userOrder = 'user';

	// 	var imie = $(this).closest('form').find('input[name="imie"]').val();
	// 	var co = $(this).closest('form').find('input[name="co"]').val();
	// 	var cena = $(this).closest('form').find('input[name="cena"]').val();
	// 	// var zamawia = $(this).closest('form').find('input[name="zamawia"]').val();

	// 	// console.log("zamawia: " + zamawia);
	// 	console.log("kto: "+ imie +" co: "+ co +" cena: "+ cena);

	// 	$.ajax({
	// 		type:"POST",
	// 		url:"php/add_order.php",
	// 		data: { "userOrder": userOrder, "imie": imie, "co": co, "cena": cena},

	// 		success:function() {

	// 			$('#info').html('<div class="alert alert-success"><strong>Success!</strong>Twoje zamowienie zostalo wyslane.</div>');
	// 			setTimeout(function(){ $('#info').css("display", "none") }, 5*1000);
	// 			setInterval(loadOrderFales, 30*1000);
	// 			loadOrderFales();
	// 		},
	// 		error:function() {
	// 			alert("Wystapil blad!");
	// 		}

	// 	});

	// });


	// Dodawanie zamowiena przez Admina ======================================================
	// $('#formOrderAdmin #submitOrderAdmin').off().on("click", function(e) {
	// 	e.preventDefault();

	// 	var adminOrder = 'admin';

	// 	var imie = $(this).closest('form').find('input[name="imie"]').val();
	// 	var co = $(this).closest('form').find('input[name="co"]').val();
	// 	var cena = $(this).closest('form').find('input[name="cena"]').val();
	// 	// var zamawia = $(this).closest('form').find('input[name="zamawia"]').val();

	// 	// console.log("zamawia: " + zamawia);
	// 	console.log("kto: "+ imie +" co: "+ co +" cena: "+ cena);

	// 	$.ajax({
	// 		type:"POST",
	// 		url:"php/add_order.php",
	// 		data: { "adminOrder": adminOrder, "imie": imie, "co": co, "cena": cena},

	// 		success:function() {

	// 			$('#info').html('<div class="alert alert-success"><strong>Success!</strong>Twoje zamowienie zostalo wyslane.</div>');
	// 			setTimeout(function(){ $('#info').css("display", "none") }, 5*1000);
	// 			setInterval(loadOrderFales, 30*1000);
	// 			loadOrderFales();
	// 		},
	// 		error:function() {
	// 			alert("Wystapil blad!");
	// 		}

	// 	});

	// });

	// //akceptowanie zamowienia ======================================================
	$(document).on('click', '#btnAccept', function(){
		var id = $(this).val();

		$.ajax({
			type:"POST",
			url:"php/akceptuj.php",
			data: { "id": id },

			success:function() {
				loadOrderTrue();
				loadOrderFales();
				loadAdminData();
			},
			error:function() {
				alert("Wystapil blad!");
			}

		});
	});

	// zmiana statusu zaplacil ======================================================
	$(document).on('click', '#btnZaplacil', function(){
		var id = $(this).val();
		var zaplacil = $(this).attr("zaplacil");
		console.log('id: '+id+' zaplacil: '+zaplacil);

		$.ajax({
			type:"POST",
			url:"php/zaplacil.php",
			data: { "id": id, "zaplacil": zaplacil },

			success:function() {
				loadOrderTrue();
				loadOrderFales();
				loadAdminData();
			},
			error:function() {
				alert("Wystapil blad!");
			}

		});
	});



    	//edytowanie zamowienia ======================================================


		$('.table tbody').on('click','#btnEdit', function() {
			var id = $(this).val();

	        var currow = $(this).closest('tr');
	        var col1 = currow.find('td:eq(1)').text();
	        var col2 = currow.find('td:eq(2)').text();
	        var col3 = currow.find('td:eq(3)').text();
	        // var col5 = currow.find('td:eq(5)').text();

	        $("#inputId").val(id);
	        $("#inputKto").val(col1);
	        $("#inputCo").val(col2);
	        $("#inputCena").val(col3);

		});


        $('#formEditData #btnEditData').off().on("click", function(e) {
    		e.preventDefault();

    		var imie 	 = $(this).closest('form').find('input[name="kto"]').val();
    		var co  = $(this).closest('form').find('input[name="co"]').val();
    		var cena 	 = $(this).closest('form').find('input[name="cena"]').val();
    		var id 	 = $(this).closest('form').find('input[name="id"]').val();

            var admin = 'admin';
            
    		$.ajax({
    			type:"POST",
    			url:"php/edycja.php",
    			data: {"admin": admin, "id": id, "imie": imie, "co": co, "cena": cena},

    			success:function() {
    				loadOrderTrue();
    			},
    			error:function() {
    				alert("Wystapil blad!");
    			}

    		});

    	});



	//usowanie zamowienia ======================================================
	$(document).on('click', '#btnDelete', function(){
		var id = $(this).val();
		$.ajax({
			type:"POST",
			url:"php/del.php",
			data: { "id": id },

			success:function() {
				loadOrderTrue();
				loadOrderFales();
				loadAdminData();
			},
			error:function() {
				alert("Wystapil blad!");
			}

		});

	});

	// ustawianie/edycja danych Admina ======================================================
	$('#formSetAdminData #btnSetAdminData').off().on("click", function(e) {
		e.preventDefault();

		var imie 	 = $(this).closest('form').find('input[name="imie"]').val();
		var miejsce  = $(this).closest('form').find('input[name="miejsce"]').val();
		var link 	 = $(this).closest('form').find('input[name="link"]').val();
		var tel  	 = $(this).closest('form').find('input[name="tel"]').val();
		var deadline = $(this).closest('form').find('input[name="deadline"]').val();

		$.ajax({
			type:"POST",
			url:"php/editAdmin.php",
			data: { "imie": imie, "miejsce": miejsce, "link": link, "tel": tel, "deadline": deadline },

			success:function() {
				loadAdminData();
			},
			error:function() {
				alert("Wystapil blad!");
			}

		});

	});

	// usun wszystkie ======================================================
	$(document).on('click', '#btnuwTak', function(e){
		e.preventDefault();

		$.ajax({
			type:"POST",
			url:"php/delAll.php",
			data: {  },

			success:function() {
				loadOrderTrue();				
			},
			error:function() {
				alert("Wystapil blad!");
			}

		});

	});



	// zmiana statusu dostawy ======================================================
	$(document).focusout('#inputDostawa', function(){

        dostawa();

    });

	$(document).keyup('#inputDostawa', function(e){
	    if(e.keyCode == 13){
	        dostawa();
	    }
	});


	function dostawa () {

		var free = 'Free';

		var dostawa = $('#formDostawa').find('input[name="dostawa"]').val();

		console.log(dostawa);

		console.log('dostawa: ' + dostawa);

		$.ajax({
			type:"POST",
			url:"php/dostawa.php",
			data: { "dostawa": dostawa },

			success:function() {
				loadAdminData();
			},
			error:function() {
				alert("Wystapil blad!");
			}

		});

	}




});
