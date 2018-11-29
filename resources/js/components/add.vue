<template>
    <div class="appWrapper">
        <div class="appHeader">
            <div class="appHeaderTitle">
                <table border="0" width="100%">
                    <tr>
                        <td width="20%"><router-link class="linkBackButtonText" :to="{name:'root-view'}">Back</router-link></td>
                        <td width="60%">Add</td>
                        <td width="20%"><div class="linkBackButtonText" v-on:click="addRecord()">Save</div></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="appHeaderBorder"></div>
        <form>
            <div class="historyCell">
                <input type="tel" name="" v-model="fuelData.trip" class="addInputForm addInputFormText" placeholder="trip">
            </div>
            <div class="appHeaderBorder"></div>
            <div class="historyCell">
                <input type="tel" name="" v-model="fuelData.fuelNumber" class="addInputFormFuelNumber addInputFormText">
                .
                <input type="tel" name="" v-model="fuelData.fuelDecimal" class="addInputFormFuelDecimal addInputFormText">
            </div>
            <div class="appHeaderBorder"></div>
            <div class="historyCell">
                <input type="tel" name="" v-model="fuelData.price" class="addInputForm addInputFormText" placeholder="price">
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            fuelData: {
                trip: '',
                fuelNumber: '',
                fuelDecimal: '',
                price: '',
                carId: ''
            }
        };
    },
    created() {
        this.fuelData.carId = this.$route.params.carId;
    },
    methods: {
        addRecord() {
            console.log(this.fuelData);

            var self = this;

            let params = new URLSearchParams();
            params.append('trip', this.fuelData.trip);
            params.append('fuelNumber', this.fuelData.fuelNumber);
            params.append('fuelDecimal', this.fuelData.fuelDecimal);
            params.append('price', this.fuelData.price);
            params.append('carId', this.fuelData.carId);

            var url = '/add/fuel';

            axios.post(url, params).then(function(response){
                self.$router.push({ name: 'root-view'});
            });
        }
    }
};

</script>

<style>
</style>
