@extends("layout.guestPage")

@section('content')



    <!--following is map function-->
    <div id="map">
        <script type="text/javascript" src="{{ asset('js/map-scripts.js') }}"></script><br>
    <div class="container">
        <?php
            //Calls leaflet to load the area's map data and put it on screen
            echo '<script type="text/javascript">',
            'start("'.env('MAPBOX_API_KEY','Mapbox API Key is missing').'");',
                '</script>';
            //Creates an Http Client using Guzzle to make our API requests
            $client = new \GuzzleHttp\Client();
            //calls the Waldo api, asking for information on the given room and stores the result
            $result = $client->request('GET', 'https://api.metalab.csun.edu/waldo/1.0/rooms?room='.$data['roomData']->Building_Room, ['verify' => false]);
            $roomInfo = [];
            $resultRooms = json_decode($result->getBody())->{'rooms'};
            $foundRoom = $resultRooms[0];
            array_push($roomInfo, [
            $foundRoom->latitude,
            $foundRoom->longitude,
            $foundRoom->room_number,
            $foundRoom->building_name]);
            $roomJSON =json_encode($roomInfo);
            echo '<script type="text/javascript">', 'addMultiplePoints('.$roomJSON.', "true");',
                '</script>';
        ?>
    </div>
    </div>
    
    <div class="container nav-fill">
        <ul class="nav nav-metaphor">
            <li class="nav-item flex-fill text-center tab-content shadow"> 
                <a class="nav-link active " href="/equip/{{$data['roomData']->Building_Room}}">Equipment</a> </li>
            <li class="nav-item flex-fill text-center"> <a class="nav-link" href="/image/{{$data['roomData']->Building_Room}}">Images</a> </li>
        </ul>
    </div>
   
        <div class="container">
            <table class="mytable">
                <thead>
                <tr>
                    <th>Equipment</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Classroom Name</td>
                    <td>{{$data['roomData']->Building_Room}}</td>
                </tr>
                <tr>
                    <td>Mount Key</td>
                    <td>{{$data['roomData']->Mount_Key}}</td>
                </tr>
                <tr>
                    <td>Seat Count</td>
                    <td>{{$data['roomData']->Station_Count}}</td>
                </tr>
                <tr>
                    <td>Large_Lecture Hall or Classroom</td>
                    <td>{{$data['roomData']->Large_Lecture_Hall_or_Classroom}}</td>
                </tr>
                <tr>
                    <td>Video Projector Model</td>
                    <td>{{$data['roomData']->Projector_Model}}</td>
                </tr>
                <tr>
                    <td>Projector Screen Type</td>
                    <td>{{$data['roomData']->Projector_Screen_Type_Manual_Motorized}}</td>
                </tr>
                <tr>
                    <td>Projector Serial</td>
                    <td>{{$data['roomData']->Projector_Serial}}</td>
                </tr>
                <tr>
                    <td>Internal DVD player located in PC</td>
                    <td>{{$data['roomData']->Internal_DVD_player_located_in_PC}}</td>
                </tr>
                <tr>
                    <td>Number of Screens</td>
                    <td>{{$data['roomData']->Number_of_Screens}}</td>
                </tr>
                <tr>
                    <td>Screen Size </td>
                    <td>{{$data['roomData']->Screen_Size_4_3_16_9}}</td>
                </tr>
                <tr>
                    <td>Airserver</td>
                    <td>{{$data['roomData']->Airserver_Y_N}}</td>
                </tr>
                <tr>
                    <td>HDMI</td>
                    <td>{{$data['roomData']->HDMI_Y_N}}</td>
                </tr>
                <tr>
                    <td>Apple TV</td>
                    <td>{{$data['roomData']->Apple_TV_Y_N}}</td>
                </tr>
                <tr>
                    <td>Support Contact Number</td>
                    <td>{{$data['roomData']->Support_Contact_Number}}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div id="app">
            <equipmentdata :equip="{{$data['mainData']}}"></equipmentdata>
        </div>

<style>
    thead:before {
    content: "-";
    display: block;
    line-height: 1em;
    color: transparent;
    }

    tbody tr:hover {background-color:#f5f5f5;}
 
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    thead tr {
    border-bottom: 3px solid #dee2e6;
    }

    .shadow {
        -webkit-box-shadow: 0px 10px 4px -2px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 10px 4px -2px rgba(0,0,0,0.75);
        box-shadow: 0px 10px 4px -2px rgba(0,0,0,0.75);
    }
    .tab-pane{ padding:10px;}
</style>
@endsection