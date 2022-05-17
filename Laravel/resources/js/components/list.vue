<template>
    <div class="appWrapper">
        <div class="appHeader">
            <div class="appHeaderTitle">
                <table border="0" width="100%">
                    <tr>
                        <td width="20%"><router-link class="linkBackButtonText" :to="{name:'root-view'}">Back</router-link></td>
                        <td width="60%">List</td>
                        <td width="20%"><router-link class="linkBackButtonText" :to="{name:'addcar-view'}">Add</router-link></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="appHeaderBorder"></div>
        <div v-for="car in $route.params.cars">
            <div class="historyCell">
                <div class="carlistCellColl linkButtonText" v-on:click="changeCar(car.id)">{{car.car_name}}</div>
            </div>
            <div class="appHeaderBorder"></div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        changeCar(carId) {
            console.log('carId='+carId);
            document.cookie = "carId=" + String(carId);
            this.$router.push({ name: 'root-view'});
        }
    }
};

</script>

<style>
</style>
