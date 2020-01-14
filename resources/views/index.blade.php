@extends('layouts.app')

@php

    $circuits = array('Indianapolis Motor Speedway', 'Monaco', 'Monza', 'Spa-Francorchamps');
    $comp = array('United States Grand Prix', 'Grand Prix', 'Italian Grand Prix', 'Belgian Grand Prix');
    $images = array('bg-indianapolis.jpg', 'bg-monaco.jpg', 'bg-monza.jpg', 'bg-spa.jpg');
    $nbr = rand(0, 3);

@endphp

@section('content')

<div class='container container-main'>

    <!-- NAVIGATION - NAVBAR -->
    <div class='navbar'>
        <h1 class='navbar-header'>Tweet Racer - F1</h1>
    </div>

    <!-- MAIN CONTENT - CONTENT -->
    
    <div class='content-main-svg'>
        <div class="wrapper-svg">
            <p>{{ $circuits[$nbr] }},</p>
            <p id='mark'>{{ $comp[$nbr] }}</p>
            <a class='shortlink' href="raceview">overview</a>        
        </div>
    </div>
    <div class='wrapper-content-main'>
        <div class='content-header'>
            <p><span>Competing Teams</span></p>
            <b class="divider"></b>
        </div>

        <div class='content-main-teams'>
            <table>
                @foreach ($hashtags as $hashtag)
                    <tr>
                        <td><svg class='team-color' height="20" width="20"><circle cx="10" cy="10" r="10" fill={{$hashtag->color}} /></svg></td>
                        <td>
                            {{$hashtag->name}}
                        </td>
                        <td id='middle'>
                        @unless ($hashtag->wins === 0)
                                <p class="team-wins">{{$hashtag->wins}}
                                <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.5605 1.08262H12.6357C12.6426 0.869414 12.6465 0.65495 12.6465 0.439456C12.6465 0.196725 12.4497 0 12.2071 0H2.79305C2.55032 0 2.35359 0.196725 2.35359 0.439456C2.35359 0.65495 2.35737 0.869414 2.36435 1.08262H0.439453C0.196724 1.08262 0 1.27934 0 1.52208C0 3.49116 0.514641 5.34889 1.44905 6.75321C2.3727 8.1415 3.60306 8.93779 4.93206 9.01527C5.23338 9.34314 5.55199 9.61048 5.88375 9.81441V11.7676H5.14652C4.25526 11.7676 3.53027 12.4927 3.53027 13.3839V14.1211H3.49903C3.2563 14.1211 3.05958 14.3179 3.05958 14.5605C3.05958 14.8033 3.2563 15 3.49903 15H11.501C11.7437 15 11.9404 14.8033 11.9404 14.5605C11.9404 14.3179 11.7437 14.1211 11.501 14.1211H11.4697V13.3839C11.4697 12.4927 10.7446 11.7676 9.85348 11.7676H9.11625V9.81441C9.44801 9.61048 9.7665 9.34314 10.0678 9.01527C11.3969 8.93779 12.6272 8.1415 13.5509 6.75321C14.4854 5.34889 15 3.49116 15 1.52208C15 1.27934 14.8032 1.08262 14.5605 1.08262ZM2.18079 6.26637C1.41003 5.10799 0.957184 3.59313 0.888176 1.96153H2.41344C2.57195 3.96724 3.04276 5.82108 3.77861 7.2928C3.8958 7.52718 4.01836 7.74851 4.14551 7.95714C3.41457 7.6811 2.73811 7.10409 2.18079 6.26637ZM12.8192 6.26637C12.2619 7.10409 11.5854 7.6811 10.8545 7.95714C10.9818 7.74851 11.1042 7.52718 11.2214 7.2928C11.9572 5.82108 12.4279 3.96724 12.5866 1.96153H14.1118C14.0428 3.59313 13.59 5.10799 12.8192 6.26637Z" fill="#1B1B1B"/>
                                </svg></p>                   
                        @endunless
                        </td>
                        <td>
                        {{$hashtag->daily}}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="push"></div>
    </div>

    <!-- FOOTER - FOOTER -->
    <div class='wrapper-footer'>
        <a href="raceview">
            <p class='footer-header'>Go to daily race</p>  
        </a>
    
    </div>

</div>

@endsection

<style>
.content-main-svg {
    background: url({{'images/' . $images[$nbr]}})
}
</style>








