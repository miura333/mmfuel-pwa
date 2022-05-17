<template>
    <div class="appWrapper">
        <div class="appHeader">
            <div class="appHeaderTitle">
                <table border="0" width="100%">
                    <tr>
                        <td width="20%"><router-link class="linkBackButtonText" :to="{name:'root-view'}">Back</router-link></td>
                        <td width="60%">History</td>
                        <td width="20%"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="appHeaderBorder"></div>
        <div v-for="history in $route.params.histories">
            <div class="historyCell" >
                <div class="historyCellColl1">
                    <table border="0" width="100%">
                        <tr>
                            <td width="5%"></td>
                            <td width="45%">{{history.date}}</td>
                            <td width="45%" class="historyTextFuelRate">{{history.fuel_rate}} km/l</td>
                            <td width="5%"></td>
                        </tr>
                    </table>
                </div>
                <div class="historyCellColl2">
                    <table border="0" width="100%">
                        <tr>
                            <td width="5%"></td>
                            <td width="30%">{{history.trip}} km</td>
                            <td width="30%" class="historyTextFuel">{{history.fuel}} l</td>
                            <td width="30%" class="historyTextPrice">{{history.price_of_fuel}} yen</td>
                            <td width="5%"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="appHeaderBorder"></div>
        </div>
    </div>
</template>

<script>
</script>

<style>
</style>
