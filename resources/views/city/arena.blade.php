@extends('index')

@section('content')
    <div id="arena">
        <div class="wrap-top-left clearfix">
            <div class="wrap-top-right clearfix">
                <div class="wrap-top-middle clearfix"></div>
            </div>
        </div>
        <div class="wrap-left clearfix">
            <div class="wrap-content wrap-right clearfix">
                <h2>{!! user_race_logo_small() !!}Yemin Defteri</h2>
                <div class="buildingDesc">
                    <img class="npc-logo" src="{{asset('img/city/npc/0_10.jpg')}}" align="left">
                    <h3>Acik duello alanina hos geldin</h3>
                    <p>Yemin Defteri, seviye farkini ikinci plana atan acik bir meydan sistemidir. Buraya adini yazan herkes hedef olabilir ve hedef secebilir.</p>
                </div>
                <p style="color:#f00;">Bu ekran yeniden markalama surecinde guvenli yerel akisa alinmistir. Sunucuya bagli arena davranisi aktifse mevcut backend akisini koruyarak yerlestirilebilir.</p>
                <div class="table-wrap">
                    <table cellpadding="2" cellspacing="2" border="0" width="100%">
                        <tr>
                            <td class="no-bg" colspan="2" align="center">
                                <p>Kayit oldugunda, bu alandaki diger kayitli oyuncularla acik duellolara girebilirsin.</p>
                                <form action="{{url('/city/arena')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="btn-left left">
                                        <div class="btn-right">
                                            <input type="submit" class="btn" name="join" value="Kaydimi olustur">
                                        </div>
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
