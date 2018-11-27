<template>
    <div class="appWrapper">
        <div class="appHeader">
            <div class="appHeaderTitle">
                <table border="0" width="100%">
                    <tr>
                        <td width="20%"></td>
                        <td width="60%">{{carName}}</td>
                        <td width="20%"><router-link class="linkBackButtonText" :to="{name:'carlist-view', params:{cars:cars}}">List</router-link></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="appHeaderBorder"></div>
        <div class="latestTitle latestAndAverageTitleText">Latest</div>
        <div class="latestValue">
            <em class="fuelValueText">{{latestRate}}</em>
            <em class="fuelUnitText">km/l</em>
        </div>
        <div class="averageTitle latestAndAverageTitleText">Average</div>
        <div class="averageValue">
            <em class="fuelValueText">{{averageRate}}</em>
            <em class="fuelUnitText">km/l</em>
        </div>
        <div class="addButtonParent">
            <div class="addHistoryButton">
                <div class="addHistoryButtonText"><router-link class="linkButtonText" :to="{name:'add-view', params:{carId:carId}}">add</router-link></div>
            </div>
        </div>
        <div class="historyButtonParent">
            <div class="addHistoryButton">
                <div class="addHistoryButtonText"><router-link class="linkButtonText" :to="{name:'history-view', params:{histories:histories}}">history</router-link></div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            latestRate: '',
            averageRate: '',
            carName: '',
            carId: 0,
            histories: [],
            cars: []
        };
    },
    created() {
        var self = this;
        var url = '/api/getCarInfo';

        var arrayCookies = self.getCookieArray();
        var tmpCarId = arrayCookies["carId"];
        if(tmpCarId != undefined) {
            url += ('/' + String(tmpCarId));
        }

        axios.get(url).then(function(response){
            console.log(response);
            self.latestRate = response.data.latestRate;
            self.averageRate = response.data.averageRate;
            self.carName = response.data.carName;
            self.carId = response.data.carId;
            self.histories = response.data.history;
            self.cars = response.data.carList;
        });
    },
    methods: {
        getCookieArray(){
            var arr = new Array();
            if(document.cookie != ''){
                var tmp = document.cookie.split('; ');
                for(var i=0;i<tmp.length;i++){
                    var data = tmp[i].split('=');
                    arr[data[0]] = decodeURIComponent(data[1]);
                }
            }
            return arr;
        }
    }
};
</script>

<style>
</style>
