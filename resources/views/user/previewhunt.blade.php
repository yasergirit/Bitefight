@extends('index')

@section('content')
    <h1>{{__('user.hunt_header', ['user' => e($user->name)])}}</h1>
    <p style="text-align:justify">Iz basariyla bulundu. Hedef artik gorunur durumda.</p>
    <div id="robberyProfilPic">
        <div class="wrap-top-left"><div class="wrap-top-right"><div class="wrap-top-middle"></div></div></div>
        <div class="wrap-left">
            <div class="wrap-content wrap-right">
                @if($puser->show_picture)
                <img src="{{asset('img/logo/'.$puser->race.'/'.$puser->gender.'/'.$puser->image_type.'.jpg')}}" width="170">
                @else
                <img src="{{asset($puser->race == 1 ? 'img/night-stamp/faction-house-card.svg' : 'img/night-stamp/faction-swarm-card.svg')}}" width="170">
                @endif
                @if($puser->clan_id > 0)
                <a href="{{url('clan/view/'.$puser->clan_id)}}"><img src="{{asset('img/clan/'.$puser->logo_bg.'-'.$puser->logo_sym.'.png')}}" border="0"></a>
                @endif
            </div>
        </div>
        <div class="wrap-bottom-left"><div class="wrap-bottom-right"><div class="wrap-bottom-middle"></div></div></div>
    </div>
    <div id="robberyProfil">
        <div class="wrap-top-left clearfix"><div class="wrap-top-right clearfix"><div class="wrap-top-middle clearfix"></div></div></div>
        <div class="wrap-left clearfix">
            <div class="wrap-content wrap-right clearfix">
                <h2><img src="{{asset($puser->race == 1 ? 'img/night-stamp/faction-house-badge.svg' : 'img/night-stamp/faction-swarm-badge.svg')}}" alt="">{{getRaceString($puser->race)}} <span>{{e($puser->name)}}</span></h2>
                <div class="table-wrap">
                    <table cellpadding="2" cellspacing="2" border="0" width="100%">
                        <tr>
                            <td class="tdn">{{__('general.entire_booty')}}:</td>
                            <td class="tdn">{{__('general.entire_booty_count', ['count' => prettyNumber($puser->s_booty)])}}</td>
                        </tr>
                        @if($puser->clan_id > 0)
                        <tr>
                            <td>{{__('general.clan')}}:</td>
                            <td><a href="{{url('clan/view/'.$puser->clan_id)}}">{{e($puser->clan_name)}} [{{e($puser->clan_tag)}}]</a></td>
                        </tr>
                        <tr>
                            <td>{{__('general.rank')}}:</td>
                            <td>{{e($puser->rank_name)}}@if($puser->war_minister) ({{__('general.war_minister')}}) @endif</td>
                        </tr>
                        @endif
                    </table>
                </div>
                <h2><img alt="" src="{{asset($puser->race == 1 ? 'img/night-stamp/faction-house-badge.svg' : 'img/night-stamp/faction-swarm-badge.svg')}}"> {{__('general.character_description')}}</h2>
                <p style="overflow:hidden; width:100%; text-align:center;">
                    {!! empty($puser->descriptionHtml) ? '-- kayit yok --' : $puser->descriptionHtml !!}
                </p>
                <h2><img src="{{asset($puser->race == 1 ? 'img/night-stamp/faction-house-badge.svg' : 'img/night-stamp/faction-swarm-badge.svg')}}" alt="">{{__('general.characteristics_of_user', ['user' => e($puser->name)])}}</h2>
                <div class="table-wrap">
                    <table width="100%">
                        <tr><td class="tdn">{{__('general.level')}}:</td><td class="tdn">{{prettyNumber(getLevel($puser->exp))}}</td></tr>
                        <tr><td class="tdn">{{__('general.battle_value')}}:</td><td class="tdn">{{prettyNumber($puser->battle_value)}}</td></tr>
                        <tr><td class="tdn">Guc:</td><td class="tdn">{{prettyNumber($puser->str)}}</td></tr>
                        <tr><td class="tdn">Savunma:</td><td class="tdn">{{prettyNumber($puser->def)}}</td></tr>
                        <tr><td class="tdn">Ceviklik:</td><td class="tdn">{{prettyNumber($puser->dex)}}</td></tr>
                        <tr><td class="tdn">Dayaniklilik:</td><td class="tdn">{{prettyNumber($puser->end)}}</td></tr>
                        <tr><td class="tdn">Karizma:</td><td class="tdn">{{prettyNumber($puser->cha)}}</td></tr>
                        <tr>
                            <td colspan="2" align="center" class="no-bg">
                                @if($user->hp_now > 0 && $user->ap_now > 0)
                                <form action="{{url('hunt/attack/'.$puser->id)}}" method="GET">
                                    <div class="btn-left center"><div class="btn-right"><button type="submit" class="btn">Saldir <span class="cost">-1<img src="{{asset('img/symbols/ap.gif')}}"></span></button></div></div>
                                </form>
                                @else
                                <button class="btn">Saldir <span class="cost">-1<img src="{{asset('img/symbols/ap.gif')}}"></span></button>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="wrap-bottom-left"><div class="wrap-bottom-right"><div class="wrap-bottom-middle"></div></div></div>
    </div>
@endsection
