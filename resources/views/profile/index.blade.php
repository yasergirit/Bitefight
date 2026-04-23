@extends('index')

@section('content')
	@if(user()->getPremium() < time())
	<p id="upgrademsg">
		<a href="{{url('/voodoo')}}">Gece Yeminlisi ile daha hizli ilerle, daha fazla aksiyon puani topla.</a>
	</p>
	@endif

	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Genel Durum</a></li>
			<li><a href="#tabs-2">Savas Ozeti</a></li>
			<li><a href="#tabs-3">Envanter</a></li>
		</ul>

		<div id="tabs-1">
			<div class="wrap-top-left clearfix"><div class="wrap-top-right clearfix"><div class="wrap-top-middle clearfix"></div></div></div>
			<div class="wrap-left clearfix">
				<div class="wrap-content wrap-right clearfix">
					<div id="character_tab">
						<div id="userPic">
							<div class="wrap-top-left"><div class="wrap-top-right"><div class="wrap-top-middle"></div></div></div>
							<div class="wrap-left">
								<div class="wrap-content wrap-right">
									<a id="userLogo" href="{{url('/profile/logo')}}">
										<img src="{{asset('img/logo/'.user()->getRace().'/'.user()->getGender().'/'.user()->getImageType().'.jpg')}}" border="0" width="168" alt="playerlogo">
										<br>
										<span>{{__('user.profile_change_logo')}}</span>
									</a>
								</div>
							</div>
							<div class="wrap-bottom-left"><div class="wrap-bottom-right"><div class="wrap-bottom-middle"></div></div></div>
						</div>
						<table cellpadding="2" cellspacing="2" border="0" width="520px" style="float: right;">
							<tr><td nowrap>Bolge:</td><td nowrap width="90%">{{env('APP_NAME')}}</td></tr>
							<tr><td nowrap>Hizip:</td><td nowrap>{{getRaceString(user()->getRace())}}</td></tr>
							<tr><td nowrap>Oyuncu ID:</td><td nowrap>{{user()->getId()}}</td></tr>
							<tr><td nowrap>Oyuncu adi:</td><td nowrap><a href="{{url('/preview/user/'.user()->getId())}}">{{user()->getName()}}</a></td></tr>
							<tr><td nowrap>Seviye:</td><td nowrap>{{prettyNumber(getLevel(user()->getExp()))}}</td></tr>
							<tr><td nowrap>Savas gucu:</td><td nowrap>{{prettyNumber(user()->getBattleValue())}}</td></tr>
							<tr><td nowrap>Siralama:</td><td nowrap>{{prettyNumber($highscore_position)}}</td></tr>
							@if(user()->getClanId() > 0)
							<tr><td nowrap>Lonca siralamasi:</td><td nowrap>{{$clan_highscore_position}}</td></tr>
							@endif
							<tr><td nowrap>Altin:</td><td nowrap>{{prettyNumber(user()->getGold())}} {{gold_image_tag()}}</td></tr>
							<tr><td nowrap>Muhur Taslari:</td><td nowrap>{{prettyNumber(user()->getHellstone())}} {{hellstone_image_tag()}}</td></tr>
							<tr><td nowrap>Parcalar:</td><td nowrap>{{prettyNumber(user()->getFragment())}} {{fragment_image_tag()}}</td></tr>
						</table>
					</div>
				</div>
			</div>
			<div class="wrap-bottom-left"><div class="wrap-bottom-right"><div class="wrap-bottom-middle"></div></div></div>
		</div>

		<div id="tabs-2">
			<div class="wrap-top-left clearfix"><div class="wrap-top-right clearfix"><div class="wrap-top-middle clearfix"></div></div></div>
			<div class="wrap-left clearfix">
				<div class="wrap-content wrap-right clearfix">
					<div class="table-wrap">
						<table cellpadding="2" cellspacing="2" border="0" width="100%">
							<tr><td>Toplam birikim:</td><td>{{prettyNumber(user()->getSBooty())}}</td></tr>
							<tr><td>Düellolar:</td><td>{{prettyNumber(user()->getSFight())}}</td></tr>
							<tr><td>Zaferler:</td><td>{{prettyNumber(user()->getSVictory())}}</td></tr>
							<tr><td>Yenilgiler:</td><td>{{prettyNumber(user()->getSDefeat())}}</td></tr>
							<tr><td>Beraberlik:</td><td>{{prettyNumber(user()->getSDraw())}}</td></tr>
							<tr><td>Toplanan altin:</td><td>{{prettyNumber(user()->getSGoldCaptured())}} {{gold_image_tag()}}</td></tr>
							<tr><td>Kaybedilen altin:</td><td>{{prettyNumber(user()->getSGoldLost())}} {{gold_image_tag()}}</td></tr>
							<tr><td>Verilen hasar:</td><td>{{prettyNumber(user()->getSDamageCaused())}}</td></tr>
							<tr><td>Kaybedilen saglik:</td><td>{{prettyNumber(user()->getSHpLost())}}</td></tr>
						</table>
					</div>
				</div>
			</div>
			<div class="wrap-bottom-left"><div class="wrap-bottom-right"><div class="wrap-bottom-middle"></div></div></div>
		</div>

		<div id="tabs-3">
			<div class="wrap-top-left clearfix"><div class="wrap-top-right clearfix"><div class="wrap-top-middle clearfix"></div></div></div>
			<div class="wrap-left clearfix">
				<div class="wrap-content wrap-right clearfix">
					<div class="table-wrap">
						@if(!empty($user_active_items))
						<h2>&nbsp;Etkin esyalar ( {{count($user_active_items)}} )</h2>
						<table cellpadding="2" cellspacing="2" border="0" width="100%">
							@foreach($user_active_items as $i)
							<tr>
								<td class="active itemslot">
									<img src="{{asset('img/items/'.$i->model.'/'.$i->id.'.jpg')}}" alt="{{$i->name}}" @if($i->scost) style="border: 1px solid #6f86a9;" @endif>
								</td>
								<td class="active">
									<strong>{{$i->name}}</strong><br><br>
									@if($i->str != 0) Guc: {{plusSignedNumberString($i->str)}}<br> @endif
									@if($i->def != 0) Savunma: {{plusSignedNumberString($i->def)}}<br> @endif
									@if($i->dex != 0) Ceviklik: {{plusSignedNumberString($i->dex)}}<br> @endif
									@if($i->end != 0) Dayaniklilik: {{plusSignedNumberString($i->end)}}<br> @endif
									@if($i->cha != 0) Karizma: {{plusSignedNumberString($i->cha)}}<br> @endif
								</td>
							</tr>
							@endforeach
						</table>
						@endif

						<h2>&nbsp;Envanter ( {{$user_item_count}} / {{$user_item_max_count}} )</h2>
						<div id="accordion" class="ui-accordion-icons">
							@if(!empty($potions))
							<h3><a href="#">Iksirler ( {{$potion_count}} )</a></h3>
							<div><table cellpadding="2" cellspacing="2" border="0" width="100%">@foreach($potions as $potion)<?php printProfileItemRow($potion); ?>@endforeach</table></div>
							@endif
							@if(!empty($weapons))
							<h3><a href="#">Silahlar ( {{count($weapons)}} )</a></h3>
							<div><table cellpadding="2" cellspacing="2" border="0" width="100%">@foreach($weapons as $weapon)<?php printProfileItemRow($weapon); ?>@endforeach</table></div>
							@endif
							@if(!empty($helmets))
							<h3><a href="#">Basliklar ( {{count($helmets)}} )</a></h3>
							<div><table cellpadding="2" cellspacing="2" border="0" width="100%">@foreach($helmets as $helmet)<?php printProfileItemRow($helmet); ?>@endforeach</table></div>
							@endif
							@if(!empty($armour))
							<h3><a href="#">Zirhlar ( {{count($armour)}} )</a></h3>
							<div><table cellpadding="2" cellspacing="2" border="0" width="100%">@foreach($armour as $armr)<?php printProfileItemRow($armr); ?>@endforeach</table></div>
							@endif
							@if(!empty($jewellery))
							<h3><a href="#">Takilar ( {{count($jewellery)}} )</a></h3>
							<div><table cellpadding="2" cellspacing="2" border="0" width="100%">@foreach($jewellery as $jwllry)<?php printProfileItemRow($jwllry); ?>@endforeach</table></div>
							@endif
							@if(!empty($gloves))
							<h3><a href="#">Eldivenler ( {{count($gloves)}} )</a></h3>
							<div><table cellpadding="2" cellspacing="2" border="0" width="100%">@foreach($gloves as $glvs)<?php printProfileItemRow($glvs); ?>@endforeach</table></div>
							@endif
							@if(!empty($boots))
							<h3><a href="#">Cizmeler ( {{count($boots)}} )</a></h3>
							<div><table cellpadding="2" cellspacing="2" border="0" width="100%">@foreach($boots as $boot)<?php printProfileItemRow($boot); ?>@endforeach</table></div>
							@endif
							@if(!empty($shields))
							<h3><a href="#">Kalkanlar ( {{count($shields)}} )</a></h3>
							<div><table cellpadding="2" cellspacing="2" border="0" width="100%">@foreach($shields as $shield)<?php printProfileItemRow($shield); ?>@endforeach</table></div>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="wrap-bottom-left"><div class="wrap-bottom-right"><div class="wrap-bottom-middle"></div></div></div>
		</div>
	</div>

	<script type="text/javascript">
		jQuery().ready(function(){
			$('#tabs').tabs();
			@if($user_item_count)
			$('#accordion').accordion({
				heightStyle: "content"
			});
			@endif
		});
	</script>
@endsection
