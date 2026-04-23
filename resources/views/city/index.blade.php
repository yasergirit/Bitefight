@extends('index')

@section('content')
	<div id="addBuddy">
		<div class="wrap-top-left clearfix">
			<div class="wrap-top-right clearfix">
				<div class="wrap-top-middle clearfix"></div>
			</div>
		</div>
		<div class="wrap-left clearfix">
			<div class="wrap-content wrap-right clearfix">
				<h2>{!! user_race_logo_small() !!}Night Stamp ilcelerine hos geldin, {{user()->getName()}}</h2>
				<p>Burada ticaret yapabilir, arşiv kayıtlarını düzenleyebilir, sığınağına destek toplayabilir ve gizli düzenin için kaynak yönetebilirsin.</p>
				<p style="text-align:center; margin: 20px 0;">
					<img src="{{asset('img/night-stamp/city-banner.svg')}}" alt="Night Stamp Ilceleri" style="max-width:100%;">
				</p>
				<div class="table-wrap">
					<table cellpadding="2" cellspacing="2" border="0" width="100%" align="center">
						<tbody>
							<tr>
								<td><img src="{{asset('img/city/symbol_shop.gif')}}" alt="" border="0"></td>
								<td><a href="{{url('/city/shop')}}" target="_top">Golge Tedarikcisi</a></td>
								<td>Silah, ekipman ve iksir stoklari burada toplanir. Hazirlik yapmak icin ilk duraklardan biridir.</td>
							</tr>
							<tr>
								<td><img src="{{asset('img/city/symbol_graveyard.gif')}}" alt="" border="0"></td>
								<td><a href="{{url('/city/graveyard')}}" target="_top">Sessiz Avlu</a></td>
								<td>Vardiya alip altin kazanabilir, gece boyunca kucuk ama guvenilir gelir elde edebilirsin.</td>
							</tr>
							<tr>
								<td><img src="{{asset('img/city/symbol_taverne.gif')}}" alt="" border="0"></td>
								<td><a href="{{url('/city/taverne')}}" target="_top">Fisilti Hanesi</a></td>
								<td>Gorevler, dedikodular ve yeni izler genellikle burada aciga cikar.</td>
							</tr>
							<tr>
								<td><img src="{{asset('img/city/symbol_grotte.gif')}}" alt="" border="0"></td>
								<td><a href="{{url('/city/grotto')}}" target="_top">Yarık Gecidi</a></td>
								<td>Riskli ama degerli karsilasmalarin giris kapisi. Cesaret isteyen bolgedir.</td>
							</tr>
							<tr>
								<td><img src="{{asset('img/city/symbol_market.gif')}}" alt="" border="0"></td>
								<td><a href="{{url('/city/market')}}" target="_top">Gece Pazari</a></td>
								<td>Oyuncular arasi alisveris ve gecici listelemeler burada toplanir.</td>
							</tr>
							<tr>
								<td><img src="{{asset('img/city/symbol_library.gif')}}" alt="" border="0"></td>
								<td><a href="{{url('/city/library')}}" target="_top">Arsiv Odasi</a></td>
								<td>Kimlik kayitlari, isim duzenlemeleri ve resmi gece evraklari burada tutulur.</td>
							</tr>
							<tr>
								<td><img src="{{asset('img/city/symbol_church.gif')}}" alt="" border="0"></td>
								<td><a href="{{url('/city/church')}}" target="_top">Sessiz Oda</a></td>
								<td>Dinlenmek ve kayip sagligi toparlamak icin kullanilan huzurlu alan.</td>
							</tr>
							<tr>
								<td><img src="{{asset('img/city/symbol_shadowbook.gif')}}" alt="" border="0"></td>
								<td><a href="{{url('/city/arena')}}" target="_top">Yemin Defteri</a></td>
								<td>Kurallari sert olan acik duello alani. Burada kayitli olan herkes birbirini hedef alabilir.</td>
							</tr>
							<tr>
								<td><img src="{{asset('img/city/symbol_voodoo.gif')}}" alt="" border="0"></td>
								<td><a href="{{url('/voodoo')}}" target="_top">Muhur Pazari</a></td>
								<td>Gece Yeminlisi uyeligi ve ozel araclar burada sunulur. Mühür Taşları burada deger kazanir.</td>
							</tr>
						</tbody>
					</table>
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
