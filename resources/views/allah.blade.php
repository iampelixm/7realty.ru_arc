<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') - Недвижка</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
		<div class="container">
		 
            <div class="ui grid container">
                <div class="column">
				<img src="" style="height: 50px;" >
                    <div class="ui buttons blue top-menu btn-group">
						<a href="" class="btn btn-primary btn-lg ">Все объекты</a>
						<a href="" class="btn btn-primary btn-lg ">Все районы</a>
						<a href="" class="btn btn-primary btn-lg ">Все категории</a>
						<a href="" class="btn btn-primary btn-lg ">Все подкатегории</a>
						<a href="" class="btn btn-primary btn-lg ">ТВ</a>
						<a href="" class="btn btn-primary btn-lg ">Все ЖК</a>
                    </div>
                </div>
				
            </div>
		</div>
		@yield('submenu')
        @yield('content')
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="/js/totalizator.js"></script>
        @yield('scripts')
    </body>
</html>
