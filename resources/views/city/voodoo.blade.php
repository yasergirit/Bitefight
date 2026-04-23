@extends('index')

@section('content')
	<div id="voodoo">
		<div class="wrap-top-left clearfix">
			<div class="wrap-top-right clearfix">
				<div class="wrap-top-middle clearfix"></div>
			</div>
		</div>
		<div class="wrap-left clearfix">
			<div class="wrap-content wrap-right clearfix">
				<h2>{!! user_race_logo_small() !!}Muhur Pazari</h2>
				<div class="buildingDesc clearfix">
					<img class="npc-logo" src="{{asset('img/night-stamp/premium-vault.svg')}}" align="left">
					<h3>Gece duzenini guclendiren teklifler burada toplanir.</h3>
					<p>Muhur Pazari, hesabina kalici kimlik vermeyen ama ilerleyisini hizlandiran secenekleri acik ve net kosullarla sunar. Buradaki her teklif sure, bedel ve etki alaniyla birlikte gorunur.</p>
					<p class="gold">Varliklarin: {{prettyNumber(user()->getGold())}} {{gold_image_tag()}} + {{prettyNumber(user()->getHellstone())}} {{hellstone_image_tag()}}</p>
				</div>
				<h2>{!! user_race_logo_small() !!}Gece Yeminlisi uyeligi</h2>
				<div class="table-wrap">
					<table cellpadding="2" cellspacing="2" border="0" width="100%">
						<tr>
							<td class="no-bg" valign="center"><img src="{{asset('img/night-stamp/premium-vault.svg')}}" alt=""></td>
							<td class="no-bg" valign="top">
								<h3>Uyelik sana ne saglar?</h3>
								<p>
									Her aktivasyonda ek altin destegi alirsin.<br>
									Aksiyon puani yenilenmesi hizlanir.<br>
									Maksimum aksiyon puanin artar.<br>
									Uzun oturumlarda daha stabil ilerlersin.
								</p>
							</td>
							<td class="no-bg" valign="top" align="center">
								<h3 style="padding:0 10px 15px; text-align:right;"><span style="color:orangered">14 gun<br>yalnizca<br>15 muhur tasi</span></h3>
								<div class="btn-left right">
									<div class="btn-right">
										<form method="post">
											{{csrf_field()}}
											<input type="submit" class="btn" name="buy_shadow_lord" value="Etkinlestir" @if(user()->getHellstone() < 15) disabled @endif>
										</form>
									</div>
								</div>
							</td>
						</tr>
						@if(user()->getPremium() > time())
						<tr>
							<td class="no-bg" colspan="3" align="center">
								<p class="info">Gece Yeminlisi uyeligin su tarihe kadar etkin: {{date('D, d.m.Y - H:i:s', user()->getPremium())}}</p>
							</td>
						</tr>
						@endif
					</table>
				</div>
				<h2>{!! user_race_logo_small() !!}Ozel araclar</h2>
				<div class="table-wrap">
					<table cellpadding="2" cellspacing="2" border="0" width="100%">
						<tr id="premItem_1">
							<td class="no-bg" valign="center" width="150">
								<img src="{{asset('img/night-stamp/oath-stone.svg')}}" alt=""></td>
							<td class="no-bg" valign="top">
								<h3>Yemin Tasi</h3>
								<p>Bu arac hizibini degistirmeni saglar. Kullanildiginda mevcut loncandan ayrilirsin; lonca kurucusuysan loncan dagitilir.</p>
								<p class="gold">Bedel: 50&nbsp;{{hellstone_image_tag()}}</p>
							</td>
							<td class="no-bg" valign="center" align="center" width="250">
								<div id="confirmscreen_1" style="display:none;">
									<table class="noBackground">
										<tr>
											<td colspan="2">
												<span style="color:#FFCC33;">Yemin Tasi hemen kullanilsin mi?</span>
											</td>
										</tr>
										<tr>
											<td width="50%">
												<div class="btn-left right">
													<div class="btn-right">
														<form method="post">
															{{csrf_field()}}
															<input type="submit" class="btn" name="buy_methamorphosis" value="Evet" @if(user()->getHellstone() < 50) disabled @endif>
														</form>
													</div>
												</div>
											</td>
											<td width="50%">
												<div class="btn-left right">
													<div class="btn-right">
														<button class="btn" onclick="notConfirm(1)">Hayir</button>
													</div>
												</div>
											</td>
										</tr>
									</table>
								</div>
								<div id="usescreen_1">
									<div class="btn-left right">
										<div class="btn-right">
											<button class="btn" onclick="confirmUserPremium(1)">Satin al ve kullan</button>
										</div>
									</div>
								</div>
							</td>
						</tr>
					</table>
				</div>
				<script type="text/javascript">
					function confirmUserPremium(nr)
					{
						$('#usescreen_'+nr).css('display', 'none');
						$('#confirmscreen_'+nr).css('display', 'block');
					}

					function notConfirm(nr)
					{
						$('#usescreen_'+nr).css('display', '');
						$('#confirmscreen_'+nr).css('display', 'none');
					}
				</script>
			</div>
		</div>
		<div class="wrap-bottom-left">
			<div class="wrap-bottom-right">
				<div class="wrap-bottom-middle"></div>
			</div>
		</div>
	</div>
@endsection
