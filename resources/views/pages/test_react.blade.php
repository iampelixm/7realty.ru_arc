
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<link rel="icon" href="/favicon.ico"/>
	<meta name="viewport" content="width=device-width,initial-scale=1"/>
	<meta name="theme-color" content="#000000"/>
	<meta name="item-lon" content="30.353462"/>
	<meta name="item-lat" content="59.85021129999999"/>
	<meta name="data-backend" content='{!! $data_backend ?? '' !!}'/>
	<meta name="description" content="Web site created using create-react-app"/>
	<link rel="apple-touch-icon" href="{{ asset('logo192.png') }}"/>
	<link rel="manifest" href="{{ asset('manifest.json') }}"/>
	<title>React App</title>
	<link href="{{ asset('static/css/2.8f118048.chunk.css') }}" rel="stylesheet">
	<link href="{{ asset('static/css/main.e0982369.chunk.css') }}" rel="stylesheet">
</head>

<body>
	<noscript>You need to enable JavaScript to run this app.</noscript>
	<div class="Content"><button id="switch-map" class="Button">switch card</button>
		<div class="Container" id="cardContainer">
			<div class="Cards" id="cards">
				<div class="Card" data-id="1">card 1</div>
				<div class="Card" data-id="2">card 2</div>
				<div class="Card" data-id="3">card 3</div>
				<div class="Card" data-id="4">card 4</div>
				<div class="Card" data-id="5">card 5</div>
				<div class="Card" data-id="6">card 6</div>
			</div>
			<div id="map"></div>
		</div>

		<div id="modal-map"></div>
	</div>
	<style>*{margin:0;padding:0}.Content{max-width:calc(1116px + 128px);margin-left:auto;margin-right:auto;padding-left:64px;padding-right:64px;font-family:Roboto}.Button{margin-top:20px;border:none;background:#598cac;border-radius:26px;font-size:18px;line-height:23px;color:#fff;padding:8px 20px}.Container{margin-top:40px;display:flex;justify-content:space-between}.Cards{width:100%;display:flex;flex-wrap:wrap}.Cards>*{margin-right:6px}.Cards>*+*{margin-left:6px}.Card{width:255px;height:342px;background:#fff;box-shadow:0 0 1px 1px rgba(0,0,0,.09);border-radius:8px}@media (max-width:968px){.Content{padding-left:44px;padding-right:44px}}@media (max-width:631px){.Content{padding-left:16px;padding-right:16px}}</style>
	<div id="before-script"></div>
	<script>!function(e){function r(r){for(var n,l,a=r[0],p=r[1],f=r[2],c=0,s=[];c<a.length;c++)l=a[c],Object.prototype.hasOwnProperty.call(o,l)&&o[l]&&s.push(o[l][0]),o[l]=0;for(n in p)Object.prototype.hasOwnProperty.call(p,n)&&(e[n]=p[n]);for(i&&i(r);s.length;)s.shift()();return u.push.apply(u,f||[]),t()}function t(){for(var e,r=0;r<u.length;r++){for(var t=u[r],n=!0,a=1;a<t.length;a++){var p=t[a];0!==o[p]&&(n=!1)}n&&(u.splice(r--,1),e=l(l.s=t[0]))}return e}var n={},o={1:0},u=[];function l(r){if(n[r])return n[r].exports;var t=n[r]={i:r,l:!1,exports:{}};return e[r].call(t.exports,t,t.exports,l),t.l=!0,t.exports}l.m=e,l.c=n,l.d=function(e,r,t){l.o(e,r)||Object.defineProperty(e,r,{enumerable:!0,get:t})},l.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},l.t=function(e,r){if(1&r&&(e=l(e)),8&r)return e;if(4&r&&"object"==typeof e&&e&&e.__esModule)return e;var t=Object.create(null);if(l.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:e}),2&r&&"string"!=typeof e)for(var n in e)l.d(t,n,function(r){return e[r]}.bind(null,n));return t},l.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return l.d(r,"a",r),r},l.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},l.p="/";var a=this.webpackJsonpmaps_gsv2008=this.webpackJsonpmaps_gsv2008||[],p=a.push.bind(a);a.push=r,a=a.slice();for(var f=0;f<a.length;f++)r(a[f]);var i=p;t()}([])</script>
	<script src="{{ asset('static/js/main-1.chunk.js') }}"></script>
	<script src="{{ asset('static/js/main-2.chunk.js') }}"></script>
</body>
</html>
	<noscript>You need to enable JavaScript to run this app.</noscript>
	<div class="Content"><button id="switch-map" class="Button">switch card</button>
		<div class="Container" id="cardContainer">
			<div class="Cards" id="cards">
				<div class="Card" data-id="1">card 1</div>
				<div class="Card" data-id="2">card 2</div>
				<div class="Card" data-id="3">card 3</div>
				<div class="Card" data-id="4">card 4</div>
				<div class="Card" data-id="5">card 5</div>
				<div class="Card" data-id="6">card 6</div>
			</div>
			<div id="map"></div>
		</div>
		<!-- <div id="modal-map"></div> -->
	</div>
	<style>*{margin:0;padding:0}.Content{max-width:calc(1116px + 128px);margin-left:auto;margin-right:auto;padding-left:64px;padding-right:64px;font-family:Roboto}.Button{margin-top:20px;border:none;background:#598cac;border-radius:26px;font-size:18px;line-height:23px;color:#fff;padding:8px 20px}.Container{margin-top:40px;display:flex;justify-content:space-between}.Cards{width:100%;display:flex;flex-wrap:wrap}.Cards>*{margin-right:6px}.Cards>*+*{margin-left:6px}.Card{width:255px;height:342px;background:#fff;box-shadow:0 0 1px 1px rgba(0,0,0,.09);border-radius:8px}@media (max-width:968px){.Content{padding-left:44px;padding-right:44px}}@media (max-width:631px){.Content{padding-left:16px;padding-right:16px}}</style>
	<div id="before-script"></div>
	<script>!function(e){function r(r){for(var n,l,a=r[0],p=r[1],f=r[2],c=0,s=[];c<a.length;c++)l=a[c],Object.prototype.hasOwnProperty.call(o,l)&&o[l]&&s.push(o[l][0]),o[l]=0;for(n in p)Object.prototype.hasOwnProperty.call(p,n)&&(e[n]=p[n]);for(i&&i(r);s.length;)s.shift()();return u.push.apply(u,f||[]),t()}function t(){for(var e,r=0;r<u.length;r++){for(var t=u[r],n=!0,a=1;a<t.length;a++){var p=t[a];0!==o[p]&&(n=!1)}n&&(u.splice(r--,1),e=l(l.s=t[0]))}return e}var n={},o={1:0},u=[];function l(r){if(n[r])return n[r].exports;var t=n[r]={i:r,l:!1,exports:{}};return e[r].call(t.exports,t,t.exports,l),t.l=!0,t.exports}l.m=e,l.c=n,l.d=function(e,r,t){l.o(e,r)||Object.defineProperty(e,r,{enumerable:!0,get:t})},l.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},l.t=function(e,r){if(1&r&&(e=l(e)),8&r)return e;if(4&r&&"object"==typeof e&&e&&e.__esModule)return e;var t=Object.create(null);if(l.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:e}),2&r&&"string"!=typeof e)for(var n in e)l.d(t,n,function(r){return e[r]}.bind(null,n));return t},l.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return l.d(r,"a",r),r},l.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},l.p="/";var a=this.webpackJsonpmaps_gsv2008=this.webpackJsonpmaps_gsv2008||[],p=a.push.bind(a);a.push=r,a=a.slice();for(var f=0;f<a.length;f++)r(a[f]);var i=p;t()}([])
</script>
<script src="{{ asset('static/js/map-1.chunk.js') }}">
	
</script>
<script src="{{ asset('static/js/map-2.chunk.js') }}">
	
</script>
</body>
</html>