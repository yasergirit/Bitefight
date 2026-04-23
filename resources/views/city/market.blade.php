@extends('index')

@section('content')
    <div id="market">
        <div class="wrap-top-left clearfix">
            <div class="wrap-top-right clearfix">
                <div class="wrap-top-middle clearfix"></div>
            </div>
        </div>
        <div class="wrap-left clearfix">
            <div class="wrap-content wrap-right clearfix">
                <h2>{!! user_race_logo_small() !!}Gece Pazari</h2>
                <div class="buildingDesc clearfix">
                    <img class="npc-logo" src="{{asset('img/city/npc/0_5.jpg')}}" align="left">
                    <p>Gece Pazari, oyuncularin esya listeledigi ve aradigi mallari filtreleyerek buldugu merkez alandir. Buradaki kopya yeniden yazildi ve dis baglantilar kaldirildi.</p>
                    <p class="gold">{{__('general.gold')}}: {{prettyNumber(user()->getGold())}} {{gold_image_tag()}}</p>
                </div>
                <div>
                    <h2>{!! user_race_logo_small() !!}<a href="{{url('/city/market/duration/asc/1')}}">Pazar gorunumu</a> | <a href="{{url('/city/marketSell')}}">Esya listele</a></h2>
                    <table width="100%">
                        <tr>
                            <td valign="top" colspan="2">
                                <div id="market_filter">
                                    <form action="{{url('/city/market')}}" method="post" name="filterForm">
                                        {{csrf_field()}}
                                        <input class="search" type="text" name="query" size="40" value="" placeholder="Esya, kategori veya anahtar kelime ara">
                                        <select class="auswahl" name="filter" size="1">
                                            <option value="1">Silahlar</option>
                                            <option value="2">Iksirler</option>
                                            <option value="3">Basliklar</option>
                                            <option value="4">Zirhlar</option>
                                            <option value="5">Takilar</option>
                                            <option value="6">Eldivenler</option>
                                            <option value="7">Cizmeler</option>
                                            <option value="8">Kalkanlar</option>
                                        </select>
                                        Seviye: <input class="inputblack" type="text" name="lvlFrom" size="3" value=""> - <input class="inputblack" type="text" name="lvlTo" size="3" value="">
                                        <div class="btn-left right">
                                            <div class="btn-right">
                                                <input type="submit" value="Filtrele" class="btn">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="no-bg" valign="top" colspan="2">
                                <div id="market_table" style="position:relative;">
                                    <div id="market_nav">Bu gorunum yeniden markalama sonrasi yerel pazar akisina hazir.</div>
                                </div>
                            </td>
                        </tr>
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
