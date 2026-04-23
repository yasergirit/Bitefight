@extends('index')

@section('content')
    <div id="highscore">
        <div class="wrap-top-left clearfix">
            <div class="wrap-top-right clearfix">
                <div class="wrap-top-middle clearfix"></div>
            </div>
        </div>
        <div class="wrap-left clearfix">
            <div class="wrap-content wrap-right clearfix">
                <h2>{!! user_race_logo_small() !!} {{__('general.menu_highscore')}}</h2>
                <div class="table-wrap">
                    @if(user() && ($type == 'player' || $type == 'clan' && user()->getClanId() > 0))
                    <form action="{{$myPosLink}}" method="POST">
                        {{csrf_field()}}
                        <div class="btn-left left">
                            <div class="btn-right">
                                <input class="btn" type="submit" name="mypos" value="{{__('home.highscore_my_position')}}">
                            </div>
                        </div>
                    </form>
                    @endif
                    <script language="JavaScript">
                        $(document).ready(function() {
                            $('.JScheckbox').on('click', function() {
                                if($('.JScheckbox:checked').length >= 5) {
                                    $('.JScheckbox:not(:checked)').attr('disabled', true);
                                } else {
                                    $('.JScheckbox:not(:checked)').attr('disabled', false);
                                }
                            });

                            if($('.JScheckbox:checked').length == 5) {
                                $('.JScheckbox:not(:checked)').attr('disabled', true);
                            }

                            $('#selectClan').on('change', function() {
                                window.location.href = '{{url('highscore?type=')}}'+$(this).val();
                            });
                        });
                    </script>
                    <form method="GET">
                        <table cellpadding="2" cellspacing="2" border="0" width="100%" id="navigationTable">
                            <tr>
                                <td class="no-bg" colspan="2">
                                    <select name="type" id="selectClan" size="1">
                                        <option value="player" @if($type == 'player') selected @endif>{{__('home.highscore_player_highscore')}}</option>
                                        <option value="clan" @if($type == 'clan') selected @endif>{{__('home.highscore_clan_highscore')}}</option>
                                    </select>
                                    <select name="race" size="1">
                                        <option value="0" @if($race == 0) selected @endif>{{__('general.all_races')}}</option>
                                        <option value="1" @if($race == 1) selected @endif>{{__('general.faction_house_plural')}}</option>
                                        <option value="2" @if($race == 2) selected @endif>{{__('general.faction_swarm_plural')}}</option>
                                    </select>
                                </td>
                                <td class="no-bg" colspan="2" style="line-height:45px;">
                                    <div class="btn-left left">
                                        <div class="btn-right">
                                            <input class="btn" type="submit" value="{{__('general.show')}}">
                                        </div>
                                    </div>&nbsp;{{__('home.highscore_show_limit')}}
                                </td>
                            </tr>
                        </table>
                    </form>
                    {{$results->links()}}
                    <p></p>
                    <table cellpadding="2" cellspacing="2" border="0" width="100%">
                        <tr>
                            <td align="center">#</td>
                            <td align="center">{{__('general.race')}}</td>
                            <td align="center">{{__('general.name')}}</td>
                            @foreach($show as $s)
                            <td align="center">
                                <a href="{{urlGetParams($showHeadLink, ['order' => $s])}}">{{highscoreShowToName($s)}}</a>
                            </td>
                            @endforeach
                        </tr>
                        @foreach($results as $result)
                        <tr @if(user() && $type == 'player' && user()->getId() == $result->id || $type == 'clan' && $result->id == user()->getClanId()) class="own" @endif>
                            <td align="right">{{$startRank}}</td>
                            <td><img src="{{asset($result->race == 1 ? 'img/night-stamp/faction-house-badge.svg' : 'img/night-stamp/faction-swarm-badge.svg')}}" alt="{{ $result->race == 1 ? __('general.faction_house') : __('general.faction_swarm') }}"></td>
                            <td><a href="{{$type == 'clan' ? url('/preview/clan/'.$result->id) : url('/preview/user/'.$result->id)}}">{{$result->name}}</a></td>
                            @foreach($show as $s)
                            <td align="right">{{ (int)$result->{$s} }}</td>
                            @endforeach
                        </tr>
                        @php($startRank++)
                        @endforeach
                    </table>
                    <p></p>
                    {{$results->links()}}
                    <br>
                    <table cellpadding="2" cellspacing="2" border="0" width="100%">
                        <tr>
                            <td class="no-bg" align="center" width="50%">
                                <img src="{{asset('img/night-stamp/faction-house-card.svg')}}" alt="{{__('general.faction_house_plural')}}" width="220">
                                <br><br>
                                {{prettyNumber($houseCount)}} {{__('general.faction_house_plural')}}<br>
                                {{__('general.booty')}}: {{prettyNumber($houseEssence)}} {{__('general.blood')}}<br>
                                {{__('general.battles')}}: {{prettyNumber($houseBattles)}}<br>
                                {{__('general.gold')}}: {{prettyNumber($houseGold)}} {{gold_image_tag()}}<br>
                            </td>
                            <td class="no-bg" align="center" width="50%">
                                <img src="{{asset('img/night-stamp/faction-swarm-card.svg')}}" alt="{{__('general.faction_swarm_plural')}}" width="220">
                                <br><br>
                                {{prettyNumber($swarmCount)}} {{__('general.faction_swarm_plural')}}<br>
                                {{__('general.booty')}}: {{prettyNumber($swarmEssence)}} {{__('general.meat')}}<br>
                                {{__('general.battles')}}: {{prettyNumber($swarmBattles)}}<br>
                                {{__('general.gold')}}: {{prettyNumber($swarmGold)}} {{gold_image_tag()}}<br>
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

