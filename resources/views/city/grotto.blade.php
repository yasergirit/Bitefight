@extends('index')

@section('content')
    <div id="grotte">
        <div class="wrap-top-left clearfix">
            <div class="wrap-top-right clearfix">
                <div class="wrap-top-middle clearfix"></div>
            </div>
        </div>
        <div class="wrap-left clearfix">
            <div class="wrap-content wrap-right clearfix">
                <h2>{!! user_race_logo_small() !!}Yarik Gecidi</h2>
                <div class="buildingDesc clearfix">
                    <img class="npc-logo" src="{{asset('img/city/npc/0_4.jpg')}}" align="left">
                    <h3>Catlak gecit seni cagiriyor</h3>
                    <p>Burasi hizla kazanc saglayan ama riski yuksek bir bolgedir. Gecidin derinligi arttikca odul ve baski birlikte yukselir.</p>
                </div>
                <h2>{!! user_race_logo_small() !!}Gecit zorlugu sec</h2>
                <div class="clearfix">
                    <table class="noBackground" width="100%" border="0">
                        <tr>
                            <td>
                                <form action="{{url('/city/grotto')}}" class="clearfix" method="POST">
                                    {{csrf_field()}}
                                    <div class="clearfix" style="line-height:60px;">
                                        <input type="submit" class="btn-small left" name="difficulty" value="Sakin">
                                    </div>
                                </form>
                            </td>
                            <td>
                                <form action="{{url('/city/grotto')}}" class="clearfix" method="POST">
                                    {{csrf_field()}}
                                    <div class="clearfix" style="line-height:60px;">
                                        <input type="submit" class="btn-small left" name="difficulty" value="Gerilimli">
                                    </div>
                                </form>
                            </td>
                            <td>
                                <form action="{{url('/city/grotto')}}" class="clearfix" method="POST">
                                    {{csrf_field()}}
                                    <div class="clearfix" style="line-height:60px;">
                                        <input type="submit" class="btn-small left" name="difficulty" value="Derin">
                                    </div>
                                </form>
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
