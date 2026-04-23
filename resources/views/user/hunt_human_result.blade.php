@extends('index')

@section('content')
	<script type="text/javascript">
		$('#header h1').text('{{__("user.human_hunt_success_header")}}');
	</script>
	<div class="btn-left left">
		<div class="btn-right"><a href="{{url('hunt/index')}}" class="btn">{{__('general.back')}}</a></div>
	</div>
	<br class="clearfloat"/>
	<div id="humanhuntresult">
		<div class="wrap-top-left clearfix">
			<div class="wrap-top-right clearfix">
				<div class="wrap-top-middle clearfix"></div>
			</div>
		</div>
		<div class="wrap-left clearfix">
			<div class="wrap-content wrap-right clearfix">
				<h2>{!! user_race_logo_small() !!}{{__('user.human_hunt_success_header')}}</h2>

				<div class="buildingDesc">
					<img src="{{asset('img/night-stamp/hunt-'.$huntId.'.svg')}}" title="{{__('user.human_hunt_success_header')}}" width="340" height="125" class="npc-logo left">
					@if($success)
						<p>
							{{__('user.human_hunt_success_info1', ['huntname' => __('user.human_hunt_hunt_'.$huntId)])}}<br><br>
							{{__('user.human_hunt_success_info2', ['blood' => prettyNumber($rewardGold), 'gold' => prettyNumber($rewardGold), 'exp' => $rewardExp])}}<br><br>
							@if(isset($rewardFragment))+{{$rewardFragment}}&nbsp;{{fragment_image_tag()}}<br><br>@endif
						</p>
					@else
						<p>{{__('user.human_hunt_success_failed')}}</p>
					@endif

					<div class="btn-left left">
						<div class="btn-right">
							<button type="submit" class="btn" onclick="window.location.replace('{{url('/hunt/human')}}/{{$huntId}}?_token={{csrf_token()}}');">{{__('user.human_hunt_success_button_again')}} <span class="cost">-1 {{action_point_image_tag()}}</span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="wrap-bottom-left">
			<div class="wrap-bottom-right">
				<div class="wrap-bottom-middle"></div>
			</div>
		</div>
	</div>
@endsection
