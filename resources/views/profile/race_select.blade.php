@extends('index')

@section('content')
	<script language="JavaScript">
		p1 = new Image();
		p1.src = "{{asset('img/night-stamp/faction-house-card.svg')}}";
		p1x = new Image();
		p1x.src = "{{asset('img/night-stamp/faction-house-card.svg')}}";
		p2 = new Image();
		p2.src = "{{asset('img/night-stamp/faction-swarm-card.svg')}}";
		p2x = new Image();
		p2x.src = "{{asset('img/night-stamp/faction-swarm-card.svg')}}";
	</script>
	<div id="chooseRace">
		<div class="wrap-top-left clearfix"><div class="wrap-top-right clearfix"><div class="wrap-top-middle clearfix"></div></div></div>
		<div class="wrap-left clearfix">
			<div class="wrap-content wrap-right clearfix">
				<div class="table-wrap">
					<table cellpadding="0" cellspacing="0" border="0" width="100%">
						<tr>
							<td width="40%" align="left">
								<form method="post" id="formSelectHouse">
									{{csrf_field()}}
									<input type="hidden" name="race" value="1">
								</form>
								<a onfocus="if(this.blur)this.blur()" target="_top" onmouseover="document.pic1.src = p1x.src" onmouseout="document.pic1.src = p1.src" onclick="document.getElementById('formSelectHouse').submit();">
									<img src="{{asset('img/night-stamp/faction-house-card.svg')}}" alt="{{__('general.faction_house')}}" name="pic1" border="0">
								</a>
							</td>
							<td width="20%">{{__('home.home_register_select_race')}}</td>
							<td width="40%" align="right">
								<form method="post" id="formSelectSwarm">
									{{csrf_field()}}
									<input type="hidden" name="race" value="2">
								</form>
								<a onfocus="if(this.blur)this.blur()" target="_top" onmouseover="document.pic2.src = p2x.src" onmouseout="document.pic2.src = p2.src" onclick="document.getElementById('formSelectSwarm').submit();">
									<img src="{{asset('img/night-stamp/faction-swarm-card.svg')}}" alt="{{__('general.faction_swarm')}}" name="pic2" border="0">
								</a>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="wrap-bottom-left"><div class="wrap-bottom-right"><div class="wrap-bottom-middle"></div></div></div>
	</div>
@endsection
