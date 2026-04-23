@extends('index')

@section('content')
	<h1>{{__('user.hunt_header', ['user' => e(user()->getName())])}}</h1>
	<p>{{__('user.hunt_header_line')}}</p>
	<br>
	<div id="humanHunting">
		<div class="wrap-top-left">
			<div class="wrap-top-right">
				<div class="wrap-top-middle"></div>
			</div>
		</div>
		<div class="wrap-left clearfix">
			<div id="humanhunt" class="wrap-content wrap-right">
				<h2>{!! user_race_logo_small() !!}{{__('user.human_hunt_header')}}</h2>
				@for($idx = 1; $idx <= 5; $idx++)
					@php($huntChance = ${'hunt'.$idx.'Chance'})
					@php($huntReward = ${'hunt'.$idx.'Reward'})
					@php($huntExp = ${'hunt'.$idx.'Exp'})
					<div @if(user()->getApNow() > max(0, $idx - 1)) onclick="doHunt({{$idx}})" @endif class="mjs" style="position:relative; height:121px; cursor:pointer;">
						<img src="{{asset('img/night-stamp/hunt-'.$idx.'.svg')}}" alt="{{__('user.human_hunt_hunt_'.$idx)}}"/>
						<div id="mjInfo_{{$idx}}" style="text-align:left;">
							<table class='noBackground' border="0" style="display:block;">
								<tr>
									<td nowrap style='font-size: 1.1em;'><b>{{__('user.human_hunt_hunt_'.$idx)}}</b> ( {{max(1, min(3, $idx > 2 ? $idx - 1 : 1))}} {{action_point_image_tag()}} )</td>
								</tr>
							</table>
							<table class='noBackground' border="0" style="display:none;">
								<tr>
									<td nowrap style='font-size: 1.1em;'><b>{{__('user.human_hunt_hunt_'.$idx)}}</b></td>
								</tr>
								<tr>
									<td nowrap>{{__('user.human_hunt_chance_of_success')}}: {{$huntChance}}%</td>
								</tr>
								<tr>
									<td nowrap>{{prettyNumber($huntReward)}} {{gold_image_tag()}} + {{$huntExp}} {{__('general.experience')}}</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="btn-left center">
						<div class="btn-right">
							<button @if(user()->getApNow() > max(0, $idx - 1)) onclick="doHunt({{$idx}})" @endif class="btn">{{__('user.human_hunt_hunt_'.$idx)}}</button>
						</div>
					</div>
					<br/>
				@endfor
				<script type="text/javascript">
					$('.mjs').hover(
						function() {
							$(this).children('div').animate({height: '90'});
							$(this).children('div').children('table:first-child').hide();
							$(this).children('div').children('table:last-child').show();
						},
						function() {
							$(this).children('div').animate({height: '35'});
							$(this).children('div').children('table:first-child').show();
							$(this).children('div').children('table:last-child').hide();
						}
					);
				</script>
			</div>
		</div>
		<div class="wrap-bottom-left">
			<div class="wrap-bottom-right">
				<div class="wrap-bottom-middle"></div>
			</div>
		</div>
		<script type="text/javascript">
			function doHunt(type)
			{
				var url = "{{url('/hunt/human')}}/"+type+"?_token={{csrf_token()}}";
				window.location.replace(url);
			}
		</script>
	</div>
@endsection
