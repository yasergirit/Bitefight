@extends('index')

@section('content')
	<div id="splashInfo">
		<div class="wrap-top-left clearfix">
			<div class="wrap-top-right clearfix">
				<div class="wrap-top-middle clearfix"></div>
			</div>
		</div>
		<div class="wrap-left clearfix">
			<div class="wrap-content wrap-right clearfix">
				<div id="speedserverbig">{{__('home.home_header_big')}}</div>
				<img src="{{asset('img/night-stamp/home-splash.svg')}}" width="710" height="381" border="0" alt="{{__('general.game_name')}}"/>
				<p id="splashText">
					{!! __('home.home_splash_text') !!}
				</p>
				<a href="{{route('register')}}" id="regBtn" target="_top">{{__('home.home_index_play_now')}}</a> <br class="clearfloat">
				<div id="features" class="clearfix">
					<p>{!! __('home.home_index_thumb1') !!}<img src="{{asset('img/night-stamp/thumb-1.svg')}}" width="170" height="86"/></p>
					<p>{!! __('home.home_index_thumb2') !!}<img src="{{asset('img/night-stamp/thumb-2.svg')}}" width="170" height="86"/></p>
					<p>{!! __('home.home_index_thumb3') !!}<img src="{{asset('img/night-stamp/thumb-3.svg')}}" width="170" height="86"/></p>
				</div>
				<br class="clearfloat"/>
			</div>
		</div>
		<div class="wrap-bottom-left">
			<div class="wrap-bottom-right">
				<div class="wrap-bottom-middle"></div>
			</div>
		</div>
	</div>
@endsection
