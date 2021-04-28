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
                <input type="text" name="" v-model="carData.carName" class="addInputForm addInputFormText" placeholder="Your car name here">
            </div>
            <div class="appHeaderBorder"></div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            carData: {
                carName: ''
            }
        };
    },
    methods: {
        addRecord() {
            console.log(this.carData);

            var self = this;

            let params = new URLSearchParams();
            params.append('carName', this.carData.carName);

            var url = '/add/car';

            axios.post(url, params).then(function(response){
                console.log(response);
                document.cookie = "carId=" + String(response.data);
                self.$router.push({ name: 'root-view'});
            });
        }
    }
};

</script>

<style>
</style>
