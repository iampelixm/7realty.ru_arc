{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	
	 --}}
<script type="text/javascript">
	function setFavorites(id){       
	   
		$.ajax({
				headers: { 'X-CSRF-TOKEN' : "{{csrf_token()}}" },
				url: "{{ route('site.set_favorites') }}",
				method: 'post',
				data:{
					id: id,
				},
				dataType: 'json',
				cache: false,
				success: function(response) {
					console.log(response);
					if (response['status'] ==true)
					 {
					  console.log('set favorites');
					 } 
					
					if ((response['status'] == false) && (response['code'] == '403'))
					 {
					  console.log('access denid!');
					   var mess = document.getElementById('formRegister');
						 mess.classList.toggle('d-none');
            mess.classList.toggle('d-block');
					 }
					
				},
				error: function (e) {
					console.log(response);
				}
			});    
	}

	function sendOrder(){
		var take = document.getElementById('take').value;
		var hand = document.getElementById('hand').value;
		var buy = document.getElementById('buy').value;
		var sell = document.getElementById('sell').value;
		var type_object_select = document.getElementById('type_object');
		var type_object = type_object_select.options[type_object_select.selectedIndex].value;
		var price_select = document.getElementById('price');
		var price = price_select.options[price_select.selectedIndex].value;
		var name = document.getElementById('name').value;
		var phone = document.getElementById('phone').value;
		var email = document.getElementById('email').value;
		var check = document.getElementById('check').value;
		$.ajax({
				headers: { 'X-CSRF-TOKEN' : "{{csrf_token()}}" },
				url: "{{ route('site.send_order') }}",
				method: 'post',
				data:{
					take: take,
					hand: hand,
					buy: buy,
					sell: sell,
					type_object: type_object,
					price: price,
					name: name,
					phone: phone,
					email: email,
					check: check
				},
				dataType: 'json',
				cache: false,
				success: function(response) {
					console.log(response);
					if (response['status'] == true)
					{
						var mess = document.getElementById('success_message');
            mess.classList.toggle('d-none');
            mess.classList.toggle('d-block');
					} 
					
					if (response['status'] == false)
					{
						var mess = document.getElementById('formError').innerText = response['message'];
					   
					} 
					
					
				},
				error: function (e) {
					console.log(response);
				}
			});
		
	}

	 function register(){
	  var phone = document.getElementById('register_phone').value;
	  var name = document.getElementById('register_name').value;
	  $.ajax({
			  headers: { 'X-CSRF-TOKEN' : "{{csrf_token()}}" },
			  url: "{{ route('site.register') }}",
			  method: 'post',
			  data:{
				  phone: phone,
				  name: name,
			  },
			  dataType: 'json',
			  cache: false,
			  success: function(response) {
				  console.log(response);
				   if (response['status'] == true)
					{
						var phone = document.getElementById('phoneCode').value = response['phone'];

						var mess = document.getElementById('formRegister');
            mess.classList.toggle('d-none');
            mess.classList.toggle('d-block');

						var mess = document.getElementById('formCode');
            mess.classList.toggle('d-none');
            mess.classList.toggle('d-block');
					} 
					
					if (response['status'] == false)
					{
						var mess = document.getElementById('formRegisterError').innerText = response['message'];
					   
					} 
				  
				  
			  },
			  error: function (e) {
				  console.log(response);
			  }
		  });     
	}

	function sendSMS(){
	  var phone = document.getElementById('tel').value;
	  $.ajax({
      headers: { 'X-CSRF-TOKEN' : "{{csrf_token()}}" },
      url: "{{ route('site.send_sms') }}",
      method: 'POST',
      data:{
        phone: phone,
      },
      dataType: 'JSON',
      cache: false,
      success: function(response) {
        console.log(response)
        if (response['status'] == true){
          let phone = document.getElementById('phoneCode').value = response['phone'];
          let mess = document.getElementById('formPhone');
          mess.classList.toggle('d-none');
          mess.classList.toggle('d-block');

          let mess1 = document.getElementById('formCode');
          mess1.classList.toggle('d-none');
          mess1.classList.toggle('d-block');
        } 
        if (response['status'] == false){
          var mess = document.getElementById('formSMSError').innerText = response['message'];
        } 
      },
      error: function (e) {
        console.log(response);
      } 
    });     
	}

	function sendCode(){
	  var code = document.getElementById('code').value;
	  var phone = document.getElementById('phoneCode').value;
	  $.ajax({
			  headers: { 'X-CSRF-TOKEN' : "{{csrf_token()}}" },
			  url: "{{ route('site.verification_code') }}",
			  method: 'POST',
			  data:{
				  code: code,
				  phone: phone
			  },
			  dataType: 'JSON',
			  cache: false,
			  success: function(response) {
					console.log(response);
					if (response['status'] == true)
					{
						var mess = document.getElementById('formCode');
						mess.classList.toggle('d-none');
						location.reload();
					} 
					
					if (response['status'] == false)
					{
						var mess = document.getElementById('formCodeError').innerText = response['message'];
					   
					} 
				  
			  },
			  error: function (e) {
				  console.log(response);
			  }
		  });     
	}

	function sendOrderShow(item, type){       
		var name = document.getElementById('name').value;
		var phone = document.getElementById('phone').value;
		var email = document.getElementById('email').value;
		$.ajax({
				headers: { 'X-CSRF-TOKEN' : "{{csrf_token()}}" },
				url: "{{ route('site.send_order_show') }}",
				method: 'post',
				data:{
					name: name,
					phone: phone,
					email: email,
					item: item,
					type: type
				},
				dataType: 'json',
				cache: false,
				success: function(response) {
					console.log(response);
					if (response['status'] == true)
					{
            var mess = document.getElementById('success_message');
            mess.classList.toggle('d-none');
            mess.classList.toggle('d-block');
					} 
					
					if (response['status'] == false)
					{
						var mess = document.getElementById('formOrderShowError').innerText = response['message'];
					   
					}            
					
				},
				error: function (e) {
					console.log(response);
				}
			});    
	}

	function sendOrderShowModal(item, type){       
		var name = document.getElementById('name_modal-'+item).value;
		var phone = document.getElementById('tel_modal-'+item).value;
		var email = document.getElementById('email_modal-'+item).value;

		$.ajax({
				headers: { 'X-CSRF-TOKEN' : "{{csrf_token()}}" },
				url: "{{ route('site.send_order_show') }}",
				method: 'post',
				data:{
					name: name,
					phone: phone,
					email: email,
					item: item,
					type: type
				},
				dataType: 'json',
				cache: false,
				success: function(response) {
					console.log(response);
					if (response['status'] == true)
					{
            var mess = document.getElementById('success_message');
            mess.classList.toggle('d-none');
            mess.classList.toggle('d-block');
					} 
					
					if (response['status'] == false)
					{
						var mess = document.getElementById('formOrderShowErrorModal-'+item).innerText = response['message'];
					   
					}            
					
				},
				error: function (e) {
					console.log(response);
				}
			});    
	}

	function sendOrderShowForm(item){       
		var name = document.getElementById('name_form').value;
		var phone = document.getElementById('phone_form').value;
		var email = document.getElementById('email_form').value;

		$.ajax({
				headers: { 'X-CSRF-TOKEN' : "{{csrf_token()}}" },
				url: "{{ route('site.send_order_show') }}",
				method: 'post',
				data:{
					name: name,
					phone: phone,
					email: email,
					item: item
				},
				dataType: 'json',
				cache: false,
				success: function(response) {
					console.log(response);
					if (response['status'] == true)
					{
						var mess = document.getElementById('success_message');
            mess.classList.toggle('d-none');
            mess.classList.toggle('d-block');
					} 
					
					if (response['status'] == false)
					{
						var mess = document.getElementById('formOrderShowFormError').innerText = response['message'];
					   
					} 
					
					
				},
				error: function (e) {
					console.log(response);
				}
			});    
	}

	function sendOrderBuy(){       
		var name = document.getElementById('buy_name').value;
		var phone = document.getElementById('buy_phone').value;
		var email = document.getElementById('buy_email').value;
		var text = document.getElementById('buy_text').value;

		$.ajax({
				headers: { 'X-CSRF-TOKEN' : "{{csrf_token()}}" },
				url: "{{ route('site.send_order_buy') }}",
				method: 'post',
				data:{
					name: name,
					phone: phone,
					email: email,
					text: text
				},
				dataType: 'json',
				cache: false,
				success: function(response) {
					console.log(response);
					if (response['status'] == true)
					{
						var mess = document.getElementById('success_message');
            mess.classList.toggle('d-none');
            mess.classList.toggle('d-block');
					} 
					
					if (response['status'] == false)
					{
						var mess = document.getElementById('formBuyOrder').innerText = response['message'];
					   
					} 
					
					
				},
				error: function (e) {
					console.log(response);
				}
			});    
	}

	function sendOrderOrenda(){       
		var name = document.getElementById('orenda_name').value;
		var phone = document.getElementById('orenda_phone').value;
		var email = document.getElementById('orenda_email').value;
		var text = document.getElementById('orenda_text').value;

		$.ajax({
				headers: { 'X-CSRF-TOKEN' : "{{csrf_token()}}" },
				url: "{{ route('site.send_order_orenda') }}",
				method: 'post',
				data:{
					name: name,
					phone: phone,
					email: email,
					text: text
				},
				dataType: 'json',
				cache: false,
				success: function(response) {
					console.log(response);
					if (response['status'] == true)
					{
						var mess = document.getElementById('success_message');
            			mess.classList.toggle('d-none');
            			mess.classList.toggle('d-block');
					} 
					
					if (response['status'] == false)
					{
						var mess = document.getElementById('formOrendaOrder').innerText = response['message'];
					   
					} 
					
					
				},
				error: function (e) {
					console.log(response);
				}
			});    
	}

	function showModal(item){
		var model = document.getElementById('model-item-'+item);
            model.classList.toggle('d-none');
            model.classList.toggle('d-block');
	} 

	function closeModal(item){
		var model = document.getElementById('model-item-'+item);
            model.classList.toggle('d-block');
            model.classList.toggle('d-none');
	}  

</script>

<script>
	!function(e){function r(r){for(var n,l,a=r[0],p=r[1],f=r[2],c=0,s=[];c<a.length;c++)l=a[c],Object.prototype.hasOwnProperty.call(o,l)&&o[l]&&s.push(o[l][0]),o[l]=0;for(n in p)Object.prototype.hasOwnProperty.call(p,n)&&(e[n]=p[n]);for(i&&i(r);s.length;)s.shift()();return u.push.apply(u,f||[]),t()}function t(){for(var e,r=0;r<u.length;r++){for(var t=u[r],n=!0,a=1;a<t.length;a++){var p=t[a];0!==o[p]&&(n=!1)}n&&(u.splice(r--,1),e=l(l.s=t[0]))}return e}var n={},o={1:0},u=[];function l(r){if(n[r])return n[r].exports;var t=n[r]={i:r,l:!1,exports:{}};return e[r].call(t.exports,t,t.exports,l),t.l=!0,t.exports}l.m=e,l.c=n,l.d=function(e,r,t){l.o(e,r)||Object.defineProperty(e,r,{enumerable:!0,get:t})},l.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},l.t=function(e,r){if(1&r&&(e=l(e)),8&r)return e;if(4&r&&"object"==typeof e&&e&&e.__esModule)return e;var t=Object.create(null);if(l.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:e}),2&r&&"string"!=typeof e)for(var n in e)l.d(t,n,function(r){return e[r]}.bind(null,n));return t},l.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return l.d(r,"a",r),r},l.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},l.p="/";var a=this.webpackJsonpmaps_gsv2008=this.webpackJsonpmaps_gsv2008||[],p=a.push.bind(a);a.push=r,a=a.slice();for(var f=0;f<a.length;f++)r(a[f]);var i=p;t()}([])
	   
</script>



<script src="{{ asset('/static/js/2.5f8db1f9.chunk.js') }}"></script>
<script src="{{ asset('/static/js/main.875966de.chunk.js') }}"></script>

